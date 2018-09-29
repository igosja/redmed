<?php

class ExtractMessage extends CFormModel
{
    public function extract()
    {
        $files = self::findFiles(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..');

        $messages = [];
        foreach ($files as $file) {
            $messages = array_merge_recursive($messages, $this->extractMessages($file));
        }

        $this->saveMessagesToDb($messages);
    }

    public static function findFiles($path)
    {
        $dir = rtrim($path, DIRECTORY_SEPARATOR);
        $list = [];
        $handle = opendir($dir);
        while (($file = readdir($handle)) !== false) {
            if ($file === '.' || $file === '..') {
                continue;
            }
            $path = $dir . DIRECTORY_SEPARATOR . $file;
            if (false !== strpos($path, '../controllers') || false !== strpos($path, '../models')
                || false !== strpos($path, '../views')
            ) {
                if (is_file($path)) {
                    $list[] = $path;
                } elseif (is_dir($path)) {
                    $list = array_merge($list, static::findFiles($path));
                }
            }
        }
        closedir($handle);

        return $list;
    }

    protected function extractMessages($fileName)
    {
        $subject = file_get_contents($fileName);
        $messages = [];
        $tokens = token_get_all($subject);
        foreach (array('Yii::t') as $currentTranslator) {
            $translatorTokens = token_get_all('<?php ' . $currentTranslator);
            array_shift($translatorTokens);
            $messages = array_merge_recursive($messages, $this->extractMessagesFromTokens($tokens, $translatorTokens));
        }

        return $messages;
    }

    private function extractMessagesFromTokens(array $tokens, array $translatorTokens)
    {
        $messages = [];
        $translatorTokensCount = count($translatorTokens);
        $matchedTokensCount = 0;
        $buffer = [];
        $pendingParenthesisCount = 0;

        foreach ($tokens as $token) {
            // finding out translator call
            if ($matchedTokensCount < $translatorTokensCount) {
                if ($this->tokensEqual($token, $translatorTokens[$matchedTokensCount])) {
                    $matchedTokensCount++;
                } else {
                    $matchedTokensCount = 0;
                }
            } elseif ($matchedTokensCount === $translatorTokensCount) {
                // translator found

                // end of function call
                if ($this->tokensEqual(')', $token)) {
                    $pendingParenthesisCount--;

                    if ($pendingParenthesisCount === 0) {
                        // end of translator call or end of something that we can't extract
                        if (isset($buffer[0][0], $buffer[1], $buffer[2][0])
                            && $buffer[0][0] === T_CONSTANT_ENCAPSED_STRING
                            && $buffer[1] === ','
                            && $buffer[2][0] === T_CONSTANT_ENCAPSED_STRING
                        ) {
                            // is valid call we can extract
                            $category = stripcslashes($buffer[0][1]);
                            $category = mb_substr($category, 1, mb_strlen($category) - 2);

                            $message = stripcslashes($buffer[2][1]);
                            $message = mb_substr($message, 1, mb_strlen($message) - 2);

                            $messages[$category][] = $message;

                            $nestedTokens = array_slice($buffer, 3);
                            if (count($nestedTokens) > $translatorTokensCount) {
                                // search for possible nested translator calls
                                $messages = array_merge_recursive($messages,
                                    $this->extractMessagesFromTokens($nestedTokens, $translatorTokens));
                            }
                        }

                        // prepare for the next match
                        $matchedTokensCount = 0;
                        $pendingParenthesisCount = 0;
                        $buffer = [];
                    } else {
                        $buffer[] = $token;
                    }
                } elseif ($this->tokensEqual('(', $token)) {
                    // count beginning of function call, skipping translator beginning
                    if ($pendingParenthesisCount > 0) {
                        $buffer[] = $token;
                    }
                    $pendingParenthesisCount++;
                } elseif (isset($token[0]) && !in_array($token[0], [T_WHITESPACE, T_COMMENT])) {
                    // ignore comments and whitespaces
                    $buffer[] = $token;
                }
            }
        }

        return $messages;
    }


    protected function tokensEqual($a, $b)
    {
        if (is_string($a) && is_string($b)) {
            return $a === $b;
        }
        if (isset($a[0], $a[1], $b[0], $b[1])) {
            return $a[0] === $b[0] && $a[1] == $b[1];
        }
        return false;
    }

    protected function saveMessagesToDb($messages)
    {
        $languages = array('ru', 'uk');

        $currentMessages = [];
        $rows = SourceMessage::model()->findAll(array('select' => 'id, category, message'));
        foreach ($rows as $row) {
            $currentMessages[$row['category']][$row['id']] = $row['message'];
        }

        $currentLanguages = [];
        $rows = Message::model()->findAll(array('select' => 'language', 'group' => 'language'));
        foreach ($rows as $row) {
            $currentLanguages[] = $row['language'];
        }
        $missingLanguages = [];
        if (!empty($currentLanguages)) {
            $missingLanguages = array_diff($languages, $currentLanguages);
        }

        $new = [];
        $obsolete = [];

        foreach ($messages as $category => $msgs) {
            $msgs = array_unique($msgs);

            if (isset($currentMessages[$category])) {
                $new[$category] = array_diff($msgs, $currentMessages[$category]);
                $obsolete += array_diff($currentMessages[$category], $msgs);
            } else {
                $new[$category] = $msgs;
            }
        }

        foreach (array_diff(array_keys($currentMessages), array_keys($messages)) as $category) {
            $obsolete += $currentMessages[$category];
        }

        $obsolete = array_keys($obsolete);

        foreach ($new as $category => $msgs) {
            foreach ($msgs as $msg) {
                Yii::app()->db->createCommand()
                    ->insert('i18n_source_messages', array('category' => $category, 'message' => $msg));
                $insert_id = Yii::app()->db->getLastInsertID();
                foreach ($languages as $language) {
                    Yii::app()->db->createCommand()
                        ->insert('i18n_translated_messages', array('id' => $insert_id, 'language' => $language));
                }
            }
        }

        if (!empty($missingLanguages)) {
            $updatedMessages = [];
            $rows = SourceMessage::model()->findAll(array('select' => 'id, category, message'));
            foreach ($rows as $row) {
                $updatedMessages[$row['category']][$row['id']] = $row['message'];
            }
            foreach ($updatedMessages as $category => $msgs) {
                foreach ($msgs as $id => $msg) {
                    foreach ($missingLanguages as $language) {
                        Yii::app()->db->createCommand()
                            ->insert('i18n_translated_messages', array('id' => $id, 'language' => $language));
                    }
                }
            }
        }

        if (!empty($obsolete)) {
            foreach ($obsolete as $item) {
                Yii::app()->db->createCommand()
                    ->delete('i18n_source_messages', 'id=:id', array('id' => $item));
            }
        }
    }
}
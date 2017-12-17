<?php

class Forget extends CFormModel
{
    public $email;

    public function rules()
    {
        return array(
            array('email', 'required'),
            array('email', 'email'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'email' => Yii::t('models.Forget', 'label-email'),
        );
    }

    public function check()
    {
        $user = User::model()->findByAttributes(array('email' => $this->email));
        if ($user) {
            return true;
        } else {
            $this->addError('email', Yii::t('models.Forget', 'error-user'));
            return false;
        }
    }

    public function send()
    {
        $user = User::model()->findByAttributes(array('email' => $this->email));
        $password = substr(md5(uniqid(rand())), 0, 5);
        $user['password'] = $user->hashPassword($password);
        $text = 'Ваш новый пароль - ' . $password;
        $mail = new Mail();
        $mail->setTo($this->email);
        $mail->setSubject('Востановление пароля redmed');
        $mail->setHtml($text);
        $mail->send();
    }
}
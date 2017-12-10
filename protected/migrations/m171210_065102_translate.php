<?php

class m171210_065102_translate extends CDbMigration
{
    public $dbMessageSourceComponent = 'messages';

    public function safeUp()
    {
        $this->createTable('i18n_source_messages', array(
            'id' => 'pk',
            'category' => 'string',
            'message' => 'text',
            'timecreated' => 'int(11) default 0',
            'timemodified' => 'int(11) default 0',
        ));

        $this->createIndex('idx_category', 'i18n_source_messages', 'category');
        $this->createIndex('idx_timecreated', 'i18n_source_messages', 'timecreated');
        $this->createIndex('idx_timemodified', 'i18n_source_messages', 'timemodified');

        $this->createTable('i18n_translated_messages', array(
            'message_id' => 'pk',
            'id' => 'int(11) default 0',
            'language' => "varchar(16) default 'ru'",
            'translation' => 'text',
            'timecreated' => 'int(11) default 0',
            'timemodified' => 'int(11) default 0',
        ));

        $this->createIndex('idx_id', 'i18n_translated_messages', 'id');
        $this->createIndex('idx_language', 'i18n_translated_messages', 'language');
        $this->createIndex('idx_timecreated', 'i18n_translated_messages', 'timecreated');
        $this->createIndex('idx_timemodified', 'i18n_translated_messages', 'timemodified');
    }

    public function safeDown()
    {
        $this->dropTable('i18n_source_messages');
        $this->dropTable('i18n_translated_messages');
    }
}
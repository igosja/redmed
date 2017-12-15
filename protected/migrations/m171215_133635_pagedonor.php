<?php

class m171215_133635_pagedonor extends CDbMigration
{
    public function up()
    {
        $this->createTable('pagedonor', array(
            'id' => 'pk',
            'h1_ru' => 'varchar(255)',
            'h1_uk' => 'varchar(255)',
            'h2_ru' => 'varchar(255)',
            'h2_uk' => 'varchar(255)',
            'image_id' => 'int(11) default 0',
            'text_ru' => 'text',
            'text_uk' => 'text',
            'text_1_ru' => 'text',
            'text_1_uk' => 'text',
            'text_2_ru' => 'text',
            'text_2_uk' => 'text',
            'text_3_ru' => 'text',
            'text_3_uk' => 'text',
            'title_1_ru' => 'varchar(255)',
            'title_1_uk' => 'varchar(255)',
            'title_2_ru' => 'varchar(255)',
            'title_2_uk' => 'varchar(255)',
            'title_3_ru' => 'varchar(255)',
            'title_3_uk' => 'varchar(255)',
            'seo_title_ru' => 'varchar(255)',
            'seo_title_uk' => 'varchar(255)',
            'seo_description_ru' => 'text',
            'seo_description_uk' => 'text',
            'seo_keywords_ru' => 'text',
            'seo_keywords_uk' => 'text',
        ));

        $this->insert('pagedonor', array(
            'id' => null
        ));
    }

    public function down()
    {
        $this->dropTable('pagedonor');
    }
}
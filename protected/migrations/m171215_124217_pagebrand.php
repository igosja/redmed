<?php

class m171215_124217_pagebrand extends CDbMigration
{
    public function up()
    {
        $this->createTable('pagebrand', array(
            'id' => 'pk',
            'h1_ru' => 'varchar(255)',
            'h1_uk' => 'varchar(255)',
            'text_1_ru' => 'text',
            'text_1_uk' => 'text',
            'text_2_ru' => 'text',
            'text_2_uk' => 'text',
            'seo_title_ru' => 'varchar(255)',
            'seo_title_uk' => 'varchar(255)',
            'seo_description_ru' => 'text',
            'seo_description_uk' => 'text',
            'seo_keywords_ru' => 'text',
            'seo_keywords_uk' => 'text',
        ));

        $this->insert('pagebrand', array(
            'id' => null
        ));
    }

    public function down()
    {
        $this->dropTable('pagebrand');
    }
}
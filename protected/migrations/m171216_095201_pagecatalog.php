<?php

class m171216_095201_pagecatalog extends CDbMigration
{
    public function up()
    {
        $this->createTable('pagecatalog', array(
            'id' => 'pk',
            'h1_ru' => 'varchar(255)',
            'h1_uk' => 'varchar(255)',
            'seo_title_ru' => 'varchar(255)',
            'seo_title_uk' => 'varchar(255)',
            'seo_description_ru' => 'text',
            'seo_description_uk' => 'text',
            'seo_keywords_ru' => 'text',
            'seo_keywords_uk' => 'text',
        ));

        $this->insert('pagecatalog', array(
            'id' => null,
        ));
    }

    public function down()
    {
        $this->dropTable('pagecatalog');
    }
}
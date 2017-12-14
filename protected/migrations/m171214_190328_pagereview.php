<?php

class m171214_190328_pagereview extends CDbMigration
{
    public function up()
    {
        $this->createTable('pagereview', array(
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

        $this->insert('pagereview', array(
            'id' => null
        ));
    }

    public function down()
    {
        $this->dropTable('pagereview');
    }
}
<?php

class m171216_095227_category extends CDbMigration
{
    public function up()
    {
        $this->createTable('category', array(
            'id' => 'pk',
            'h1_ru' => 'varchar(255)',
            'h1_uk' => 'varchar(255)',
            'image_id' => 'int(11) default 0',
            'text_ru' => 'text',
            'text_uk' => 'text',
            'url' => 'varchar(255)',
            'order' => 'int(11) default 0',
            'status' => 'int(1) default 1',
            'seo_title_ru' => 'varchar(255)',
            'seo_title_uk' => 'varchar(255)',
            'seo_description_ru' => 'text',
            'seo_description_uk' => 'text',
            'seo_keywords_ru' => 'text',
            'seo_keywords_uk' => 'text',
        ));
    }

    public function down()
    {
        $this->dropTable('category');
    }
}
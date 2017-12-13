<?php

class m171213_183917_pageabout extends CDbMigration
{
    public function up()
    {
        $this->createTable('pageabout', array(
            'id' => 'pk',
            'h1_ru' => 'varchar(255)',
            'h1_uk' => 'varchar(255)',
            'image_id' => 'int(11) default 0',
            'title_1_ru' => 'varchar(255)',
            'title_1_uk' => 'varchar(255)',
            'title_2_ru' => 'varchar(255)',
            'title_2_uk' => 'varchar(255)',
            'title_3_ru' => 'varchar(255)',
            'title_3_uk' => 'varchar(255)',
            'text_11_ru' => 'text',
            'text_11_uk' => 'text',
            'text_12_ru' => 'text',
            'text_12_uk' => 'text',
            'text_2_ru' => 'text',
            'text_2_uk' => 'text',
            'text_3_ru' => 'text',
            'text_3_uk' => 'text',
            'seo_title_ru' => 'varchar(255)',
            'seo_title_uk' => 'varchar(255)',
            'seo_description_ru' => 'text',
            'seo_description_uk' => 'text',
            'seo_keywords_ru' => 'text',
            'seo_keywords_uk' => 'text',
        ));

        $this->insert('pageabout', array(
            'id' => null
        ));
    }

    public function down()
    {
        $this->dropTable('pageabout');
    }
}
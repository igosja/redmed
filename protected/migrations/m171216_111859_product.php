<?php

class m171216_111859_product extends CDbMigration
{
    public function up()
    {
        $this->createTable('product', array(
            'id' => 'pk',
            'brand_id' => 'int(11) default 0',
            'category_id' => 'int(11) default 0',
            'discount' => 'int(2) default 0',
            'h1_ru' => 'varchar(255)',
            'h1_uk' => 'varchar(255)',
            'price' => 'decimal(11,2) default 0',
            'status' => 'int(1) default 1',
            'table_ru' => 'text',
            'table_uk' => 'text',
            'technical_ru' => 'text',
            'technical_uk' => 'text',
            'text_ru' => 'text',
            'text_uk' => 'text',
            'use_ru' => 'varchar(255)',
            'use_uk' => 'varchar(255)',
            'url' => 'varchar(255)',
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
        $this->dropTable('product');
    }
}
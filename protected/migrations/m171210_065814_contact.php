<?php

class m171210_065814_contact extends CDbMigration
{
    public function up()
    {
        $this->createTable('contact', array(
            'id' => 'pk',
            'address_ru' => 'varchar(255)',
            'address_uk' => 'varchar(255)',
            'email' => 'varchar(255)',
            'email_letter' => 'varchar(255)',
            'h1_ru' => 'varchar(255)',
            'h1_uk' => 'varchar(255)',
            'lat' => 'decimal(11,8) default 0',
            'lng' => 'decimal(11,8) default 0',
            'name_ru' => 'varchar(255)',
            'name_uk' => 'varchar(255)',
            'phone_city' => 'varchar(255)',
            'phone_kyiv' => 'varchar(255)',
            'phone_life' => 'varchar(255)',
            'seo_title_ru' => 'varchar(255)',
            'seo_title_uk' => 'varchar(255)',
            'seo_description_ru' => 'text',
            'seo_description_uk' => 'text',
            'seo_keywords_ru' => 'text',
            'seo_keywords_uk' => 'text',
        ));

        $this->insert('contact', array('id' => null));
    }

    public function down()
    {
        $this->dropTable('contact');
    }
}
<?php

class m171215_133640_donor extends CDbMigration
{
    public function up()
    {
        $this->createTable('donor', array(
            'id' => 'pk',
            'address_ru' => 'varchar(255)',
            'address_uk' => 'varchar(255)',
            'h1_ru' => 'varchar(255)',
            'h1_uk' => 'varchar(255)',
            'lat' => 'varchar(255)',
            'lng' => 'varchar(255)',
            'phone_city' => 'varchar(255)',
            'phone_mobile' => 'varchar(255)',
            'order' => 'int(11) default 0',
            'status' => 'int(1) default 1',
        ));
    }

    public function down()
    {
        $this->dropTable('donor');
    }
}
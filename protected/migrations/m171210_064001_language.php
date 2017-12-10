<?php

class m171210_064001_language extends CDbMigration
{
    public function up()
    {
        $this->createTable('language', array(
            'id' => 'pk',
            'code' => 'varchar(5) not null',
            'name' => 'varchar(255) not null',
            'order' => 'int(1) default 0',
            'status' => 'int(1) default 1',
        ));

        $this->insertMultiple('language', array(
            array('code' => 'uk', 'name' => 'Укр', 'order' => 0),
            array('code' => 'ru', 'name' => 'Рус', 'order' => 1),
        ));
    }

    public function down()
    {
        $this->dropTable('language');
    }
}
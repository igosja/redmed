<?php

class m171210_065222_social extends CDbMigration
{
    public function up()
    {
        $this->createTable('social', array(
            'id' => 'pk',
            'css' => 'varchar(255)',
            'name' => 'varchar(255)',
            'order' => 'int(11) default 0',
            'status' => 'int(1) default 1',
            'url' => 'varchar(255)',
        ));
    }

    public function down()
    {
        $this->dropTable('social');
    }
}
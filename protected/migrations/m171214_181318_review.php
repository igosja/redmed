<?php

class m171214_181318_review extends CDbMigration
{
    public function up()
    {
        $this->createTable('review', array(
            'id' => 'pk',
            'date' => 'int(11) default 0',
            'name' => 'varchar(255)',
            'status' => 'int(1) default 0',
            'text' => 'text',
        ));
    }

    public function down()
    {
        $this->dropTable('review');
    }
}
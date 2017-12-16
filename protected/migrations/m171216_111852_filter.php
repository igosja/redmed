<?php

class m171216_111852_filter extends CDbMigration
{
    public function up()
    {
        $this->createTable('filter', array(
            'id' => 'pk',
            'h1_ru' => 'varchar(255)',
            'h1_uk' => 'varchar(255)',
            'order' => 'int(11) default 0',
            'status' => 'int(1) default 1',
        ));
    }

    public function down()
    {
        $this->dropTable('filter');
    }
}
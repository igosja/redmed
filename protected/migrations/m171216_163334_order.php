<?php

class m171216_163334_order extends CDbMigration
{
    public function up()
    {
        $this->createTable('order', array(
            'id' => 'pk',
            'comment' => 'text',
            'date' => 'int(11) default 0',
            'email' => 'varchar(255)',
            'phone' => 'varchar(255)',
            'quantity' => 'int(11) default 0',
            'shipping' => 'varchar(255)',
            'status' => 'int(1) default 0',
            'total' => 'decimal(11,2) default 0',
            'user_id' => 'int(11) default 0',
        ));
    }

    public function down()
    {
        $this->dropTable('order');
    }
}
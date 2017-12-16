<?php

class m171216_112753_productanalog extends CDbMigration
{
    public function up()
    {
        $this->createTable('productanalog', array(
            'id' => 'pk',
            'analog_id' => 'int(11) default 0',
            'product_id' => 'int(11) default 0',
        ));
    }

    public function down()
    {
        $this->dropTable('productanalog');
    }
}
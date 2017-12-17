<?php

class m171216_163505_orderproduct extends CDbMigration
{
    public function up()
    {
        $this->createTable('orderproduct', array(
            'id' => 'pk',
            'order_id' => 'int(11) default 0',
            'price' => 'decimal(11,2) default 0',
            'product_id' => 'int(11) default 0',
            'product_ru' => 'varchar(255)',
            'product_uk' => 'varchar(255)',
            'quantity' => 'int(11) default 0',
            'total' => 'decimal(11,2) default 0',
        ));
    }

    public function down()
    {
        $this->dropTable('orderproduct');
    }
}
<?php

class m171216_163457_cart extends CDbMigration
{
    public function up()
    {
        $this->createTable('cart', array(
            'id' => 'pk',
            'date' => 'int(11) default 0',
            'product_id' => 'int(11) default 0',
            'quantity' => 'int(11) default 0',
            'user_id' => 'int(11) default 0',
        ));
    }

    public function down()
    {
        $this->dropTable('cart');
    }
}
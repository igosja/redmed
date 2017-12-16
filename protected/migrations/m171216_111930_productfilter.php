<?php

class m171216_111930_productfilter extends CDbMigration
{
    public function up()
    {
        $this->createTable('productfilter', array(
            'id' => 'pk',
            'filter_id' => 'int(11) default 0',
            'product_id' => 'int(11) default 0',
        ));
    }

    public function down()
    {
        $this->dropTable('productfilter');
    }
}
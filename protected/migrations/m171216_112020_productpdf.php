<?php

class m171216_112020_productpdf extends CDbMigration
{
    public function up()
    {
        $this->createTable('productpdf', array(
            'id' => 'pk',
            'name' => 'varchar(255)',
            'pdf_id' => 'int(11) default 0',
            'product_id' => 'int(11) default 0',
        ));
    }

    public function down()
    {
        $this->dropTable('productpdf');
    }
}
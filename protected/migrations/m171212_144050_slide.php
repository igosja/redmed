<?php

class m171212_144050_slide extends CDbMigration
{
    public function up()
    {
        $this->createTable('slide', array(
            'id' => 'pk',
            'h1_ru' => 'varchar(255)',
            'h1_uk' => 'varchar(255)',
            'image_id' => 'int(11) default 0',
            'link_ru' => 'varchar(255)',
            'link_uk' => 'varchar(255)',
            'order' => 'int(11) default 0',
            'status' => 'int(1) default 1',
            'text_ru' => 'text(255)',
            'text_uk' => 'text(255)',
            'url' => 'varchar(255)',
        ));
    }

    public function down()
    {
        $this->dropTable('slide');
    }
}
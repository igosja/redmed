<?php

class m171210_065208_resize extends CDbMigration
{
    public function up()
    {
        $this->createTable('resize', array(
            'id' => 'pk',
            'cut' => 'int(1) default 0',
            'height' => 'int(11) default 0',
            'image_id' => 'int(11) default 0',
            'url' => 'varchar(255)',
            'width' => 'int(11) default 0',
        ));

        $this->createIndex('cut', 'resize', 'cut');
        $this->createIndex('height', 'resize', 'height');
        $this->createIndex('image_id', 'resize', 'image_id');
        $this->createIndex('width', 'resize', 'width');
    }

    public function down()
    {
        $this->dropTable('resize');
    }
}
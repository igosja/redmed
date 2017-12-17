<?php

class m171210_064748_user extends CDbMigration
{
    public function up()
    {
        $this->createTable('user', array(
            'id' => 'pk',
            'address' => 'varchar(255)',
            'date' => 'int(11) default 0',
            'email' => 'varchar(255)',
            'login' => 'varchar(255)',
            'message' => 'text',
            'name' => 'varchar(255)',
            'new' => 'int(1) default 1',
            'password' => 'varchar(32)',
            'phone' => 'varchar(255)',
            'status' => 'int(1) default 0',
            'userrole_id' => 'int(1) default 3',
            'usertype' => 'varchar(255)',
        ));

        $this->insert('user', array(
            'date' => time(),
            'login' => 'admin',
            'new' => 0,
            'password' => '3679163934587a4abafd80a44d0e318a',
            'status' => 1,
            'userrole_id' => 1,
        ));

        $this->insert('user', array(
            'date' => time(),
            'login' => 'igosja',
            'new' => 0,
            'password' => '76dbc4e726a15737c82940e1109b2aa7',
            'status' => 1,
            'userrole_id' => 1,
        ));
    }

    public function down()
    {
        $this->dropTable('user');
    }
}
<?php

class UserRole extends CActiveRecord
{
    const ROLE_ADMIN = 1;

    public function tableName()
    {
        return 'userrole';
    }

    public function rules()
    {
        return array(
            array('name', 'length', 'max' => 255),
        );
    }

    public function attributeLabels()
    {
        return array(
            'name' => 'Название',
        );
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
<?php

class ProductAnalog extends CActiveRecord
{
    public function tableName()
    {
        return 'productanalog';
    }

    public function rules()
    {
        return array(
            array('name', 'length', 'max' => 255),
            array('analog_id, product_id', 'numerical'),
        );
    }

    public function relations()
    {
        return array(
            'analog' => array(self::HAS_ONE, 'Product', array('id' => 'analog_id')),
        );
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
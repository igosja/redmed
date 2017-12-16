<?php

class ProductFilter extends CActiveRecord
{
    public function tableName()
    {
        return 'productfilter';
    }

    public function rules()
    {
        return array(
            array(' filter_id, product_id', 'numerical'),
        );
    }

    public function relations()
    {
        return array(
            'filter' => array(self::HAS_ONE, 'Filter', array('id' => 'filter_id')),
            'product' => array(self::HAS_ONE, 'Product', array('id' => 'product_id')),
        );
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
<?php

class OrderProduct extends CActiveRecord
{
    public function tableName()
    {
        return 'orderproduct';
    }

    public function rules()
    {
        return array(
            array('order_id, price, product_id, quantity, total', 'numerical'),
            array('order_id, price, product_id, quantity, total', 'required'),
        );
    }

    public function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $o_product = Product::model()->findByPk($this['product_id']);
                if (!$o_product) {
                    return false;
                }
                $this['product_ru'] = $o_product['h1_ru'];
                $this['product_uk'] = $o_product['h1_uk'];
            }
        }
        return true;
    }

    public function relations()
    {
        return array(
            'product' => array(self::HAS_ONE, 'Product', array('id' => 'product_id'), 'condition' => 'status=1'),
        );
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
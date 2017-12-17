<?php

class Cart extends CActiveRecord
{
    public function tableName()
    {
        return 'cart';
    }

    public function rules()
    {
        return array(
            array('date, product_id, quantity, user_id', 'numerical'),
            array('product_id, quantity', 'required'),
        );
    }

    public function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this['date'] = time();
                $this['user_id'] = Yii::app()->user->id;
            }
        }
        return true;
    }

    public function relations()
    {
        return array(
            'product' => array(self::HAS_ONE, 'Product', array('id' => 'product_id')),
        );
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
<?php

class ProductDelivery extends CActiveRecord
{
    public function tableName()
    {
        return 'productdelivery';
    }

    public function rules()
    {
        return array(
            array('delivery_h3_ru, delivery_h3_uk, payment_h3_ru, payment_h3_uk', 'length', 'max' => 255),
            array('delivery_text_ru, delivery_text_uk, payment_text_ru, payment_text_uk', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'delivery_h3_ru' => 'Доставка заголовок (Русский)',
            'delivery_h3_uk' => 'Доставка заголовок (Українська)',
            'delivery_text_ru' => 'Доставка текст (Русский)',
            'delivery_text_uk' => 'Доставка текст (Українська)',
            'payment_h3_ru' => 'Оплата заголовок (Русский)',
            'payment_h3_uk' => 'Оплата заголовок (Українська)',
            'payment_text_ru' => 'Оплата текст (Русский)',
            'payment_text_uk' => 'Оплата текст (Українська)',
        );
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
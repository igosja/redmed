<?php

class Donor extends CActiveRecord
{
    public function tableName()
    {
        return 'donor';
    }

    public function rules()
    {
        return array(
            array('address_ru, address_uk, h1_ru, h1_uk, phone_city, phone_mobile', 'length', 'max' => 255),
            array('lat, lng, order, status', 'numerical'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'address_ru' => 'Адрес (Русский)',
            'address_uk' => 'Адрес (Українська)',
            'h1_ru' => 'Название (Русский)',
            'h1_uk' => 'Название (Українська)',
            'lat' => 'Первая координата Google-карты',
            'lng' => 'Вторая координата Google-карты',
            'phone_city' => 'Телефон (городской)',
            'phone_mobile' => 'Телефон (мобильный)',
            'status' => 'Статус',
        );
    }

    public function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $last = self::model()->findByAttributes(array('order' => '`order` DESC'));
                if ($last) {
                    $order = $last['order'] + 1;
                } else {
                    $order = 0;
                }
                $this['order'] = $order;
            }
        }
        return true;
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
<?php

class Shipping extends CActiveRecord
{
    public function tableName()
    {
        return 'shipping';
    }

    public function rules()
    {
        return array(
            array('name_ru, name_uk', 'length', 'max' => 255),
            array('id, order, status', 'numerical'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'name_ru' => 'Название (Русский)',
            'name_uk' => 'Название (Українська)',
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
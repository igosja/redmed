<?php

class OrderStatus extends CActiveRecord
{
    public function tableName()
    {
        return 'orderstatus';
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

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this['id']);
        $criteria->compare('name', $this['name'], true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}

<?php

class Social extends CActiveRecord
{
    public function tableName()
    {
        return 'social';
    }

    public function rules()
    {
        return array(
            array('name, css', 'length', 'max' => 255),
            array('order, status', 'numerical'),
            array('url', 'url'),
            array('name, css', 'required'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'css' => 'CSS-класс',
            'name' => 'Название',
            'status' => 'Статус',
            'url' => 'URL',
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
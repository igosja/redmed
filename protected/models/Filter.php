<?php

class Filter extends CActiveRecord
{
    public function tableName()
    {
        return 'filter';
    }

    public function rules()
    {
        return array(
            array('h1_ru, h1_uk', 'length', 'max' => 255),
            array('order, status, filtergroup_id', 'numerical'),
            array('h1_ru, h1_uk, filtergroup_id', 'required'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'h1_ru' => 'Название (Русский)',
            'h1_uk' => 'Название (Українська)',
            'filtergroup_id' => 'Группа фильтров',
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

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $a_productfilter = ProductFilter::model()->findAllByAttributes(array('filter_id' => $this->primaryKey));
            foreach ($a_productfilter as $item) {
                $item->delete();
            }
        }
        return true;
    }

    public function relations()
    {
        return array(
            'filtergroup' => array(self::HAS_ONE, 'FilterGroup', array('id' => 'filtergroup_id')),
        );
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

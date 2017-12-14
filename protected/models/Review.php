<?php

class Review extends CActiveRecord
{
    const ON_PAGE = 8;

    public function tableName()
    {
        return 'review';
    }

    public function rules()
    {
        return array(
            array('name, text', 'required'),
            array('date', 'numerical'),
            array('name', 'length', 'max' => 255),
        );
    }

    public function attributeLabels()
    {
        return array(
            'date' => 'Время',
            'name' => Yii::t('models.Review', 'label-name'),
            'status' => 'Статус',
            'text' => Yii::t('models.Review', 'label-text'),
        );
    }

    public function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this['date'] = time();
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
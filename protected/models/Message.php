<?php

class Message extends CActiveRecord
{
    public function tableName()
    {
        return 'i18n_translated_messages';
    }

    public function rules()
    {
        return array(
            array('language', 'length', 'max' => 5),
            array('translation', 'safe'),
            array('timecreated, timemodified', 'numerical', 'integerOnly' => true),
        );
    }

    public function attributeLabels()
    {
        return array(
            'language' => 'Язык',
            'translation' => 'Перевод',
            'timecreated' => 'Время создания',
            'timemodified' => 'Время обновления',
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('translation', $this->translation, true);
        $criteria->compare('language', $this->language, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function relations()
    {
        return array(
            'source' => array(self::HAS_ONE, 'SourceMessage', array('id' => 'id')),
        );
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
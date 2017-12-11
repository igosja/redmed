<?php

class SourceMessage extends CActiveRecord
{
    public function tableName()
    {
        return 'i18n_source_messages';
    }

    public function rules()
    {
        return array(
            array('category, message', 'safe'),
            array('timecreated, timemodified', 'numerical', 'integerOnly' => true),
        );
    }

    public function attributeLabels()
    {
        return array(
            'category' => 'Раздел',
            'message' => 'Текст',
            'timecreated' => 'Время создания',
            'timemodified' => 'Время обновления',
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('message', $this->message, true);
        $criteria->compare('category', $this->category, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
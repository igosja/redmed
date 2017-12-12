<?php

class Slide extends CActiveRecord
{
    public function tableName()
    {
        return 'slide';
    }

    public function rules()
    {
        return array(
            array('h1_ru, h1_uk, link_ru, link_uk, url', 'length', 'max' => 255),
            array('id, order, status', 'numerical'),
            array('text_ru, text_uk', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'h1_ru' => 'Заголовок (Русский)',
            'h1_uk' => 'Заголовок (Українська)',
            'image_id' => 'Изображение',
            'text_ru' => 'Текст (Русский)',
            'text_uk' => 'Текст (Українська)',
            'link_ru' => 'Текст ссылки (Русский)',
            'link_uk' => 'Текст ссылки (Українська)',
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

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            if ($this['image_id']) {
                $o_image = Image::model()->findByPk($this['image_id']);
                if ($o_image) {
                    $o_image->delete();
                }
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

    public function relations()
    {
        return array(
            'image' => array(self::HAS_ONE, 'Image', array('id' => 'image_id')),
        );
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
<?php

class Category extends CActiveRecord
{
    public function tableName()
    {
        return 'category';
    }

    public function rules()
    {
        return array(
            array('h1_ru, h1_uk, seo_title_ru, seo_title_uk, url', 'length', 'max' => 255),
            array('image_id, order, status', 'numerical'),
            array('h1_ru, h1_uk, text_ru, text_uk', 'required'),
            array(', seo_description_ru, seo_description_uk, seo_keywords_ru, seo_keywords_uk', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'h1_ru' => 'Название (Русский)',
            'h1_uk' => 'Название (Українська)',
            'image_id' => 'Изображение',
            'text_ru' => 'Описание (Русский)',
            'text_uk' => 'Описание (Українська)',
            'seo_title_ru' => 'SEO title (Русский)',
            'seo_title_uk' => 'SEO title (Українська)',
            'seo_description_ru' => 'SEO description (Русский)',
            'seo_description_uk' => 'SEO description (Українська)',
            'seo_keywords_ru' => 'SEO keywords (Русский)',
            'seo_keywords_uk' => 'SEO keywords (Українська)',
            'status' => 'Статус',
            'url' => 'ЧП-URL',
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

    public function relations()
    {
        return array(
            'image' => array(self::HAS_ONE, 'Image', array('id' => 'image_id')),
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function searchInfo($text)
    {
        $criteria = new CDbCriteria();
        $criteria->addSearchCondition('h1_ru', $text, true, 'OR');
        $criteria->addSearchCondition('h1_uk', $text, true, 'OR');
        $criteria->addSearchCondition('text_ru', $text, true, 'OR');
        $criteria->addSearchCondition('text_uk', $text, true, 'OR');

        return self::model()->findAll($criteria);
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
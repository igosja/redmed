<?php

class PageAbout extends CActiveRecord
{
    public function tableName()
    {
        return 'pageabout';
    }

    public function rules()
    {
        return array(
            array('h1_ru, h1_uk, title_1_ru, title_1_uk, title_2_ru, title_2_uk, title_3_ru, title_3_uk, seo_title_ru, seo_title_uk', 'length', 'max' => 255),
            array('image_id', 'numerical'),
            array('text_11_ru, text_11_uk, text_12_ru, text_12_uk, text_2_ru, text_2_uk, text_3_ru, text_3_uk, seo_description_ru, seo_description_uk, seo_keywords_ru, seo_keywords_uk', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'h1_ru' => 'H1 (Русский)',
            'h1_uk' => 'H1 (Українська)',
            'image_id' => 'Изображение',
            'text_11_ru' => 'Текст 1 слева (Русский)',
            'text_11_uk' => 'Текст 1 слева (Українська)',
            'text_12_ru' => 'Текст 1 справа (Русский)',
            'text_12_uk' => 'Текст 1 справа (Українська)',
            'text_2_ru' => 'Текст 2 (Русский)',
            'text_2_uk' => 'Текст 2 (Українська)',
            'text_3_ru' => 'Текст 3 (Русский)',
            'text_3_uk' => 'Текст 3 (Українська)',
            'title_1_ru' => 'Заголовок 1 (Русский)',
            'title_1_uk' => 'Заголовок 1 (Українська)',
            'title_2_ru' => 'Заголовок 2 (Русский)',
            'title_2_uk' => 'Заголовок 2 (Українська)',
            'title_3_ru' => 'Заголовок 3 (Русский)',
            'title_3_uk' => 'Заголовок 3 (Українська)',
            'seo_title_ru' => 'SEO title (Русский)',
            'seo_title_uk' => 'SEO title (Українська)',
            'seo_description_ru' => 'SEO description (Русский)',
            'seo_description_uk' => 'SEO description (Українська)',
            'seo_keywords_ru' => 'SEO keywords (Русский)',
            'seo_keywords_uk' => 'SEO keywords (Українська)',
        );
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
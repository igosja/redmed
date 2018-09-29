<?php

class PageDonor extends CActiveRecord
{
    public function tableName()
    {
        return 'pagedonor';
    }

    public function rules()
    {
        return array(
            array('h1_ru, h1_uk, h2_ru, h2_uk, title_1_ru, title_1_uk, title_2_ru, title_2_uk, title_3_ru, title_3_uk, seo_title_ru, seo_title_uk', 'length', 'max' => 255),
            array('url_1_ru, url_1_uk, url_2_ru, url_2_uk, url_3_ru, url_3_uk, ', 'url'),
            array('image_id', 'numerical'),
            array('text_ru, text_uk, text_1_ru, text_1_uk, text_2_ru, text_2_uk, text_3_ru, text_3_uk, seo_description_ru, seo_description_uk, seo_keywords_ru, seo_keywords_uk', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'h1_ru' => 'H1 (Русский)',
            'h1_uk' => 'H1 (Українська)',
            'h2_ru' => 'Заголовок (Русский)',
            'h2_uk' => 'Заголовок (Українська)',
            'image_id' => 'Изображение',
            'text_ru' => 'Текст (Русский)',
            'text_uk' => 'Текст (Українська)',
            'text_1_ru' => 'Текст 1 (Русский)',
            'text_1_uk' => 'Текст 1 (Українська)',
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
            'url_1_ru' => 'Ссылка 1 (Русский)',
            'url_1_uk' => 'Ссылка 1 (Українська)',
            'url_2_ru' => 'Ссылка 2 (Русский)',
            'url_2_uk' => 'Ссылка 2 (Українська)',
            'url_3_ru' => 'Ссылка 3 (Русский)',
            'url_3_uk' => 'Ссылка 3 (Українська)',
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
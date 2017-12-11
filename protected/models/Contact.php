<?php

class Contact extends CActiveRecord
{
    public function tableName()
    {
        return 'contact';
    }

    public function rules()
    {
        return array(
            array('address_ru, address_uk, h1_ru, h1_uk, name_ru, name_uk, phone_city, phone_kyiv, phone_life, seo_title_ru, seo_title_uk', 'length', 'max' => 255),
            array('seo_description_ru, seo_description_uk, seo_keywords_ru, seo_keywords_uk', 'safe'),
            array('email, email_letter', 'email'),
            array('lat, lng', 'numerical'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'address_ru' => 'Адрес (Русский)',
            'address_uk' => 'Адрес (Українська)',
            'email' => 'Email',
            'email_letter' => 'Email для уведомлений',
            'h1_ru' => 'H1 (Русский)',
            'h1_uk' => 'H1 (Українська)',
            'lat' => 'Первая координата Google-карты',
            'lng' => 'Вторая координата Google-карты',
            'name_ru' => 'Название (Русский)',
            'name_uk' => 'Название (Українська)',
            'phone_city' => 'Телефон (городской)',
            'phone_kyiv' => 'Телефон (Kyivstar)',
            'phone_life' => 'Телефон (Life)',
            'seo_title_ru' => 'SEO title (Русский)',
            'seo_title_uk' => 'SEO title (Українська)',
            'seo_description_ru' => 'SEO description (Русский)',
            'seo_description_uk' => 'SEO description (Українська)',
            'seo_keywords_ru' => 'SEO keywords (Русский)',
            'seo_keywords_uk' => 'SEO keywords (Українська)',
        );
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
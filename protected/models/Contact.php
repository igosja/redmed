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
            array('address_ru, address_uk, address_book_ru, address_book_uk, address_direct_ru, address_direct_uk, address_tender_ru, address_tender_uk, address_warehouse_ru, address_warehouse_uk, email, email_book, email_direct, email_tender, email_warehouse, h1_ru, h1_uk, name_ru, name_uk, phone, phone_book, phone_direct, phone_tender, phone_warehouse, seo_title_ru, seo_title_uk, skype, url', 'length', 'max' => 255),
            array('seo_description_ru, seo_description_uk, seo_keywords_ru, seo_keywords_uk', 'safe'),
            array('email_letter', 'email'),
            array('lat, lng, lat_warehouse, lng_warehouse', 'numerical'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'address_ru' => 'Адрес (Русский)',
            'address_uk' => 'Адрес (Українська)',
            'address_book_ru' => 'Адрес бухгалтерии (Русский)',
            'address_book_uk' => 'Адрес бухгалтерии (Українська)',
            'address_direct_ru' => 'Адрес дирекции (Русский)',
            'address_direct_uk' => 'Адрес дирекции (Українська)',
            'address_tender_ru' => 'Адрес тендеров (Русский)',
            'address_tender_uk' => 'Адрес тендеров (Українська)',
            'address_warehouse_ru' => 'Адрес склада (Русский)',
            'address_warehouse_uk' => 'Адрес склада (Українська)',
            'email' => 'Email (общий)',
            'email_book' => 'Email (бухгалтерия)',
            'email_direct' => 'Email (дирекция)',
            'email_letter' => 'Email для уведомлений',
            'email_tender' => 'Email (тендеры)',
            'email_warehouse' => 'Email (склад)',
            'h1_ru' => 'H1 (Русский)',
            'h1_uk' => 'H1 (Українська)',
            'lat' => 'Первая координата Google-карты',
            'lat_warehouse' => 'Первая координата Google-карты (склад)',
            'lng' => 'Вторая координата Google-карты',
            'lng_warehouse' => 'Вторая координата Google-карты (склад)',
            'name_ru' => 'Название (Русский)',
            'name_uk' => 'Название (Українська)',
            'phone' => 'Телефон (общий)',
            'phone_book' => 'Телефон (бухгалтерия)',
            'phone_direct' => 'Телефон (дирекция)',
            'phone_tender' => 'Телефон (тендеры)',
            'phone_warehouse' => 'Телефон (склад)',
            'skype' => 'Skype',
            'url' => 'Сайты',
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

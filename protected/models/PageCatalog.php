<?php

class PageCatalog extends CActiveRecord
{
    public function tableName()
    {
        return 'pagecatalog';
    }

    public function rules()
    {
        return array(
            array('h1_ru, h1_uk, seo_title_ru, seo_title_uk', 'length', 'max' => 255),
            array('seotext_ru, seotext_uk, seo_description_ru, seo_description_uk, seo_keywords_ru, seo_keywords_uk', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'h1_ru' => 'H1 (Русский)',
            'h1_uk' => 'H1 (Українська)',
            'seo_title_ru' => 'SEO title (Русский)',
            'seo_title_uk' => 'SEO title (Українська)',
            'seo_description_ru' => 'SEO description (Русский)',
            'seo_description_uk' => 'SEO description (Українська)',
            'seo_keywords_ru' => 'SEO keywords (Русский)',
            'seo_keywords_uk' => 'SEO keywords (Українська)',
            'seotext_ru' => 'Тест в подвале (Русский)',
            'seotext_uk' => 'Тест в подвале (Українська)',
        );
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}

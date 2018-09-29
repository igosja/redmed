<?php

class Product extends CActiveRecord
{
    const ON_PAGE = 12;

    public $analog_field;
    public $filter_field;
    public $pdf_field;

    public function tableName()
    {
        return 'product';
    }

    public function rules()
    {
        return array(
            array('h1_ru, h1_uk, url, video, sku', 'length', 'max' => 255),
            array('brand_id, category_id, discount, status, price_usd, price_eur, price_pln, price_cny, order', 'numerical'),
            array('category_id, h1_ru, h1_uk', 'required'),
            array(
                'analog_field, filter_field, pdf_field, table_ru, table_uk, technical_ru, technical_uk, text_ru, text_uk, use_ru, use_uk, seo_description_ru, seo_description_uk, seo_keywords_ru, seo_keywords_uk',
                'safe'
            ),
        );
    }

    public function attributeLabels()
    {
        return array(
            'analog_field' => 'Аналоги',
            'brand_id' => 'Бренд',
            'category_id' => 'Категория',
            'discount' => 'Скидка, %',
            'filter_field' => 'Фильтры',
            'image' => 'Изображения',
            'h1_ru' => 'Название (Русский)',
            'h1_uk' => 'Название (Українська)',
            'pdf_field' => 'Инструкции',
            'price_usd' => 'Цена, USD',
            'price_eur' => 'Цена, EUR',
            'price_pln' => 'Цена, PLN',
            'price_cny' => 'Цена, CNY',
            'sku' => 'Артикул',
            'table_ru' => 'Таблица (Русский)',
            'table_ru_excel' => 'Таблица xls (Русский)',
            'table_uk' => 'Таблица (Українська)',
            'table_uk_excel' => 'Таблица xls (Українська)',
            'technical_ru' => 'Технические данные (Русский)',
            'technical_uk' => 'Технические данные (Українська)',
            'text_ru' => 'Описание (Русский)',
            'text_uk' => 'Описание (Українська)',
            'use_ru' => 'Применение (Русский)',
            'use_uk' => 'Применение (Українська)',
            'seo_title_ru' => 'SEO title (Русский)',
            'seo_title_uk' => 'SEO title (Українська)',
            'seo_description_ru' => 'SEO description (Русский)',
            'seo_description_uk' => 'SEO description (Українська)',
            'seo_keywords_ru' => 'SEO keywords (Русский)',
            'seo_keywords_uk' => 'SEO keywords (Українська)',
            'status' => 'Статус',
            'url' => 'ЧП-URL',
            'video' => 'Код видео с Youtube (https://www.youtube.com/watch?v=<strong>code</strong>)',
            'order' => 'Порядок сортировки',
        );
    }

    public function beforeSave()
    {
        if (parent::beforeSave()) {
            $this['url'] = str_replace('/', '', $this['url']);
            if (!$this['order']) {
                $max = self::model()->find(array('order' => '`order` DESC', 'limit' => 1));
                $this['order'] = $max['order'] + 1;
            }
        }
        return true;
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $a_productfilter = ProductFilter::model()->findAllByAttributes(array('product_id' => $this->primaryKey));
            foreach ($a_productfilter as $item) {
                $item->delete();
            }
            $a_productimage = ProductImage::model()->findAllByAttributes(array('product_id' => $this->primaryKey));
            foreach ($a_productimage as $item) {
                $item->delete();
            }
            $a_productpdf = ProductPdf::model()->findAllByAttributes(array('product_id' => $this->primaryKey));
            foreach ($a_productpdf as $item) {
                $item->delete();
            }
        }
        return true;
    }

    public function relations()
    {
        return array(
            'analog' => array(self::HAS_MANY, 'ProductAnalog', array('product_id' => 'id')),
            'brand' => array(self::HAS_ONE, 'Brand', array('id' => 'brand_id')),
            'category' => array(self::HAS_ONE, 'Category', array('id' => 'category_id')),
            'filter' => array(self::HAS_MANY, 'ProductFilter', array('product_id' => 'id')),
            'image' => array(self::HAS_MANY, 'ProductImage', array('product_id' => 'id'), 'order' => '`order` ASC'),
            'pdf' => array(self::HAS_MANY, 'ProductPdf', array('product_id' => 'id')),
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this['id']);
        $criteria->compare('h1_ru', $this['h1_ru'], true);
        $criteria->compare('sku', $this['sku']);
        $criteria->compare('`order`', $this['order']);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort'=>array(
                'defaultOrder'=>'`order` ASC',
            ),
        ));
    }

    public static function searchInfo($text)
    {
        $criteria = new CDbCriteria();
        $criteria->addSearchCondition('h1_ru', $text, true, 'OR');
        $criteria->addSearchCondition('h1_uk', $text, true, 'OR');
        $criteria->addSearchCondition('table_ru', $text, true, 'OR');
        $criteria->addSearchCondition('table_uk', $text, true, 'OR');
        $criteria->addSearchCondition('technical_ru', $text, true, 'OR');
        $criteria->addSearchCondition('technical_uk', $text, true, 'OR');
        $criteria->addSearchCondition('text_ru', $text, true, 'OR');
        $criteria->addSearchCondition('text_uk', $text, true, 'OR');
        $criteria->addSearchCondition('use_ru', $text, true, 'OR');
        $criteria->addSearchCondition('use_uk', $text, true, 'OR');

        return self::model()->findAll($criteria);
    }

    public function getPrice()
    {
        $rate = PageMain::model()->findByPk(1);
        if ($this['price_usd'] > 0) {
            return round($this['price_usd'] * $rate['rate_usd'], 2);
        } elseif ($this['price_eur'] > 0) {
            return round($this['price_eur'] * $rate['rate_eur'], 2);
        } elseif ($this['price_pln'] > 0) {
            return round($this['price_pln'] * $rate['rate_pln'], 2);
        } elseif ($this['price_cny'] > 0) {
            return round($this['price_cny'] * $rate['rate_cny'], 2);
        } else {
            return 0;
        }
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}

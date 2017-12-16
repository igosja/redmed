<?php

class ProductPdf extends CActiveRecord
{
    public function tableName()
    {
        return 'productpdf';
    }

    public function rules()
    {
        return array(
            array('name', 'length', 'max' => 255),
            array('pdf_id, product_id', 'numerical'),
        );
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            if ($this['pdf_id']) {
                $o_image = Image::model()->findByPk($this['pdf_id']);
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
            'pdf' => array(self::HAS_ONE, 'Image', array('id' => 'pdf_id')),
        );
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
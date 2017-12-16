<?php

class BrandController extends Controller
{
    public function actionIndex()
    {
        $a_brand = Brand::model()->findAllByAttributes(array('status' => 1), array('order' => '`order` ASC'));
        $o_page = PageBrand::model()->findByPk(1);
        $this->setSEO($o_page);
        $this->breadcrumbs = array(
            $o_page['h1_' . Yii::app()->language],
        );
        $this->render('index', array(
            'a_brand' => $a_brand,
            'o_page' => $o_page,
        ));
    }
}
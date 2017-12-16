<?php

class ProductController extends Controller
{
    public function actionView($id)
    {
        $o_product = Product::model()->findByAttributes(
            array('url' => $id)
        );
        if (!$o_product) {
            $this->redirect(array('catalog/index'));
        }
        $this->setSEO($o_product);
        if (isset($o_product['image'][0])) {
            $this->og_image = ImageIgosja::resize($o_product['image'][0]['image_id'], 280, 280);
        }
        $o_page = PageCatalog::model()->findByPk(1);
        $this->breadcrumbs = array(
            $o_page['h1_' . Yii::app()->language] => array('catalog/index'),
            $o_product['category']['h1_' . Yii::app()->language] => array('catalog/index', 'id' => $o_product['category']['url']),
        );
        $this->breadcrumbs[] = $o_product['h1_' . Yii::app()->language];
        $this->render('view', array(
            'o_page' => $o_page,
            'o_product' => $o_product,
        ));
    }
}
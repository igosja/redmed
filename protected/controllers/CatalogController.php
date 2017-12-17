<?php

class CatalogController extends Controller
{
    public function actionIndex($id = '')
    {
        if ($id) {
            $o_category = Category::model()->findByAttributes(array('url' => $id));
            if (!$o_category) {
                $this->redirect(array('index'));
            }
        } else {
            $o_category = '';
        }
        $a_brand = Brand::model()->findAllByAttributes(array('status' => 1), array('order' => '`order` ASC'));
        $a_filter = Filter::model()->findAllByAttributes(array('status' => 1), array('order' => '`order` ASC'));
        $page = Yii::app()->request->getQuery('page', 1);
        $offset = ($page - 1) * Product::ON_PAGE;
        $product_attributes = array('status' => 1);
        if ($o_category) {
            $product_attributes['category_id'] = $o_category->primaryKey;
        }
        if (Yii::app()->request->getQuery('filter')) {
            $a_productfilter = ProductFilter::model()->findAllByAttributes(
                array('filter_id' => Yii::app()->request->getQuery('filter'))
            );
            $product_id = array();
            foreach ($a_productfilter as $item) {
                $product_id[] = $item['product_id'];
            }
            $product_attributes['id'] = $product_id;
        }
        if (Yii::app()->request->getQuery('brand')) {
            $product_attributes['brand_id'] = Yii::app()->request->getQuery('brand');
        }
        $a_product = Product::model()->findAllByAttributes(
            $product_attributes,
            array('order' => 'id ASC', 'offset' => $offset, 'limit' => Product::ON_PAGE)
        );
        $count = Product::model()->countByAttributes(array('status' => 1));
        $page_total = ceil($count / Product::ON_PAGE);
        $page_first = $page - 4;
        if ($page_first < 1) {
            $page_first = 1;
        }
        $page_last = $page + 4;
        if ($page_last > $page_total) {
            $page_last = $page_total;
        }
        $page_prev = $page - 1;
        if ($page_prev < 1) {
            $page_prev = 0;
        }
        $page_next = $page + 1;
        if ($page_next > $page_total) {
            $page_next = 0;
        }
        $o_page = PageCatalog::model()->findByPk(1);
        $this->setSEO($o_page);
        if ($id) {
            $this->breadcrumbs = array(
                $o_page['h1_' . Yii::app()->language] => array('index'),
                $o_category['h1_' . Yii::app()->language],
            );
        } else {
            $this->breadcrumbs = array(
                $o_page['h1_' . Yii::app()->language],
            );
        }
        $this->render('index', array(
            'a_brand' => $a_brand,
            'a_filter' => $a_filter,
            'a_product' => $a_product,
            'o_category' => $o_category,
            'o_page' => $o_page,
            'page' => $page,
            'page_first' => $page_first,
            'page_last' => $page_last,
            'page_next' => $page_next,
            'page_prev' => $page_prev,
        ));
    }
}
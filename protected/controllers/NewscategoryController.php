<?php

class NewscategoryController extends Controller
{
    public function actionIndex()
    {
        $page = Yii::app()->request->getQuery('page', 1);
        $offset = ($page - 1) * NewsCategory::ON_PAGE;
        $a_news = NewsCategory::model()->findAllByAttributes(
            array('status' => 1),
            array('offset' => $offset, 'limit' => NewsCategory::ON_PAGE, 'order' => '`order`')
        );
        $count = NewsCategory::model()->countByAttributes(array('status' => 1));
        if ($count > count($a_news) + $offset) {
            $more = true;
        }
        $page_total = ceil($count / NewsCategory::ON_PAGE);
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
        $o_page = PageNews::model()->findByPk(1);
        $this->setSEO($o_page);
        $this->breadcrumbs = array(
            $o_page['h1_' . Yii::app()->language],
        );
        $this->render('index', array(
            'a_news' => $a_news,
            'o_page' => $o_page,
            'offset' => $offset,
            'page' => $page,
            'page_first' => $page_first,
            'page_last' => $page_last,
            'page_next' => $page_next,
            'page_prev' => $page_prev,
        ));
    }
}
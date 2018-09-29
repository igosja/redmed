<?php

class NewsController extends Controller
{
    public function actionIndex($id = '')
    {
        if (!$id) {
            $this->redirect(array('newscategory/index'));
        }
        $o_newscategory = NewsCategory::model()->findByAttributes(
            array('url' => $id)
        );
        if (!$o_newscategory) {
            $this->redirect(array('newscategory/index'));
        }
        $page = Yii::app()->request->getQuery('page', 1);
        $offset = ($page - 1) * News::ON_PAGE;
        $a_news = News::model()->findAllByAttributes(
            array('status' => 1, 'newscategory_id' => $o_newscategory['id']),
            array('offset' => $offset, 'limit' => News::ON_PAGE, 'order' => 'date DESC')
        );
        $count = News::model()->countByAttributes(array('status' => 1, 'newscategory_id' => $o_newscategory['id']));
        if ($count > count($a_news) + $offset) {
            $more = true;
        }
        $page_total = ceil($count / News::ON_PAGE);
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
        $this->setSEO($o_newscategory);
        $o_donor = PageDonor::model()->find('url_1_ru LIKE "%' . Yii::app()->request->requestUri . '%" OR url_2_ru LIKE "%' . Yii::app()->request->requestUri . '%" OR url_3_ru LIKE "%' . Yii::app()->request->requestUri . '%" OR url_1_uk LIKE "%' . Yii::app()->request->requestUri . '%" OR url_2_uk LIKE "%' . Yii::app()->request->requestUri . '%" OR url_3_uk LIKE "%' . Yii::app()->request->requestUri . '%"');
        if ($o_donor) {
            $bread = Yii::t('views.layouts.main', 'header-link-donor');
            $bread_link = array('donor/index');
        } else {
            $bread = $o_page['h1_' . Yii::app()->language];
            $bread_link = array('newscategory/index');
        }
        $this->breadcrumbs = array(
            $bread => $bread_link,
            $o_newscategory['h1_' . Yii::app()->language],
        );
        $this->render('index', array(
            'a_news' => $a_news,
            'o_newscategory' => $o_newscategory,
            'offset' => $offset,
            'page' => $page,
            'page_first' => $page_first,
            'page_last' => $page_last,
            'page_next' => $page_next,
            'page_prev' => $page_prev,
        ));
    }

    public function actionView($id)
    {
        $o_news = News::model()->findByAttributes(
            array('url' => $id)
        );
        if (!$o_news) {
            $this->redirect(array('index'));
        }
        $o_prev = News::model()->findByAttributes(
            array('status' => 1, 'newscategory_id' => $o_news['newscategory_id']),
            array('condition' => 'date>' . $o_news['date'], 'order' => 'date ASC')
        );
        $o_next = News::model()->findByAttributes(
            array('status' => 1, 'newscategory_id' => $o_news['newscategory_id']),
            array('condition' => 'date<' . $o_news['date'], 'order' => 'date DESC')
        );
        $a_same = News::model()->findAllByAttributes(
            array('status' => 1, 'newscategory_id' => $o_news['newscategory_id']),
            array('condition' => 'id!=' . $o_news->primaryKey, 'limit' => 2, 'order' => 'rand()')
        );
        $this->setSEO($o_news);
        $this->og_image = ImageIgosja::resize($o_news['image_id'], 560, 280);
        $o_page = PageNews::model()->findByPk(1);
        if ($o_news['category']) {
            $o_donor = PageDonor::model()->find('url_1_ru LIKE "%' . $o_news['category']['url'] . '%" OR url_2_ru LIKE "%' . $o_news['category']['url'] . '%" OR url_3_ru LIKE "%' . $o_news['category']['url'] . '%" OR url_1_uk LIKE "%' . $o_news['category']['url'] . '%" OR url_2_uk LIKE "%' . $o_news['category']['url'] . '%" OR url_3_uk LIKE "%' . $o_news['category']['url'] . '%"');
            if ($o_donor) {
                $bread = Yii::t('views.layouts.main', 'header-link-donor');
                $bread_link = array('donor/index');
            } else {
                $bread = $o_page['h1_' . Yii::app()->language];
                $bread_link = array('newscategory/index');
            }
        } else {
            $bread = $o_page['h1_' . Yii::app()->language];
            $bread_link = array('newscategory/index');
        }
        $this->breadcrumbs = array(
            $bread => $bread_link,
        );
        if ($o_news['category']) {
            $this->breadcrumbs[$o_news['category']['h1_' . Yii::app()->language]] = array('index', 'id' => $o_news['category']['url']);
        }
        $this->breadcrumbs[] = $o_news['h1_' . Yii::app()->language];
        $this->render('view', array(
            'a_same' => $a_same,
            'o_news' => $o_news,
            'o_next' => $o_next,
            'o_page' => $o_page,
            'o_prev' => $o_prev,
        ));
    }
}
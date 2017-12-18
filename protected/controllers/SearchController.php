<?php

class SearchController extends Controller
{
    public function actionIndex()
    {
        $model = new SearchInfo();
        if ($data = Yii::app()->request->getQuery('SearchInfo')) {
            $model->attributes = $data;
            if ($model->q) {
                $a_category = Category::model()->searchInfo($model->q);
                $a_news = News::model()->searchInfo($model->q);
                $a_product = Product::model()->searchInfo($model->q);
                $this->seo_title = Yii::t('controllers.search.index', 'seo-title');
                $this->seo_description = Yii::t('controllers.search.index', 'seo-description');
                $this->seo_keywords = Yii::t('controllers.search.index', 'seo-keywords');
                $this->breadcrumbs[] = $this->seo_title;
                $this->render('index', array(
                    'a_category' => $a_category,
                    'a_news' => $a_news,
                    'a_product' => $a_product,
                ));
            } else {
                $this->redirect(Yii::app()->request->urlReferrer);
            }
        } else {
            $this->redirect(Yii::app()->request->urlReferrer);
        }
    }
}
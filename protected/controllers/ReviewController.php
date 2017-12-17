<?php

class ReviewController extends Controller
{
    public function actionIndex()
    {
        $model = new Review();
        if ($data = Yii::app()->request->getPost('Review')) {
            $model->attributes = $data;
            if ($model->save()) {
                Yii::app()->user->setFlash('success-review', true);
                $this->refresh();
            }
        }
        $page = Yii::app()->request->getQuery('page', 1);
        $offset = ($page - 1) * Review::ON_PAGE;
        $a_review = Review::model()->findAllByAttributes(
            array('status' => 1),
            array('offset' => $offset, 'limit' => Review::ON_PAGE, 'order' => 'id DESC')
        );
        $count = Review::model()->countByAttributes(array('status' => 1));
        $more = false;
        if ($count > count($a_review) + $offset) {
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
        $o_page = PageReview::model()->findByPk(1);
        $this->setSEO($o_page);
        $this->breadcrumbs = array(
            $o_page['h1_' . Yii::app()->language],
        );
        $this->render('index', array(
            'a_review' => $a_review,
            'model' => $model,
            'more' => $more,
            'o_page' => $o_page,
            'offset' => $offset,
            'page' => $page,
            'page_first' => $page_first,
            'page_last' => $page_last,
            'page_next' => $page_next,
            'page_prev' => $page_prev,
        ));
    }

    public function actionMore()
    {
        $a_review = Review::model()->findAllByAttributes(
            array('status' => 1),
            array(
                'order' => 'id DESC',
                'offset' => Yii::app()->request->getQuery('offset', 0) + Review::ON_PAGE,
                'limit' => Review::ON_PAGE
            )
        );
        foreach ($a_review as $item) {
            $this->renderPartial('item', array('item' => $item));
        }
    }

    public function actionCheck()
    {
        $count = Review::model()->countByAttributes(
            array('status' => 1)
        );
        $offset = (int)Yii::app()->request->getQuery('offset', 0) + Review::ON_PAGE;
        $remove = false;
        if ($count <= $offset + Review::ON_PAGE) {
            $remove = true;
        }
        print CJSON::encode(array('remove' => $remove, 'offset' => $offset));
    }
}
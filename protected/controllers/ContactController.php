<?php

class ContactController extends Controller
{
    public function actionIndex()
    {
        $model = new FeedBack();
        if ($data = Yii::app()->request->getPost('FeedBack')) {
            $model->attributes = $data;
            if ($model->save()) {
                $model->send();
                $this->refresh();
            }
        }
        $o_page = Contact::model()->findByPk(1);
        $this->setSEO($o_page);
        $this->breadcrumbs = array(
            $o_page['h1_' . Yii::app()->language],
        );
        $this->render('index', array(
            'model' => $model,
            'o_page' => $o_page,
        ));
    }
}
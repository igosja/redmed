<?php

class OrderController extends AController
{
    public $h1 = 'Заказы';
    public $title = 'Заказы';
    public $model_name = 'Order';

    public function actionIndex()
    {
        $model = $this->getModel('search');
        $model->dbCriteria->order = '`status` ASC, `id` DESC';
        $model->unsetAttributes();
        if (isset($_GET[$this->model_name])) {
            $model->attributes = $_GET[$this->model_name];
        }
        $this->breadcrumbs = array(
            $this->title => array('index'),
            'Список',
        );
        $this->render('index', array('model' => $model));
    }

    public function actionView($id)
    {
        $model = $this->getModel()->findByPk($id);
        if (null === $model) {
            throw new CHttpException(404, 'Страница не найдена.');
        }
        if (!$model['status']) {
            $model['shipping_id'] = 1;
            $model['status'] = 1;
            $model->save();
        }
        $this->h1 = $model['email'];
        $this->breadcrumbs = array(
            $this->title => array('index'),
            $this->h1,
        );
        $this->render('view', array('model' => $model));
    }

    public function actionDelete($id)
    {
        $model = $this->getModel()->findByPk($id);
        if ($model) {
            $model->delete();
        }
        Yii::app()->user->setFlash('success', $this->saved);
        $this->redirect(array('index'));
    }

    /**
     * @param $search string
     * @return CActiveRecord
     */
    public function getModel($search = '')
    {
        $model = new $this->model_name($search);
        return $model;
    }
}
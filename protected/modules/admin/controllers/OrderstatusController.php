<?php

class OrderstatusController extends AController
{
    public $h1 = 'Статусы заказов';
    public $h1_edit = 'Редактирование статуса';
    public $title_index = 'Статусы заказов';
    public $title_create = 'Создание';
    public $title_update = 'Редактирование';
    public $model_name = 'OrderStatus';

    public function actionIndex()
    {
        $model = $this->getModel('search');
        $model->unsetAttributes();
        if (isset($_GET[$this->model_name])) {
            $model->attributes = $_GET[$this->model_name];
        }
        $this->breadcrumbs = array(
            $this->title_index,
        );
        $this->render('index', array('model' => $model));
    }

    public function actionUpdate($id = 0)
    {
        $this->h1 = $this->h1_edit;
        if (0 == $id) {
            $model = $this->getModel();
        } else {
            $model = $this->getModel()->findByPk($id);
            if (null === $model) {
                throw new CHttpException(404, 'Страница не найдена.');
            }
        }
        if ($data = Yii::app()->request->getPost($this->model_name)) {
            $model->attributes = $data;
            if ($model->save()) {
                Yii::app()->user->setFlash('success', $this->saved);
                $this->redirect(array('view', 'id' => $model->primaryKey));
            }
        }
        $this->breadcrumbs = array(
            $this->title_index => array('index'),
        );
        if ($model->primaryKey) {
            $this->breadcrumbs[$model['name']] = array('view', 'id' => $model->primaryKey);
            $this->breadcrumbs[] = $this->title_update;
        } else {
            $this->breadcrumbs[] = $this->title_create;
        }
        $this->render('form', array('model' => $model));
    }

    public function actionView($id)
    {
        $model = $this->getModel()->findByPk($id);
        if (null === $model) {
            throw new CHttpException(404, 'Страница не найдена.');
        }
        $this->h1 = $model['name'];
        $this->breadcrumbs = array(
            $this->title_index => array('index'),
            $this->h1,
        );
        $this->render('view', array('model' => $model));
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
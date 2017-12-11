<?php

class TranslateController extends AController
{
    public $h1 = 'Переводы';
    public $h1_edit = 'Редактирование перевода';
    public $title = 'Переводы';
    public $model_name = 'Message';

    public function actionIndex()
    {
        $model = $this->getModel('search');
        $model->unsetAttributes();
        if (isset($_GET[$this->model_name])) {
            $model->attributes = $_GET[$this->model_name];
        }
        $this->breadcrumbs = array(
            $this->title
        );
        $this->render('index', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->getModel()->findByPk($id);
        if (null === $model) {
            throw new CHttpException(404, 'Страница не найдена.');
        }
        if ($data = Yii::app()->request->getPost($this->model_name)) {
            $model->attributes = $data;
            if ($model->save()) {
                Yii::app()->user->setFlash('success', $this->saved);
                $this->redirect(array('index'));
            }
        }
        $this->h1 = $this->h1 . '<br/>(' . $model->source->category . ', ' . $model->source->message . ', ' . $model->language . ')';
        $this->breadcrumbs = array(
            $this->title => array('index'),
            $model->source->category . ', ' . $model->source->message . ', ' . $model->language,
        );
        $this->render('form', array('model' => $model));
    }

    public function actionExtract()
    {
        $model = new ExtractMessage();
        $model->extract();
        Yii::app()->user->setFlash('success', $this->saved);
        $this->redirect('index');
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
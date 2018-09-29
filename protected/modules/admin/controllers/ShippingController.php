<?php

class ShippingController extends AController
{
    public $h1 = 'Способы доставки';
    public $h1_edit = 'Редактирование доставки';
    public $title_index = 'Способы доставки';
    public $title_create = 'Создание';
    public $title_update = 'Редактирование';
    public $model_name = 'Shipping';

    public function actionIndex()
    {
        $model = $this->getModel('search');
        $model->dbCriteria->order = '`order` ASC';
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
            $this->breadcrumbs[$model['name_ru']] = array('view', 'id' => $model->primaryKey);
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
        $this->h1 = $model['name_ru'];
        $this->breadcrumbs = array(
            $this->title_index => array('index'),
            $this->h1,
        );
        $this->render('view', array('model' => $model));
    }

    public function actionStatus($id)
    {
        $model = $this->getModel()->findByPk($id);
        if (null === $model) {
            throw new CHttpException(404, 'Страница не найдена.');
        }
        $this->getModel()->updateByPk($id, array('status' => 1 - $model->status));
        $this->redirect(array('index'));
    }

    public function actionDelete($id)
    {
        $model = $this->getModel()->findByPk($id);
        $model->delete();
        Yii::app()->user->setFlash('success', $this->saved);
        $this->redirect(array('index'));
    }

    public function actionOrder($id)
    {
        $id = (int)$id;
        $order_old = (int)Yii::app()->request->getQuery('order_old');
        $order_new = (int)Yii::app()->request->getQuery('order_new');
        $this->getModel()->updateByPk($id, array('order' => $order_new));
        if ($order_old < $order_new) {
            $a_model = $this->getModel()->findAll(
                array('condition' => '`order`>=' . $order_old . ' AND `order`<=' . $order_new . ' AND id!=' . $id)
            );
            foreach ($a_model as $model) {
                $model['order'] = $model['order'] - 1;
                $model->save();
            }
        } else {
            $a_model = $this->getModel()->findAll(
                array('condition' => '`order`<=' . $order_old . ' AND `order`>=' . $order_new . ' AND id!=' . $id)
            );
            foreach ($a_model as $model) {
                $model['order'] = $model['order'] + 1;
                $model->save();
            }
        }
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
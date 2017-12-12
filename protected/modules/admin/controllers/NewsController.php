<?php

class NewsController extends AController
{
    public $h1 = 'Статьи';
    public $h1_edit = 'Редактирование статьи';
    public $title_index = 'Статьи';
    public $title_create = 'Создание';
    public $title_update = 'Редактирование';
    public $model_name = 'News';

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
            if (isset($data['date'])) {
                $data['date'] = strtotime($data['date']);
            }
            $model->attributes = $data;
            if ($model->save()) {
                $model = $this->getModel()->findByPk($model->primaryKey);
                if (empty($model->url)) {
                    $model['url'] = $model->primaryKey . '-' . str_replace($this->rus, $this->lat, $model['h1_ru']);
                    $model->save();
                }
                $this->uploadImage($model->primaryKey);
                Yii::app()->user->setFlash('success', $this->saved);
                $this->redirect(array('view', 'id' => $model->primaryKey));
            }
        }
        $this->breadcrumbs = array(
            $this->title_index => array('index'),
        );
        if ($model->primaryKey) {
            $this->breadcrumbs[$model['h1_ru']] = array('view', 'id' => $model->primaryKey);
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
        $this->h1 = $model['h1_ru'];
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

    public function actionImage($id)
    {
        $o_image = Image::model()->findByPk($id);
        if ($o_image) {
            $o_image->delete();
        }
        Yii::app()->user->setFlash('success', $this->saved);
        $this->redirect(Yii::app()->request->urlReferrer);
    }

    public function uploadImage($id)
    {
        if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
            $image = $_FILES['image'];
            $ext = $image['name'];
            $ext = explode('.', $ext);
            $ext = end($ext);
            $file = $image['tmp_name'];
            $image_url = ImageIgosja::put_file($file, $ext);
            $o_image = new Image();
            $o_image['url'] = $image_url;
            $o_image->save();
            $image_id = $o_image->primaryKey;
            $model = $this->getModel()->findByPk($id);
            $model['image_id'] = $image_id;
            $model->save();
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
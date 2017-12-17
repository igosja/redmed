<?php

class ProductController extends AController
{
    public $h1 = 'Товары';
    public $h1_edit = 'Редактирование товара';
    public $title_index = 'Товары';
    public $title_create = 'Создание';
    public $title_update = 'Редактирование';
    public $model_name = 'Product';

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
            foreach ($model['analog'] as $item) {
                $model->analog_field[] = $item['analog_id'];
            }
            foreach ($model['filter'] as $item) {
                $model->filter_field[] = $item['filter_id'];
            }
        }
        if ($data = Yii::app()->request->getPost($this->model_name)) {
            $model->attributes = $data;
            if ($model->save()) {
                if (empty($model->url)) {
                    $model['url'] = $model->primaryKey . '-' . str_replace($this->rus, $this->lat, $model['h1_ru']);
                    $model->save();
                }
                $this->uploadImage($model->primaryKey);
                $this->uploadPdf($model->primaryKey);
                $this->uploadExcel($model->primaryKey);
                $this->saveFilter($model->primaryKey);
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
        $image = new ProductImage('search');
        $image->dbCriteria->order = '`order` ASC';
        $image->unsetAttributes();
        $image->attributes = array('product_id' => $id);
        $this->h1 = $model['h1_ru'];
        $this->breadcrumbs = array(
            $this->title_index => array('index'),
            $this->h1,
        );
        $this->render('view', array('model' => $model, 'image' => $image));
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

    public function actionPdf($id)
    {
        $model = ProductPdf::model()->findByPk($id);
        if ($model) {
            $model->delete();
        }
        Yii::app()->user->setFlash('success', $this->saved);
        $this->redirect(Yii::app()->request->urlReferrer);
    }

    public function actionImage($id)
    {
        $model = ProductImage::model()->findByPk($id);
        if ($model) {
            $model->delete();
        }
        Yii::app()->user->setFlash('success', $this->saved);
        $this->redirect(Yii::app()->request->urlReferrer);
    }

    public function uploadImage($id)
    {
        if (isset($_FILES['image']['name'][0]) && !empty($_FILES['image']['name'][0])) {
            $image = $_FILES['image'];
            for ($i=0; $i<count($image['name']); $i++) {
                $ext = $image['name'][$i];
                $ext = explode('.', $ext);
                $ext = end($ext);
                $file = $image['tmp_name'][$i];
                $image_url = ImageIgosja::put_file($file, $ext);
                $o_image = new Image();
                $o_image->url = $image_url;
                $o_image->save();
                $image_id = $o_image->primaryKey;
                $model = new ProductImage();
                $model['image_id'] = $image_id;
                $model['product_id'] = $id;
                $model->save();
            }
        }
    }

    public function uploadPdf($id)
    {
        if (isset($_FILES['pdf']['name'][0]) && !empty($_FILES['pdf']['name'][0])) {
            $image = $_FILES['pdf'];
            for ($i=0; $i<count($image['name']); $i++) {
                $ext = $image['name'][$i];
                $ext = explode('.', $ext);
                $ext = end($ext);
                $file = $image['tmp_name'][$i];
                $image_url = ImageIgosja::put_file($file, $ext);
                $o_image = new Image();
                $o_image->url = $image_url;
                $o_image->save();
                $image_id = $o_image->primaryKey;
                $model = new ProductPdf();
                $model['pdf_id'] = $image_id;
                $model['name'] = $image['name'][$i];
                $model['product_id'] = $id;
                $model->save();
            }
        }
    }

    public function saveFilter($id)
    {
        ProductFilter::model()->deleteAllByAttributes(array('product_id' => $id));
        if (isset($_POST['Product']['filter_field']) && !empty($_POST['Product']['filter_field'])) {
            $filter = $_POST['Product']['filter_field'];
            foreach ($filter as $item) {
                $model = new ProductFilter();
                $model['filter_id'] = $item;
                $model['product_id'] = $id;
                $model->save();
            }
        }
    }

    public function actionOrder($id)
    {
        $id = (int)$id;
        $order_old = (int)Yii::app()->request->getQuery('order_old');
        $order_new = (int)Yii::app()->request->getQuery('order_new');
        ProductImage::model()->updateByPk($id, array('order' => $order_new));
        $model = ProductImage::model()->findByPk($id);
        if ($model) {
            $product_id = $model['product_id'];
        } else {
            $product_id = 0;
        }
        if ($order_old < $order_new) {
            $a_model = ProductImage::model()->findAll(
                array('condition' => '`order`>=' . $order_old . ' AND `order`<=' . $order_new . ' AND id!=' . $id . ' AND product_id=' . $product_id)
            );
            foreach ($a_model as $model) {
                $model['order'] = $model['order'] - 1;
                $model->save();
            }
        } else {
            $a_model = ProductImage::model()->findAll(
                array('condition' => '`order`<=' . $order_old . ' AND `order`>=' . $order_new . ' AND id!=' . $id . ' AND product_id=' . $product_id)
            );
            foreach ($a_model as $model) {
                $model['order'] = $model['order'] + 1;
                $model->save();
            }
        }
    }

    public function uploadExcel($id)
    {
        if (isset($_FILES['table_ru_excel']['name']) && !empty($_FILES['table_ru_excel']['name'])) {
            $file = $_FILES['table_ru_excel'];
            $file = $file['tmp_name'];
            $table = ExcelHelper::getTable($file);
            $model = $this->getModel()->findByPk($id);
            $model['table_ru'] = $table;
            $model->save();
        }

        if (isset($_FILES['table_uk_excel']['name']) && !empty($_FILES['table_uk_excel']['name'])) {
            $file = $_FILES['table_uk_excel'];
            $file = $file['tmp_name'];
            $table = ExcelHelper::getTable($file);
            $model = $this->getModel()->findByPk($id);
            $model['table_uk'] = $table;
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
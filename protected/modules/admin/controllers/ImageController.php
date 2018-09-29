<?php

class ImageController extends AController
{
    public $h1 = 'Изображения';
    public $h1_edit = 'Редактирование изображения';
    public $title_index = 'Изображения';
    public $title_create = 'Создание';

    public function actionIndex()
    {
        $files = scandir(__DIR__ . '/../../../../upload_image');
        $files = array_slice($files, 2);
        $a_file = array();
        foreach ($files as $item) {
            if (!in_array($item, array('.gitignore'))) {
                $a_file[] = $item;
            }
        }
        $this->breadcrumbs = array(
            $this->title_index,
        );
        $this->render('index', array('a_file' => $a_file));
    }

    public function actionUpdate()
    {
        $this->h1 = $this->h1_edit;
        if ($data = Yii::app()->request->getPost('image_id')) {
            $this->uploadImage();
            Yii::app()->user->setFlash('success', $this->saved);
            $this->redirect(array('index'));
        }
        $this->breadcrumbs = array(
            $this->title_index => array('index'),
        );
        $this->breadcrumbs[] = $this->title_create;
        $this->render('form');
    }

    public function actionDelete()
    {
        if (file_exists(__DIR__ . '/../../../../upload_image/' . Yii::app()->request->getQuery('image'))) {
            unlink(__DIR__ . '/../../../../upload_image/' . Yii::app()->request->getQuery('image'));
        }
        Yii::app()->user->setFlash('success', $this->saved);
        $this->redirect(array('index'));
    }

    public function uploadImage()
    {
        if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
            $image = $_FILES['image'];
            $ext = $image['name'];
            $ext = explode('.', $ext);
            $ext = end($ext);
            $file = $image['tmp_name'];
            ImageIgosja::put_image($file, $ext);
        }
    }
}
<?php

class UserController extends AController
{
    public $h1 = 'Пользователи';
    public $h1_edit = 'Редактирование пользователя';
    public $title_index = 'Пользователи';
    public $title_update = 'Редактирование';
    public $model_name = 'User';

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

    public function actionUpdate($id)
    {
        $this->h1 = $this->h1_edit;
        $model = $this->getModel()->findByPk($id);
        if (null === $model) {
            throw new CHttpException(404, 'Страница не найдена.');
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
        $this->breadcrumbs[$model['login'] ? $model['login'] : $model['email']] = array('view', 'id' => $model->primaryKey);
        $this->breadcrumbs[] = $this->title_update;
        $this->render('form', array('model' => $model));
    }

    public function actionComplete($id)
    {
        $model = $this->getModel()->findByPk($id);
        if (null === $model) {
            throw new CHttpException(404, 'Страница не найдена.');
        }
        if ($model['login'] && $model['password']) {
            $this->redirect(array('view', 'id' => $model->primaryKey));
        }
        $password = substr(md5(uniqid(rand())), 0, 5);
        $model['login'] = 'user' . $model->primaryKey;
        $model['password'] = $model->hashPassword($password);
        $model['status'] = 1;
        if ($model->save()) {
            $text = 'Ваша регистрация успешно завершена';
            $text .= '<br/>Логин - ' . $model['login'];
            $text .= '<br/>Пароль - ' . $password;
            $mail = new Mail();
            $mail->setTo($model['email']);
            $mail->setSubject('Регистрация на сайте redmed');
            $mail->setHtml($text);
            $mail->send();
        }
        Yii::app()->user->setFlash('success', $this->saved);
        $this->redirect(array('view', 'id' => $model->primaryKey));
    }

    public function actionView($id)
    {
        $model = $this->getModel()->findByPk($id);
        if (null === $model) {
            throw new CHttpException(404, 'Страница не найдена.');
        }
        if ($model['new']) {
            $model['new'] = 0;
            $model->save();
        }
        $this->h1 = $model['login'] ? $model['login'] : $model['email'];
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
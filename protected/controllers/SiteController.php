<?php

class SiteController extends Controller
{
    public function actionLogin()
    {
        $model = new User;
        $model->setScenario('login');
        if ($data = Yii::app()->request->getPost('User')) {
            $model->attributes = $data;
            if ($model->validate()) {
                $identity = new UserIdentity($model['login'], $model['password']);
                if ($identity->authenticate()) {
                    Yii::app()->user->login($identity);
                    $this->redirect(Yii::app()->user->returnUrl);
                } else {
                    $model->addError('password', Yii::t('controllers.site.login', 'error-password'));
                }
            }
        }
        $this->render('login', array('model' => $model));
    }

    public function actionSignup()
    {
        $a_usertype = UserType::model()->findAllByAttributes(array('status' => 1), array('order' => '`order` ASC'));
        $model = new User;
        $model->setScenario('signup');
        if ($data = Yii::app()->request->getPost('User')) {
            $model->attributes = $data;
            if ($model->save()) {
                $this->uploadImage($model->primaryKey);
                $model->send();
                $this->refresh();
            }
        }
        $this->render('signup', array('model' => $model, 'a_usertype' => $a_usertype));
    }

    public function actionForget()
    {
        $model = new Forget();
        if ($data = Yii::app()->request->getPost('Forget')) {
            $model->attributes = $data;
            if ($model->validate() && $model->check()) {
                $model->send();
                $this->redirect(array('profile/index'));
            }
        }
        $this->render('forget', array('model' => $model));
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(array('index/index'));
    }
}
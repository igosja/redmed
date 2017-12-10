<?php

//\usr\local\php5\php.exe www\protected\yiic migrate

class Controller extends CController
{
    public $a_language = array();
    public $a_social = array();
    public $breadcrumbs = array();
    public $layout = 'main';
    public $o_contact;
    public $og_image;
    public $seo_title;
    public $seo_description;
    public $seo_keywords;
    public $searchInfo;

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array(
                'deny',
                'actions' => array('login'),
                'users' => array('@'),
                'deniedCallback' => function () {
                    $this->redirect(array('index/index'));
                },
            ),
        );
    }

    public function init()
    {
        $this->a_language = Language::model()->findAllByAttributes(
            array('status' => 1),
            array('select' => array('code', 'name'), 'order' => '`order`')
        );
        if ($language = Yii::app()->request->getQuery('language')) {
            Yii::app()->language = $language;
        } else {
            $language = Language::model()->find(array('select' => array('code'), 'order' => '`order`'));
            Yii::app()->language = $language['code'];
        }
        $this->a_social = Social::model()->findAllByAttributes(
            array('status' => 1), array('order' => '`order` ASC')
        );
        $this->o_contact = new Contact();
        $this->searchInfo = new SearchInfo();
        $clientScript = Yii::app()->getClientScript();
        $clientScript->scriptMap = array(
            'jquery.js' => false,
        );
    }

    public function beforeAction($action)
    {
        if ($language = Yii::app()->request->getPost('language')) {
            Yii::app()->language = $language;
            $redirect = array($this->uniqueId . '/' . $this->action->id);
            if (Yii::app()->request->getQuery('id')) {
                $redirect['id'] = Yii::app()->request->getQuery('id');
            }
            $this->redirect($redirect);
        }
        return $action;
    }

    public function setSEO($model)
    {
        if ($model['seo_title_' . Yii::app()->language]) {
            $this->seo_title = $model['seo_title_' . Yii::app()->language];
        } else {
            $this->seo_title = $model['h1_' . Yii::app()->language];
        }
        if ($model['seo_description_' . Yii::app()->language]) {
            $this->seo_description = $model['seo_description_' . Yii::app()->language];
        }
        if ($model['seo_keywords_' . Yii::app()->language]) {
            $this->seo_keywords = $model['seo_keywords_' . Yii::app()->language];
        }
    }
}
<?php

class AController extends CController
{
    public $breadcrumbs = array();
    public $feedback = 0;
    public $lat = array('a', 'b', 'v', 'g', 'd', 'e', 'e', 'e', 'gh', 'z', 'i', 'i', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'e', 'gh', 'z', 'i', 'i', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya', '_', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
    public $layout = 'main';
    public $notification = 0;
    public $order = 0;
    public $rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Є', 'Ё', 'Ж', 'З', 'И', 'І', 'Ї', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'є', 'ё', 'ж', 'з', 'и', 'і', 'ї', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я', ' ', '(', ')', ',', '.', ':', ';', '"', "'", '!', '@', '#', '$', '%', '^', '&', '*', '-', '=', '+', '<', '>', '\\', '|', '№', '/', '`', '~');
    public $saved = 'Изменения успешно сохранены';
    public $user = 0;

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
                'users' => array('?'),
            ),
        );
    }

    public function init()
    {
        Yii::app()->language = 'ru';
        $clientScript = Yii::app()->getClientScript();
        $clientScript->scriptMap = array(
            'jquery.js' => false,
        );
    }

    public function beforeAction($action)
    {
        $o_user = User::model()->findByPk(Yii::app()->user->id);
        if (UserRole::ROLE_ADMIN != $o_user['userrole_id']) {
            $this->redirect(array('index/index'));
        }
        $this->feedback = FeedBack::model()->countByAttributes(array('status' => 0));
        $this->order = Order::model()->countByAttributes(array('status' => 0));
        $this->user = User::model()->countByAttributes(array('new' => 1));
        $this->notification = $this->feedback + $this->order + $this->user;
        return $action;
    }
}
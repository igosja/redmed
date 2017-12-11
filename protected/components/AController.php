<?php

class AController extends CController
{
    public $breadcrumbs = array();
    public $lat = array('a', 'b', 'v', 'g', 'd', 'e', 'e', 'e', 'gh', 'z', 'i', 'i', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'e', 'gh', 'z', 'i', 'i', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya', '_', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
    public $layout = 'main';
    public $rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Є', 'Ё', 'Ж', 'З', 'И', 'І', 'Ї', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'є', 'ё', 'ж', 'з', 'и', 'і', 'ї', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я', ' ', '(', ')', ',', '.', ':', ';', '"', "'", '!', '@', '#', '$', '%', '^', '&', '*', '-', '=', '+', '<', '>', '\\', '|', '№', '/', '`', '~');
    public $saved = 'Изменения успешно сохранены';

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
        return $action;
    }
}
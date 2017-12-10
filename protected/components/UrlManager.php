<?php

class UrlManager extends CUrlManager
{
    public function createUrl($route, $params = array(), $ampersand = '&')
    {
        if (!isset($params['language'])) {
            $params['language'] = Yii::app()->language;
        }
        return parent::createUrl($route, $params, $ampersand);
    }
}
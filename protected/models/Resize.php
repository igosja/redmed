<?php

class Resize extends CActiveRecord
{
    public function tableName()
    {
        return 'resize';
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            if (isset($this->url)) {
                if (file_exists(__DIR__ . '/../../' . $this->url)) {
                    unlink(__DIR__ . '/../../' . $this->url);
                }
            }
        }
        return true;
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
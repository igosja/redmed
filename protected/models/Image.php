<?php

class Image extends CActiveRecord
{
    public function tableName()
    {
        return 'image';
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            if (isset($this['url'])) {
                if (file_exists(__DIR__ . '/../../' . $this['url'])) {
                    unlink(__DIR__ . '/../../' . $this['url']);
                }
            }
            $a_resize = Resize::model()->findAllByAttributes(array('image_id' => $this->id));
            foreach ($a_resize as $item) {
                $item->delete();
            }
        }
        return true;
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
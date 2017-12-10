<?php

class SearchInfo extends CFormModel
{
    public $q;

    public function rules()
    {
        return array(
            array('q', 'required'),
        );
    }
}
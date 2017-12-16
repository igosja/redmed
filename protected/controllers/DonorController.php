<?php

class DonorController extends Controller
{
    public function actionIndex()
    {
        $a_donor = Donor::model()->findAllByAttributes(array('status' => 1), array('order' => '`order` ASC'));
        $o_page = PageDonor::model()->findByPk(1);
        $this->setSEO($o_page);
        $this->breadcrumbs = array(
            $o_page['h1_' . Yii::app()->language],
        );
        $this->render('index', array(
            'a_donor' => $a_donor,
            'o_page' => $o_page,
        ));
    }
}
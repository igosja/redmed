<?php
/**
 * @var $form   CActiveForm
 * @var $model  FeedBack
 * @var $o_page Contact
 */
$url = explode("\r\n", $o_page['url']);
if (isset($url[0])) { $url = $url[0]; } else { $url = $o_page['url']; }
$phone = explode("\r\n", $o_page['phone']);
$email = explode("\r\n", $o_page['email']);
$phone_book = explode("\r\n", $o_page['phone_book']);
$email_book = explode("\r\n", $o_page['email_book']);
$phone_tender = explode("\r\n", $o_page['phone_tender']);
$email_tender = explode("\r\n", $o_page['email_tender']);
$phone_warehouse = explode("\r\n", $o_page['phone_warehouse']);
$email_warehouse = explode("\r\n", $o_page['email_warehouse']);
$phone_direct = explode("\r\n", $o_page['phone_direct']);
$email_direct = explode("\r\n", $o_page['email_direct']);
$url_list = explode("\r\n", $o_page['url']);
?>
<section class="content">
    <div class="breadchambs">
        <div class="wrap">
            <?= $o_page['h1_' . Yii::app()->language]; ?>
        </div>
    </div>
    <?= $this->renderPartial('/include/bread'); ?>
    <div class="clearfix in-page wrap">
        <div class="clearfix">
            <h2 class="title"><?= $o_page['name_' . Yii::app()->language]; ?></h2>
            <div class="contacts-i">
                <div class="contacts-i__adress">
                    <?= $o_page['address_' . Yii::app()->language]; ?><br />
                    <a href="#map"><?= Yii::t('views.contact.index', 'link-map'); ?></a>
                </div>
            </div>
            <div class="contacts-i">
                <strong><?= implode($phone, '</strong><strong>'); ?></strong>
            </div>
            <div class="contacts-i">
                <?php if (isset($email[0])) { ?>
                    <a href="javascript:" style="margin-bottom: 0;"><?= $email[0]; ?></a>
                    <a href="#form"><?= Yii::t('views.contact.index', 'link-form'); ?></a><br />
                <?php } ?>
                <?php if (isset($email[1])) { ?>
                    <a href="javascript:"><?= $email[1]; ?></a><br />
                <?php } ?>
                <a href="javascript:"><?= $url; ?></a>
            </div>
        </div>
        <div class="clearfix">
            <h2 class="title"><?= Yii::t('views.contact.index', 'book'); ?></h2>
            <div class="contacts-i">
                <div class="contacts-i__adress">
                    <?= $o_page['address_book_' . Yii::app()->language]; ?><br />
                </div>
            </div>
            <div class="contacts-i">
                <strong><?= implode($phone_book, '</strong><strong>'); ?></strong>
            </div>
            <div class="contacts-i">
                <?php if (isset($email_book[0])) { ?>
                    <a href="javascript:" style="margin-bottom: 0;"><?= $email_book[0]; ?></a>
                    <a href="#form"><?= Yii::t('views.contact.index', 'link-form'); ?></a><br />
                <?php } ?>
                <?php if (isset($email_book[1])) { ?>
                    <a href="javascript:"><?= $email_book[1]; ?></a><br />
                <?php } ?>
                <a href="javascript:"><?= $url; ?></a>
            </div>
        </div>
        <div class="clearfix">
            <h2 class="title"><?= Yii::t('views.contact.index', 'tender'); ?></h2>
            <div class="contacts-i">
                <div class="contacts-i__adress">
                    <?= $o_page['address_tender_' . Yii::app()->language]; ?><br />
                </div>
            </div>
            <div class="contacts-i">
                <strong><?= implode($phone_tender, '</strong><strong>'); ?></strong>
            </div>
            <div class="contacts-i">
                <?php if (isset($email_tender[0])) { ?>
                    <a href="javascript:" style="margin-bottom: 0;"><?= $email_tender[0]; ?></a>
                    <a href="#form"><?= Yii::t('views.contact.index', 'link-form'); ?></a><br />
                <?php } ?>
                <?php if (isset($email_tender[1])) { ?>
                    <a href="javascript:"><?= $email_tender[1]; ?></a><br />
                <?php } ?>
                <a href="javascript:"><?= $url; ?></a>
            </div>
        </div>
        <div class="clearfix">
            <h2 class="title"><?= Yii::t('views.contact.index', 'warehouse'); ?></h2>
            <div class="contacts-i">
                <div class="contacts-i__adress">
                    <?= $o_page['address_warehouse_' . Yii::app()->language]; ?><br />
                    <a href="#map"><?= Yii::t('views.contact.index', 'link-map'); ?></a>
                </div>
            </div>
            <div class="contacts-i">
                <strong><?= implode($phone_warehouse, '</strong><strong>'); ?></strong>
            </div>
            <div class="contacts-i">
                <?php if (isset($email_warehouse[0])) { ?>
                    <a href="javascript:" style="margin-bottom: 0;"><?= $email_warehouse[0]; ?></a>
                    <a href="#form"><?= Yii::t('views.contact.index', 'link-form'); ?></a><br />
                <?php } ?>
                <?php if (isset($email_warehouse[1])) { ?>
                    <a href="javascript:"><?= $email_warehouse[1]; ?></a><br />
                <?php } ?>
                <a href="javascript:"><?= $url; ?></a>
            </div>
        </div>
        <div class="clearfix">
            <h2 class="title"><?= Yii::t('views.contact.index', 'direct'); ?></h2>
            <div class="contacts-i">
                <div class="contacts-i__adress">
                    <?= $o_page['address_direct_' . Yii::app()->language]; ?><br />
                </div>
            </div>
            <div class="contacts-i">
                <strong><?= implode($phone_direct, '</strong><strong>'); ?></strong>
                <strong><?= $o_page['skype']; ?></strong>
            </div>
            <div class="contacts-i">
                <?php if (isset($email_direct[0])) { ?>
                    <a href="javascript:" style="margin-bottom: 0;"><?= $email_direct[0]; ?></a>
                    <a href="#form"><?= Yii::t('views.contact.index', 'link-form'); ?></a><br />
                <?php } ?>
                <?php if (isset($email_direct[1])) { ?>
                    <a href="javascript:"><?= $email_direct[1]; ?></a><br />
                <?php } ?>
                <?php if (isset($url_list[0])) { ?>
                    <a href="javascript:" style="margin-top: 10px; display: inline-block; background: url(img/sprite.png) 0 -296px no-repeat;"><?= $url_list[0]; ?></a><br />
                <?php } ?>
                <?php if (isset($url_list[1])) { ?>
                    <a href="javascript:"><?= $url_list[1]; ?></a><br />
                <?php } ?>
                <?php if (isset($url_list[2])) { ?>
                    <a href="javascript:" style="background:none;"><?= $url_list[2]; ?></a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div id="map" data-lat="<?= $o_page['lat']; ?>" data-lng="<?= $o_page['lng']; ?>" data-lat1="<?= $o_page['lat_warehouse']; ?>" data-lng1="<?= $o_page['lng_warehouse']; ?>"></div>
    <div id="form" class="contacts__form">
        <div class="wrap clearfix">
            <h2 class="title"><?= Yii::t('views.contact.index', 'h2-form'); ?></h2>
            <?php $form = $this->beginWidget('CActiveForm', array(
                'enableAjaxValidation' => false,
                'enableClientValidation' => true,
                'id' => 'page-form'
            )); ?>
            <div class="clearfix">
                <?= $form->error($model, 'name'); ?>
                <?= $form->textField($model, 'name', array(
                    'class' => 'contacts-input',
                    'placeholder' => Yii::t('views.contact.index', 'placeholder-name')
                )); ?>
                <?= $form->error($model, 'phone'); ?>
                <?= $form->textField($model, 'phone', array(
                    'class' => 'contacts-input phone_mask',
                    'placeholder' => Yii::t('views.contact.index', 'placeholder-phone')
                )); ?>
                <?= $form->error($model, 'email'); ?>
                <?= $form->textField($model, 'email', array(
                    'class' => 'contacts-input',
                    'placeholder' => Yii::t('views.contact.index', 'placeholder-email')
                )); ?>
                <?= $form->error($model, 'text'); ?>
                <?= $form->textArea($model, 'text', array(
                    'class' => 'contacts-textarea',
                    'placeholder' => Yii::t('views.contact.index', 'placeholder-text')
                )); ?>
            </div>
            <?= CHtml::submitButton(
                Yii::t('views.contact.index', 'button-submit'),
                array('class' => 'btn-more')
            ); ?>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</section>

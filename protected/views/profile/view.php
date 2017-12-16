<?php
/**
 * @var $o_user User
 */
?>
<section class="content">
    <div class="breadchambs">
        <div class="wrap">
            <?= Yii::t('views.profile.view', 'h1'); ?>
        </div>
    </div>
    <div class="clearfix in-page wrap">
        <h2 class="title title_profile"><?= Yii::t('views.profile.view', 'h2'); ?></h2>
        <div class="lk-profile-i">
            <strong><?= Yii::t('views.profile.view', 'name'); ?></strong>
            <?= $o_user['name']; ?>
        </div>
        <div class="lk-profile-i">
            <strong><?= Yii::t('views.profile.view', 'phone'); ?></strong>
            <?= $o_user['phone']; ?>
        </div>
        <div class="lk-profile-i">
            <strong><?= Yii::t('views.profile.view', 'email'); ?></strong>
            <?= $o_user['email']; ?>
        </div>
        <div class="lk-profile-i">
            <strong><?= Yii::t('views.profile.view', 'address'); ?></strong>
            <?= $o_user['address']; ?>
        </div>
        <?= CHtml::link(
            Yii::t('views.profile.view', 'link-edit'),
            array('update'),
            array('class' => 'btn-more')
        ); ?>
    </div>
</section>
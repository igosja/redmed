<?php
/**
 * @var $item Product
 */
?>
<div class="cat-i">
    <?= CHtml::link(
        '<img
            src="' . ImageIgosja::resize(isset($item['image'][0]) ? $item['image'][0]['image_id'] : 0, 280, 280) . '"
            alt="' . $item['h1_' . Yii::app()->language] . '"
        />',
        array('product/view', 'id' => $item['url']),
        array('class' => 'cat__i__img')
    ); ?>
    <?= CHtml::link(
        $item['h1_' . Yii::app()->language],
        array('product/view', 'id' => $item['url']),
        array('class' => 'cat-i__title')
    ); ?>
    <div class="cat-i__text"><?= mb_substr(strip_tags($item['text_' . Yii::app()->language]), 0, 120); ?></div>
    <div class="cat-i__bottom">
        <?= CHtml::link(
            Yii::t('views.catalog.index', 'link-detail'),
            array('product/view', 'id' => $item['url']),
            array('class' => 'cat-i__more')
        ); ?>
        <?= CHtml::link(
            Yii::t('views.catalog.index', 'link-order'),
            array('profile/product'),
            array('class' => 'cat-i__cart')
        ); ?>
    </div>
</div>
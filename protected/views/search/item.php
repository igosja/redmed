<?php

/**
 * @var $model string
 * @var $item array
 */

if ('product' == $model) {
    $img = isset($item['image'][0]) ? $item['image'][0]['image_id'] : 0;
    $url = 'product/view';
} else {
    $img = $item['image_id'];
    $url = 'catalog/index';
}

?>
<?= CHtml::link(
    '<img
        src="' . ImageIgosja::resize($img, 297, 232) . '"
        alt="' . $item['h1_' . Yii::app()->language] . '"
    />
    <div class="art__i__title">' . $item['h1_' . Yii::app()->language] . '</div>
    <div class="art__i__text">' . mb_substr(strip_tags($item['text_' . Yii::app()->language]), 0, 350) . '</div>
    <span>' . Yii::t('views.news.item', 'link-detail') . '</span>',
    array($url, 'id' => $item['url']),
    array('class' => 'art__i')
); ?>

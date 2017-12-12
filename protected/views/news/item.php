<?php
/**
 * @var $item News
 */
?>
<?= CHtml::link(
    '<img
        src="' . ImageIgosja::resize($item['image_id'], 297, 232) . '"
        alt="' . $item['h1_' . Yii::app()->language] . '"
    />
    <div class="otz-i__date">' . date('d.m.Y / H:i', $item['date']) . '</div>
    <div class="art__i__title">' . $item['h1_' . Yii::app()->language] . '</div>
    <div class="art__i__text">' . mb_substr(strip_tags($item['text_' . Yii::app()->language]), 0, 350) . '</div>
    <span>' . Yii::t('views.news.item', 'link-detail') . '</span>',
    array('news/view', 'id' => $item['url']),
    array('class' => 'art__i')
); ?>

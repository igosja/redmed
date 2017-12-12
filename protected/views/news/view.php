<?php
/**
 * @var $a_same array
 * @var $o_news News
 * @var $o_next News
 * @var $o_page PageNews
 * @var $o_prev News
 */
?>
<section class="content">
    <div class="breadchambs">
        <div class="wrap">
            <?= CHtml::link($o_page['h1_' . Yii::app()->language], array('index')); ?>
        </div>
    </div>
    <div class="clearfix in-page wrap">
        <div class="article-l clearfix">
            <h2 class="title"><?= $o_news['h1_' . Yii::app()->language]; ?></h2>
            <img
                    src="<?= ImageIgosja::resize($o_news['image_id'], 600, 400); ?>"
                    alt="<?= $o_news['h1_' . Yii::app()->language]; ?>"
                    class="img-left"
            >
            <?= $o_news['text_' . Yii::app()->language]; ?>
            <div class="pager clearfix">
                <div class="pager__l clearfix">
                    <a href="javascript:" class="tweet"></a>
                    <div class="otz-i__date">
                        <?= date('d.m.Y / H:i', $o_news['date']); ?>
                    </div>
                </div>
                <div class="pager__r">
                    <?php if ($o_prev) { ?>
                        <?= CHtml::link(
                            '',
                            array('view', 'id' => $o_prev['url']),
                            array('class' => 'pager__prev', 'style' => 'margin-left: 0;')
                        ); ?>
                    <?php } else { ?>
                        <a href="javascript:" class="pager__prev not-active" style="margin-left: 0;"></a>
                    <?php } ?>
                    <?php if ($o_next) { ?>
                        <?= CHtml::link(
                            '',
                            array('view', 'id' => $o_next['url']),
                            array('class' => 'pager__next')
                        ); ?>
                    <?php } else { ?>
                        <a href="javascript:" class="pager__next not-active" style="margin-left: 0;"></a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="article-r">
            <div class="title-solid"><?= Yii::t('views.news.view', 'same'); ?></div>
            <?php foreach ($a_same as $item) { ?>
                <?= $this->renderPartial('item', array('item' => $item)); ?>
            <?php } ?>
        </div>
    </div>
</section>
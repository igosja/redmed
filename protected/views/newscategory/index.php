<?php
/**
 * @var $a_news     array
 * @var $o_page     PageNews
 * @var $offset     integer
 * @var $page       integer
 * @var $page_first integer
 * @var $page_last  integer
 * @var $page_next  integer
 * @var $page_prev  integer
 */
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
            <?php foreach ($a_news as $item) { ?>
                <?= $this->renderPartial('item', array('item' => $item)); ?>
            <?php } ?>
        </div>
        <div class="pager pager_ch clearfix">
            <div class="pager__l">
                <?php for ($i = $page_first; $i <= $page_last; $i++) { ?>
                    <?php if ($page == $i) { ?>
                        <span><?= $i; ?></span>
                    <?php } else { ?>
                        <?= CHtml::link($i, array('index', 'page' => $i)); ?>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="pager__r">
                <?php if ($page_prev) { ?>
                    <?= CHtml::link(
                        '',
                        array('index', 'page' => $page_prev),
                        array('class' => 'pager__prev', 'style' => 'margin-left: 0;')
                    ); ?>
                <?php } else { ?>
                    <a href="javascript:" class="pager__prev not-active" style="margin-left: 0;"></a>
                <?php } ?>
                <?php if ($page_next) { ?>
                    <?= CHtml::link(
                        '',
                        array('index', 'page' => $page_next),
                        array('class' => 'pager__next')
                    ); ?>
                <?php } else { ?>
                    <a href="" class="pager__next not-active"></a>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

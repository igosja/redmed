<?php
/**
 * @var $a_brand    array
 * @var $o_category array
 * @var $a_filter   array
 * @var $a_product  array
 * @var $o_page     PageCatalog
 * @var $page       integer
 * @var $page_first integer
 * @var $page_last  integer
 * @var $page_next  integer
 * @var $page_prev  integer
 */
?>
<?php if ($o_category && $o_category['text_1_' . Yii::app()->language]) { ?>
    <h1 class="title"><?= $o_category['text_1_' . Yii::app()->language]; ?></h1>
<?php } ?>
<?php if ($o_category && $o_category['text_2_' . Yii::app()->language]) { ?>
    <?= $o_category['text_2_' . Yii::app()->language]; ?>
    <br><br>
<?php } ?>
<div class="clearfix">
    <?php foreach ($a_product as $item) { ?>
        <?= $this->renderPartial('item', array('item' => $item)); ?>
    <?php } ?>
</div>
<div class="pager clearfix">
    <div class="pager__l">
        <?php for ($i = $page_first; $i <= $page_last; $i++) { ?>
            <?php if ($page == $i) { ?>
                <span><?= $i; ?></span>
            <?php } else { ?>
                <?= CHtml::link($i, array(
                    'index',
                    'id' => Yii::app()->request->getQuery('id'),
                    'page' => $i,
                    'filter' => Yii::app()->request->getQuery('filter'),
                    'brand' => Yii::app()->request->getQuery('brand'),
                )); ?>
            <?php } ?>
        <?php } ?>
    </div>
    <div class="pager__r">
        <?php if ($page_prev) { ?>
            <?= CHtml::link('', array(
                'index',
                'id' => Yii::app()->request->getQuery('id'),
                'page' => $page_prev,
                'filter' => Yii::app()->request->getQuery('filter'),
                'brand' => Yii::app()->request->getQuery('brand'),
            ), array('class' => 'pager__prev')); ?>
        <?php } else { ?>
            <a href="javascript:" class="pager__prev not-active"></a>
        <?php } ?>
        <?php if ($page_next) { ?>
            <?= CHtml::link('', array(
                'index',
                'id' => Yii::app()->request->getQuery('id'),
                'page' => $page_next,
                'filter' => Yii::app()->request->getQuery('filter'),
                'brand' => Yii::app()->request->getQuery('brand'),
            ), array('class' => 'pager__next')); ?>
        <?php } else { ?>
            <a href="javascript:" class="pager__next not-active"></a>
        <?php } ?>
    </div>
</div>
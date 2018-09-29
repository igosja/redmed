<?php
/**
 * @var $a_brand    array
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
<section class="content">
    <div class="breadchambs">
        <div class="wrap">
            <?= CHtml::link(
                $o_page['h1_' . Yii::app()->language],
                array('index')
            )?>
        </div>
    </div>
    <?= $this->renderPartial('/include/bread'); ?>
    <div class="clearfix in-page wrap">
        <div class="cat-l clearfix">
            <form id="filter-form" method="GET">
                <h3 class="cat-l__title"><?= Yii::t('views.catalog.index', 'category'); ?></h3>
                <ul class="cat-menu cat-list">
                    <?php foreach ($this->a_category as $item) { ?>
                        <?php if ($item['url'] == Yii::app()->request->getQuery('id')) {
                            $class = 'strong';
                        } else {
                            $class = '';
                        } ?>
                        <li>
                            <?= CHtml::link(
                                $item['h1_' . Yii::app()->language],
                                array('index', 'id' => $item['url']),
                                array('class' => $class)
                            ); ?>
                        </li>
                    <?php } ?>
                </ul>
                <?php if ($a_brand) { ?>
                <h3 class="cat-l__title"><?= Yii::t('views.catalog.index', 'brand'); ?></h3>
                <ul class="cat-radio cat-list">
                    <?php foreach ($a_brand as $item) { ?>
                        <li>
                            <div class="checkboxes">
                                <input
                                        id="brand-<?= $item['id']; ?>"
                                        type="checkbox"
                                        name="brand[]"
                                        value="<?= $item['id']; ?>"
                                    <?php if (in_array($item['id'], Yii::app()->request->getQuery('brand', array()))) { ?>
                                        checked
                                    <?php } ?>
                                >
                                <label for="brand-<?= $item['id']; ?>">
                                    <?= $item['h1_' . Yii::app()->language]; ?>
                                </label>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
                <?php } ?>
                <?php foreach ($a_filter as $group) { ?>
                    <h3 class="cat-l__title"><?= $group['name_' . Yii::app()->language]; ?></h3>
                    <ul class="cat-radio cat-list">
                    <?php foreach ($group['filter'] as $item) { ?>
                        <li>
                            <div class="checkboxes">
                                <input
                                        id="filter-<?= $item['id']; ?>"
                                        type="checkbox"
                                        name="filter[]"
                                        value="<?= $item['id']; ?>"
                                    <?php if (in_array($item['id'], Yii::app()->request->getQuery('filter', array()))) { ?>
                                        checked
                                    <?php } ?>
                                >
                                <label for="filter-<?= $item['id']; ?>">
                                    <?= $item['h1_' . Yii::app()->language]; ?>
                                </label>
                            </div>
                        </li>
                    <?php } ?>
                    </ul>
                <?php } ?>
            </form>
        </div>
        <div class="cat-r">
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
        </div>
    </div>
    <div class="b-text b-text_white">
        <div class="wrap">
            <?= $o_category ? $o_category['seotext_' . Yii::app()->language] : $o_page['seotext_' . Yii::app()->language]; ?>				
        </div>
    </div>
</section>

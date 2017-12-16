<?php
/**
 * @var $o_page PageCatalog
 * @var $o_product Product
 */
?>
<section class="content">
    <div class="breadchambs">
        <div class="wrap">
            <?= CHtml::link(
                $o_page['h1_' . Yii::app()->language],
                array('catalog/index')
            ); ?>
            <span class="arrow"></span>
        </div>
    </div>
    <div class="clearfix in-page wrap">
        <div class="prod-top clearfix">
            <div class="prod-photo clearfix">
                <div class="slider-out">
                    <div class="slider clearfix">
                        <?php foreach ($o_product['image'] as $item) { ?>
                            <div>
                                <a href="<?= $item['image']['url']; ?>" data-lightbox="1">
                                    <img
                                            src="<?= ImageIgosja::resize($item['image_id'], 350, 350); ?>"
                                            alt="<?= $o_product['h1_' . Yii::app()->language]; ?>"
                                    />
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="slider-nav">
                    <?php foreach ($o_product['image'] as $item) { ?>
                        <div>
                            <img
                                    src="<?= ImageIgosja::resize($item['image_id'], 350, 350); ?>"
                                    alt="<?= $o_product['h1_' . Yii::app()->language]; ?>"
                            />
                        </div>
                    <?php } ?>
                </div>
                <a href="javascript:" class="next"></a>
                <a href="javascript:" class="prev"></a>
            </div>
            <div class="prod-info">
                <h1 class="prod-title title">
                    <?= $o_product['h1_' . Yii::app()->language]; ?>
                </h1>
                <div class="prod-info__b clearfix">
                    <strong><?= Yii::t('views.product.view', 'price'); ?></strong>
                    <?php if ($o_product['discount']) { ?>
                        <span class="prod-old-price"><?= $o_product['price']; ?> грн.</span>
                        <span class="prod-price"><?= round($o_product['price'] * (100 - $o_product['discount']) / 100, 2); ?> грн.</span>
                    <?php } else { ?>
                        <span class="prod-price"><?= $o_product['price']; ?> грн.</span>
                    <?php } ?>
                    <?= CHtml::link(
                        Yii::t('views.product.view', 'link-order'),
                        array('profile/product'),
                        array('class' => 'cat-i__cart')
                    ); ?>
                </div>
                <?= $o_product['text_' . Yii::app()->language]; ?>
            </div>
            <div class="prod-dost">
                <h3>
                    <img src="/img/dost-1.png" alt="<?= Yii::t('views.product.view', 'delivery-h3'); ?>">
                    <?= Yii::t('views.product.view', 'delivery-h3'); ?>
                </h3>
                <?= Yii::t('views.product.view', 'delivery-text'); ?>
                <h3>
                    <img src="/img/dost-2.png" alt="<?= Yii::t('views.product.view', 'payment-h3'); ?>">
                    <?= Yii::t('views.product.view', 'payment-h3'); ?>
                </h3>
                <?= Yii::t('views.product.view', 'payment-text'); ?>
            </div>
        </div>
        <div class="prod-bottom">
            <h2 class="title"><?= Yii::t('views.product.view', 'technical'); ?></h2>
            <?= $o_product['table_' . Yii::app()->language]; ?>
            <?= $o_product['technical_' . Yii::app()->language]; ?>
        </div>
    </div>
    <?php if ($o_product['analog']) { ?>
        <div class="prod-same">
            <div class="wrap">
                <h2 class="title"><?= Yii::t('views.product.view', 'analog'); ?></h2>
                <div class="same owl-carousel">
                    <?php foreach ($o_product['analog'] as $item) { ?>
                        <?= $this->renderPartial('/catalog/item', array('item' => $item['analog'])); ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
</section>
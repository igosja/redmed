<?php
/**
 * @var $o_page PageCatalog
 * @var $o_product Product
 * @var $o_productdelivery ProductDelivery
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
    <?= $this->renderPartial('/include/bread'); ?>
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
                <div class="prod-kod">Артикул: <strong><?= $o_product['sku']; ?></strong></div>
                <div class="prod-info__b clearfix">
                    <strong><?= Yii::t('views.product.view', 'price'); ?></strong>
                    <?php if ($o_product['discount']) { ?>
                        <span class="prod-old-price"><?= $o_product->getPrice(); ?> грн.</span>
                        <span class="prod-price"><?= round($o_product->getPrice() * (100 - $o_product['discount']) / 100, 2); ?> грн.</span>
                    <?php } elseif ($o_product->getPrice()) { ?>
                        <span class="prod-price"><?= $o_product->getPrice(); ?> грн.</span>
                    <?php } else { ?>
                        <span class="prod-price"><?= Yii::t('views.product.view', 'price-not-set'); ?></span>
                    <?php } ?>
                    <a href="javascript:" class="cat-i__cart add-to-cart-on-page" data-product="<?= $o_product['id']; ?>">
                        <?= Yii::t('views.product.view', 'link-order'); ?>
                    </a>
                </div>
                <?= $o_product['text_' . Yii::app()->language]; ?>
                <div class="prod-btns">
                    <?php if ($o_product['video']) { ?>
                        <a href="javascript:;" data-video="<?= $o_product['video']; ?>" data-selector="form-video" class="prod-video overlayElementTrigger">
                            <?= Yii::t('views.product.view', 'video'); ?>
                        </a>
                    <?php } ?>
                    <?php if ($o_product['pdf']) { ?>
                        <a href="#pdf" class="prod-pdf">
                            PDF
                            <span class="classic-tooltip"><?= Yii::t('views.product.view', 'tooltip-pdf'); ?></span>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <div class="prod-dost">
                <h3>
                    <img src="/img/dost-1.png" alt="<?= $o_productdelivery['delivery_h3_' . Yii::app()->language]; ?>">
                    <?= $o_productdelivery['delivery_h3_' . Yii::app()->language]; ?>
                </h3>
                <?= $o_productdelivery['delivery_text_' . Yii::app()->language]; ?>
                <h3>
                    <img src="/img/dost-2.png" alt="<?= $o_productdelivery['payment_h3_' . Yii::app()->language]; ?>">
                    <?= $o_productdelivery['payment_h3_' . Yii::app()->language]; ?>
                </h3>
                <?= $o_productdelivery['payment_text_' . Yii::app()->language]; ?>
            </div>
        </div>
        <div class="prod-bottom">
            <h2 class="title"><?= Yii::t('views.product.view', 'technical'); ?></h2>
            <?= $o_product['table_' . Yii::app()->language]; ?>
            <?= $o_product['technical_' . Yii::app()->language]; ?>
            <?php if ($o_product['pdf']) { ?>
                <h3 class="lk-info-it__title" id="pdf"><?= Yii::t('views.product.view', 'instruction'); ?></h3>
                <div class="lk-info__f">
                    <?php foreach ($o_product['pdf'] as $item) { ?>
                        <div class="lk-info__files">
                            <a href="<?= $item['pdf']['url']; ?>" target="_blank"><?= $item['name']; ?></a>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
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

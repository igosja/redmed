<?php
/**
 * @var $a_order array
 */
$opened = true;
?>
<section class="content">
    <div class="breadchambs">
        <div class="wrap">
            <?= Yii::t('views.profile.order', 'h1'); ?>
        </div>
    </div>
    <?= $this->renderPartial('/include/bread'); ?>
    <div class="clearfix in-page wrap">
        <h2 class="title title_lk">
            <img src="/img/lk-acrdn/lk-order-title.png"><?= Yii::t('views.profile.order', 'h2'); ?>
        </h2>
        <div class="acrdn acrdn_order">
            <?php foreach ($a_order as $item) { ?>
                <div class="acrdn-item <?php if ($opened) { ?>opened<?php } ?>">
                    <a href="javascript:" class="acrdn-item-head">
                        <span class="acrdn_order__h">
                            <?= Yii::t('views.profile.order', 'date'); ?>:
                            <strong><?= date('d.m.Y', $item['date']); ?></strong>
                        </span>
                        <span class="acrdn_order__h">
                            <?= Yii::t('views.profile.order', 'quantity'); ?>
                            <strong><?= $item['quantity']; ?> тов.</strong>
                        </span>
                        <span class="acrdn_order__h">
                            <?= Yii::t('views.profile.order', 'total'); ?>
                            <strong><?= Yii::app()->numberFormatter->formatDecimal($item['total']); ?> грн</strong>
                        </span>
                    </a>
                    <div class="acrdn-item-body">
                        <?php foreach ($item['product'] as $product) { ?>
                            <div class="acrdn_order__bl clearfix">
                                <div class="acrdn_order__b">
                                    <?php if (isset($product['product'])) { ?>
                                        <?= CHtml::link(
                                            $product['product_' . Yii::app()->language],
                                            array('product/view', 'id' => $product['product']['url']),
                                            array('target' => '_blank')
                                        ); ?>
                                    <?php } else { ?>
                                        <?= $product['product_' . Yii::app()->language]; ?>
                                    <?php } ?>
                                </div>
                                <div class="acrdn_order__b"><?= $product['quantity']; ?> шт.</div>
                                <div class="acrdn_order__b">
                                    <?= Yii::app()->numberFormatter->formatDecimal($product['total']); ?> грн.
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?php $opened = false; ?>
            <?php } ?>
        </div>
    </div>
</section>

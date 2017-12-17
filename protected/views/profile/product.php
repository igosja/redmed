<?php
/**
 * @var $a_cart    array
 * @var $a_category array
 * @var $count     integer
 * @var $form      CActiveForm
 * @var $model     Order
 * @var $o_user    array
 * @var $price     integer
 */
$opened = true;
?>
<section class="content">
    <div class="breadchambs">
        <div class="wrap">
            <?= Yii::t('views.profile.product', 'h1'); ?>
        </div>
    </div>
    <div class="clearfix in-page wrap">
        <h2 class="title title_lk">
            <img src="/img/lk-acrdn/lk-product-title.png"><?= Yii::t('views.profile.product', 'h2'); ?>
        </h2>
        <div class="acrdn">
            <?php foreach ($a_category as $item) { ?>
                <div class="acrdn-item acrdn-item_<?= $item['category']['id']; ?> <?php if ($opened) { ?>opened<?php } ?>">
                    <a href="javascript:" class="acrdn-item-head">
                        <?= $item['category']['h1_' . Yii::app()->language]; ?><br />
                    </a>
                    <div class="acrdn-item-body">
                        <table class="lk-prod-table">
                            <tr>
                                <th>№</th>
                                <th><?= Yii::t('views.profile.product', 'th-name'); ?></th>
                                <th><?= Yii::t('views.profile.product', 'th-use'); ?></th>
                                <th><?= Yii::t('views.profile.product', 'th-quantity'); ?></th>
                                <th><?= Yii::t('views.profile.product', 'th-price'); ?></th>
                                <th><?= Yii::t('views.profile.product', 'th-discount'); ?></th>
                                <th><?= Yii::t('views.profile.product', 'th-cart'); ?></th>
                            </tr>
                            <?php $i = 1; ?>
                            <?php foreach ($item['product'] as $product) { ?>
                                <?php

                                $css = '';
                                $value = 1;
                                foreach ($a_cart as $cart_item) {
                                    if ($cart_item['product_id'] == $product['id']) {
                                        $value = $cart_item['quantity'];
                                        $css = 'active';
                                    }
                                }

                                ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td>
                                        <?= CHtml::link(
                                            $product['h1_' . Yii::app()->language],
                                            array('product/view', 'id' => $product['url'])
                                        ); ?>
                                    </td>
                                    <td><?= $product['use_' . Yii::app()->language]; ?></td>
                                    <td>
                                        <div class="total clearfix">
                                            <a href="javascript:" class="total__minus plus"></a>
                                            <input
                                                    type="text"
                                                    class="score total__input"
                                                    value="<?= $value; ?>"
                                                    data-product="<?= $product['id']; ?>"
                                                    data-price="<?= round(
                                                        $product['price'] * (100 - $product['discount'])
                                                        / 100,
                                                        2
                                                    ); ?>"
                                            />
                                            <a href="javascript:" class="total__plus minus"></a>
                                        </div>
                                    </td>
                                    <td>
                                        <?= Yii::app()->numberFormatter->formatDecimal(
                                            $product['price']
                                        ); ?> грн.
                                    </td>
                                    <td>-<?= $product['discount']; ?>%</td>
                                    <td><a href="javascript:" class="cart <?= $css; ?> add-to-cart"></a></td>
                                </tr>
                                <?php $i++; ?>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                <?php $opened = false; ?>
            <?php } ?>
        </div>
    </div>
    <div class="lk-bottom">
        <div class="lk-bottom__t">
            <div class="wrap">
                <div class="lk-bottom__total">
                    <?= Yii::t('views.profile.product', 'your-order'); ?>:
                    <strong class="cart-total-count"><?= $count; ?> тов.</strong>
                    <?= Yii::t('views.profile.product', 'total'); ?>:
                    <strong class="cart-total-price"><?= Yii::app()->numberFormatter->formatDecimal($price); ?> грн.</strong>
                </div>
                <a href="javascript:" class="lk-bottom__next to-order">
                    <?= Yii::t('views.profile.product', 'link-to-form'); ?>
                </a>
            </div>
        </div>
        <div class="wrap clearfix">
            <div class="lk-bottom__name">
                <span> <?= Yii::t('views.profile.product', 'title-order'); ?>:</span>
                <?= $o_user['name']; ?>
            </div>
            <div class="clearfix">
                <?php $form = $this->beginWidget('CActiveForm', array(
                    'enableAjaxValidation' => false,
                    'enableClientValidation' => true,
                )); ?>
                    <?= $form->textField($model, 'phone', array(
                        'class' => 'lk-input phone_mask',
                        'placeholder' => Yii::t('views.profile.product', 'placeholder-phone')
                    )); ?>
                    <?= $form->error($model, 'phone'); ?>
                    <?= $form->textField($model, 'email', array(
                        'class' => 'lk-input',
                        'placeholder' => Yii::t('views.profile.product', 'placeholder-email')
                    )); ?>
                    <?= $form->error($model, 'phone'); ?>
                    <?= $form->textField($model, 'shipping', array(
                        'class' => 'lk-input',
                        'placeholder' => Yii::t('views.profile.product', 'placeholder-shipping')
                    )); ?>
                    <?= $form->error($model, 'shipping'); ?>
                    <?= $form->textArea($model, 'comment', array(
                        'class' => 'lk-textarea',
                        'placeholder' => Yii::t('views.profile.product', 'placeholder-comment')
                    )); ?>
                    <?= $form->error($model, 'comment'); ?>
                    <?= CHtml::submitButton(
                        Yii::t('views.profile.product', 'button-submit'),
                        array('class' => 'lk-submit')
                    ); ?>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</section>
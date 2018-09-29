<?php
/**
 * @var $a_review array
 * @var $form     CActiveForm
 * @var $model    Review
 * @var $more     boolean
 * @var $o_page   PageReview
 * @var $offset   integer
 * @var $page   integer
 * @var $page_first   integer
 * @var $page_last   integer
 * @var $page_next   integer
 * @var $page_prev   integer
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
        <div class="otz-left">
            <div class="item-div">
                <?php foreach ($a_review as $item) { ?>
                    <?= $this->renderPartial('item', array('item' => $item)); ?>
                <?php } ?>
            </div>
            <?php if ($more) { ?>
                <a href="javascript:" class="otz__more btn-more load-more" data-type="review" data-offset="<?= $offset; ?>">
                    <?= Yii::t('views.review.index', 'link-more'); ?>
                </a>
            <?php } ?>
            <div class="pager clearfix">
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
                            array('class' => 'pager__prev')
                        ); ?>
                    <?php } else { ?>
                        <a href="javascript:" class="pager__prev not-active"></a>
                    <?php } ?>
                    <?php if ($page_next) { ?>
                        <?= CHtml::link(
                            '',
                            array('index', 'page' => $page_next),
                            array('class' => 'pager__next')
                        ); ?>
                    <?php } else { ?>
                        <a href="javascript:" class="pager__next not-active"></a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="otz-right">
            <div class="e-form">
                <?php $form = $this->beginWidget('CActiveForm', array(
                    'enableAjaxValidation' => false,
                    'enableClientValidation' => true,
                    'id' => 'page-form'
                )); ?>
                    <div class="e-form__t">
                        <div class="e-form__title">
                            <?= Yii::t('views.review.index', 'title-form'); ?>
                        </div>
                        <?= $form->textField($model, 'name', array(
                            'class' => 'e-form__input',
                            'placeholder' => Yii::t('views.review.index', 'placeholder-name')
                        )); ?>
                        <?= $form->error($model, 'name'); ?>
                        <?= $form->textArea($model, 'text', array(
                            'class' => 'e-form__textarea',
                            'placeholder' => Yii::t('views.review.index', 'placeholder-text')
                        )); ?>
                        <?= $form->error($model, 'text'); ?>
                        <div class="clearfix">
                            <span class="e-form__star">
                                <?= Yii::t('views.review.index', 'title-required'); ?>
                            </span>
                            <?= CHtml::submitButton(
                                Yii::t('views.review.index', 'button-submit'),
                                array('class' => 'e-form__submit')
                            ); ?>
                        </div>
                    </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</section>

<?php foreach ($this->a_category as $item) { ?>
    <div class="m-cat__i">
        <img
            src="<?= ImageIgosja::resize($item['image_id'], 65, 60, 0); ?>"
            alt="<?= $item['h1_' . Yii::app()->language]; ?>"
        />
        <div class="m-cat__i__title">
            <?= $item['h1_' . Yii::app()->language]; ?>
        </div>
        <div class="m-cat__i__text">
            <?= $item['text_' . Yii::app()->language]; ?>
        </div>
        <?= CHtml::link(
            Yii::t('views.include.catalog', 'link-detail'),
            array('catalog/index', 'id' => $item['url']),
            array('class' => 'btn-more')
        )?>
    </div>
<?php } ?>
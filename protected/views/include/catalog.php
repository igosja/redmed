<?php foreach ($this->a_category as $item) { ?>
    <div class="m-cat__i">
        <img
            src="<?= (isset($item['image']['url']) ? $item['image']['url'] : '/noimage.jpg'); ?>"
            alt="<?= $item['h1_' . Yii::app()->language]; ?>"
            width="65"
            height="60"
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
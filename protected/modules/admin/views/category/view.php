<?php
/**
 * @var $model Category
 */
?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center"><?= $this->h1; ?></h1>
            <ul class="list-inline preview-links text-center">
                <li>
                    <?= CHtml::link(
                        'Список',
                        array('index'),
                        array('class' => 'btn btn-default')
                    ); ?>
                </li>
                <li>
                    <?= CHtml::link(
                        'Редактировать',
                        array('update', 'id' => $model->primaryKey),
                        array('class' => 'btn btn-default')
                    ); ?>
                </li>
            </ul>
        </div>
    </div>
<?php
$attributes = array(
    'id',
    array(
        'name' => 'url',
        'type' => 'raw',
        'value' => CHtml::link($model['url'], array('/catalog/index', 'id' => $model['url']), array('target' => '_blank'))
    ),
    'h1_ru',
    array(
        'name' => 'text_ru',
        'type' => 'raw',
        'value' => nl2br($model['text_ru']),
    ),
    'text_1_ru',
    array(
        'name' => 'text_2_ru',
        'type' => 'raw',
        'value' => nl2br($model['text_2_ru']),
    ),
    array(
        'name' => 'seotext_ru',
        'type' => 'raw',
        'value' => nl2br($model['seotext_ru']),
    ),
    'seo_title_ru',
    'seo_description_ru',
    'seo_keywords_ru',
    'h1_uk',
    array(
        'name' => 'text_uk',
        'type' => 'raw',
        'value' => nl2br($model['text_uk']),
    ),
    'text_1_uk',
    array(
        'name' => 'text_2_uk',
        'type' => 'raw',
        'value' => nl2br($model['text_2_uk']),
    ),
    array(
        'name' => 'seotext_uk',
        'type' => 'raw',
        'value' => nl2br($model['seotext_uk']),
    ),
    'seo_title_uk',
    'seo_description_uk',
    'seo_keywords_uk',
    array(
        'name' => 'image_id',
        'type' => 'raw',
        'value' => (isset($model['image']['url'])) ?
            ('<div class="col-lg-6">
                <a href="javascript:;" class="thumbnail">
                    <img src="' . $model['image']['url'] . '"/>
                </a>
            </div>') :
            '',
    ),
);
$this->widget('zii.widgets.CDetailView', array(
    'attributes' => $attributes,
    'data' => $model,
    'htmlOptions' => array('class' => 'table'),
    'itemCssClass' => '',
    'itemTemplate' => '<tr data-controller="' . $this->uniqueid . '"><td class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">{label}</td><td>{value}</td></tr>',
    'nullDisplay' => '-',
));
?>

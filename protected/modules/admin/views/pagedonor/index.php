<?php
/**
 * @var $model PageAbout
 */
?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center"><?= $this->h1; ?></h1>
            <ul class="list-inline preview-links text-center">
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
    'h1_ru',
    'h2_ru',
    array(
        'name' => 'text_ru',
        'type' => 'raw',
    ),
    'title_1_ru',
    array(
        'name' => 'text_1_ru',
        'type' => 'raw',
    ),
    'url_1_ru',
    'title_2_ru',
    array(
        'name' => 'text_2_ru',
        'type' => 'raw',
    ),
    'url_2_ru',
    'title_3_ru',
    array(
        'name' => 'text_3_ru',
        'type' => 'raw',
    ),
    'url_3_ru',
    'seo_title_ru',
    'seo_description_ru',
    'seo_keywords_ru',
    'h1_uk',
    'h2_uk',
    array(
        'name' => 'text_uk',
        'type' => 'raw',
    ),
    'title_1_uk',
    array(
        'name' => 'text_1_uk',
        'type' => 'raw',
    ),
    'url_1_uk',
    'title_2_uk',
    array(
        'name' => 'text_2_uk',
        'type' => 'raw',
    ),
    'url_2_uk',
    'title_3_uk',
    array(
        'name' => 'text_3_uk',
        'type' => 'raw',
    ),
    'url_3_uk',
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
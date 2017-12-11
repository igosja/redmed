<?php
/**
 * @var $model PageMain
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
    'title_1_ru',
    array(
        'name' => 'text_1_ru',
        'type' => 'raw',
        'value' => $model['text_1_ru'],
    ),
    'title_2_ru',
    array(
        'name' => 'text_2_ru',
        'type' => 'raw',
        'value' => $model['text_2_ru'],
    ),
    'title_3_ru',
    array(
        'name' => 'text_3_ru',
        'type' => 'raw',
        'value' => $model['text_3_ru'],
    ),
    'seo_title_ru',
    'seo_description_ru',
    'seo_keywords_ru',
    'h1_uk',
    'title_1_uk',
    array(
        'name' => 'text_1_uk',
        'type' => 'raw',
        'value' => $model['text_1_uk'],
    ),
    'title_2_uk',
    array(
        'name' => 'text_2_uk',
        'type' => 'raw',
        'value' => $model['text_2_uk'],
    ),
    'title_3_uk',
    array(
        'name' => 'text_3_uk',
        'type' => 'raw',
        'value' => $model['text_3_uk'],
    ),
    'seo_title_uk',
    'seo_description_uk',
    'seo_keywords_uk',
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
<?php
/**
 * @var $model Contact
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
    'name_ru',
    'address_ru',
    'address_book_ru',
    'address_direct_ru',
    'address_tender_ru',
    'address_warehouse_ru',
    'seo_title_ru',
    'seo_description_ru',
    'seo_keywords_ru',
    'h1_uk',
    'name_uk',
    'address_uk',
    'address_book_uk',
    'address_direct_uk',
    'address_tender_uk',
    'address_warehouse_uk',
    'seo_title_uk',
    'seo_description_uk',
    'seo_keywords_uk',
    array(
        'name' => 'phone',
        'type' => 'raw',
        'value' => function ($model) {
            return nl2br($model['phone']);
        },
    ),
    array(
        'name' => 'phone_book',
        'type' => 'raw',
        'value' => function ($model) {
            return nl2br($model['phone_book']);
        },
    ),
    array(
        'name' => 'phone_direct',
        'type' => 'raw',
        'value' => function ($model) {
            return nl2br($model['phone_direct']);
        },
    ),
    array(
        'name' => 'phone_tender',
        'type' => 'raw',
        'value' => function ($model) {
            return nl2br($model['phone_tender']);
        },
    ),
    array(
        'name' => 'phone_warehouse',
        'type' => 'raw',
        'value' => function ($model) {
            return nl2br($model['phone_warehouse']);
        },
    ),
    array(
        'name' => 'email',
        'type' => 'raw',
        'value' => function ($model) {
            return nl2br($model['email_direct']);
        },
    ),
    array(
        'name' => 'email_direct',
        'type' => 'raw',
        'value' => function ($model) {
            return nl2br($model['email_direct']);
        },
    ),
    array(
        'name' => 'email_book',
        'type' => 'raw',
        'value' => function ($model) {
            return nl2br($model['email_book']);
        },
    ),
    array(
        'name' => 'email_tender',
        'type' => 'raw',
        'value' => function ($model) {
            return nl2br($model['email_tender']);
        },
    ),
    array(
        'name' => 'email_warehouse',
        'type' => 'raw',
        'value' => function ($model) {
            return nl2br($model['email_warehouse']);
        },
    ),
    'skype',
    array(
        'name' => 'url',
        'type' => 'raw',
        'value' => function ($model) {
            return nl2br($model['url']);
        },
    ),
    'email_letter',
    'lat',
    'lng',
    'lat_warehouse',
    'lng_warehouse',
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

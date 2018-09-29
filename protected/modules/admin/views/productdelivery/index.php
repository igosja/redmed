<?php
/**
 * @var $model PageCatalog
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
    'delivery_h3_ru',
    array(
        'name' => 'delivery_text_ru',
        'type' => 'raw',
    ),
    'payment_h3_ru',
    array(
        'name' => 'payment_text_ru',
        'type' => 'raw',
    ),
    'delivery_h3_uk',
    array(
        'name' => 'delivery_text_uk',
        'type' => 'raw',
    ),
    'payment_h3_uk',
    array(
        'name' => 'payment_text_uk',
        'type' => 'raw',
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

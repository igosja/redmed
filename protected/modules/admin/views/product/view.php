<?php
/**
 * @var $image ProductImage
 * @var $model Product
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
                <li>
                    <?= CHtml::link(
                        'Дублировать',
                        array('update', 'copy' => $model->primaryKey),
                        array('class' => 'btn btn-default')
                    ); ?>
                </li>
            </ul>
        </div>
    </div>
<?php
$attributes = array(
    'id',
    'sku',
    'h1_ru',
    'h1_uk',
    array(
        'name' => 'url',
        'type' => 'raw',
        'value' => CHtml::link($model->url, array('/product/view', 'id' => $model['url']), array('target' => '_blank'))
    ),
    array(
        'name' => 'category_id',
        'value' => $model['category']['h1_ru'],
    ),
    array(
        'name' => 'brand_id',
        'value' => $model['brand']['h1_ru'],
    ),
    'price',
    'discount',
    'video',
    array(
        'name' => 'pdf_field',
        'type' => 'raw',
        'value' => function($model) {
            $return = '';
            foreach ($model['pdf'] as $item) {
                $return = $return
                    . '<a href="' . $item['pdf']['url'] . '" target="blank">' . $item['name'] . '</a> '
                    . CHtml::link('&times;', array('pdf', 'id' => $item['id']))
                    . '<br/>';
            }
            return $return;
        }
    ),
    'use_ru',
    'use_uk',
    array(
        'name' => 'text_ru',
        'type' => 'raw',
    ),
    array(
        'name' => 'text_uk',
        'type' => 'raw',
    ),
    array(
        'name' => 'table_ru',
        'type' => 'raw',
    ),
    array(
        'name' => 'table_uk',
        'type' => 'raw',
    ),
    array(
        'name' => 'technical_ru',
        'type' => 'raw',
    ),
    array(
        'name' => 'technical_uk',
        'type' => 'raw',
    ),
    array(
        'name' => 'filter_field',
        'type' => 'raw',
        'value' => function ($model) {
            $filter = array();
            foreach ($model['filter'] as $item) {
                $filter[] = $item['filter']['h1_ru'];
            }
            $filter = implode('<br/>', $filter);
            return $filter;
        }
    ),
    array(
        'name' => 'analog_field',
        'type' => 'raw',
        'value' => function ($model) {
            $analog = array();
            foreach ($model['analog'] as $item) {
                $analog[] = CHtml::link($item['analog']['h1_ru'], array('view', 'id' => $item['analog_id']), array('target' => '_blank'));
            }
            $analog = implode('<br/>', $analog);
            return $analog;
        }
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
<div class="col-lg-12">
    <?php
    $columns = array(
        array(
            'headerHtmlOptions' => array('class' => 'col-lg-1, col-md-1, col-sm-1, col-xs-1'),
            'htmlOptions' => array('class' => 'text-center'),
            'type' => 'raw',
            'value' => function () {
                return '<i class="fa fa-arrows-v sorter">';
            },
        ),
        array(
            'name' => 'image_id',
            'sortable' => false,
            'type' => 'raw',
            'value' => function ($model) {
                if (isset($model['image']['url'])) {
                    $image = '<div class="col-lg-6">
                        <a href="javascript:;" class="thumbnail">
                            <img src="' . $model['image']['url'] . '"/>
                        </a>
                    </div>';
                } else {
                    $image = '';
                }
                return $image;
            }
        ),
        array(
            'class' => 'CButtonColumn',
            'headerHtmlOptions' => array('class' => 'col-lg-1'),
            'template' => '{delete}',
            'deleteButtonUrl' => 'array("image", "id" => $data->id)',
        ),
    );
    $this->widget('zii.widgets.grid.CGridView', array(
        'afterAjaxUpdate' => 'function(id, data){CGridViewAfterAjax()}',
        'columns' => $columns,
        'dataProvider' => $image->search(),
        'itemsCssClass' => 'table table-striped table-bordered sort-table',
        'htmlOptions' => array('data-controller' => $this->uniqueid),
        'pager' => array(
            'header' => '',
            'footer' => '',
            'internalPageCssClass' => '',
            'nextPageLabel' => '>',
            'lastPageLabel' => '>>',
            'nextPageCssClass' => 'next',
            'lastPageCssClass' => 'next',
            'prevPageLabel' => '<',
            'firstPageLabel' => '<<',
            'previousPageCssClass' => 'prev',
            'firstPageCssClass' => 'prev',
            'selectedPageCssClass' => 'active',
            'htmlOptions' => array('class' => 'pagination'),
        ),
        'pagerCssClass' => 'pager-css-class',
        'rowHtmlOptionsExpression' => 'array("data-id" => $data->id, "data-controller" => "' . $this->uniqueid . '")',
        'summaryCssClass' => 'text-left',
        'summaryText' => 'Показаны записи <strong>{start}</strong>-<strong>{end}</strong> из <strong>{count}</strong>.',
    ));
    ?>
</div>

<?php
/**
 * @var $model NewsCategory
 */
$dp = $model->search();
$dp->pagination->pageSize = $model->count();
$dp->sort = array('defaultOrder' => '`order` ASC');
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center"><?= $this->h1; ?></h1>
        <ul class="list-inline preview-links text-center">
            <li>
                <?= CHtml::link(
                    'Добавить',
                    array('update'),
                    array('class' => 'btn btn-default')
                ); ?>
            </li>
        </ul>
    </div>
</div>
<?= $this->renderPartial('/include/grid-view-text'); ?>
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
            'headerHtmlOptions' => array('class' => 'col-lg-1, col-md-1, col-sm-1, col-xs-1'),
            'name' => 'id',
            'sortable' => false,
        ),
        array(
            'name' => 'h1_ru',
            'sortable' => false,
        ),
        array(
            'filter' => false,
            'headerHtmlOptions' => array('class' => 'col-lg-1, col-md-1, col-sm-1, col-xs-1'),
            'name' => 'status',
            'sortable' => false,
            'type' => 'raw',
            'value' => function ($model) {
                if (1 == $model->status) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $input = '<input
                                class="status"
                                data-id="' . $model->id . '"
                                type="checkbox" ' . $checked . '
                                data-toggle="toggle"
                                data-size="mini"
                                data-onstyle="success"
                          />';
                return $input;
            }
        ),
        array(
            'class' => 'CButtonColumn',
            'headerHtmlOptions' => array('class' => 'col-lg-1'),
        ),
    );
    $this->widget('zii.widgets.grid.CGridView', array(
        'afterAjaxUpdate' => 'function(id, data){CGridViewAfterAjax()}',
        'columns' => $columns,
        'dataProvider' => $dp,
        'filter' => $model,
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
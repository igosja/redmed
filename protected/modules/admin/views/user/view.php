<?php
/**
 * @var $model User
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
                <?php if ($model->login) { ?>
                    <li>
                        <?= CHtml::link(
                            'Редактировать',
                            array('update', 'id' => $model->primaryKey),
                            array('class' => 'btn btn-default')
                        ); ?>
                    </li>
                <?php } ?>
                <?php if (!$model->login) { ?>
                    <li>
                        <?= CHtml::link(
                            'Подтвердить регистрацию',
                            array('complete', 'id' => $model->primaryKey),
                            array('class' => 'btn btn-default')
                        ); ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
<?php
$attributes = array(
    'id',
    'login',
    'email',
    array(
        'name' => 'date',
        'value' => date('H:i d.m.Y', $model['date']),
    ),
    'name',
    'phone',
    'address',
    'usertype',
    array(
        'name' => 'userrole_id',
        'value' => $model['userrole']['name'],
    ),
);
$this->widget('zii.widgets.CDetailView', array(
    'attributes' => $attributes,
    'data' => $model,
    'htmlOptions' => array('class' => 'table'),
    'itemCssClass' => '',
    'itemTemplate' => '<tr data-controller="' . $this->uniqueid
        . '"><td class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">{label}</td><td>{value}</td></tr>',
    'nullDisplay' => '-',
));
?>
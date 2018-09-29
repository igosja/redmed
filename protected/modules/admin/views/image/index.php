<?php
/**
 * @var $a_file array
 */
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
    <div id="yw0" class="grid-view">
        <table class="table table-striped table-bordered sort-table">
            <tr>
                <th>Изображение</th>
                <th class="col-lg-6">Url</th>
                <th class="col-lg-1">&nbsp;</th>
            </tr>
            <?php foreach ($a_file as $item) { ?>
                <tr>
                    <td>
                        <div class="col-lg-6">
                            <a href="javascript:" class="thumbnail">
                                <img src="<?= '/upload_image/' . $item; ?>"/>
                            </a>
                        </div>
                    </td>
                    <td><?= '/upload_image/' . $item; ?></td>
                    <td>
                        <?= CHtml::link(
                            'Удалить',
                            array('delete', 'image' => $item)
                        )?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
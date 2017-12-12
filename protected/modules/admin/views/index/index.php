<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Админ панель</h1>
    </div>
</div>
<div class="row">
    <?php if ($this->feedback) { ?>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-question-circle fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $this->feedback; ?></div>
                            <div>Вопросы</div>
                        </div>
                    </div>
                </div>
                <?= CHtml::link(
                    '<div class="panel-footer">
                    <span class="pull-left">Подробнее</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>',
                    array('feedback/index')
                ); ?>
            </div>
        </div>
    <?php } ?>
</div>
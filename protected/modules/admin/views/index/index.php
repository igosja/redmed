<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Админ панель</h1>
    </div>
</div>
<div class="row">
    <?php if ($this->user) { ?>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $this->user; ?></div>
                            <div>Регистрации</div>
                        </div>
                    </div>
                </div>
                <?= CHtml::link(
                    '<div class="panel-footer">
                    <span class="pull-left">Подробнее</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>',
                    array('user/index')
                ); ?>
            </div>
        </div>
    <?php } ?>
    <?php if ($this->review) { ?>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-commenting-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $this->review; ?></div>
                            <div>Отзывы</div>
                        </div>
                    </div>
                </div>
                <?= CHtml::link(
                    '<div class="panel-footer">
                    <span class="pull-left">Подробнее</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>',
                    array('review/index')
                ); ?>
            </div>
        </div>
    <?php } ?>
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
    <?php if ($this->order) { ?>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $this->order; ?></div>
                            <div>Заказы</div>
                        </div>
                    </div>
                </div>
                <?= CHtml::link(
                    '<div class="panel-footer">
                    <span class="pull-left">Подробнее</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>',
                    array('order/index')
                ); ?>
            </div>
        </div>
    <?php } ?>
</div>
<?php
/**
 * @var $content string
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="/js/jquery.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Административный раздел">
    <title>Административный раздел</title>
    <link href="/css/admin.css" rel="stylesheet">
    <link href="/css/bootstrap-toggle.css" rel="stylesheet">
    <link href="/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?= CHtml::link('Админ', array('index/index'), array('class' => 'navbar-brand')); ?>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true">
                    <span class="badge"><?= ($this->notification ? $this->notification : ''); ?></span>
                    <i class="fa fa-envelope fa-fw"></i>
                    <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li>
                        <?= CHtml::link(
                            '<span class="badge">' . ($this->order ? $this->order : '') . '</span> Заказы',
                            array('order/index')
                        ); ?>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <?= CHtml::link(
                            '<span class="badge">' . ($this->feedback ? $this->feedback : '') . '</span> Вопросы',
                            array('feedback/index')
                        ); ?>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <?= CHtml::link(
                            '<span class="badge">' . ($this->review ? $this->review : '') . '</span> Отзывы',
                            array('review/index')
                        ); ?>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <?= CHtml::link(
                            '<span class="badge">' . ($this->user ? $this->user : '') . '</span> Пользователи',
                            array('user/index')
                        ); ?>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <?= CHtml::link('<i class="fa fa-sign-out fa-fw"></i>', array('/site/logout')); ?>
            </li>
        </ul>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="javascript:">Заказы<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= CHtml::link('Заказы', array('order/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('Статусы', array('orderstatus/index')); ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:">Товары<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= CHtml::link('Товары', array('product/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('Фильтры', array('filter/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('Группы фильтров', array('filtergroup/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('Категории', array('category/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('Варианты доставки', array('shipping/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('Оплата и доставка', array('productdelivery/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('SEO', array('pagecatalog/index')); ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:">Статьи<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= CHtml::link('Статьи', array('news/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('Категории', array('newscategory/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('SEO', array('pagenews/index')); ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:">Отзывы<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= CHtml::link('Отзывы', array('review/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('SEO', array('pagereview/index')); ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:">Бренды<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= CHtml::link('Бренды', array('brand/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('SEO', array('pagebrand/index')); ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:">Донорам<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= CHtml::link('Места сдачи крови', array('donor/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('SEO', array('pagedonor/index')); ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:">Пользователи<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= CHtml::link('Пользователи', array('user/index')); ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:">Главная страница<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= CHtml::link('Тексты и SEO', array('pagemain/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('Слайдер', array('slide/index')); ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:">Контакты<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= CHtml::link('Контакты', array('contact/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('Соцсети', array('social/index')); ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <?= CHtml::link('О нас', array('pageabout/index')); ?>
                    </li>
                    <li>
                        <?= CHtml::link('Языки', array('language/index')); ?>
                    </li>
                    <li>
                        <?= CHtml::link('Изображения', array('image/index')); ?>
                    </li>
                    <li>
                        <?= CHtml::link('Переводы', array('translate/index')); ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="page-wrapper">
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
            'htmlOptions' => array('class' => 'breadcrumb'),
            'homeLink' => false,
            'inactiveLinkTemplate' => '<li class="active">{label}</li>',
            'links' => $this->breadcrumbs,
            'separator' => '',
            'tagName' => 'ul',
        )); ?>
        <?php foreach(Yii::app()->user->getFlashes() as $key => $message) {
            print '<div class="alert alert-' . $key . '">' . $message . '</div>';
        } ?>
        <?= $content; ?>
    </div>
</div>
<script src="/js/ckeditor/ckeditor.js"></script>
<script src="/js/bootstrap-toggle.min.js"></script>
<script src="/js/rowsorter.js"></script>
<script src="/js/admin.min.js"></script>
<script src="/js/admin.js"></script>
<script src="/js/moment-with-locales.js"></script>
<script src="/js/bootstrap-datetimepicker.js"></script>
</body>
</html>

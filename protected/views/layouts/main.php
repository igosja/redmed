<?php
/**
 * @var $content string
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>        +<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js homepage"> <!--<![endif]-->
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?= $this->seo_title; ?></title>
    <meta name="description" content="<?= $this->seo_description; ?>">
    <meta name="keywords" content="<?= $this->seo_keywords; ?>">
    <meta property="og:title" content="<?= $this->seo_title; ?>"/>
    <meta property="og:description" content="<?= $this->seo_description; ?>"/>
    <meta property="og:type" content="text"/>
    <meta property="og:image" content="http://<?= $_SERVER['HTTP_HOST'] . $this->og_image; ?>"/>
    <meta property="og:url" content="http://<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"/>
    <meta http-equiv="content-language" content="<?= Yii::app()->language; ?>"/>
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,700,900&amp;subset=cyrillic-ext" rel="stylesheet">
    <link rel="stylesheet" href="/css/normalize.min.css?v=<?= filemtime(__DIR__ . '/../../../css/normalize.min.css'); ?>">
    <link rel="stylesheet" href="/css/libs.css?v=<?= filemtime(__DIR__ . '/../../../css/libs.css'); ?>">
    <link rel="stylesheet" href="/css/main.css?v=<?= filemtime(__DIR__ . '/../../../css/main.css'); ?>">
    <!--<link rel="stylesheet" href="css/mobile.css">-->
    <link rel="stylesheet" href="/css/site.css?v=<?= filemtime(__DIR__ . '/../../../css/site.css'); ?>">
</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a target="_blank" rel="nofollow" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="sitewrap">
    <header class="header">
        <div class="header__t">
            <div class="wrap clearfix">
                <a href="javascript:" class="header__phones__show"></a>
                <div class="header__phones">
                    <div class="header__phones__down">
                        <span><? $this->o_contact['phone_city']; ?></span>
                        <span><? $this->o_contact['phone_kyiv']; ?></span>
                    </div>
                </div>
                <div class="header__adress">
                    <a href="javascript:" class="header__adress__show"></a>
                    <div class="header__adress__down">
                        <span><? $this->o_contact['address_' . Yii::app()->language]; ?></span>
                        <a href="">Показать на карте</a>
                    </div>
                </div>
                <div class="header__lang">
                    <div class="jqui-lang">
                        <select name="" id="">
                            <option value=""  selected="">Укр</option>
                            <option value="" >Рус</option>
                        </select>
                    </div>
                </div>
                <div class="header__cab">
                    <span>Мой кабинет</span>
                    <div class="header__cab__show">
                        <a href="index-enter.html">Вход</a>
                        <a href="index-registration.html">Регистрация</a>
                        <!--<a href="">Мой профиль</a>
                        <a href="">Товары</a>
                        <a href="">Мои заказы</a>
                        <a href="" style="width:145px;">Полезная информация</a>
                        <a href="">Выйти</a>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="header__b">
            <div class="wrap clearfix">
                <div class="header__logo">
                    <?= CHtml::link(
                        '<img src="/img/logo.png" alt="RedMed">',
                        array('index/index')
                    ); ?>
                </div>
                <a href="javascript:" class="search-show"></a>
                <nav class="nav">
                    <ul>
                        <li>
                            <?= CHtml::link(
                                Yii::t('views.layouts.main', 'header-link-about'),
                                array('about/index')
                            ); ?>
                        </li>
                        <li class="nav-h">
                            <a href="javascript:" class="nav__arrow">
                                <?= Yii::t('views.layouts.main', 'header-link-catalog'); ?>
                            </a>
                            <div class="nav__drop">
                                <div>
                                    <a href="index-catalog.html" style="background: url(/img/menu-icons/1.png) left center no-repeat;">Контейнеры для взятия крови</a>
                                    <a href="index-catalog.html" style="background: url(/img/menu-icons/2.png) left center no-repeat;">Донорские кресла</a>
                                    <a href="index-catalog.html" style="background: url(/img/menu-icons/3.png) left center no-repeat;">Холодильное оборудование для элементов крови</a>
                                    <a href="index-catalog.html" style="background: url(/img/menu-icons/4.png) left center no-repeat;">Пробирки для взятия крови для анализов</a>
                                    <a href="index-catalog.html" style="background: url(/img/menu-icons/5.png) left center no-repeat;">Оборудование для службы крови</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <?= CHtml::link(
                                Yii::t('views.layouts.main', 'header-link-brand'),
                                array('brand/index')
                            ); ?>
                        </li>
                        <li>
                            <?= CHtml::link(
                                Yii::t('views.layouts.main', 'header-link-review'),
                                array('review/index')
                            ); ?>
                        </li>
                        <li>
                            <?= CHtml::link(
                                Yii::t('views.layouts.main', 'header-link-contact'),
                                array('contact/index')
                            ); ?>
                        </li>
                        <li>
                            <?= CHtml::link(
                                Yii::t('views.layouts.main', 'header-link-donor'),
                                array('donor/index')
                            ); ?>
                        </li>
                        <li>
                            <?= CHtml::link(
                                Yii::t('views.layouts.main', 'header-link-specialist'),
                                array('specialist/index')
                            ); ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="search">
            <div class="wrap clearfix">
                <form action="">
                    <input type="submit" class="search__subm" value="">
                    <input type="text" class="search__text" placeholder="Поиск">
                </form>
            </div>
        </div>
    </header>
    <?= $content; ?>
    <div class="clearfix-footer"></div>
</div>
<footer>
    <div class="footer-top">
        <div class="wrap clearfix">
            <div class="footer-top__menu">
                <?= CHtml::link(
                    Yii::t('views.layouts.main', 'footer-link-abount'),
                    array('about/index')
                ); ?>
                <?= CHtml::link(
                    Yii::t('views.layouts.main', 'footer-link-about'),
                    array('about/index')
                ); ?>
                <?= CHtml::link(
                    Yii::t('views.layouts.main', 'footer-link-catalog'),
                    array('catalog/index')
                ); ?>
                <?= CHtml::link(
                    Yii::t('views.layouts.main', 'footer-link-brand'),
                    array('brand/index')
                ); ?>
                <?= CHtml::link(
                    Yii::t('views.layouts.main', 'footer-link-review'),
                    array('review/index')
                ); ?>
                <?= CHtml::link(
                    Yii::t('views.layouts.main', 'footer-link-contact'),
                    array('contact/index')
                ); ?>
            </div>
            <div class="footer-top__info">
                <a href="" class="facebook-btn"></a>
                <a href="" class="twitter-btn"></a>
                <a href="" class="youtube-btn"></a>
                <a href="javascript:" class="to-top"></a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="wrap clearfix">
            <div class="footer-copyright">
                <img src="/img/logo-bottom.png" alt="RedMed">
                © <?= date('Y'); ?>—2015
                <?= Yii::t('views.layouts.main', 'reserved') ?>
            </div>
            <div class="footer-frog">
                <a href="javascript:" target="_blank">
                    <?= Yii::t('views.layouts.main', 'development') ?>
                    —<img src="/img/frog.png" alt="Gabbe">
                </a>
            </div>
        </div>
    </div>
</footer>
<script src="/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js?v=<?= filemtime(__DIR__ . '/../../../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js'); ?>"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
<script src="/js/vendor/libs.js?v=<?= filemtime(__DIR__ . '/../../../css/site.css'); ?>"></script>
<script src="/js/main.js?v=<?= filemtime(__DIR__ . '/../../../js/main.js'); ?>"></script>
<script src="/js/site.js?v=<?= filemtime(__DIR__ . '/../../../js/site.js'); ?>"></script>
</body>
</html>
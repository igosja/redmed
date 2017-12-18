<?php
/**
 * @var $form      CActiveForm
 * @var $content string
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>        +<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js homepage"> <!--<![endif]-->
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
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
    <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
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
                        <span><?= $this->o_contact['phone_city']; ?></span>
                        <span><?= $this->o_contact['phone_kyiv']; ?></span>
                    </div>
                </div>
                <div class="header__adress">
                    <a href="javascript:" class="header__adress__show"></a>
                    <div class="header__adress__down">
                        <span><?= $this->o_contact['address_' . Yii::app()->language]; ?></span>
                        <a href="javascript:"><?= Yii::t('views.layouts.main', 'header-link-on-map'); ?></a>
                    </div>
                </div>
                <div class="header__lang">
                    <?php $form = $this->beginWidget('CActiveForm', array(
                        'enableAjaxValidation' => false,
                        'enableClientValidation' => true,
                        'htmlOptions' => array('class' => 'jqui-lang'),
                    )); ?>
                    <?= CHtml::dropDownList(
                        'language',
                        Yii::app()->language,
                        CHtml::listData($this->a_language, 'code', 'name'),
                        array('id' => 'language-select')
                    ); ?>
                        <?php $this->endWidget(); ?>
                </div>
                <div class="header__cab">
                    <span><?= Yii::t('views.layouts.main', 'header-my-room'); ?></span>
                    <div class="header__cab__show">
                        <?php if (Yii::app()->user->isGuest) { ?>
                            <?= CHtml::link(
                                Yii::t('views.layouts.main', 'header-link-login'),
                                array('site/login')
                            ); ?>
                            <?= CHtml::link(
                                Yii::t('views.layouts.main', 'header-link-signup'),
                                array('site/signup')
                            ); ?>
                        <?php } else { ?>
                            <?= CHtml::link(
                                Yii::t('views.layouts.main', 'header-link-profile'),
                                array('profile/index')
                            ); ?>
                            <?= CHtml::link(
                                Yii::t('views.layouts.main', 'header-link-product'),
                                array('profile/product')
                            ); ?>
                            <?= CHtml::link(
                                Yii::t('views.layouts.main', 'header-link-order'),
                                array('profile/order')
                            ); ?>
                            <?= CHtml::link(
                                Yii::t('views.layouts.main', 'header-link-info'),
                                array('profile/info'),
                                array('style' => 'width:145px;')
                            ); ?>
                            <?= CHtml::link(
                                Yii::t('views.layouts.main', 'header-link-logout'),
                                array('site/logout')
                            ); ?>
                        <?php } ?>
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
                            <?= CHtml::link(
                                Yii::t('views.layouts.main', 'header-link-catalog'),
                                array('catalog/index'),
                                array('class' => 'nav__arrow')
                            ); ?>
                            <div class="nav__drop">
                                <div>
                                    <?php foreach ($this->a_category as $item) { ?>
                                        <?= CHtml::link(
                                            Yii::t('views.layouts.main', $item['h1_' . Yii::app()->language]),
                                            array('catalog/index', 'id' => $item['url']),
                                            array('style' => 'background: url(' . ImageIgosja::resize($item['image_id'], 26, 26, 0) . ') left center no-repeat;')
                                        ); ?>
                                    <?php } ?>
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
                                array('donor/index'),
                                array('class' => 'nav-btn')
                            ); ?>
                        </li>
                        <li>
                            <?= CHtml::link(
                                Yii::t('views.layouts.main', 'header-link-news'),
                                array('news/index'),
                                array('class' => 'nav-btn')
                            ); ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="search">
            <div class="wrap clearfix">
                <?php $form = $this->beginWidget('CActiveForm', array(
                    'action' => array('search/index'),
                    'enableAjaxValidation' => false,
                    'enableClientValidation' => true,
                    'method' => 'get'
                )); ?>
                <?= CHtml::submitButton('', array('class' => 'search__subm')); ?>
                <?= $form->textField($this->searchInfo, 'q', array(
                    'class' => 'search__text',
                )); ?>
                <?php $this->endWidget(); ?>
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
                <?php foreach ($this->a_social as $item) { ?>
                    <a href="<?= $item['url'] ? $item['url'] : 'javascript:'; ?>" class="<?= $item['css']; ?>" target="_blank"></a>
                <?php } ?>
                <a href="javascript:" class="to-top"></a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="wrap clearfix">
            <div class="footer-copyright">
                <img src="/img/logo-bottom.png" alt="RedMed">
                © 2008—<?= date('Y'); ?>
                <?= Yii::t('views.layouts.main', 'reserved'); ?>
            </div>
            <div class="footer-frog">
                <a href="javascript:" target="_blank">
                    <?= Yii::t('views.layouts.main', 'development'); ?>
                    —<img src="/img/frog.png" alt="Gabbe">
                </a>
            </div>
        </div>
    </div>
</footer>
<section class="overlay-forms">
    <div class="form-overlay"></div>
    <div class="wrap">
        <!-- Забыли пароль? -->
        <div class="of-form e-form form-password">
            <?php $form = $this->beginWidget('CActiveForm', array(
                'enableAjaxValidation' => false,
                'enableClientValidation' => true
            )); ?>
                <div class="e-form__t">
                    <div class="e-form__title"><?= Yii::t('views.overlay.password', 'title'); ?></div>
                    <p><?= Yii::t('views.overlay.password', 'text'); ?></p>
                    <?= $form->textField($this->forget, 'email', array(
                        'class' => 'e-form__input',
                        'placeholder' => Yii::t('views.overlay.password', 'placeholder-email')
                    )); ?>
                    <?= $form->error($this->forget, 'email'); ?>
                    <?= CHtml::submitButton(
                        Yii::t('views.overlay.password', 'button-submit'),
                        array('class' => 'e-form__submit')
                    )?>
                </div>
                <a href="javascript:" class="of-close"></a>
            <?php $this->endWidget(); ?>
        </div>

        <?php if (Yii::app()->user->hasFlash('success-forget')) {
            Yii::app()->user->getFlash('success-forget'); ?>
            <a
                    href="javascript:"
                    id="link-success-forget"
                    style="display: none;"
                    data-selector="form-thanks-forget"
                    class="overlayElementTrigger"
            ></a>
            <div class="of-form e-form form-thanks-forget form-thanks">
                <div class="e-form__t">
                    <div class="e-form__title">
                        <?= Yii::t('views.overlay.forget', 'thanks-title'); ?>
                    </div>
                    <p><?= Yii::t('views.overlay.forget', 'thanks-text'); ?></p>
                </div>
                <a href="javascript:" class="of-close"></a>
            </div>
        <?php } ?>

        <?php if (Yii::app()->user->hasFlash('success-review')) {
            Yii::app()->user->getFlash('success-review'); ?>
            <a
                    href="javascript:"
                    id="link-success-review"
                    style="display: none;"
                    data-selector="form-thanks-review"
                    class="overlayElementTrigger"
            ></a>
            <div class="of-form e-form form-thanks-review form-thanks">
                <div class="e-form__t">
                    <div class="e-form__title">
                        <?= Yii::t('views.overlay.review', 'thanks-title'); ?>
                    </div>
                    <p><?= Yii::t('views.overlay.review', 'thanks-text'); ?></p>
                </div>
                <a href="javascript:" class="of-close"></a>
            </div>
        <?php } ?>

        <?php if (Yii::app()->user->hasFlash('success-order')) {
            Yii::app()->user->getFlash('success-order'); ?>
            <a
                    href="javascript:"
                    id="link-success-order"
                    style="display: none;"
                    data-selector="form-thanks-order"
                    class="overlayElementTrigger"
            ></a>
            <div class="of-form e-form form-thanks-order form-thanks">
                <div class="e-form__t">
                    <div class="e-form__title">
                        <?= Yii::t('views.overlay.order', 'thanks-title'); ?>
                    </div>
                    <p><?= Yii::t('views.overlay.order', 'thanks-text'); ?></p>
                </div>
                <a href="javascript:" class="of-close"></a>
            </div>
        <?php } ?>

        <?php if (Yii::app()->user->hasFlash('success-signup')) {
            Yii::app()->user->getFlash('success-signup'); ?>
            <a
                    href="javascript:"
                    id="link-success-signup"
                    style="display: none;"
                    data-selector="form-thanks-signup"
                    class="overlayElementTrigger"
            ></a>
            <div class="of-form e-form form-thanks-signup form-thanks">
                <div class="e-form__t">
                    <div class="e-form__title">
                        <?= Yii::t('views.overlay.signup', 'thanks-title'); ?>
                    </div>
                    <p><?= Yii::t('views.overlay.signup', 'thanks-text'); ?></p>
                </div>
                <a href="javascript:" class="of-close"></a>
            </div>
        <?php } ?>

        <?php if (Yii::app()->user->hasFlash('success-feedback')) {
            Yii::app()->user->getFlash('success-feedback'); ?>
            <a
                    href="javascript:"
                    id="link-success-feedback"
                    style="display: none;"
                    data-selector="form-thanks-feedback"
                    class="overlayElementTrigger"
            ></a>
            <div class="of-form e-form form-thanks-feedback form-thanks">
                <div class="e-form__t">
                    <div class="e-form__title">
                        <?= Yii::t('views.overlay.feedback', 'thanks-title'); ?>
                    </div>
                    <p><?= Yii::t('views.overlay.feedback', 'thanks-text'); ?></p>
                </div>
                <a href="javascript:" class="of-close"></a>
            </div>
        <?php } ?>

        <?php if (Yii::app()->user->hasFlash('error-forget')) {
            Yii::app()->user->getFlash('error-forget'); ?>
            <a
                    href="javascript:"
                    id="link-error-forget"
                    style="display: none;"
                    data-selector="form-password"
                    class="overlayElementTrigger"
            ></a>
        <?php } ?>
    </div>
</section>
<script src="/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js?v=<?= filemtime(__DIR__ . '/../../../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js'); ?>"></script>
<script src="/js/vendor/libs.js?v=<?= filemtime(__DIR__ . '/../../../css/site.css'); ?>"></script>
<?php if (in_array($this->uniqueid, array('contact', 'donor'))) { ?>
    <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyAYBg8KC7jzGXqsJO4ZvBUBr-zHT_0qm2s"></script>
<?php } ?>
<script src="/js/main.js?v=<?= filemtime(__DIR__ . '/../../../js/main.js'); ?>"></script>
<script src="/js/site.js?v=<?= filemtime(__DIR__ . '/../../../js/site.js'); ?>"></script>
<script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
</body>
</html>
<?php
/**
 * @var $o_page PageMain
 */
?>
<section class="content">
    <div class="m-slider owl-carousel" id="slider">
        <div class="item" style="background: url(/img/slider-1.jpg) center top no-repeat;">
            <div class="wrap">
                <h2 class="m-slider__title">Red Med - современные технологии,<br />качество и надежность</h2>
                <a href="" class="btn-more">Подробнее</a>
            </div>
        </div>
        <div class="item" style="background: url(/img/slider-2.jpg) center top no-repeat;">
            <div class="wrap">
                <h2 class="m-slider__title">Red Med - современные технологии,<br />качество и надежность</h2>
                <a href="" class="btn-more">Подробнее</a>
            </div>
        </div>
    </div>
    <div class="m-cat clearfix">
        <div class="wrap">
            <div class="m-cat__i">
                <img src="/img/m-cat/cat-1.png" alt="">
                <div class="m-cat__i__title">
                    Контейнеры для крови
                </div>
                <div class="m-cat__i__text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.
                </div>
                <a href="" class="btn-more">Смотреть</a>
            </div>
            <div class="m-cat__i">
                <img src="/img/m-cat/cat-2.png" alt="">
                <div class="m-cat__i__title">
                    Донорские кресла
                </div>
                <div class="m-cat__i__text">
                    Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.
                </div>
                <a href="" class="btn-more">Смотреть</a>
            </div>
            <div class="m-cat__i">
                <img src="/img/m-cat/cat-3.png" alt="">
                <div class="m-cat__i__title">
                    Холодильное оборудование для элементов крови
                </div>
                <div class="m-cat__i__text">
                    Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor.
                </div>
                <a href="" class="btn-more">Смотреть</a>
            </div>
            <div class="m-cat__i">
                <img src="/img/m-cat/cat-4.png" alt="">
                <div class="m-cat__i__title">
                    Контейнеры для крови
                </div>
                <div class="m-cat__i__text">
                    Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.
                </div>
                <a href="" class="btn-more">Смотреть</a>
            </div>
            <div class="m-cat__i">
                <img src="/img/m-cat/cat-5.png" alt="">
                <div class="m-cat__i__title">
                    Оборудование<br/> для службы крови
                </div>
                <div class="m-cat__i__text">
                    Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                </div>
                <a href="" class="btn-more">Смотреть</a>
            </div>
        </div>
    </div>
    <div class="b-mhalf">
        <div class="wrap clearfix">
            <div class="b-mhalf__i">
                <div class="title">
                    <?= $o_page['title_1_' . Yii::app()->language]; ?>
                </div>
                <?= $o_page['text_1_' . Yii::app()->language]; ?>
            </div>
            <div class="b-mhalf__i">
                <div class="title">
                    <?= $o_page['title_2_' . Yii::app()->language]; ?>
                </div>
                <?= $o_page['text_2_' . Yii::app()->language]; ?>
                <?= CHtml::link(
                    Yii::t('views.index.index', 'link-about'),
                    array('about/index'),
                    array('class' => 'btn-more')
                )?>
            </div>
        </div>
    </div>
    <div class="b-brands">
        <div class="wrap">
            <div class="title">
                Бренды
            </div>
            <div class="brands owl-carousel">
                <div class="item">
                    <img src="img/brands/brands-1.png" alt="">
                </div>
                <div class="item">
                    <img src="img/brands/brands-2.png" alt="">
                </div>
                <div class="item">
                    <img src="img/brands/brands-3.png" alt="">
                </div>
                <div class="item">
                    <img src="img/brands/brands-4.png" alt="">
                </div>
                <div class="item">
                    <img src="img/brands/brands-5.png" alt="">
                </div>
                <div class="item">
                    <img src="img/brands/brands-1.png" alt="">
                </div>
                <div class="item">
                    <img src="img/brands/brands-2.png" alt="">
                </div>
                <div class="item">
                    <img src="img/brands/brands-3.png" alt="">
                </div>
                <div class="item">
                    <img src="img/brands/brands-4.png" alt="">
                </div>
                <div class="item">
                    <img src="img/brands/brands-5.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="b-text">
        <div class="wrap">
            <h2 class="b-text__title">
                <?= $o_page['title_3_' . Yii::app()->language]; ?>
            </h2>
            <?= $o_page['title_3_' . Yii::app()->language]; ?>
        </div>
    </div>
</section>
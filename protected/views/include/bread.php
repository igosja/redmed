<?php $this->widget('zii.widgets.CBreadcrumbs', array(
    'activeLinkTemplate' => '<a href="{url}" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">{label}</a>',
    'inactiveLinkTemplate' => '<span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">{label}</span>',
    'homeLink' => CHtml::link(
        Yii::t('views.include.bread', 'home'),
        array('index/index'),
        array('itemprop' => 'itemListElement', 'itemscope' => 'itemscope', 'itemtype' => 'http://schema.org/ListItem')
    ),
    'htmlOptions' => array(
        'class' => 'breadchambs',
        'itemscope' => 'itemscope',
        'itemtype' => 'http://schema.org/BreadcrumbList'
    ),
    'links' => $this->breadcrumbs,
    'separator' => '',
    'tagName' => 'div',
)); ?>

<?php

return array(
    'defaultController' => 'index',
    'language' => 'ru',
    'sourceLanguage' => 'ru',
    'timeZone' => 'UTC',
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'components' => array(
        'urlManager' => array(
            'class' => 'application.components.UrlManager',
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                '<language:(ru|uk)>' => 'index/index',
                '' => 'index/index',
                '<language:(ru|uk)>/<controller>/<action>/<id>' => '<controller>/<action>',
                '<language:(ru|uk)>/<controller>/<action>' => '<controller>/<action>',
                '<language:(ru|uk)>/<controller>' => '<controller>/index',
                '<module:(admin)>/<language:(ru|uk)>/<controller>/<action>/<id>' => '<module>/<controller>/<action>',
                '<module:(admin)>/<language:(ru|uk)>/<controller>/<action>' => '<module>/<controller>/<action>',
                '<module:(admin)>/<language:(ru|uk)>/<controller>' => '<module>/<controller>',
                '<module:(admin)>/<language:(ru|uk)>' => '<module>/index',
                '<module:(admin)>/<controller>/<action>/<id>' => '<module>/<controller>/<action>',
                '<module:(admin)>/<controller>/<action>' => '<module>/<controller>/<action>',
                '<module:(admin)>/<controller>' => '<module>/<controller>',
                '<module:(admin)>' => '<module>/index',
            ),
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=igosja_redmed',
            'emulatePrepare' => true,
            'username' => 'igosja_redmed',
            'password' => 'jhsVyBI9pq',
            'charset' => 'utf8',
        ),
        'messages' => array(
            'class' => 'CDbMessageSource',
            'cacheID' => 'cache',
            'cachingDuration' => 43200,
            'connectionID' => 'db',
            'sourceMessageTable' => 'i18n_source_messages',
            'translatedMessageTable' => 'i18n_translated_messages',
            'forceTranslation' => true,
        ),
        'user' => array(
            'loginUrl' => array('site/login'),
        ),
    ),
    'modules' => array(
        'admin',
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123',
        ),
    ),
);
<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name' => 'Comedy Hunt',
    'defaultController' => 'pages',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.vendor.*',
        'application.extensions.GoogleApis.*',
    ),
    'modules' => array(
        'admin'
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'caseSensitive' => false,
            'rules' => array(
                '/' => 'pages/index',
                '/pages/index/<code:\w+>'=>'/pages/index',
                '/authenticate/?<code:\w+>'=>'/pages/authenticate',
                '/authenticate/' => '/pages/authenticate',
                '/videos'   => '/pages/videos',
                '/login/' => '/login/index',
                '/logout/' => '/login/logout',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '/admin/<controller:\w+>/<id:\d+>' => '/admin/<controller>/view',
                '/admin/<controller:\w+>/<action:\w+>/<id:\d+>' => '/admin/<controller>/<action>',
                '/admin/<controller:\w+>/<action:\w+>' => '/admin/<controller>/<action>',
            ),
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
        //youtube playlist configuration
        'YT_PLAYLIST' => array(
            'maxSize' => 50,
            'isCache' => true,
            'cacheLifetime' => 86400,
            'cachePath' => dirname(__FILE__)."/../runtime/cache/",
            'apiKey' => 'AIzaSyA4iw6xE5VRXg5c7s7JFcmlTO65gQIMjnE',
        ),
    ),
);

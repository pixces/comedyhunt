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
    // uncomment the following to enable the Gii tool
    /*
      'gii'=>array(
      'class'=>'system.gii.GiiModule',
      'password'=>'Enter Your Password Here',
      // If removed, Gii defaults to localhost only. Edit carefully to taste.
      'ipFilters'=>array('127.0.0.1','::1'),
      ),
     */
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
                '/pages/index/<code:\w+>'=>'pages/index',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '/admin/<controller:\w+>/<id:\d+>' => '/admin/<controller>/view',
                '/admin/<controller:\w+>/<action:\w+>/<id:\d+>' => '/admin/<controller>/<action>',
                '/admin/<controller:\w+>/<action:\w+>' => '/admin/<controller>/<action>',
                '/login/' => '/login/index',
                '/logout/' => '/login/logout',
            ),
        ),

        'GoogleApis' => array(
                'class' => 'ext.GoogleApis.GoogleApis.GoogleApis',
                // See http://code.google.com/p/google-api-php-client/wiki/OAuth2
                'clientId' => '175405591801-kl9r7br1jf8uk2bhs0c2ispuhe0rekek.apps.googleusercontent.com',
                'clientSecret' => 'Q-SLi6Q2h1aqLVa2U1X9RVGP',
                'redirectUri' => 'http://localhost/comedyhunt/pages/index',
                // // This is the API key for 'Simple API Access'
                'developerKey' => 'AIzaSyA7rybq4972tbwJ3zlTVe_CLkSlil-pwGQ',
            ),
        /*
          'db'=>array(
          'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
          ),
          // uncomment the following to use a MySQL database
          /*
          'db'=>array(
          'connectionString' => 'mysql:host=localhost;dbname=testdrive',
          'emulatePrepare' => true,
          'username' => 'root',
          'password' => '',
          'charset' => 'utf8',
          ),
         */
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),

        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                // comment the following to show log messages on web pages
                array(
                    'class' => 'CWebLogRoute',
                ),
            ),
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

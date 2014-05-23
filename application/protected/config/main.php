<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'txtmind.us',
    'theme' => 'bootstrap',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.utils.*',
	),

	'modules'=>array(

	),

	// application components
	'components'=>array(
		'user'=>array(
            'allowAutoLogin' => true,
            'loginUrl' => '/auth/login',
            'class' => 'WebUser',
		),
        'db' => array(
            'emulatePrepare' => true,
            'charset' => 'utf8',
            'tablePrefix' => '',
            'class'=>'CDbConnection',
        ),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                '<controller:\w+>/<id:[a-zA-Z0-9\-]{32}>' => '<controller>/index',
                '<controller:\w+>/<action:\w+>/<id:[a-zA-Z0-9\-]{32}>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'admin@somedomain.com',
	),
);
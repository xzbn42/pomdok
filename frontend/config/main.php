<?php
use kartik\datecontrol\Module;

$params=array_merge(require(__DIR__.'/../../common/config/params.php'), require(__DIR__.'/../../common/config/params-local.php'), require(__DIR__.'/params.php'), require(__DIR__.'/params-local.php'));

return [
		'id'                 =>'app-frontend',
		'basePath'           =>dirname(__DIR__),
		'bootstrap'          =>['log'],
		'controllerNamespace'=>'frontend\controllers',

		// other settings
		'modules'            =>[
				'datecontrol'=>[
						'class'          =>'kartik\datecontrol\Module',

						// format settings for displaying each date attribute (ICU format example)
						'displaySettings'=>[
								Module::FORMAT_DATE    =>'dd.mm.yyyy',
								Module::FORMAT_TIME    =>'hh:mm:ss a',
								Module::FORMAT_DATETIME=>'dd-MM-yyyy hh:mm:ss a',
						],

						// format settings for saving each date attribute (PHP format example)
						'saveSettings'   =>[
								Module::FORMAT_DATE    =>'php:Y-m-d', // saves as unix timestamp
								Module::FORMAT_TIME    =>'php:H:i:s',
								Module::FORMAT_DATETIME=>'php:Y-m-d H:i:s',
						],


						// automatically use kartik\widgets for each of the above formats
						'autoWidget'     =>true,

				]
		],
		'components'         =>[
				'request'     =>[
						'csrfParam'=>'_csrf-frontend',
				],
				'user'        =>[
						'identityClass'  =>'common\models\User',
						'enableAutoLogin'=>true,
						'identityCookie' =>['name'=>'_identity-frontend', 'httpOnly'=>true],
				],
				'session'     =>[
					// this is the name of the session cookie used for login on the frontend
					'name'=>'advanced-frontend',
				],
				'log'         =>[
						'traceLevel'=>YII_DEBUG ? 3 : 0,
						'targets'   =>[
								[
										'class' =>'yii\log\FileTarget',
										'levels'=>['error', 'warning'],
								],
						],
				],
				'errorHandler'=>[
						'errorAction'=>'site/error',
				],
				'urlManager'  =>[
						'class'          =>'yii\web\UrlManager',
						// Disable index.php
						'showScriptName' =>false,
						// Disable r= routes
						'enablePrettyUrl'=>true,
						'rules'          =>array(
								'<controller:\w+>/<id:\d+>'             =>'<controller>/view',
								'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
								'<controller:\w+>/<action:\w+>'         =>'<controller>/<action>',
						),
				],
		],
		'params'             =>$params,
];

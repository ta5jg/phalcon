<?php
	
	try {
		
		//Register an autoloader
		$loader = new \Phalcon\Loader();
		$loader->registerDirs(array(
			'../app/controllers/',
			'../app/models/'
		))->register();
		
		//Create a DI
		$di = new Phalcon\DI\FactoryDefault();
		
		//Setup the database service
		$di->set('db', function(){
			return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
				"host" => "127.0.0.1",
				"username" => "root",
				"password" => "i.g012300",
				"dbname" => "phpRc"
			));
		});
		
		//Setup the view component
		$di->set('view',function(){
			$view = new \Phalcon\MVC\View();
			$view->setViewsDir('../app/views/');
			return $view;
		});
		
		//Setup a base URI so that all generated URIs include "phalcon" folder
		$di->set('url', function(){
			$url = new \Phalcon\MVC\Url();
			$url->setBaseUri('/phalcon/');
			return $url;
		});
		
		//Handle the request
		$application = new \Phalcon\MVC\Application($di);
		
		echo $application->handle()->getContent();
	} catch(\Phalcon\Exception $e) {
		echo "PhalconException :", $e->getMessage();
	}
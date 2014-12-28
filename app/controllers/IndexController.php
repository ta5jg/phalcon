<?php
	class IndexController extends \Phalcon\Mvc\Controller
	{
		public function indexAction()
		{
			echo "<h3>Hello!</h3>";
			echo Phalcon\Tag::linkTo("signup", "Sign Up Here!");
		}
	}
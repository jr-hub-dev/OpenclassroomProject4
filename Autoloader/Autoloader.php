<?php

class Autoloader
{
	static function register()
	{
		spl_autoload_register(array(__CLASS__,'autoload'));
	}


	static function autoload()
	{
        //require '../Controller/Controller.php';
		require '../Controller/PostController.php';
		require '../Model/Database.php';
		require '../Config/config.php';
	}	

}
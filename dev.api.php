<?php

/*
 * Common application functions
 */

// return
// 1. the root path of the application
// 2. a relative path to something inside the project

function base_path($path = null){
	if(isset($path))
		return __DIR__ . '/' . $path;
	return __DIR__;
}

// return a config variable
// example: $app_title = config('app.title');
// where app is the file root/app/config/app.ini
// and title is a variable inside this ini file

function config($option){
	return Pure\Config::get($option);
}

// return
// 1. the base application url
// 2. a relative ulr to something inside the project

function base_url($url = null){
	if(isset($url)){
		return Pure\Url::base() . '/' . $url;
	}
	return Pure\Url::base();
}

// redirect function

function redirect( $url, $code = 302, $condition = true ){
    Pure\Url::redirect($url, $code, $condition);
}

// return the request input

function request($key){
	return Pure\Request::input($key);
}

function get($key){
	return Pure\Request::get($key);
}

function post($key){
	return Pure\Request::post($key);
}

// this function include all files with a specified extension
// contained by a folder and all the subdirectories

function include_directory($directory, $extension = '.php') {
	if(is_dir($directory))
	{
		$scan = scandir($directory);
		unset($scan[0], $scan[1]); //unset . and ..
		foreach($scan as $file)
		{
			$current_path = $directory . '/' . $file;
			if(is_dir($current_path))
			{
				include_directory($current_path, $extension);
			}
			else
			{
				if(strpos($file, $extension) !== false)
				{
					include_once($current_path);
				}
			}
		}
	}
}

// return the application

function app(){
	return Pure\Application();
}

// return the router

function router(){
	return Pure\Routing\Router::main();
}

// make a view

function view($template_file){
	Pure\Template\View::make($template_file);
}

?>
<?php

Pure\Session::start( 'ciao2222' );

/*
	---------------------------
	Default paths configuration
	---------------------------
*/

Pure\Path::root( __DIR__ );
Pure\Path::resources( __DIR__ . '/public' );

Pure\Route::path( __DIR__ . '/app/controllers' );

Pure\View::path( __DIR__ . '/app/views' );

/*
    ----------------------
        Configuration
    ----------------------
*/

?>

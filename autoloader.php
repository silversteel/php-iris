<?php
spl_autoload_register(function($classname){
	require "./class/{$classname}.php";
});
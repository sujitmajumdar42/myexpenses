<?php
require_once("Path_config.php");

function loadPath($moduleName){
	$xml=simplexml_load_file(USER_MODULE_PATH.$moduleName.".xml");
	foreach ($xml->source->files->file as $files) {
	if($files->type=="to")	
		require_once(TO_PATH.$files->name);
	if($files->type=="bo")	
		require_once(BO_PATH.$files->name);	
	if($files->type=="dao")	
		require_once(DAO_PATH.$files->name);	
	if($files->type=="session_config")	
		require_once(APP_CONFIG_PATH.$files->name);	
	if($files->type=="db_config")	
		require_once(DB_CONFIG_PATH.$files->name);		
	if($files->type=="router")
		require_once($files->name);	
	}
	
}
?>
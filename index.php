
<?php
//Անվտանգության հաստատունի ստեղծում
define('ICORP',TRUE);
//error_reporting(0);
//Կայքի գլխամասի տեսակ և կոդիրովկա
header("Content-Type:text/html;charset=utf-8");
//SESSION - ի բացում
session_start();
//config.php - ի միացում
require "config.php";
//set_include_path() - Առանձին պապկաների միացման ավտոմատ ֆունկցիա
//get_include_path() - Սերվերի պապկաների ճանապարհի ստացում
//echo get_include_path(); - Ստուգում
set_include_path(get_include_path()
				.PATH_SEPARATOR.CONTROLLER
				.PATH_SEPARATOR.MODEL
				.PATH_SEPARATOR.LIB
				);
//echo get_include_path(); - Ֆունկցիայով անցնելուց հետո
//Բոլոր կլասսների ավտոմատ միացման ֆունկցիա
function __autoload($class_name) {
if(!include_once ($class_name.".php")) {
		
		try {
			throw new ContrException($class_name.'Միացման համար սխալ ֆայլ');
		}
		catch(ContrException $e) {
			echo $e->getMessage();
		}
	}
}
try{
	$obj = Route_Controller::get_instance();
	$obj->route();
}
catch(ContrException $e) {
	return;
}
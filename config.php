<?php
//Անվտանգության հաստատունի առկայության ստուգում
defined('ICORP') or exit('Մուտքն արգելված է');
//CONTROLLER
define('CONTROLLER','core/controller');
//MODEL
define('MODEL','core/model');
//ACTIVE THEME
define('VIEW','template/default/');
//FUNCTIONS LIBRARY
define('LIB','lib');
//Այն պապկան սերվերում, որտեղ գտնվում է կայքը
define('SITE_URL','/core/');
//Էջի վրա ապրանքների քանակը
define('QUANTITY',3);
//Ակտիվ էջից առաջ և հետո ցուցադրվող էջերի քանակ
define('QUANTITY_LINKS',3);
// Վերբեռնվող նկարների պահեստ
define('UPLOAD_DIR','images/');
//HOST
define('HOST','localhost');
//USER
define('USER','icorp');
//PASSORD
define('PASSWORD','12345');
//DATABASE
define('DB_NAME','lesson_corp');
//Նկարների չափը
define('IMG_WIDTH',116);
//Մասիվ – այլ կարգավորումների համար՝ js, style, …
$conf = array(
			'styles' => array(
						'css/style.css',
						),
			'scripts' => array(
						'js/jquery-1.7.2.min.js',
						'js/jquery-ui-1.8.20.custom.min.js',
						'js/jquery.cookie.js',
						'js/js.js',
						'js/script.js',
						),
			'styles_admin' => array(
						'css/style.css'
						),
			'scripts_admin' => array(
						'js/jquery-1.7.2.min.js',
						'js/jquery-ui-1.8.20.custom.min.js',
						'js/jquery.cookie.js',
						'js/js.js',
						'js/script.js',
						),						
);
?>

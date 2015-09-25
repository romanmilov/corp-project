<?php
//Անվտանգության հաստատունի առկայության ստուգում
defined('ICORP') or exit('Մուտքն արգելված է');

class Route_Controller extends Base_Controller {
	
	static $_instance;
	
	static function get_instance() {
		
		if(self::$_instance instanceof self) {
			return self::$_instance;
		}
		
		return self::$_instance = new self;
	}
	
	
	private function __construct() {
		
		$zapros = $_SERVER['REQUEST_URI'];
		//echo $zapros;
		
		$path = substr($_SERVER['PHP_SELF'],0,strpos($_SERVER['PHP_SELF'],'index.php'));
		//$path = $_SERVER['PHP_SELF'];
		//echo $path;
		
		if($path === SITE_URL) {
			$this->request_url = substr($zapros,strlen(SITE_URL));
			//echo $this->request_url;
			
			$url = explode('/',rtrim($this->request_url,'/'));
			//echo "<pre>";
			//print_r($url);
			//echo "</pre>";
			if (!empty($url[0])) {
				$this->controller = ucfirst($url[0]).'_Controller';
			}
			else {
				$this->controller = "Index_Controller";
			}
			//echo $this->controller;
			
			$count = count($url);
			//echo $count;
			
			if(!empty($url[1])) {
				
				$key = array();
				$value = array();
				
				for($i = 1;$i < $count; $i++) {
					
					if($i%2 != 0) {
						$key[] = $url[$i];
					}
					else {
						$value[] = $url[$i];
					}
				}
				
				if(!$this->params = array_combine($key,$value)) {
					//exit('Սխալ հղում');
					throw new ContrException("Սխալ հղում",$zapros);
				}
				//echo "<pre>";
				//print_r($key);
				//print_r($value);
				//print_r($this->params);
				//echo "</pre>";
			}
		}
		else {
			try{
				throw new Exception('<p style="color:red">Կայքի սխալ հասցե</p>');
			}
			
			
			catch(Exception $e) {
				echo $e->getMessage();
				exit();
			}
		}
		
	}
}
?>
<?php
//Անվտանգության հաստատունի առկայության ստուգում
defined('ICORP') or exit('Մուտքն արգելված է');

abstract class Base_Controller {
	
	protected $request_url;
	
	protected $controller;
	
	protected $params;
	
	protected $styles,$styles_admin;
	
	protected $scripts,$scripts_admin;
	
	protected $error;
	
	protected $page;
	
	public function route() {
		if(class_exists($this->controller)) {
			
			$ref = new ReflectionClass($this->controller);
			
			if($ref->hasMethod('request')) {
				
				if($ref->isInstantiable()) {
					$class = $ref->newInstance();
					$method = $ref->getMethod('request');
					$method->invoke($class,$this->get_params());
				}
			}
			
		}
		else {
			throw new ContrException('Այդպիսի էջ գոյություն չունի');
		}
	}
	
	public function init() {
		
		global $conf;
		
		if(isset($conf['styles'])) { //ստուգում ենք գոյությունը
			foreach($conf['styles'] as $style) { //ցիկլով բոլոր style - ների ստացում
				$this->styles[] = trim($style,'/'); // styles[] մասիվից, բոլոր style - ների ստացում
			}
		}
		if(isset($conf['styles_admin'])) {
			foreach($conf['styles_admin'] as $style_admin) {
				$this->styles_admin[] = trim($style_admin,'/');
			}
		}
		
		if(isset($conf['scripts'])) {
			foreach($conf['scripts'] as $script) {
				$this->scripts[] = trim($script,'/');
			}
		}
		
		if(isset($conf['scripts_admin'])) {
			foreach($conf['scripts_admin'] as $script_admin) {
				$this->scripts_admin[] = trim($script_admin,'/');
			}
		}
		
		
	}
	
	protected function get_controller() {
		return $this->controller;
	}
	
	protected function get_params() {

		return $this->params;
	}
	
	protected function input() {
		// նկարագրությունը կկատարվի ժառանգներում
	}
	
	protected function output() {
		// նկարագրությունը կկատարվի ժառանգներում
	}
	
	public function request($param = array()) {
		$this->init();
		$this->input($param);
		$this->output();
		
		if(!empty($this->error)) {
			$this->write_error($this->error);
		}
		
		$this->get_page();
	}
	
	public function get_page() {
		echo $this->page;
	}
	
	protected function render($path,$param = array()) {
		
		extract($param);
		
		ob_start();
		
		if(!include($path.'.php')) {
			throw new ContrException('Այդպիսի շաբլոն գոյություն չունի');
		}
		
		return ob_get_clean();
	}
	
	public function clear_str($var) {
		
		if(is_array($var)) {
			$row = array();
			foreach($var as $key=>$item) {
				$row[$key] = trim(strip_tags($item));
			}
			
			return $row;
		}
		return trim(strip_tags($var));
	}
	
	public function clear_int($var) {
		return (int)$var;
	}
	
	public function is_post() {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			return TRUE;
		}
		
		return FALSE;
	}
	
	public function check_auth() {
		//Լրացումը կկատարենք admin - մասի հետ միասին
	}
	
	public function write_error($err) {
		$time = date("d-m-Y G:i:s");
		
		$str = "Fault: ".$time." - ".$err."\n\r";
		file_put_contents("log.txt",$str,FILE_APPEND);
	}
	
	public function img_resize($dest,$type) {
		// նկարագրությունը կկգրենք հետո	
	}

}
?>
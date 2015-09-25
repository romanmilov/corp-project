<?php
defined('ICORP') or exit('Մուտքն արգելված է');

class Index_Controller extends Base {
	protected $text;
	protected function input() {
		parent::input();
		$this->title .= "Գլխավոր";
		$this->text = $this->ob_m->get_home_page();
		$this->keywords = $this->text['meta_k'];
		$this->discription =  $this->text['meta_d'];
		//Գլխավոր էջի տեքստի թեստավորում
		//echo "<pre>";
		//print_r($this->text);
		//echo "</pre>";
	}
	protected function output() {
		
		$this->content = $this->render(VIEW.'content',array(
														'text'=>$this->text
														));				
		$this->page = parent::output();
		return $this->page;
	}
}
?>
<?php
defined('ICORP') or exit('Մուտքն արգելված է');

class Page_Controller extends Base {
	
	protected $page;
	
	protected function input($param) {
		parent::input();
		
		if(isset($param['page_id'])) {
			$page_id = $this->clear_int($param['page_id']);
			$this->page = $this->ob_m->get_page($page_id);
			
			$this->title .= $this->page['page_title'];
			$this->keywords = $this->page['meta_k'];
			$this->discription = $this->page['meta_d'];
			
		}
	}
	
	protected function output() {
		
		$this->content = $this->render(VIEW.'page_page',array(
																'page'=>$this->page
																));
		
		
		$this->page = parent::output();
		
		return $this->page;
	}
}
?>
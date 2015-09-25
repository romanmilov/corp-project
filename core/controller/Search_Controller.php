<?php
defined('ICORP') or exit('Մուտքն արգելված է');

class Search_Controller extends Base  {
	
	protected $str;
	
	protected $navigation;
	
	protected $search;
	
	protected function input($param = array()) {
		parent::input();
		
		if(isset($param['page'])) {
			$page = $this->clear_int($param['page']);
			
			if($page == 0) {
				$page = 1;
			}
		}
		else {
			$page = 1;
		}
		
		if(isset($param['str'])) {
			$this->str = rawurldecode($this->clear_str($param['str']));
		}
		elseif($this->is_post()) {
			$this->str = $this->clear_str($_POST['txt1']);
		}
		
		$this->title .= "Որոնման արդյունքները - ".$this->str;
		
		$this->keywords .= "Որոնում, Արմ-Շին Էներգո";
		$this->discription .= "Որոնման արդյունքները - ".$this->str;
		
		$pager = new Pager(
							$page,
							'products',
							array('public' => 1),
							'product_id',
							'ASC',
							QUANTITY,
							QUANTITY_LINKS,
							array("="),
							array('product_title,product_content' =>$this->str)					
							);
		
		if(is_object($pager)) {
			$this->navigation = $pager-> get_navigation();
			$this->search = $pager->get_posts();
			$this->str = rawurlencode($this->str);
		}
		//print_r($this->search);
		
		$this->need_right_side = FALSE;							
	}
	
	protected function output() {
		
		
		$this->content = $this->render(VIEW.'search_page',
											array(
													'search' => $this->search,
													'navigation' => $this->navigation,
													'str' => $this->str
													));
		
		$this->page = parent::output();
		
		return $this->page;
	}
}
?>
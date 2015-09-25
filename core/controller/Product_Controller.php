<?php
defined('ICORP') or exit('Access denied');

class Product_Controller extends Base {
	
	protected $product;
	
	protected function input($param = array()) {
		parent::input();
			if(isset($param['id'])) {
			$id = $this->clear_int($param['id']);
			if($id) {
				$this->product =$this->ob_m->get_product($id);			
				$this->title .= $this->product['product_title'];
				$this->keywords = $this->product['meta_k'];	
				$this->discription = $this->product['meta_d'];
				$this->krohi[0]['product_title'] = $this->product['product_title'];
				
				
				//echo "<pre>";
				//print_r($this->product);
				//echo "</pre>";
			}
		}

		

		
	}
	
	protected function output() {
		
		$this->content = $this->render(VIEW.'product_page',array(
																'product' => $this->product,
																'krohi' => $this->krohi
																));
		

		
		$this->page = parent::output();
		return $this->page;
	}
}
?>
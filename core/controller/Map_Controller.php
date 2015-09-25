<?php
defined('ICORP') or exit('Մուտքն արգելված է');

class Map_Controller extends Base {
	
	protected $pages,$catalog;
	
	protected function input() {
		parent::input();
		
		$this->title .= "Կայքի Քարտեզ";
		
		$this->pages = $this->ob_m->get_pages();
		$this->catalog = $this->ob_m->get_catalog_brands();
		
		//echo "<pre>";
		//print_r($this->pages);
		//print_r($this->catalog);
		//echo "</pre>";
		
		$this->keywords = "Կայքի Քարտեզ";
		$this->discription = "Արմ-Շին Էներգո Կայքի Քարտեզ";
	}
	
	protected function output() {
		
		
		$this->content = $this->render(VIEW.'sitemap_page',
										array(
											'pages' => $this->pages,
											'catalog' => $this->catalog
										)
										);
		
		$this->page = parent::output();		
		return $this->page;
	}
}
?>
<?php
defined('ICORP') or exit('Մուտքն արգելված է');

class Archive_Controller extends Base {
	
	protected $archive;
	protected $navigation;
	
	public function input($param = array()) {
		parent::input();
		if($param['page']) {
			$page = $this->clear_int($param['page']);
			
			if($page == 0) {
				$page = 1;
			}
		}
		else {
			$page = 1;
		}
		$this->title .= "Նորությունների արխիվ";
		
		$this->keywords = "Արմ-Շին, Էներգո, Նորություններ";
		$this->discription = "Արմ-Շին Էներգո Կայքի Նորությունների արխիվ";
		
		$pager = new Pager(
							$page,
							'news',
							array(),
							'news_date',
							'DESC',
							QUANTITY,
							QUANTITY_LINKS
						);
		$this->archive = $pager->get_posts();
		$this->navigation = $pager->get_navigation();
		//echo "<pre>";
		//print_r($this->archive);
		//print_r($this->navigation);
		//echo "</pre>";		
		//echo $page;
	}
	
	public function output() {
		
		$this->content = $this->render(VIEW.'archive_page',
													array(
														'archive' => $this->archive,
														'navigation' =>$this->navigation
														));
		$this->page = parent::output();
		return $this->page;
		
	}
	
}
?>
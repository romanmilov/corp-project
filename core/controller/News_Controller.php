<?php
defined('ICORP') or exit('Մուտքն արգելված է');

class News_Controller extends Base {
	
	protected $news_text;
	
	protected function input($params) {
		parent::input();
		
		$this->title .= "Նորություններ";
		
		
		if(isset($params['news_id'])) {
			$news_id = $this->clear_int($params['news_id']);
		}
		if($news_id) {
			$this->news_text = $this->ob_m->get_news_text($news_id);
			
			$this->keywords = $this->news_text['meta_k'];
			$this->discription = $this->news_text['meta_d'];
		}
	}
	
	protected function output() {
		
		$this->content = $this->render(VIEW.'news_page',array(
															'news_text' => $this->news_text
															));
		
		$this->page = parent::output();
		return $this->page;
	}
}
?>
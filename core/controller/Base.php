<?php

defined('ICORP') or exit('Մուտքն արգելված է');



abstract class Base extends Base_Controller {

	

	protected $ob_m;

	

	protected $title;

	

	protected $style;

	

	protected $script;

	

	protected $header;

	

	protected $header_menu;

	

	protected $content;

	

	protected $left_bar;

	

	protected $right_bar;

	

	protected $footer;

	

	protected $need_right_side = TRUE;

	

	protected $news, $pages,$catalog_type,$catalog_brands,$keywords,$discription;

	

	

	protected function input() {

		

		$this->title = "Արմ-Շին-Էներգո | ";

		

		foreach($this->styles as $style) {

			$this->style[] = SITE_URL.VIEW.$style;

		}

		

		foreach($this->scripts as $script) {

			$this->script[] = SITE_URL.VIEW.$script;

		}

				

		//Model - ի օբեկտների ստացում

		$this->ob_m = Model::get_instance();

		//Բազայից նորությունների դուրս բերում

		$this->news = $this->ob_m->get_news();

		//echo "<pre>";

		//print_r($this->news);

		//echo "</pre>";

		//Բազայից ստատիկ էջերի դուրս բերում

		$this->pages = $this->ob_m->get_pages();

		//echo "<pre>";

		//print_r($this->pages);

		//echo "</pre>";

		//Բազայից կատալոգի տեսակների դուրս բերում

		$this->catalog_type = $this->ob_m->get_catalog_type();

		//echo "<pre>";

		//print_r($this->catalog_type);

		//echo "</pre>";

		//Բազայից կատալոգի բրեմդների դուրս բերում

		$this->catalog_brands = $this->ob_m->get_catalog_brands();

		//echo "<pre>";

		//print_r($this->catalog_brands);

		//echo "</pre>";

		//Բազայից գլխավոր մենյուի դուրս բերում

		$this->header_menu = $this->ob_m->get_header_menu();

		//echo "<pre>";

		//print_r($this->header_menu);

		//echo "</pre>";

		

	}

	

	protected function output() {

		

		$this->left_bar = $this->render(VIEW.'left_bar',array(

															'pages'=>$this->pages,

															'types' => $this->catalog_type,

															'brands' => $this->catalog_brands

														));

		if($this->need_right_side) {
			$this->right_bar = $this->render(VIEW.'right_bar',array(

															'news' => $this->news

														));
		}

		

		if($need_right_side){

			$this->right_bar = $this->render(VIEW.'right_bar',array('news' => $this->news));

		}

		

		$this->footer = $this->render(VIEW.'footer', array(

														'pages' => $this->pages

														));

		$this->header = $this->render(VIEW.'header',array(

														'styles' => $this->style,

														'scripts' => $this->script,

														'header_menu' => $this->header_menu,

														'title' => $this->title,

														'keywords' => $this->keywords,

														'discription' => $this->discription

														));

		

		$page = $this->render(VIEW.'index',

										array(

											'header'=>$this->header,

											'left_bar' =>$this->left_bar,

											'content' => $this->content,

											'right_bar' => $this->right_bar,

											'footer' => $this->footer

											));

		return $page;	

								

	}

	

}

?>
<?php

defined('ICORP') or exit('Մուտքն արգելված է');

class Model {	

	static $instance;	

	public $ins_driver;

	

	

	static function get_instance() {

		if(self::$instance instanceof self) {

			return self::$instance;

		}

		return self::$instance = new self;

	}

	

	private function __construct() {

		

		try {

			$this->ins_driver = Model_Driver::get_instance();

		}

		catch(DbException $e) {

			exit();

		}

	}

	public function get_news() {

		$result = $this->ins_driver->select(

											array('news_id','news_title','news_anons','news_date'),

											'news',

											array(),

											'news_date',

											'DESC',

											3

											);

		$row = array();	

		foreach($result as $value) {

			$value['news_anons'] = substr($value['news_anons'],0,255);

			$value['news_anons'] = substr($value['news_anons'],0,strrpos($value['news_anons'],' '));

			

			$row[] = $value;

		}									

		return $row;									

	}

	public function get_pages($all = FALSE) {

		$result = $this->ins_driver->select(

											array('page_id','page_title','page_type'),

											'pages',

											array('page_type' => "'post','contact'"),

											'page_position',

											'ASC',

											FALSE,

											array("IN")

											);

		return $result;									

	}

	public function get_catalog_type() {

		$result = $this->ins_driver->select(

											array('type_id','type_name'),

											'types'

											);

		return $result;									

	}

	public function get_catalog_brands() {

		$result = $this->ins_driver->select(

											array('brand_id','brand_name','parrent_id'),

											'brands'

											);

		$arr = array();									

		foreach($result as $item) {

			if($item['parrent_id'] == 0) {

				//Ծնողներ

				$arr[$item['brand_id']][] = $item['brand_name'];

			}

			else {

				//Երեխաներ

				$arr[$item['parrent_id']]['next_lvl'][$item['brand_id']] = $item['brand_name'];

			}

		}

		return $arr;									

	}

	public function get_home_page() {

		$result = $this->ins_driver->select(

											array('page_id','page_title','page_content','meta_k','meta_d'),

											'pages',

											array('page_type'=> 'home'),

											FALSE,

											FALSE,

											1

											);

		return $result[0];									

	}

	public function get_header_menu() {

		$result = $this->ins_driver->select(

											array('type_id','type_name'),

											'types',

											array('in_header' => "'1','2','3','4'"),

											'in_header',

											'ASC',

											4,

											array('IN')

											);

		$row = array();

		foreach($result as $item) {

			$item['type_name'] = str_replace(" ","<br />",$item['type_name']);

			$item['type_name'] = mb_convert_case($item['type_name'],MB_CASE_UPPER,"UTF-8");

			$row[] = $item;

		}																	

											

		return $row;									

		

	}

	public function get_news_text($news_id) {

		$result = $this->ins_driver->select(

											array('news_title','news_content','news_date','meta_k','meta_d'),

											'news',

											array('news_id' => $news_id)

											);

		return $result[0];									

	}

	public function get_page($page_id) {

		$result = $this->ins_driver->select(

											array('page_title','meta_k','meta_d','page_content'),

											'pages',

											array('page_id' => $page_id)

											);

		return $result[0];									

	}

	public function get_contacts() {

		

		$result = $this->ins_driver->select(

											array('page_id','page_title','page_content','meta_k','meta_d'),

											'pages',

											array('page_type'=>'contact')

											);									

		return $result[0];									

	}
	public function get_child($id) {
		$result = $this->ins_driver->select(
											array('brand_id'),
											'brands',
											array('parrent_id' => $id)
									);
		if($result) {
			$row = array();
			foreach	($result as $item) {
				$row[] = $item['brand_id'];
			}
			$row[] = $id;
			
			$res = implode(",",$row);	
											
			return $res;	
		}
		else {
			return FALSE;
		}
										
	}
	
	public function get_krohi($type,$id) {
		if($type == 'type') {
			$sql = "SELECT type_id, type_name
					FROM types
					WHERE type_id = $id";
		}
		
		if($type == "brand") {
			$sql = "(SELECT brand_id,brand_name
					FROM brands
					WHERE brand_id = (SELECT parrent_id FROM brands WHERE brand_id = $id))
					UNION
					(SELECT brand_id, brand_name FROM brands WHERE brand_id = $id)";
		}
		$result = $this->ins_driver->ins_db->query($sql);
		
		if(!$result) {
			throw new DbException("Բազային միացման սխալ".$this->ins_driver->ins_db->errno."|".$this->ins_driver->ins_db->error);	
		}
		if($result->num_rows == 0) {
			return FALSE;
		}
		$row = array();
		
		for($i = 0; $i < $result->num_rows;$i++) {
			$row[] = $result->fetch_assoc();
		}
		
		return $row;
	}
	public function get_product($id) {
		$result = $this->ins_driver->select(
											array('product_title','product_content','product_img','meta_k','meta_d'),
											'products',
											array('product_id' => $id,'public' => 1)			
											);
		return $result[0];									
	}

	

	

	

}



?>
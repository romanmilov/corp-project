<?php
defined('ICORP') or exit('Մուտքն արգելված է');

class Contacts_Controller extends Base {
	
	protected $contacts;
	
	protected function input($param = array()) {
		parent::input();
		
		$this->title .= "Հետադարձ կապ";
		
		$this->contacts = $this->ob_m->get_contacts();
		
		$this->keywords = $this->contacts['meta_k'];
		$this->keywords = $this->contacts['meta_d'];
	}
	
	protected function output() {
		
		$this->content = $this->render(VIEW.'contacts_page',array(
																'contacts' => $this->contacts
																));
		
		$this->page = parent::output();
		
		return $this->page;
	}
}
?>
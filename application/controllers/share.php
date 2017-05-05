<?php

class Share extends Controller {

	function share(){
		parent::Controller;
	}
	

	function share(){
		$this->load->helper('share');
		$this->load->view('index');
	}
}


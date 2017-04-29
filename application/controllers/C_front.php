<?php
defined('BASEPATH') or exit ('No direct script allowed ');

class C_front extends CI_Controller {

	public function index(){
		$data = array(
			'title' => 'SIPUMA - Home'
		);
		$this->load->view('front/Header');
		$this->load->view('Home');
		$this->load->view('front/Footer');
	}

	public function pengumuman(){
		$this->load->view('pengumuman');
	}
}

?>

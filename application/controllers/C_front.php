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

	public function info(){
		$this->load->helper('text');
		date_default_timezone_set('Asia/Jakarta');
		$slider_ar 	= $this->db->query('select * from artikel where category= "berita" order by rand() limit 3')->result_array();
		$berita		= $this->db->query('select * from artikel where category= "berita" order by id desc limit 6')->result_array();
		$pengumuman	= $this->db->query('select * from artikel where category= "pengumuman" order by id desc limit 6')->result_array();
		$data = array(
			'slider_ar' => $slider_ar,
			'berita'	=> $berita,
			'pengumuman' =>  $pengumuman,

		);


		$this->load->view('front/Header',$data);
		$this->load->view('pengumuman');
		$this->load->view('front/Footer');
	}


}

?>

<?php
defined('BASEPATH') or exit ('No direct script allowed ');

class C_front extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_admin');
	}

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
		$link_ex	= $this->db->query('select * from link_external order by id_link desc limit 6')->result_array();
		$data = array(
			'slider_ar' => $slider_ar,
			'berita'	=> $berita,
			'pengumuman' =>  $pengumuman,
			'link_ex'	=> $link_ex,

		);


		$this->load->view('front/Header',$data);
		$this->load->view('pengumuman');
		$this->load->view('front/Footer');
	}

	
//MELIHAT DETAIL KONTEN========================================================================================
	public function viewcontent($cat,$slug = ''){
		$this->load->helper('text');
		date_default_timezone_set('Asia/Jakarta');
		$slider_ar 	= $this->db->query('select * from artikel where category= "berita" order by rand() limit 3')->result_array();
		$berita		= $this->db->query('select * from artikel order by rand() limit 5')->result_array();
		$pengumuman	= $this->db->query('select * from artikel where category= "pengumuman" order by id desc limit 5')->result_array();
		$link_ex	= $this->db->query('select * from link_external order by id_link desc limit 6')->result_array();
		
		$data_konten		= $this->M_admin->getArtikel("where slug= '$slug'")->result_array();

		$data = array(
			'title'			=> strip_tags($data_konten[0]['title']),
			'description'	=> strip_tags(character_limiter($data_konten[0]['content'], 500)),
			'keyword'		=> strip_tags($data_konten[0]['title']),
			'slider_ar' 	=> $slider_ar,
			'berita'		=> $berita,
			'pengumuman' 	=>  $pengumuman,
			'link_ex'		=> $link_ex,
			'uri1'			=> $this->uri->segment(2),
			'uri2'			=> $this->uri->segment(3),
			'kode'			=>$data_konten[0]['id'],
			'judul'			=>$data_konten[0]['title'],
			'slug'			=>$data_konten[0]['slug'],
			'date'			=>$data_konten[0]['date'],
			'time'			=>$data_konten[0]['time'],
			'author'		=>$data_konten[0]['author'],
			'images'		=>$data_konten[0]['img_header'],
			'content'		=>$data_konten[0]['content'],
			'kategori'		=>$data_konten[0]['category'],
		);


		$this->load->view('front/Header',$data);
		$this->load->view('content_detail');
		$this->load->view('front/Footer');

	}
//END MELIHAT DETAIL KONTEN===================================================================================

function pengumuman($offset = 0){
	$this->load->helper('text');
	$slider_ar = $this->db->query('select * from artikel where category= "news" order by rand() limit 3')->result_array();
	$pengumuman 		= $this->db->query('select * from artikel where category= "pengumuman" order by id desc limit 3')->result_array();
	$link_ex 			= $this->db->query('select * from link_external order by id_link desc limit 5')->result_array();
	$data['base'] 			= $this->config->item('base_url');
	$data['title'] 			= 'Semua Pengumuman';
	$this->load->model('M_admin');
			
		$total 					= $this->M_admin->pengumuman_count();
		$per_pg = 3;
		$offset = $this->uri->segment(3);
		$this->load->library('pagination');
		$config['base_url']			= $data['base'].'/C_front/pengumuman/';
		$config['total_rows']		= $total;
		$config['per_page']			= $per_pg;
		$config['full_tag_open'] = '<div class="pagination"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div>';
		 
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['pagination']		= $this->pagination->create_links();
		$data['kueri']			= $this->M_admin->get_all_pengumuman($per_pg,$offset);
		$data['description']	= 'Semua Berita';
		$data['uri1']			= $this->uri->segment(2);
		$data['uri2']			= $this->uri->segment(3);
		$data['keyword']		= 'Semua Berita';
		$data['link_ex']		= $link_ex;

		$this->load->view('front/Header',$data);
		$this->load->view('pengumuman_all');
		$this->load->view('front/Footer');

}

function berita($offset = 0){
	$this->load->helper('text');
	$slider_ar = $this->db->query('select * from artikel where category= "news" order by rand() limit 3')->result_array();
	$berita		= $this->db->query('select * from artikel where category= "berita" order by id desc limit 3')->result_array();
	$link_ex 			= $this->db->query('select * from link_external order by id_link desc limit 5')->result_array();
	$data['base'] 			= $this->config->item('base_url');
	$data['title'] 			= 'Semua Berita';
	$this->load->model('M_admin');
			
		$total 					= $this->M_admin->berita_count();
		$per_pg = 6;
		$offset = $this->uri->segment(3);
		$this->load->library('pagination');
		$config['base_url']			= $data['base'].'/C_front/berita/';
		$config['total_rows']		= $total;
		$config['per_page']			= $per_pg;
		$config['full_tag_open'] = '<div class="pagination"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div>';
		 
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['pagination']		= $this->pagination->create_links();
		$data['kueri']			= $this->M_admin->get_all_berita($per_pg,$offset);
		$data['description']	= 'Semua Berita';
		$data['uri1']			= $this->uri->segment(2);
		$data['uri2']			= $this->uri->segment(3);
		$data['keyword']		= 'Semua Berita';
		$data['link_ex']		= $link_ex;

		$this->load->view('front/Header',$data);
		$this->load->view('berita_all');
		$this->load->view('front/Footer');

}

}

?>

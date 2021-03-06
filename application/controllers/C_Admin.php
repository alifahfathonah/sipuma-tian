<?php
defined('BASEPATH') or exit ('No script direct allowed');

class C_Admin extends CI_Controller{


  function __construct(){
  parent::__construct();
  $this->load->helper('Backlogout'); // helper back setelah logout
    backButtonHandle(); // ni fungsinya yg ada di helper sukasukalo
    $this->load->helper('form');
    $this->load->model('M_admin');
    $this->load->model('M_login');
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->helper('security');
  }


/*
|-----------------------------------------------------------------------------------------------------------------------
| BEGIN CRUD USER
|-----------------------------------------------------------------------------------------------------------------------
*/
  public function user(){
    $sudah_login = $this->session->userdata('sudah_login');
    $data['id_role'] = $this->session->userdata('id_role');
    $data['username'] = $this->session->userdata('username');

    if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
      redirect(base_url('C_Login'));
    }else {
      $data['user']=$this->M_admin->get_all_user();
      $this->load->view('element/Header_panel',$data);
      $this->load->view('element/V_Menu',$data);
      $this->load->view('admin/data_user');
      $this->load->view('element/Footer_panel',$data);
    }
  }

  public function user_add(){
    $data = array(
      'username' => $this->input->post('username'),
      'password' => md5($this->input->post('password')),
      'id_role'  => $this->input->post('id_role'),
    );

    $insert = $this->M_admin->adduser_db($data);
    echo json_encode(array("status" => TRUE));
  }

  public function ajax_edit($id) {
    $data = $this->M_admin->get_by_id($id);
    echo json_encode($data);
  }

  public function update_user() {
    $data = array(
        'username' => $this->input->post('username'),
        'password' => md5($this->input->post('password')),
        'id_role' => $this->input->post('id_role'),
      );
    $this->M_admin->upduser_db(array('id_user' => $this->input->post('id_user')), $data);
    echo json_encode(array("status" => TRUE));
  }

  public function delete_user($id) {
    $this->M_admin->deluser_db($id);
    echo json_encode(array("status" => TRUE));
  }


/*
|-----------------------------------------------------------------------------------------------------------------------
| END CRUD USER
|-----------------------------------------------------------------------------------------------------------------------
*/


/*
|----------------------------------------------------------------------------------------------------------------------
| BEGIN CRUD CONTENT
|-----------------------------------------------------------------------------------------------------------------------
*/
  function artikel(){
   $sudah_login = $this->session->userdata('sudah_login');
    $data['id_role'] = $this->session->userdata('id_role');
    $data['username'] = $this->session->userdata('username');
    $this->load->helper('text');
    if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
      redirect(base_url('C_Login'));
    }else {
      $data['artikel']=$this->M_admin->get_all_artikel();
      $this->load->view('element/Header_panel',$data);
      $this->load->view('element/V_Menu',$data);
      $this->load->view('admin/data_artikel');
      $this->load->view('element/Footer_panel',$data);
    }
}

function form_artikel(){
   $sudah_login = $this->session->userdata('sudah_login');
    $data['id_role'] = $this->session->userdata('id_role');
    $data['username'] = $this->session->userdata('username');

    date_default_timezone_set('Asia/Jakarta');
    //$user_data    = $this->M_admin->user()->result_array();
    $pages      = $this->M_admin->selectdata('artikel order by id')->result_array();
    $this->load->helper('text');
    $this->load->helper('url');


    $data2 = array(
      'title'     => 'Add Content Website',
      'kode'      => '',
      'judul'     => '',
      'slug'      => '',
      'author'    => '',
      'image'     => '',
      'content'   => '',
      'kategori'    => '',
      'status'    => '',
      'stat'      => 'new',
    );

    if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
      redirect(base_url('C_Login'));
    }else {
      $this->load->view('element/Header_panel',$data);
      $this->load->view('element/V_Menu',$data);
      $this->load->view('admin/artikel_form',$data2);
      $this->load->view('element/Footer_panel',$data);
    }
}

function artikelsave(){

    if($_POST){

      date_default_timezone_set('Asia/Jakarta');

      $this->load->helper('url');
      $this->load->library('image_lib');

      $kode     = $this->input->post('kode');
      $judul      = $this->input->post('judul');
      $slug       = url_title($judul, 'dash', TRUE);
      $date       = date('Y-m-d H:i:s');
      $time       = date('H:i:s');

      $user_data    = $this->M_admin->user()->result_array();
      $fullname     = $user_data[0]['username'];

      $author     = $fullname;
      $content    = $this->input->post('content');
      $kategori   = $this->input->post('kategori');
      $status     = $this->input->post('status');
      $stat       = $this->input->post('stat');


      if($stat == 'new'){

        if($_FILES['foto']['name'] != ""){
          $config['upload_path'] = 'file/artikel';
          $config['allowed_types'] = 'jpg|png|jpeg';
          $config['max_size'] = '2000';
          $config['remove_spaces'] = true;
          $config['overwrite'] = false;
          $config['encrypt_name'] = true;
          $config['max_width']  = '';
          $config['max_height']  = '';
          $this->load->library('upload','image_lib', $config);
          $this->upload->initialize($config);
          if (!$this->upload->do_upload('foto'))
          {
              print_r('Ukuran File Terlalu Besar. Maksimal 2Mb');
              exit();
          }
          else
          {
            $image = $this->upload->data();

            
            if ($image['file_name'])
            {
                $data['file1'] = $image['file_name'];
            }
            $img_header = $data['file1'];
          }
      }

        $data = array(
          'title'     => $judul,
          'slug'      => $slug,
          'date'      => $date,
          'time'      => $time,
          'img_header'  => $img_header,
          'author'    => $author,
          'content'   => $content,
          'category'    => $kategori,
          'status'    => $status,
        );

        $this->M_admin->insertdata('artikel',$data);
        redirect('C_Admin/artikel');

      }
      else {

        $this->db->where('id',$kode);
        $query  = $this->db->get('artikel');
        $row  = $query->row();

        unlink("./file/artikel/$row->img_header");

        if($_FILES['foto']['name'] != ""){
          $config['upload_path'] = 'file/artikel';
          $config['allowed_types'] = 'jpg|png|jpeg';
          $config['max_size'] = '2000';
          $config['remove_spaces'] = true;
          $config['overwrite'] = false;
          $config['encrypt_name'] = true;
          $config['max_width']  = '';
          $config['max_height']  = '';
          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          if (!$this->upload->do_upload('foto'))
          {
              print_r('Ukuran File Terlalu Besar. Maksimal 2Mb');
              exit();
          }
          else
          {
            $image = $this->upload->data();
            if ($image['file_name'])
            {
                $data['file1'] = $image['file_name'];
            }
            $img_header = $data['file1'];
          }
        }

        $data = array(
          'title'     => $judul,
          'slug'      => $slug,
          'date'      => $date,
          'time'      => $time,
          'img_header'  => $img_header,
          'author'    => $author,
          'content'   => $content,
          'category'    => $kategori,
          'status'    => $status,
        );

        $this->M_admin->updatedata('artikel',$data,array('id' => $kode));
        redirect('C_Admin/artikel');
      }

    }
    else {
      echo "Page Not Found";
    }

  }

  function artikeledit($kode = 0){
    $sudah_login = $this->session->userdata('sudah_login');
    $data['id_role'] = $this->session->userdata('id_role');
    $data['username'] = $this->session->userdata('username');

		date_default_timezone_set('Asia/Jakarta');
		$user_data 		= $this->M_admin->user()->result_array();
		$data_konten	= $this->M_admin->getArtikel("where id= '$kode' ")->result_array();
		$data2 = array(
			'title'			=> 'Edit Content Website',
			'user'			=> $user_data[0]['username'],
			'kode'			=> $data_konten[0]['id'],
			'judul'			=> $data_konten[0]['title'],
			'image'			=> $data_konten[0]['img_header'],
			'content'		=> $data_konten[0]['content'],
			'kategori'		=> $data_konten[0]['category'],
			'status'		=> $data_konten[0]['status'],
			'stat'			=> 'edit',
		);

    if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
      redirect(base_url('C_Login'));
    }else {
    $this->load->view('element/Header_panel',$data,$data2);
    $this->load->view('element/V_Menu',$data,$data2);
    $this->load->view('admin/artikel_form',$data2,$data);
    $this->load->view('element/Footer_panel',$data,$data2);
    }
	}

  function artikeldelete($kode = 0){

		$this->db->where('id',$kode);
		$query 	= $this->db->get('artikel');
		$row	= $query->row();

		unlink("./file/artikel/$row->img_header");

		$hasil	= $this->M_admin->deldata('artikel',array('id' => $kode));
		redirect('C_Admin/artikel');
	}

/*
|-----------------------------------------------------------------------------------------------------------------
| END CRUD CONTENT
|-----------------------------------------------------------------------------------------------------------------
*/

/*
|-----------------------------------------------------------------------------------------------------------------
| BEGIN CRUD LINK EKSTERNAL
|-----------------------------------------------------------------------------------------------------------------
*/
public function link_ex(){
    $sudah_login = $this->session->userdata('sudah_login');
    $data['id_role'] = $this->session->userdata('id_role');
    $data['username'] = $this->session->userdata('username');

    if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
      redirect(base_url('C_Login'));
    }else {
      $data['link_external']=$this->M_admin->get_all_link();
      $this->load->view('element/Header_panel',$data);
      $this->load->view('element/V_Menu',$data);
      $this->load->view('admin/data_linkex');
      $this->load->view('element/Footer_panel',$data);
    }
  }

  public function link_add(){
    $data = array(
      'id_link'  => $this->input->post('id_link'),
      'nama_link' => $this->input->post('nama_link'),
      'url' => $this->input->post('url'),
      
    );
    $insert = $this->M_admin->addlink_db($data);
    echo json_encode(array("status" => TRUE));
  }

  public function link_edit($id) {
    $data = $this->M_admin->get_by_idlink($id);
    echo json_encode($data);
  }

  public function update_link() {
    $data = array(
      'id_link'  => $this->input->post('id_link'),
      'nama_link' => $this->input->post('nama_link'),
      'url' => $this->input->post('url'),
      );
    $this->M_admin->updlink_db(array('id_link' => $this->input->post('id_link')), $data);
    echo json_encode(array("status" => TRUE));
  }

  public function delete_link($id) {
    $this->M_admin->dellink_db($id);
    echo json_encode(array("status" => TRUE));
  }
/*
|-----------------------------------------------------------------------------------------------------------------
| END CRUD LINK EKSTERNAL
|-----------------------------------------------------------------------------------------------------------------
*/



}

?>

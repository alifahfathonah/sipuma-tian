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
|-----------------------------------------------------------------------------------------------------------------
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
        
        $this->M_admin->insertdata('artikel',$data);
        redirect('C_Admin/artikel');

      }
      else {

        $this->db->where('id',$kode);
        $query  = $this->db->get('artikel');
        $row  = $query->row();
        
        unlink("./file/blog/$row->img_header");

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
        
        $this->m_admin->updatedata('artikel',$data,array('id' => $kode));
        redirect('panel/artikel');
      }

    }
    else {
      echo "Page Not Found";
    }

  }




}

/*
|-----------------------------------------------------------------------------------------------------------------
| END CRUD CONTENT
|-----------------------------------------------------------------------------------------------------------------
*/


?>
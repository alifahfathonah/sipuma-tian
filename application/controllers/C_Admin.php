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

    if($this->session->userdata('login') != TRUE)
    {
      redirect('panel');
    }
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

}
/*
|-----------------------------------------------------------------------------------------------------------------------
| END CRUD USER
|-----------------------------------------------------------------------------------------------------------------------
*/


/*
|-----------------------------------------------------------------------------------------------------------------------
| BEGIN CRUD CONTENT
|-----------------------------------------------------------------------------------------------------------------------
*/
  function artikel(){
  /*$sudah_login = $this->session->userdata('sudah_login');
  $data['id_role'] = $this->session->userdata('id_role');
  $data['username'] = $this->session->userdata('username');
  date_default_timezone_set('Asia/Jakarta');
  $artikel = $this->M_admin->selectdata('artikel order by id desc')->result_array();
  $this->load->helper('text');

  $data = array(
    'title' => 'Artikel Artikel Website',
    'artikel' => $artikel,
  );


  if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
    redirect(base_url('C_Login'));
  } else { 
    $this->load->view('front/Header',$data);
    $this->load->view('front/Artikel',$data);
    $this->load->view('front/Footer',$data);
  } */
    $this->load->view('front/Header');
    $this->load->view('front/Artikel');
    $this->load->view('front/Footer');


}

/*
|-----------------------------------------------------------------------------------------------------------------------
| END CRUD CONTENT
|-----------------------------------------------------------------------------------------------------------------------
*/

?>
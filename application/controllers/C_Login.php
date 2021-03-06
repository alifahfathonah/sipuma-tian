<?php 
defined('BASEPATH') or exit ('No script direct allowed');

class C_Login extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->helper('Backlogout'); // helper back setelah logout
    backButtonHandle(); // ni fungsinya yg ada di helper sukasukalo
    $this->load->helper('form');
    $this->load->model('M_login');
    $this->load->model('M_admin');
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->helper('security');
  }

  public function index(){
    $sudah_login = $this->session->userdata('sudah_login');
    $data['id_role'] = $this->session->userdata('id_role');
    $data['username'] = $this->session->userdata('username');

     if(empty($sudah_login))
     {
      $this->load->view('Login_form',$data);
     }
     else
     {
        $id_role = $this->session->userdata('id_role');
        if($id_role == '1')
        {
          header('location:'.base_url().'C_Login/login_administrator');
        }
        else if($id_role == '2'){
          header('location:'.base_url().'C_Login/login_hima');
        }
     } 
  }


  // Method sebagai administrator
  public function login_administrator(){
    $sudah_login = $this->session->userdata('sudah_login');
    $data['id_role'] = $this->session->userdata('id_role');
    $data['username'] = $this->session->userdata('username');

    if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
      redirect(base_url('C_Login'));
    }else { 
      $this->load->view('element/Header_panel',$data);
      $this->load->view('element/V_Menu',$data);
      $this->load->view('admin/Index_admin',$data);
      $this->load->view('element/Footer_panel',$data);
    }
  }


  //Method login sebagai admin hima
  public function login_hima(){
    $sudah_login = $this->session->userdata('sudah_login');
    $data['id_role'] = $this->session->userdata('id_role');
    $data['username'] = $this->session->userdata('username');

    if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
      redirect(base_url('C_Login'));
    }else { 
      $this->load->view('element/Header_panel',$data);
      $this->load->view('element/V_Menu',$data);
       $this->load->view('admin/Index_user',$data);
      $this->load->view('element/Footer_panel',$data);
    }
  }

  // Method proses login
  public function login(){
    $this->load->library('form_validation');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $enkripsi_pass = hash('md5',$password);

    $data_from_db = $this->M_login->cek_user($username,$enkripsi_pass);// mengambil data dari fungsi cek_user
    $hitung_datadb = count($data_from_db);

    $this->form_validation->set_rules('username','Username','required|trim|xss_clean');// melakukan validasi form login
    $this->form_validation->set_rules('password','Password','required|trim|xss_clean');

    if ($this->form_validation->run()==FALSE) {// jika validasi terjadi kesalahan maka akan kembali ke halaman awal
      $this->load->view('login_form');// ^ dengan menampilkan error
      
    }else {
      if ($hitung_datadb>0) {
        $session_data = array('id_user'=>$data_from_db[0]->id_user,
                               'username'=>$data_from_db[0]->username,
                               'id_role'=>$data_from_db[0]->id_role,
                               'sudah_login'=>TRUE);// data yang di gunakan untuk session yang di ambil dari database di atas

        $this->session->set_userdata($session_data);// set data-data session
  
        if($this->session->userdata('id_role')=='1') {
        redirect('C_Login/login_administrator');
      }elseif ($this->session->userdata('id_role')=='2') {
        redirect('C_Login/login_hima');
      }

      }else {
        $this->session->set_flashdata('notif','Gagal! Username atau password salah');
        redirect(base_url('C_Login'));
      }
    }

  }

  //Method Logout
  function logout(){
    $this->session->sess_destroy();// menghancurkan session
     redirect(base_url('C_Login'));// melakukan kembali ke fungsi home 
  }

//==========================================================================================

  
}

?>
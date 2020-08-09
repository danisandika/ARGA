<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CLogin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */



  public function __construct()
  {
    parent::__construct();
    $this->load->model("MLogin");
    $this->load->library("session");
    $this->load->helper(array('string','text'));
  }



  public function cekLogin()
  {
    $post = $this->input->post();
    if(isset($post["username"])&&isset($post["password"]))
    {
      //cek user
      $login= $this->MLogin;

      $dataUser = $login->getByUsernamePassword();
      //$dataUser = $user->getByUsernamePassword();

      if($dataUser != null && $dataUser->status == 1)
      {
        $dataRole = $login->getRoleID($dataUser->id_role);
        //Adding data to Session
        $username= $dataUser->username;
        $role    = $dataRole->nama_role;
        $userID  = $dataUser->id_user;
        $roleID  = $dataRole->id_role;
        $userFoto= $dataUser->foto_profil;

        $newdata = array(
          'user_username'=>$username,
          'user_role'=>$role,
          'user_userID'=>$userID,
          'user_roleID'=>$roleID,
          'user_profil'=>$userFoto
        );
        $this->session->set_userdata($newdata);

        if($role == "superadministrator")
        {
          redirect(site_url('CDashboard/index'));
        }
        else if ($role == "Administrator") {
          redirect(site_url('CDashboard/index2'));
        }else if ($role == "Sales") {
          redirect(site_url('CDashboard/index3'));
        }
        else {
          $this->session->set_flashdata("failed", "Data User Not Found");
          redirect(site_url('CLogin/index'));
        }
      }else {
        $this->session->set_flashdata("failed", "Username or Password incorrect");
        redirect(site_url('CLogin/index'));
      }
    }else {
      $this->session->set_flashdata("failed", "Fill the Column Username or Password");
      redirect(site_url('CLogin/index'));
    }
  }

  public function index()
	{
    $this->load->view('login');
	}

  public function logout()
    {
        //$this->session->unset_userdata($this->session->userdata('user_userID'));
        $this->session->sess_destroy();
        redirect('CLogin');
    }
}

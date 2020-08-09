<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CProfil extends CI_Controller {

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
     $this->load->model("MProfil");
     $this->load->library("session");
		 $this->load->helper(array('string','text'));
		 $this->load->library('form_validation');

   }

	public function editpassadmin($id)
	{
     $pass = $this->MProfil;
     $data["user"]=$pass->getByID($id);
     $data['title']= "Edit Password";
     $this->load->view('Administrator/header',$data);
     $this->load->view('Administrator/editPassword',$data);
     $this->load->view('Administrator/footer');
	}

  public function editpasssales($id)
	{
     $pass = $this->MProfil;
     $data["user"]=$pass->getByID($id);
     $data['title']= "Edit Password";
     $this->load->view('Sales/header',$data);
     $this->load->view('Sales/editPassword',$data);
     $this->load->view('Sales/footer');
	}

  public function editpassSuperadmin($id)
	{
     $pass = $this->MProfil;
     $data["user"]=$pass->getByID($id);
     $data['title']= "Edit Password";
     $this->load->view('SuperAdministrator/header',$data);
     $this->load->view('SuperAdministrator/editPassword',$data);
     $this->load->view('SuperAdministrator/footer');
	}


  public function updatePassAdmin() {
    // code...
    $profil = $this->MProfil;

    $result = $profil->update();
    if($result>0){
      $this->session->set_flashdata("success", "Data updated successfully");
      redirect(site_url('CDashboard/index2'));
    }else{
      $this->session->set_flashdata("failed", "Data failed to update");
      redirect(site_url('CDashboard/index2'));
    }
  }

  public function updatePassSales() {
    // code...
    $profil = $this->MProfil;

    $result = $profil->update();
    if($result>0){
      $this->session->set_flashdata("success", "Data updated successfully");
      redirect(site_url('CDashboard/index3'));
    }else{
      $this->session->set_flashdata("failed", "Data failed to update");
      redirect(site_url('CDashboard/index3'));
    }
  }

  public function updatePassSuperadmin() {
    // code...
    $profil = $this->MProfil;

    $result = $profil->update();
    if($result>0){
      $this->session->set_flashdata("success", "Data updated successfully");
      redirect(site_url('CDashboard/index'));
    }else{
      $this->session->set_flashdata("failed", "Data failed to update");
      redirect(site_url('CDashboard/index'));
    }
  }


  public function editUserSuperAdmin($id=null){
    if(!isset($id))redirect('CDashboard/index');

    $pass = $this->MProfil;
    $data["user"]=$pass->getByID($id);
    $data['title']= "Edit User";
    $this->load->view('SuperAdministrator/header',$data);
    $this->load->view('SuperAdministrator/editUser',$data);
    $this->load->view('SuperAdministrator/footer');
  }

  public function updateUserSuperadmin() {
    // code...
    $profil = $this->MProfil;
    $validation = $this->form_validation;

    if ($this->input->post('username') != $this->session->userdata('user_username')) {
      $validation->set_rules($profil->rules());
    }else{
      $validation->set_rules($profil->rulesUpdate());
    }

    if ($this->form_validation->run() == TRUE){
    $result = $profil->updateUser();
    if($result>0){
      $this->session->set_flashdata("successUser", "Data updated successfully");
      redirect(site_url('CLogin/index'));
    }else{
      $this->session->set_flashdata("failed", "Data failed to update");
      redirect(site_url('CDashboard/index'));
    }
    }else{
        $this->editUserSuperAdmin($this->session->userdata('user_userID'));
    }
  }



  public function editUserAdmin($id=null){
    if(!isset($id))redirect('CDashboard/index2');

    $pass = $this->MProfil;
    $data["user"]=$pass->getByID($id);
    $data['title']= "Edit User";
    $this->load->view('Administrator/header',$data);
    $this->load->view('Administrator/editUser',$data);
    $this->load->view('Administrator/footer');
  }

  public function updateUseradmin() {
    // code...
    $profil = $this->MProfil;
    $validation = $this->form_validation;

    if ($this->input->post('username') != $this->session->userdata('user_username')) {
      $validation->set_rules($profil->rules());
    }else{
      $validation->set_rules($profil->rulesUpdate());
    }

    if ($this->form_validation->run() == TRUE){
    $result = $profil->updateUser();
    if($result>0){
      $this->session->set_flashdata("successUser", "Data updated successfully");
      redirect(site_url('CLogin/index'));
    }else{
      $this->session->set_flashdata("failed", "Data failed to update");
      redirect(site_url('CDashboard/index2'));
    }
    }else{
        $this->editUserAdmin($this->session->userdata('user_userID'));
    }
  }


  public function editUserSales($id=null){
    if(!isset($id))redirect('CDashboard/index3');

    $pass = $this->MProfil;
    $data["user"]=$pass->getByID($id);
    $data['title']= "Edit User";
    $this->load->view('Sales/header',$data);
    $this->load->view('Sales/editUser',$data);
    $this->load->view('Sales/footer');
  }

  public function updateUserSales() {
    // code...
    $profil = $this->MProfil;
    $validation = $this->form_validation;

    if ($this->input->post('username') != $this->session->userdata('user_username')) {
      $validation->set_rules($profil->rules());
    }else{
      $validation->set_rules($profil->rulesUpdate());
    }

    if ($this->form_validation->run() == TRUE){
    $result = $profil->updateUser();
    if($result>0){
      $this->session->set_flashdata("successUser", "Data updated successfully");
      redirect(site_url('CLogin/index'));
    }else{
      $this->session->set_flashdata("failed", "Data failed to update");
      redirect(site_url('CDashboard/index3'));
    }
    }else{
        $this->editUserSales($this->session->userdata('user_userID'));
    }
  }





}

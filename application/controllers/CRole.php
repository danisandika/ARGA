<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRole extends CI_Controller {

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
     $this->load->model("MRole");
     $this->load->library("session");
		 $this->load->helper(array('string','text'));
		 $this->load->library('form_validation');

   }

	public function index()
	{
     $data['role']=$this->MRole->getAll();
     $data['title']= "Role";
     $this->load->view('SuperAdministrator/header',$data);
     $this->load->view('SuperAdministrator/Role/vRole',$data);
     $this->load->view('SuperAdministrator/footer');
	}

  public function tRole()
  {
    $data['title']= "Role";
    $this->load->view('SuperAdministrator/header',$data);
    $this->load->view('SuperAdministrator/Role/tRole',$data);
    $this->load->view('SuperAdministrator/footer');
  }


  public function tambah()
  {
      $role = $this->MRole;
      $validation = $this->form_validation;
			$validation->set_rules($role->rules());

	    if ($this->form_validation->run() == TRUE){
	       $result = $role->save();
    	    if($result>0){
            $this->session->set_flashdata("success", "Data Saved Successfully");
            redirect(site_url('CRole/index'));
          }else{
            $this->session->set_flashdata("failed", "Data Failed to Save");
            redirect(site_url('CRole/index'));
          }
  		}else{
          $this->tRole();
  	  }
  }


    public function edit($id=null)
	  {
	    if(!isset($id))redirect('CRole/index');

	    $role = $this->MRole;
	    $data["role"]=$role->getByID($id);
	    $data['title']= "Role";
	    $this->load->view('SuperAdministrator/header',$data);
	    $this->load->view('SuperAdministrator/Role/eRole',$data);
	    $this->load->view('SuperAdministrator/footer');
	  }


    public function update()
    {
          $role = $this->MRole;

	        $result = $role->update();
    	    if($result>0){
            $this->session->set_flashdata("success", "Data updated successfully");
            redirect(site_url('CRole/index'));
          }else{
            $this->session->set_flashdata("failed", "Data failed to update");
            redirect(site_url('CRole/index'));
          }
    }

    public function delete($id=null)
		{
      if(!isset($id))redirect('CRole/index');
			$data = $this->MRole->cekRole($id);
			if(empty($data))
			{
				$result = $this->MRole->delete($id);
				if($result>0){
          $this->session->set_flashdata("success", "Data Deleted successfully");
          redirect(site_url('CRole/index'));
				}else {
          $this->session->set_flashdata("failed", "Data failed to Delete");
          redirect(site_url('CRole/index'));
				}
			}
			else
			{
				  $this->session->set_flashdata("failed", "Data failed to Delete");
					echo "<script>history.go(-1)</script>";
			}

		}

    public function active($id=null)
		{
      if(!isset($id))redirect('CRole/index');
			$result = $this->MRole->active($id);
			if($result>0){
        $this->session->set_flashdata("success", "Data Activate successfully");
        redirect(site_url('CRole/index'));
			}else {
        $this->session->set_flashdata("failed", "Data failed to Activate");
        redirect(site_url('CRole/index'));
			}
		}
}

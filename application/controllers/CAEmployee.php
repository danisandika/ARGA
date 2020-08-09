<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CAEmployee extends CI_Controller {

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
			 $this->load->model("MEmployee");
			 $this->load->library("session");
			 $this->load->helper(array('string','text'));
			 $this->load->library('form_validation');

	 }

	public function index()
	{
		 $data['user']=$this->MEmployee->getAll();
     $data['title']= "Employee";
     $this->load->view('Administrator/header',$data);
     $this->load->view('Administrator/Employee/vEmployee',$data);
     $this->load->view('Administrator/footer');
	}

  public function tEmployee()
  {
		$data['role']=$this->MEmployee->getRole();
    $data['title']= "Employee";
    $this->load->view('Administrator/header',$data);
    $this->load->view('Administrator/Employee/tEmployee',$data);
    $this->load->view('Administrator/footer');
  }

	public function tambah()
  {
      $em = $this->MEmployee;
      $validation = $this->form_validation;
			$validation->set_rules($em->rules());

	    if ($this->form_validation->run() == TRUE){
	       $result = $em->save();
    	    if($result>0){
            $this->session->set_flashdata("success", "Data Saved Successfully");
            redirect(site_url('CAEmployee/index'));
          }else{
            $this->session->set_flashdata("failed", "Data Failed to Save");
            redirect(site_url('CAEmployee/index'));
          }
  		}else{
          $this->tEmployee();
  	  }
  }


    public function edit($id=null)
	  {
	    if(!isset($id))redirect('CAEmployee/index');

			$data['role']=$this->MEmployee->getRole();
	    $em = $this->MEmployee;
	    $data["em"]=$em->getByID($id);
	    $data['title']= "Employee";
	    $this->load->view('Administrator/header',$data);
	    $this->load->view('Administrator/Employee/eEmployee',$data);
	    $this->load->view('Administrator/footer');
	  }


    public function update()
    {
			$post = $this->input->post();


			$em = $this->MEmployee;
			$validation = $this->form_validation;
			$validation->set_rules($em->rulesUpdate());

			if ($this->form_validation->run() == TRUE){
	        $result = $em->update();
    	    if($result>0){
            $this->session->set_flashdata("success", "Data updated successfully");
            redirect(site_url('CAEmployee/index'));
          }else{
            $this->session->set_flashdata("failed", "Data failed to update");
            redirect(site_url('CAEmployee/index'));
          }
				}else{
						$this->edit($post["id_user"]);
				}
    }

    public function delete($id=null)
		{
      if(!isset($id))redirect('CAEmployee/index');

				$result = $this->MEmployee->delete($id);
				if($result>0){
          $this->session->set_flashdata("success", "Data Deleted successfully");
          redirect(site_url('CAEmployee/index'));
				}else {
          $this->session->set_flashdata("failed", "Data failed to Delete");
          redirect(site_url('CAEmployee/index'));
				}
		}


    public function active($id=null)
		{
      if(!isset($id))redirect('CAEmployee/index');
			$result = $this->MEmployee->active($id);
			if($result>0){
        $this->session->set_flashdata("success", "Data Activate successfully");
        redirect(site_url('CAEmployee/index'));
			}else {
        $this->session->set_flashdata("failed", "Data failed to Activate");
        redirect(site_url('CAEmployee/index'));
			}
		}
}

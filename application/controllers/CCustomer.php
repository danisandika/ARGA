<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CCustomer extends CI_Controller {

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
     $this->load->model("MCustomer");
     $this->load->library("session");
		 $this->load->helper(array('string','text'));
		 $this->load->library('form_validation');

   }

	public function index()
	{
     $data['cust']=$this->MCustomer->getAll();
     $data['title']= "Customer";
     $this->load->view('SuperAdministrator/header',$data);
     $this->load->view('SuperAdministrator/Customer/vCustomer',$data);
     $this->load->view('SuperAdministrator/footer');
	}

  public function tCustomer()
  {
    $data['title']= "Customer";
    $this->load->view('SuperAdministrator/header',$data);
    $this->load->view('SuperAdministrator/Customer/tCustomer',$data);
    $this->load->view('SuperAdministrator/footer');
  }


  public function tambah()
  {
      $cust = $this->MCustomer;
      $validation = $this->form_validation;
			$validation->set_rules($cust->rules());

	    if ($this->form_validation->run() == TRUE){
	        $result = $cust->save();
    	    if($result>0){
            $this->session->set_flashdata("success", "Data Saved Successfully");
            redirect(site_url('CCustomer/index'));
          }else{
            $this->session->set_flashdata("failed", "Data Failed to Save");
            redirect(site_url('CCustomer/index'));
          }
  		}else{
          $this->tCustomer();
  	  }
  }


    public function edit($id=null)
	  {
	    if(!isset($id))redirect('CCustomer/index');

	    $cust = $this->MCustomer;
	    $data["cust"]=$cust->getByID($id);
	    $data['title']= "Customer";
	    $this->load->view('SuperAdministrator/header',$data);
	    $this->load->view('SuperAdministrator/Customer/eCustomer',$data);
	    $this->load->view('SuperAdministrator/footer');
	  }


    public function update()
    {
          $cust = $this->MCustomer;

	        $result = $cust->update();
    	    if($result>0){
            $this->session->set_flashdata("success", "Data updated successfully");
            redirect(site_url('CCustomer/index'));
          }else{
            $this->session->set_flashdata("failed", "Data failed to update");
            redirect(site_url('CCustomer/index'));
          }
    }

    public function delete($id=null)
		{
      if(!isset($id))redirect('CCustomer/index');

				$result = $this->MCustomer->delete($id);
				if($result>0){
          $this->session->set_flashdata("success", "Data Deleted successfully");
          redirect(site_url('CCustomer/index'));
				}else {
          $this->session->set_flashdata("failed", "Data failed to Delete");
          redirect(site_url('CCustomer/index'));
				}

		}

    public function active($id=null)
		{
      if(!isset($id))redirect('CCustomer/index');

			$result = $this->MCustomer->active($id);
			if($result>0){
        $this->session->set_flashdata("success", "Data Activate successfully");
        redirect(site_url('CCustomer/index'));
			}else {
        $this->session->set_flashdata("failed", "Data failed to Activate");
        redirect(site_url('CCustomer/index'));
			}
		}
}

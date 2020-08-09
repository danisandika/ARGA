<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CSActivity extends CI_Controller {

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
     $this->load->model("MActivity");
     $this->load->model("MRevenue");
     $this->load->library("session");
		 $this->load->helper(array('string','text'));
		 $this->load->library('form_validation');

   }

	public function index()
	{
     $data['ap']=$this->MActivity->getAll();
     $data['title']= "Activity Plan";
     $this->load->view('Sales/header',$data);
     $this->load->view('Sales/AP/Activity_Plan',$data);
     $this->load->view('Sales/footer');
	}

  public function tActivity()
  {
    $data['cus']=$this->MActivity->getAllCustomer();
    $data['title']= "Activity Plan";
    $this->load->view('Sales/header',$data);
    $this->load->view('Sales/AP/tActivity',$data);
    $this->load->view('Sales/footer');
  }

  public function get_data_customer()
  {
    $id = $this->input->post('customer_id');
    $data=$this->MActivity->get_data_customer_byID($id);
    echo json_encode($data);
  }


  public function tambah()
  {
      $act = $this->MActivity;
      $validation = $this->form_validation;
			$validation->set_rules($act->rules());

	    if ($this->form_validation->run() == TRUE){
	       $result = $act->save();
    	    if($result>0){
            $this->session->set_flashdata("success", "Data Saved Successfully");
            redirect(site_url('CSActivity/index'));
          }else{
            $this->session->set_flashdata("failed", "Data Failed to Save");
            redirect(site_url('CSActivity/index'));
          }
  		}else{
          $this->tActivity();
  	  }
  }


    public function get_detail_revenue()
    {
      $id = $this->input->get('id');
	    $get_ap = $this->MRevenue->get_detail_revenue($id);
	    echo json_encode($get_ap);
	    exit();
    }
}

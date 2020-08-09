<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CSVisit extends CI_Controller {

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
     $this->load->model("MVisit");
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
      $this->load->view('Sales/Visit/Activity_Plan',$data);
      $this->load->view('Sales/footer');
 	}

  public function view_Visit($id)
  {
     //$id = $this->uri->segment(3);
     $data['visit']=$this->MVisit->get_VisitByAP($id);
     $data['visitid']=$id;
     $data['title']= "Visit";
     $this->load->view('Sales/header',$data);
     $this->load->view('Sales/Visit/Visit',$data);
     $this->load->view('Sales/footer');
  }

  public function tVisit($id)
  {
    //$id = $this->uri->segment(3);
    $data['title']= "Visit";
    $data['visitid']=$id;
    $data['customerVisit']=$this->MVisit->get_data_customerByVisit($id);
    $this->load->view('Sales/header',$data);
    $this->load->view('Sales/Visit/tVisit',$data);
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
      $vis = $this->MVisit;
      $validation = $this->form_validation;
			$validation->set_rules($vis->rules());
      $post = $this->input->post();
      $id = $post["ap_id"];

	    if ($this->form_validation->run() == TRUE){
	       $result = $vis->save();
    	    if($result>0){
            $this->session->set_flashdata("success", "Data Saved Successfully");
            redirect(site_url('CSVisit/view_visit/'.$id));
          }else{
            $this->session->set_flashdata("failed", "Data Failed to Save");
            redirect(site_url('CSVisit/view_visit/'.$id));
          }
  		}else{
          $this->tVisit($id);
  	  }
  }


    public function get_detail_revenue()
    {
      $id = $this->input->get('id');
	    $get_ap = $this->MRevenue->get_detail_revenue($id);
	    echo json_encode($get_ap);
	    exit();
    }

    public function editVisit($id=null)
    {
      if(!isset($id))redirect('CSVisit/index');


      $vis = $this->MVisit;
      $data["visit"]=$vis->getByID($id);
      $data['title']= "Visit";
      $this->load->view('Sales/header',$data);
      $this->load->view('Sales/Visit/eVisit',$data);
      $this->load->view('Sales/footer');
    }

    public function update()
    {
          $vis = $this->MVisit;
          $validation = $this->form_validation;
    			$validation->set_rules($vis->rules());
          $post = $this->input->post();
          $id = $post["visit_id_ap"];
          $idv= $post["visit_id"];



          if ($this->form_validation->run() == TRUE){
          $result = $vis->update();
          if($result>0){
            $this->session->set_flashdata("success", "Data updated successfully");
            redirect(site_url('CSVisit/view_visit/'.$id));
          }else{
            $this->session->set_flashdata("failed", "Data Failed to Save");
            redirect(site_url('CSVisit/view_visit/'.$id));
          }
        }else{
            $this->editVisit($idv);
        }
    }
}

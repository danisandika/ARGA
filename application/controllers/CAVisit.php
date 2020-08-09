<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CAVisit extends CI_Controller {

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
      $data['user']=$this->MVisit->getSales();
      $data['title']= "Visit";
      $this->load->view('Administrator/header',$data);
      $this->load->view('Administrator/Visit/list_sales',$data);
      $this->load->view('Administrator/footer');
 	}

  public function list_activity($id_user)
  {
     $data['ap']=$this->MVisit->getActivitybySales($id_user);
     $data['title']= "Visit";
     $this->load->view('Administrator/header',$data);
     $this->load->view('Administrator/Visit/list_activity',$data);
     $this->load->view('Administrator/footer');
  }

  public function list_visit($id)
  {
     $data['visit']=$this->MVisit->get_VisitByAP($id);
     $data['title']= "Visit";
     $this->load->view('Administrator/header',$data);
     $this->load->view('Administrator/Visit/list_visit',$data);
     $this->load->view('Administrator/footer');
  }

  public function get_detail_revenue()
  {
    $id = $this->input->get('id');
    $get_ap = $this->MRevenue->get_detail_revenue($id);
    echo json_encode($get_ap);
    exit();
  }

}

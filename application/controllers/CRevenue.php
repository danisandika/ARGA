<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRevenue extends CI_Controller {

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
      $data['user']=$this->MRevenue->getSales();
      $data['title']= "Revenue";
      $this->load->view('SuperAdministrator/header',$data);
      $this->load->view('SuperAdministrator/Revenue/list_sales',$data);
      $this->load->view('SuperAdministrator/footer');
 	}

  public function list_revenue($id_user)
  {
     $data['rev']=$this->MRevenue->getRevenuebySales($id_user);
     $data['title']= "Revenue";
     $this->load->view('SuperAdministrator/header',$data);
     $this->load->view('SuperAdministrator/Revenue/list_revenue',$data);
     $this->load->view('SuperAdministrator/footer');
  }

  public function edit_revenue($id=null)
  {
    if(!isset($id))redirect('CRevenue/index');

    $data['rev']=$this->MRevenue->get_revenueAP($id);
    $data['title']= "Revenue";
    $this->load->view('SuperAdministrator/header',$data);
    $this->load->view('SuperAdministrator/Revenue/eRevenue',$data);
    $this->load->view('SuperAdministrator/footer');
  }

  public function get_detail_revenue()
  {
    $id = $this->input->get('id');
    $get_ap = $this->MRevenue->get_detail_revenue($id);
    echo json_encode($get_ap);
    exit();
  }


  public function update()
  {
      $rev = $this->MRevenue;
      $post = $this->input->post();
      $id_ap = $post["id_sales"];

      $result = $rev->update();
      if($result>0){
        $this->session->set_flashdata("success", "Data updated successfully");
        redirect(site_url('CRevenue/list_revenue/'.$id_ap));
      }else{
        $this->session->set_flashdata("failed", "Data failed to update");
        redirect(site_url('CRevenue/list_revenue/'.$id_ap));
      }
  }

}

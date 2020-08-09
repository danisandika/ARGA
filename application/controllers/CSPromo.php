<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CSPromo extends CI_Controller {

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
     $this->load->model("MPromo");
     $this->load->library("session");
		 $this->load->helper(array('string','text'));
		 $this->load->library('form_validation');

   }

	public function index()
	{
     $data['promo']=$this->MPromo->getAll();
     $data['title']= "Promotion";
     $this->load->view('Sales/header',$data);
     $this->load->view('Sales/Promo/vPromo',$data);
     $this->load->view('Sales/footer');
	}

  public function tPromo()
  {
    $data['title']= "Promotion";
    $this->load->view('Sales/header',$data);
    $this->load->view('Sales/Promo/tPromo',$data);
    $this->load->view('Sales/footer');
  }


  public function tambah()
  {
      $promo = $this->MPromo;
      $validation = $this->form_validation;
			$validation->set_rules($promo->rules());

	    if ($this->form_validation->run() == TRUE){
	       $result = $promo->save();
    	    if($result>0){
            $this->session->set_flashdata("success", "Data Saved Successfully");
            redirect(site_url('CSPromo/index'));
          }else{
            $this->session->set_flashdata("failed", "Data Failed to Save");
            redirect(site_url('CSPromo/index'));
          }
  		}else{
          $this->tPromo();
  	  }
  }


    public function edit($id=null)
	  {
	    if(!isset($id))redirect('CSPromo/index');

	    $promo = $this->MPromo;
	    $data["promo"]=$promo->getByID($id);
	    $data['title']= "Promotion";
	    $this->load->view('Sales/header',$data);
	    $this->load->view('Sales/Promo/ePromo',$data);
	    $this->load->view('Sales/footer');
	  }


    public function update()
    {
          $promo = $this->MPromo;

	        $result = $promo->update();
    	    if($result>0){
            $this->session->set_flashdata("success", "Data updated successfully");
            redirect(site_url('CSPromo/index'));
          }else{
            $this->session->set_flashdata("failed", "Data failed to update");
            redirect(site_url('CSPromo/index'));
          }
    }

    public function delete($id=null)
		{
      if(!isset($id))redirect('CSPromo/index');
				$result = $this->MPromo->delete($id);
				if($result>0){
          $this->session->set_flashdata("success", "Data Deleted successfully");
          redirect(site_url('CSPromo/index'));
				}else {
          $this->session->set_flashdata("failed", "Data failed to Delete");
          redirect(site_url('CSPromo/index'));
				}

		}

    public function active($id=null)
		{
      if(!isset($id))redirect('CSPromo/index');
			$result = $this->MPromo->active($id);
			if($result>0){
        $this->session->set_flashdata("success", "Data Activate successfully");
        redirect(site_url('CSPromo/index'));
			}else {
        $this->session->set_flashdata("failed", "Data failed to Activate");
        redirect(site_url('CSPromo/index'));
			}
		}
}

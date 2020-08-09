<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CAInfo extends CI_Controller {

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
     $this->load->model("MInfo");
     $this->load->library("session");
		 $this->load->helper(array('string','text'));
		 $this->load->library('form_validation');

   }

	public function index()
	{
     $data['info']=$this->MInfo->getAll();
     $data['title']= "Information";
     $this->load->view('Administrator/header',$data);
     $this->load->view('Administrator/Info/vInfo',$data);
     $this->load->view('Administrator/footer');
	}

  public function tInfo()
  {
    $data['title']= "Information";
    $this->load->view('Administrator/header',$data);
    $this->load->view('Administrator/Info/tInfo',$data);
    $this->load->view('Administrator/footer');
  }


  public function tambah()
  {
      $info = $this->MInfo;
      $validation = $this->form_validation;
			$validation->set_rules($info->rules());

	    if ($this->form_validation->run() == TRUE){
	       $result = $info->save();
    	    if($result>0){
            $this->session->set_flashdata("success", "Data Saved Successfully");
            redirect(site_url('CAInfo/index'));
          }else{
            $this->session->set_flashdata("failed", "Data Failed to Save");
            redirect(site_url('CAInfo/index'));
          }
  		}else{
          $this->tInfo();
  	  }
  }


    public function edit($id=null)
	  {
	    if(!isset($id))redirect('CAInfo/index');

	    $info = $this->MInfo;
	    $data["info"]=$info->getByID($id);
	    $data['title']= "Information";
	    $this->load->view('Administrator/header',$data);
	    $this->load->view('Administrator/Info/eInfo',$data);
	    $this->load->view('Administrator/footer');
	  }


    public function update()
    {
          $info = $this->MInfo;

	        $result = $info->update();
    	    if($result>0){
            $this->session->set_flashdata("success", "Data updated successfully");
            redirect(site_url('CAInfo/index'));
          }else{
            $this->session->set_flashdata("failed", "Data failed to update");
            redirect(site_url('CAInfo/index'));
          }
    }

    public function delete($id=null)
		{
      if(!isset($id))redirect('CAInfo/index');
				$result = $this->MInfo->delete($id);
				if($result>0){
          $this->session->set_flashdata("success", "Data Deleted successfully");
          redirect(site_url('CAInfo/index'));
				}else {
          $this->session->set_flashdata("failed", "Data failed to Delete");
          redirect(site_url('CAInfo/index'));
				}

		}

    public function active($id=null)
		{
      if(!isset($id))redirect('CAInfo/index');
			$result = $this->MInfo->active($id);
			if($result>0){
        $this->session->set_flashdata("success", "Data Activate successfully");
        redirect(site_url('CAInfo/index'));
			}else {
        $this->session->set_flashdata("failed", "Data failed to Activate");
        redirect(site_url('CAInfo/index'));
			}
		}
}

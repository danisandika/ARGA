<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CDashboard extends CI_Controller {

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
	   $this->load->model("MDashboard");
	   $this->load->library("session");
		 $this->load->helper(array('string','text'));
		 $this->load->library('form_validation');

	 }

	public function index()
	{
		$data['totalincome']=$this->MDashboard->getTotalIncome();
		$data['incomeMonth']=$this->MDashboard->getIncomeperMonth();
		$data['visit']=$this->MDashboard->getVisitperMonth();
		$data['salesTotal']=$this->MDashboard->getTotalbySales();
		$data['resume']=$this->MDashboard->getResumeRevenue();
     $data['title']= "Dashboard";
     $this->load->view('SuperAdministrator/header',$data);
     $this->load->view('SuperAdministrator/dashboard',$data);
     $this->load->view('SuperAdministrator/footer');
	}

	public function index3()
	{
			$data['totalincome']=$this->MDashboard->getTotalIncome();
			$data['incomeMonth']=$this->MDashboard->getIncomeperMonth();
			$data['visit']=$this->MDashboard->getVisitperMonth();
			$data['salesTotal']=$this->MDashboard->getTotalbySales();
			$data['resume']=$this->MDashboard->getResumeRevenue();
     $data['title']= "Dashboard";
     $this->load->view('Sales/header',$data);
     $this->load->view('Sales/dashboard',$data);
     $this->load->view('Sales/footer');
	}

	public function index2()
	{
		 $data['totalincome']=$this->MDashboard->getTotalIncome();
		 $data['incomeMonth']=$this->MDashboard->getIncomeperMonth();
		 $data['visit']=$this->MDashboard->getVisitperMonth();
		 $data['salesTotal']=$this->MDashboard->getTotalbySales();
		 $data['resume']=$this->MDashboard->getResumeRevenue();
     $data['title']= "Dashboard";
     $this->load->view('Administrator/header',$data);
     $this->load->view('Administrator/dashboard',$data);
     $this->load->view('Administrator/footer',$data);
	}
}

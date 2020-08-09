<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MActivity extends CI_Model
{
  private $_table = "tb_activity_plan";


  public function rules()
    {
        return [
                ['field' => 'customer_id',
                'label' => 'Customer Name',
                'rules' => 'required',
              ],
              ['field' => 'ap_plan_revenue',
              'label' => 'Plan Revenue',
              'rules' => 'required|numeric',
            ],
              ['field' => 'ap_visit',
              'label' => 'Plan Visit',
              'rules' => 'required|numeric',
            ],
              ['field' => 'ap_bulan_tahun',
              'label' => 'Month Year',
              'rules' => 'required',
            ]
        ];
    }

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll()
  {
    $this->db->select('ap.*, (r.rev_total/ap.ap_plan_revenue*100) as precentage, (SELECT COUNT(visit_id_ap) from tb_visit where tb_visit.visit_id_ap =  ap.ap_id) as countVisit, (SELECT customer_name from tb_customer where tb_customer.customer_id = ap.ap_id_customer) as customer_name');
    $this->db->from('tb_activity_plan as ap');
    $this->db->join('tb_revenue as r', 'r.rev_id_ap = ap.ap_id');
    $this->db->where('ap.ap_id_sales',$this->session->userdata('user_userID'));
    $this->db->order_by('ap.ap_bulan_tahun', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  public function getAllCustomer()
  {
    $this->db->select('*')
             ->from('tb_customer')
             ->where('status',1);
    $query = $this->db->get();
    return $query->result();
  }

  public function get_data_customer_byID($id)
  {
    return $this->db->get_where('tb_customer',["customer_id"=>$id])->row();
  }

  public function getByID($id)
  {
    return $this->db->get_where($this->_table,["id_role"=>$id])->row();
  }

  public function get_count_ap()
  {
    $this->db->select('ap_id')
             ->from('tb_activity_plan')
             ->order_by("ap_id","desc")
             ->limit(1);
    $query = $this->db->get();
    return $query->row()->ap_id;
  }

  public function save()
  {
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();
    $IDAP = $this->get_count_ap() + 1;


		$this->ap_id = $IDAP;
    $this->ap_id_sales = $this->session->userdata('user_userID');
    $this->ap_id_customer = $post["customer_id"];
    $this->ap_plan_revenue = $post["ap_plan_revenue"];
    $this->ap_visit = $post["ap_visit"];
    $this->ap_bulan_tahun = $post["ap_bulan_tahun"];

    $this->db->insert($this->_table,$this);


    $revenue=array(
        'rev_id_ap'=>$IDAP
      );

		return $this->db->insert('tb_revenue',$revenue);
  }



    public function getSales(){
      $this->db->select('u.*');
      $this->db->from('tb_user as u');
      $this->db->join('tb_role as r','u.id_role=r.id_role');
      $this->db->where('nama_role','SALES');
      $query = $this->db->get();
      return $query->result();
    }

    public function getActivitybySales($id)
    {
      $this->db->select('ap.*, (r.rev_total/ap.ap_plan_revenue*100) as precentage, (SELECT COUNT(visit_id_ap) from tb_visit where tb_visit.visit_id_ap =  ap.ap_id) as countVisit, (SELECT customer_name from tb_customer where tb_customer.customer_id = ap.ap_id_customer) as customer_name');
      $this->db->from('tb_activity_plan as ap');
      $this->db->join('tb_revenue as r', 'r.rev_id_ap = ap.ap_id');
      $this->db->where('ap.ap_id_sales',$id);
      $this->db->order_by('ap.ap_bulan_tahun', 'DESC');
      $query = $this->db->get();
      return $query->result();
    }



}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MVisit extends CI_Model
{
  private $_table = "tb_visit";

  public function rules()
    {
        return [

              ['field' => 'visit_date',
              'label' => 'Date Visit',
              'rules' => 'required',
            ],
              ['field' => 'visit_type',
              'label' => 'Type',
              'rules' => 'required',
            ],
            ['field' => 'visit_activity',
            'label' => 'Visit Activity',
            'rules' => 'required',
          ]
        ];
    }


  public function get_VisitByAP($id)
  {
      return $this->db->get_where($this->_table,["visit_id_ap"=>$id])->result();
  }

  public function get_data_customerByVisit($id)
  {
    $this->db->select('ap.*,(SELECT customer_name from tb_customer where tb_customer.customer_id = ap.ap_id_customer) as customer_name');
    $this->db->from('tb_activity_plan as ap');
    $this->db->where('ap.ap_id',$id);
    $this->db->where('ap.ap_id_sales',$this->session->userdata('user_userID'));
    $this->db->order_by('ap.ap_bulan_tahun', 'DESC');
    $query = $this->db->get();
    return $query->row();
  }


  public function save()
  {
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();


    $this->visit_id_ap = $post["ap_id"];
    $this->visit_tanggal = $post["visit_date"];
    $this->visit_jenis_FU = $post["visit_type"];
    $this->visit_kegiatan = $post["visit_activity"];
    $this->visit_result_FU = $post["visit_result"];
    $this->visit_problem = $post["visit_problem"];

    return  $this->db->insert($this->_table,$this);

  }


  public function getByID($id)
  {
    return $this->db->get_where($this->_table,["visit_id"=>$id])->row();
  }

  public function update(){
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();


    $this->visit_id_ap = $post["visit_id_ap"];
    $this->visit_tanggal = $post["visit_date"];
    $this->visit_jenis_FU = $post["visit_type"];
    $this->visit_kegiatan = $post["visit_activity"];
    $this->visit_result_FU = $post["visit_result"];
    $this->visit_problem = $post["visit_problem"];

    return $this->db->update($this->_table,$this,array('visit_id'=>$post['visit_id']));
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
    $this->db->select('ap.*, (SELECT COUNT(visit_id_ap) from tb_visit where tb_visit.visit_id_ap =  ap.ap_id) as countVisit,((SELECT COUNT(visit_id_ap) from tb_visit where tb_visit.visit_id_ap =  ap.ap_id)/ap.ap_visit*100) as percentage, (SELECT customer_name from tb_customer where tb_customer.customer_id = ap.ap_id_customer) as customer_name');
    $this->db->from('tb_activity_plan as ap');
    $this->db->join('tb_revenue as r', 'r.rev_id_ap = ap.ap_id');
    $this->db->where('ap.ap_id_sales',$id);
    $this->db->order_by('ap.ap_bulan_tahun', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }




}

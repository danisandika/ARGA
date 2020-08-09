<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MRevenue extends CI_Model
{
  private $_table = "tb_revenue";


  public function rules()
    {
        return [
                ['field' => 'rev_week1',
                'label' => 'Week 1',
                'rules' => 'numeric|required',
              ],
                ['field' => 'rev_week2',
                'label' => 'Week 2',
                'rules' => 'required|numeric',
              ],
                ['field' => 'rev_week3',
                'label' => 'Week 3',
                'rules' => 'numeric|required',
              ],
                ['field' => 'rev_week4',
                'label' => 'Week 4',
                'rules' => 'numeric|required',
              ],
                ['field' => 'rev_sisa',
                'label' => 'Rest Revenue',
                'rules' => 'numeric|required',
              ]
        ];
    }


  public function get_detail_revenue($id)
  {
      return $this->db->get_where($this->_table,["rev_id_ap"=>$id])->row();
  }

  public function getSalesRevenue(){
  $this->db->select('ap.*, (r.rev_total/ap.ap_plan_revenue*100) as precentage,r.*,
  (SELECT customer_name from tb_customer where tb_customer.customer_id = ap.ap_id_customer) as customer_name');
  $this->db->from('tb_activity_plan as ap');
  $this->db->join('tb_revenue as r', 'r.rev_id_ap = ap.ap_id');
  $this->db->where('ap.ap_id_sales',$this->session->userdata('user_userID'));
  $this->db->order_by('ap.ap_bulan_tahun', 'DESC');
  $query = $this->db->get();
  return $query->result();
  }

  public function getSales(){
    $this->db->select('u.*');
    $this->db->from('tb_user as u');
    $this->db->join('tb_role as r','u.id_role=r.id_role');
    $this->db->where('nama_role','SALES');
    $query = $this->db->get();
    return $query->result();
  }

  public function getRevenuebySales($id){
    $this->db->select('ap.*, (r.rev_total/ap.ap_plan_revenue*100) as precentage,r.*,
    (SELECT customer_name from tb_customer where tb_customer.customer_id = ap.ap_id_customer) as customer_name');
    $this->db->from('tb_activity_plan as ap');
    $this->db->join('tb_revenue as r', 'r.rev_id_ap = ap.ap_id');
    $this->db->where('ap.ap_id_sales',$id);
    $this->db->order_by('ap.ap_bulan_tahun', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }


  public function get_revenueAP($id)
  {
    $this->db->select('ap.*,r.*,
    (SELECT CONCAT(id_karyawan," / ",nama) from tb_user where tb_user.id_user = ap.ap_id_sales) as sales_name,
    (SELECT customer_name from tb_customer where tb_customer.customer_id = ap.ap_id_customer) as customer_name');
    $this->db->from('tb_activity_plan as ap');
    $this->db->join('tb_revenue as r', 'r.rev_id_ap = ap.ap_id');
    $this->db->where('ap.ap_id',$id);
    $this->db->order_by('ap.ap_bulan_tahun', 'DESC');
    $query = $this->db->get();
    return $query->row();
  }

  public function update()
  {
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();

    $this->rev_week1 = $post["rev_week1"];
    $this->rev_week2 = $post["rev_week2"];
    $this->rev_week3 = $post["rev_week3"];
    $this->rev_week4 = $post["rev_week4"];
    $this->rev_sisa  = $post["rev_sisa"];
    $this->rev_total = $post["rev_week1"] + $post["rev_week2"] + $post["rev_week3"] + $post["rev_week4"];

    return $this->db->update($this->_table,$this,array('rev_id_ap'=>$post['rev_id_ap']));
  }

}

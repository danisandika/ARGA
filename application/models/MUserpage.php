<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MUserpage extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function getTotalIncome(){
    $this->db->select('SUM(r.rev_total) as total');
    $this->db->from('tb_revenue as r');
    $this->db->join('tb_activity_plan as a','a.ap_id=r.rev_id_ap');
    $this->db->where('YEAR(a.ap_bulan_tahun)',date('Y'));
    $query = $this->db->get();
    return $query->row();
  }

  public function getCountInfo(){
    return $this->db->count_all_results('tb_info');
  }

  public function getCountPromo(){
    return $this->db->count_all_results('tb_promo');
  }

  public function getCountCustomer(){
    return $this->db->count_all_results('tb_customer');
  }


  public function getAllInfo()
  {
    $this->db->select('*,(select nama as namauser from tb_user where tb_info.modby = tb_user.id_user) as modifiedby');
    $this->db->from('tb_info');
    $this->db->order_by('moddate', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }


  public function getAllPromo()
  {
    $this->db->select('*,(select nama as namauser from tb_user where tb_promo.modby = tb_user.id_user) as modifiedby');
    $this->db->from('tb_promo');
    $this->db->order_by('moddate', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }


}

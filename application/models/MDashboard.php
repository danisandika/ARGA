<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MDashboard extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function getTotalIncome(){
    $this->db->select('SUM(r.rev_total) as total,SUM(r.rev_sisa) as rest');
    $this->db->from('tb_revenue as r');
    $this->db->join('tb_activity_plan as a','a.ap_id=r.rev_id_ap');
    $this->db->where('YEAR(a.ap_bulan_tahun)',date('Y'));
    $query = $this->db->get();
    return $query->row();
  }


  public function getIncomeperMonth()
  {
    $this->db->select('SUM(r.rev_total) as income,DATE_FORMAT(a.ap_bulan_tahun, "%M") as date');
    $this->db->from('tb_revenue as r');
    $this->db->join('tb_activity_plan as a','a.ap_id=r.rev_id_ap');
    $this->db->where('YEAR(a.ap_bulan_tahun)',date('Y'));
    $this->db->group_by(array('YEAR(a.ap_bulan_tahun)','MONTH(a.ap_bulan_tahun)'));
    $query = $this->db->get();
    return $query->result();
  }

  public function getVisitperMonth()
  {
    $this->db->select('COUNT(visit_id) as vis,(select nama as namauser from tb_user where a.ap_id_sales = tb_user.id_user) as visname');
    $this->db->from('tb_visit as v');
    $this->db->join('tb_activity_plan as a','a.ap_id=v.visit_id_ap');
    $this->db->where('MONTH(a.ap_bulan_tahun)',date('m'));
    $this->db->group_by('a.ap_id_sales');
    $query = $this->db->get();
    return $query->result();
  }


  public function getTotalbySales(){
    $this->db->select('SUM(r.rev_total) as total,u.nama as namauser,DATE_FORMAT(a.ap_bulan_tahun, "%M") as date');
    $this->db->from('tb_activity_plan as a');
    $this->db->join('tb_revenue as r','a.ap_id=r.rev_id_ap');
    $this->db->join('tb_user as u','a.ap_id_sales=u.id_user');
    $this->db->where('YEAR(a.ap_bulan_tahun)',date('Y'));
    $this->db->group_by(array('YEAR(a.ap_bulan_tahun)','MONTH(a.ap_bulan_tahun)','a.ap_id_sales'));
    $query = $this->db->get();
    return $query->result();
  }


  public function getResumeRevenue()
  {
    $this->db->SELECT('u.nama as sales,a.ap_plan_revenue as plan,r.rev_total as revenue,r.rev_sisa as sisa,a.ap_bulan_tahun as date,(r.rev_total/a.ap_plan_revenue*100) as precentage');
    $this->db->from('tb_activity_plan as a');
    $this->db->join('tb_revenue as r','a.ap_id=r.rev_id_ap');
    $this->db->join('tb_user as u','a.ap_id_sales=u.id_user');
    $this->db->where('u.id_role',3);
    $this->db->order_by('YEAR(a.ap_bulan_tahun) DESC');
    $this->db->order_by('MONTH(a.ap_bulan_tahun) DESC');
    $query = $this->db->get();
    return $query->result();
  }


}

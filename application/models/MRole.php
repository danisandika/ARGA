<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MRole extends CI_Model
{
  private $_table = "tb_role";


  public function rules()
    {
        return [
                ['field' => 'role_name',
                'label' => 'Role Name',
                'rules' => 'required|is_unique[tb_role.nama_role]',
                ]
        ];
    }

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll()
  {
    $this->db->select('*,(select nama as namauser from tb_user where tb_role.creaby = tb_user.id_user) as createby,(select nama as namauser from tb_user where tb_role.modby = tb_user.id_user) as modifiedby');
    $this->db->from('tb_role');
    $query = $this->db->get();
    return $query->result();
  }


  public function getByID($id)
  {
    return $this->db->get_where($this->_table,["id_role"=>$id])->row();
  }

  public function save()
  {
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();

		$this->nama_role = $post["role_name"];
    $this->deskripsi = $post["description"];

    //Creaby and ModBy
    $this->session->userdata('user_userID');
    $this->creadate = $dateNow;
    $this->status = 1;
		return $this->db->insert($this->_table,$this);
  }

  public function update()
  {
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();

    $this->nama_role = $post["role_name"];
    $this->deskripsi = $post["description"];

    //Mod By
    $this->modby = $this->session->userdata('user_userID');
    $this->moddate = $dateNow;
		return $this->db->update($this->_table,$this,array('id_role'=>$post['id_role']));
  }

  public function delete($id)
  {
    $this->status = 0;
    //$this->modby = $this->session->userdata('user_userID');
    $this->modby = $this->session->userdata('user_userID');
    $this->moddate = date("Y-m-d H:i:s");
    return $this->db->update($this->_table,$this,array('id_role'=>$id));
  }

  public function active($id)
  {
    $this->status = 1;
    //$this->modby = $this->session->userdata('user_userID');
    $this->modby   = $this->session->userdata('user_userID');
    $this->moddate = date("Y-m-d H:i:s");
    return $this->db->update($this->_table,$this,array('id_role'=>$id));
  }

    public function cekRole($id)
		{
      $this->db->select('*');
      $this->db->from('tb_user');
      $this->db->where('status',1);
      $this->db->where('id_role',$id);
      $query = $this->db->get();
      return $query->result();
		}



}

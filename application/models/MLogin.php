<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MLogin extends CI_Model
{
  private $_table = "tb_user";
  private $__table = "tb_role";

  public function __construct()
  {
        parent::__construct();
  }

  public function getByUsernamePassword()
  {
    $post1 = $this->input->post();
    $username=$post1["username"];
    $password=$post1["password"];
    $array = array('username' => $username,'password'=> $password );
    $query = $this->db->get_where($this->_table,$array);
    return $query->row();

  }


  public function getRoleID($IDRole)
  {
    return $this->db->get_where($this->__table,["id_role"=>$IDRole])->row();
  }


}

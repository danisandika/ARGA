<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MCustomer extends CI_Model
{
  private $_table = "tb_customer";


  public function rules()
    {
        return [
                ['field' => 'customer_no',
                'label' => 'Customer No',
                'rules' => 'required|numeric|is_unique[tb_customer.customer_no]',
              ],
                ['field' => 'customer_name',
                'label' => 'Name',
                'rules' => 'required',
              ],
                ['field' => 'customer_channel',
                'label' => 'Channel',
                'rules' => 'required',
              ]
        ];
    }

    public function rulesUpdate()
      {
        return [
                ['field' => 'customer_no',
                'label' => 'Customer No',
                'rules' => 'required|numeric',
              ],
                ['field' => 'customer_name',
                'label' => 'Name',
                'rules' => 'required',
              ],
                ['field' => 'customer_channel',
                'label' => 'Channel',
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
    $this->db->select('*,(select nama as namauser from tb_user where tb.creaby = tb_user.id_user) as createby,(select nama as namauser from tb_user where tb.modby = tb_user.id_user) as modifiedby');
    $this->db->from('tb_customer as tb');
    $query = $this->db->get();
    return $query->result();
  }


  public function getByID($id)
  {
    return $this->db->get_where($this->_table,["customer_id"=>$id])->row();
  }

  public function save()
  {
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();

		$this->customer_no = $post["customer_no"];
    $this->customer_name = $post["customer_name"];
    $this->customer_channel = $post["customer_channel"];
    $this->customer_alamat = $post["customer_alamat"];


    //Creaby and ModBy
    $this->creaby = $this->session->userdata('user_userID');
    $this->creadate = $dateNow;
    $this->status = 1;
		return $this->db->insert($this->_table,$this);
  }

  public function update()
  {
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();

    $this->customer_no = $post["customer_no"];
    $this->customer_name = $post["customer_name"];
    $this->customer_channel = $post["customer_channel"];
    $this->customer_alamat = $post["customer_alamat"];

    //Mod By
    $this->modby = $this->session->userdata('user_userID');
    $this->moddate = $dateNow;
		return $this->db->update($this->_table,$this,array('customer_id'=>$post['customer_id']));
  }

  public function delete($id)
  {
    $this->status = 0;
    //$this->modby = $this->session->userdata('user_userID');
    $this->modby = $this->session->userdata('user_userID');
    $this->moddate = date("Y-m-d H:i:s");
    return $this->db->update($this->_table,$this,array('customer_id'=>$id));
  }

  public function active($id)
  {
    $this->status = 1;
    //$this->modby = $this->session->userdata('user_userID');
    $this->modby   = $this->session->userdata('user_userID');
    $this->moddate = date("Y-m-d H:i:s");
    return $this->db->update($this->_table,$this,array('customer_id'=>$id));
  }


}

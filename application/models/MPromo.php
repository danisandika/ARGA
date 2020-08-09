<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPromo extends CI_Model
{
  private $_table = "tb_promo";


  public function rules()
    {
        return [
                ['field' => 'promo',
                'label' => 'Promo Name',
                'rules' => 'required|is_unique[tb_promo.promo]',
              ]
        ];
    }

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll()
  {
    $this->db->select('*,(select nama as namauser from tb_user where tb_promo.modby = tb_user.id_user) as modifiedby');
    $this->db->from('tb_promo');
    $this->db->order_by('moddate', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }


  public function getByID($id)
  {
    return $this->db->get_where($this->_table,["id_promo"=>$id])->row();
  }

  public function _uploadfile($nama)
	{
		  $config['upload_path']          = './upload/promo/';
	    $config['allowed_types']        = 'pdf|doc|docx|xls|csv|xlsx';
	    $config['file_name']            = $nama;
	    $config['overwrite']		       	= true;
	    $config['max_size']             = 5200; // 5MB
	    // $config['max_width']            = 1024;
	    // $config['max_height']           = 768;

	    $this->load->library('upload', $config);
      $this->upload->initialize($config);
	    if ($this->upload->do_upload('promo_file')) {
	        return $this->upload->data("file_name");
	    }
      //echo $this->upload->display_errors();
	    return "default.pdf";
	}

  public function save()
  {
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();

		$this->promo = $post["promo"];
    $this->deskripsi = $post["deskripsi"];
    $this->promo_file = $this->_uploadfile($this->input->post("promo"));

    //Creaby and ModBy
    $this->modby = $this->session->userdata('user_userID');
    $this->moddate = $dateNow;
    $this->status = 1;
		return $this->db->insert($this->_table,$this);
  }

  public function update()
  {
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();

		$this->promo = $post["promo"];
    $this->deskripsi = $post["deskripsi"];
    if (!empty($_FILES["promo_file"]["name"])) {
        $this->promo_file = $this->_uploadfile($this->input->post("promo"));
    } else {
        $this->promo_file = $post["promo_file_old"];
    }

    //Mod By
    $this->modby = $this->session->userdata('user_userID');
    $this->moddate = $dateNow;
		return $this->db->update($this->_table,$this,array('id_promo'=>$post['id_promo']));
  }

  public function delete($id)
  {
    $this->status = 0;
    //$this->modby = $this->session->userdata('user_userID');
    $this->modby = $this->session->userdata('user_userID');
    $this->moddate = date("Y-m-d H:i:s");
    return $this->db->update($this->_table,$this,array('id_promo'=>$id));
  }

  public function active($id)
  {
    $this->status = 1;
    //$this->modby = $this->session->userdata('user_userID');
    $this->modby   = $this->session->userdata('user_userID');
    $this->moddate = date("Y-m-d H:i:s");
    return $this->db->update($this->_table,$this,array('id_promo'=>$id));
  }



}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MInfo extends CI_Model
{
  private $_table = "tb_info";


  public function rules()
    {
        return [
                ['field' => 'info_name',
                'label' => 'Info Name',
                'rules' => 'required|is_unique[tb_info.nama_info]',
                ]
        ];
    }

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll()
  {
    $this->db->select('*,(select nama as namauser from tb_user where tb_info.modby = tb_user.id_user) as modifiedby');
    $this->db->from('tb_info');
    $this->db->order_by('moddate', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }


  public function getByID($id)
  {
    return $this->db->get_where($this->_table,["id_info"=>$id])->row();
  }

  public function save()
  {
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();

		$this->nama_info = $post["info_name"];
    $this->desc_info = $post["desc_info"];
    $this->info_file = $this->_uploadfile($this->input->post("info_name"));

    //Creaby and ModBy
    $this->modby = $this->session->userdata('user_userID');
    $this->moddate = $dateNow;
    $this->status = 1;
		return $this->db->insert($this->_table,$this);
  }

  public function _uploadfile($nama)
	{
		  $config['upload_path']          = './upload/info/';
	    $config['allowed_types']        = 'pdf|doc|docx|xls|csv|xlsx';
	    $config['file_name']            = $nama;
	    $config['overwrite']		       	= true;
	    $config['max_size']             = 5200; // 5MB
	    // $config['max_width']            = 1024;
	    // $config['max_height']           = 768;

	    $this->load->library('upload', $config);
      $this->upload->initialize($config);
	    if ($this->upload->do_upload('info_file')) {
	        return $this->upload->data("file_name");
	    }
      //echo $this->upload->display_errors();
	    return "default.pdf";
	}

  public function update()
  {
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();

    $this->nama_info = $post["info_name"];
    $this->desc_info = $post["desc_info"];
    if (!empty($_FILES["info_file"]["name"])) {
        $this->info_file = $this->_uploadfile($this->input->post("info_name"));
    } else {
        $this->info_file = $post["info_file_old"];
    }

    //Mod By
    $this->modby = $this->session->userdata('user_userID');
    $this->moddate = $dateNow;
		return $this->db->update($this->_table,$this,array('id_info'=>$post['id_info']));
  }

  public function delete($id)
  {
    $this->status = 0;
    //$this->modby = $this->session->userdata('user_userID');
    $this->modby = $this->session->userdata('user_userID');
    $this->moddate = date("Y-m-d H:i:s");
    return $this->db->update($this->_table,$this,array('id_info'=>$id));
  }

  public function active($id)
  {
    $this->status = 1;
    //$this->modby = $this->session->userdata('user_userID');
    $this->modby   = $this->session->userdata('user_userID');
    $this->moddate = date("Y-m-d H:i:s");
    return $this->db->update($this->_table,$this,array('id_info'=>$id));
  }



}

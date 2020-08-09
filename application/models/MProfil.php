<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MProfil extends CI_Model
{
  private $_table = "tb_user";


    public function rules()
      {
          return [
                  ['field' => 'nama',
                  'label' => 'Name',
                  'rules' => 'required',
                ],
                  ['field' => 'no_telp',
                  'label' => 'Phone',
                  'rules' => 'numeric',
                ],
                  ['field' => 'email',
                  'label' => 'Email',
                  'rules' => 'valid_email|required',
                ],
                  ['field' => 'username',
                  'label' => 'Username',
                  'rules' => 'required|trim|is_unique[tb_user.username]',
                ]
          ];
      }

      public function rulesUpdate()
        {
            return [
                    ['field' => 'nama',
                    'label' => 'Name',
                    'rules' => 'required',
                  ],
                    ['field' => 'no_telp',
                    'label' => 'Phone',
                    'rules' => 'numeric',
                  ],
                    ['field' => 'email',
                    'label' => 'Email',
                    'rules' => 'valid_email|required',
                  ],
                    ['field' => 'username',
                    'label' => 'Username',
                    'rules' => 'required',
                  ]
            ];
        }

  public function __construct()
  {
    parent::__construct();
  }



  public function getByID($id)
  {
    return $this->db->get_where($this->_table,["id_user"=>$id])->row();
  }



  public function update()
  {
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();

    $this->password = $post["repassword"];

    //Mod By
    $this->modby = $this->session->userdata('user_userID');
    $this->moddate = $dateNow;
		return $this->db->update($this->_table,$this,array('id_user'=>$this->session->userdata('user_userID')));
  }

  public function updateUser()
  {
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();

    $this->nama = $post["nama"];
    $this->alamat = $post["alamat"];
    $this->no_telp = $post["no_telp"];
    $this->tgl_lahir = $post["tgl_lahir"];
    $this->email = $post["email"];
    $this->jenis_kelamin = $post["jenis_kelamin"];

    $this->username = $post["username"];

    if (!empty($_FILES["foto_profil"]["name"])) {
        $this->foto_profil = $this->_uploadfile($this->session->userdata('user_userID'));
    } else {
        $this->foto_profil = $post["old_foto"];
    }

    //Mod By
    $this->modby = $this->session->userdata('user_userID');
    $this->moddate = $dateNow;
    return $this->db->update($this->_table,$this,array('id_user'=>$this->session->userdata('user_userID')));
  }


  public function _uploadfile($nama)
  {
      $config['upload_path']          = './upload/profil/';
      $config['allowed_types']        = 'jpg|jpeg|gif|png|bmp|tiff|raw';
      $config['file_name']            = $nama;
      $config['overwrite']		       	= true;
      $config['max_size']             = 5200; // 5MB
      // $config['max_width']            = 1024;
      // $config['max_height']           = 768;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if ($this->upload->do_upload('foto_profil')) {
          return $this->upload->data("file_name");
      }
      //echo $this->upload->display_errors();
      return "default.jpg";
  }


    public function getRole()
		{
      $this->db->select('*');
      $this->db->from('tb_role');
      $this->db->where('status',1);
      $query = $this->db->get();
      return $query->result();
		}


}

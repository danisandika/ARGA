<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MEmployee extends CI_Model
{
  private $_table = "tb_user";


  public function rules()
    {
        return [
                ['field' => 'employee_id',
                'label' => 'Employee ID',
                'rules' => 'required|is_unique[tb_user.id_karyawan]',
              ],
                ['field' => 'employee_name',
                'label' => 'Name',
                'rules' => 'required',
              ],
                ['field' => 'employee_phone',
                'label' => 'Phone',
                'rules' => 'numeric',
              ],
                ['field' => 'employee_email',
                'label' => 'Email',
                'rules' => 'valid_email|is_unique[tb_user.email]|required',
              ]
        ];
    }

    public function rulesUpdate()
      {
          return [
                  ['field' => 'employee_id',
                  'label' => 'Employee ID',
                  'rules' => 'required',
                ],
                  ['field' => 'employee_name',
                  'label' => 'Name',
                  'rules' => 'required',
                ],
                  ['field' => 'employee_phone',
                  'label' => 'Phone',
                  'rules' => 'numeric',
                ],
                  ['field' => 'employee_email',
                  'label' => 'Email',
                  'rules' => 'valid_email|required',
                ]
          ];
      }

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll()
  {
    $this->db->select('*,(select nama as namauser from tb_user where tb.creaby = tb_user.id_user) as createby,(select nama as namauser from tb_user where tb.modby = tb_user.id_user) as modifiedby, (select nama_role as namarole from tb_role where tb.id_role = tb_role.id_role) as nama_role');
    $this->db->from('tb_user as tb');
    $query = $this->db->get();
    return $query->result();
  }


  public function getByID($id)
  {
    return $this->db->get_where($this->_table,["id_user"=>$id])->row();
  }

  public function save()
  {
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();

		$this->id_karyawan = $post["employee_id"];
    $this->id_role = $post["employee_role"];
    $this->nama = $post["employee_name"];
    $this->alamat = $post["employee_address"];
    $this->no_telp = $post["employee_phone"];
    $this->tgl_lahir = $post["employee_dob"];
    $this->email = $post["employee_email"];
    $this->jenis_kelamin = $post["employee_gender"];

    //BELUM DISETTING
    $this->foto_profil = "default.jpg";
    $this->username = $post["employee_email"];;
    $this->password = "PARTVISIT2020";

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

    $this->id_karyawan = $post["employee_id"];
    $this->id_role = $post["employee_role"];
    $this->nama = $post["employee_name"];
    $this->alamat = $post["employee_address"];
    $this->no_telp = $post["employee_phone"];
    $this->tgl_lahir = $post["employee_dob"];
    $this->email = $post["employee_email"];
    $this->jenis_kelamin = $post["employee_gender"];

    //Mod By
    $this->modby = $this->session->userdata('user_userID');
    $this->moddate = $dateNow;
		return $this->db->update($this->_table,$this,array('id_user'=>$post['id_user']));
  }

  public function delete($id)
  {
    $this->status = 0;
    //$this->modby = $this->session->userdata('user_userID');
    $this->modby =$this->session->userdata('user_userID');
    $this->moddate = date("Y-m-d H:i:s");
    return $this->db->update($this->_table,$this,array('id_user'=>$id));
  }

  public function active($id)
  {
    $this->status = 1;
    //$this->modby = $this->session->userdata('user_userID');
    $this->modby   = $this->session->userdata('user_userID');
    $this->moddate = date("Y-m-d H:i:s");
    return $this->db->update($this->_table,$this,array('id_user'=>$id));
  }

    public function getRole()
		{
      $this->db->select('*');
      $this->db->from('tb_role');
      $this->db->where('status',1);
      $query = $this->db->get();
      return $query->result();
		}


    function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }



}

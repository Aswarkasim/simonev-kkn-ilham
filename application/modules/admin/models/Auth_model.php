<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

  public function login($email, $password)
  {
    $this->db->select('*')
      ->from('tbl_user')
      ->where(array(
        'email'      => $email,
        'password'   => sha1($password)
      ));
    $query = $this->db->get();
    return $query->row();
  }
  public function loginId($id_user, $password)
  {
    $this->db->select('*')
      ->from('tbl_user')
      ->where(array(
        'id_user'      => $id_user,
        'password'   => sha1($password)
      ));
    $query = $this->db->get();
    return $query->row();
  }
}

/* End of file ModelName.php */

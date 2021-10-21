<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Master_model extends CI_Model
{
  public function listGeneral($table, $order = null)
  {
    $query = $this->db->select('*')
      ->from($table)
      ->order_by('date_created', $order)
      ->get();
    return $query->result();
  }
}

/* End of file ModelName.php */

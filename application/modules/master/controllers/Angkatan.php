<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Angkatan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // is_logged_in_admin();

    $this->load->model('master/Master_model', 'MM');
  }


  public function index()
  {
    $tombol  = [
      'add'     => 'master/angkatan/add',
      'edit'    => 'master/angkatan/edit/',
      'delete'  => 'master/angkatan/delete/'
    ];

    $angkatan = $this->MM->listGeneral('tbl_angkatan', 'DESC');
    $data = [

      'angkatan' => $angkatan,
      'tombol'   => $tombol,
      'content' => 'master/angkatan/index'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  function add()
  {

    $this->load->helper('string');

    $valid = $this->form_validation;
    $valid->set_rules('id_angkatan', 'Kode Kaategori', 'macthes[tbl_angkatan.id_angkatan]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));
    $valid->set_rules('nama_angkatan', 'Nama Kaategori', 'macthes[tbl_angkatan.nama_angkatan]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));


    if ($valid->run() === TRUE) {
      $this->index();
    } else {
      $i = $this->input;
      $data = [
        'nama_angkatan'   => $i->post('nama_angkatan'),
        'id_angkatan'   => random_string()
      ];
      $this->Crud_model->add('tbl_angkatan', $data);
      $this->session->set_flashdata('msg', 'angkatan berhasil ditambah');
      redirect('master/angkatan');
    }
  }
  function edit($id_angkatan)
  {
    $valid = $this->form_validation;
    // $valid->set_rules('id_angkatan', 'Kode Kaategori', 'macthes[tbl_angkatan.id_angkatan]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));
    // $valid->set_rules('nama_angkatan', 'Nama Kaategori', 'macthes[tbl_angkatan.nama_angkatan]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));


    if ($valid->run() === TRUE) {
      $this->index();
    } else {
      $i = $this->input;
      $data = [
        'nama_angkatan'   => $i->post('nama_angkatan'),
        'id_angkatan'   => $id_angkatan,
      ];
      $this->Crud_model->edit('tbl_angkatan', 'id_angkatan', $id_angkatan, $data);
      $this->session->set_flashdata('msg', 'angkatan berhasil diedit');
      redirect('master/angkatan');
    }
  }

  function delete($id_angkatan)
  {
    $this->Crud_model->delete('tbl_angkatan', 'id_angkatan', $id_angkatan);
    $this->session->set_flashdata('msg', 'data telah dihapus');
    redirect('master/angkatan');
  }

  function is_active($id_angkatan)
  {
    $akt = $this->Crud_model->listing('tbl_angkatan');
    foreach ($akt as $row) {
      if ($row->id_angkatan != $id_angkatan) {
        __is_boolean('tbl_angkatan', 'id_angkatan', $row->id_angkatan, 'is_active', '0');
      } else {
        __is_boolean('tbl_angkatan', 'id_angkatan', $id_angkatan, 'is_active', '1');
      }
    }
    $this->session->set_flashdata('msg', 'status angkatan berhasil diubah');
    redirect('master/angkatan');
  }
}

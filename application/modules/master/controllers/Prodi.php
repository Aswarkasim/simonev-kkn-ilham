<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
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
      'add'     => 'master/prodi/add',
      'edit'    => 'master/prodi/edit/',
      'delete'  => 'master/prodi/delete/'
    ];

    $prodi = $this->MM->listGeneral('tbl_prodi', 'DESC');
    $data = [

      'prodi' => $prodi,
      'tombol'   => $tombol,
      'content' => 'master/prodi/index'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  function add()
  {

    $this->load->helper('string');

    $valid = $this->form_validation;
    $valid->set_rules('id_prodi', 'Kode Kaategori', 'macthes[tbl_prodi.id_prodi]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));
    $valid->set_rules('nama_prodi', 'Nama Kaategori', 'macthes[tbl_prodi.nama_prodi]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));


    if ($valid->run() === TRUE) {
      $this->index();
    } else {
      $i = $this->input;
      $data = [
        'nama_prodi'   => $i->post('nama_prodi'),
        'id_prodi'   => random_string()
      ];
      $this->Crud_model->add('tbl_prodi', $data);
      $this->session->set_flashdata('msg', 'prodi berhasil ditambah');
      redirect('master/prodi');
    }
  }
  function edit($id_prodi)
  {
    $valid = $this->form_validation;
    // $valid->set_rules('id_prodi', 'Kode Kaategori', 'macthes[tbl_prodi.id_prodi]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));
    // $valid->set_rules('nama_prodi', 'Nama Kaategori', 'macthes[tbl_prodi.nama_prodi]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));


    if ($valid->run() === TRUE) {
      $this->index();
    } else {
      $i = $this->input;
      $data = [
        'nama_prodi'   => $i->post('nama_prodi'),
        'id_prodi'   => $id_prodi,
      ];
      $this->Crud_model->edit('tbl_prodi', 'id_prodi', $id_prodi, $data);
      $this->session->set_flashdata('msg', 'prodi berhasil diedit');
      redirect('master/prodi');
    }
  }

  function delete($id_prodi)
  {
    $this->Crud_model->delete('tbl_prodi', 'id_prodi', $id_prodi);
    $this->session->set_flashdata('msg', 'data telah dihapus');
    redirect('master/prodi');
  }

  function is_active($id_prodi)
  {
    $akt = $this->Crud_model->listing('tbl_prodi');
    foreach ($akt as $row) {
      if ($row->id_prodi != $id_prodi) {
        __is_boolean('tbl_prodi', 'id_prodi', $row->id_prodi, 'is_active', '0');
      } else {
        __is_boolean('tbl_prodi', 'id_prodi', $id_prodi, 'is_active', '1');
      }
    }
    $this->session->set_flashdata('msg', 'status prodi berhasil diubah');
    redirect('master/prodi');
  }
}

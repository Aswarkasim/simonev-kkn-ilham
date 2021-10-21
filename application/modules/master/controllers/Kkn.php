<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kkn extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // is_logged_in_admin();
  }


  public function index()
  {
    $tombol  = [
      'add'     => 'master/kkn/add',
      'edit'    => 'master/kkn/edit/',
      'delete'  => 'master/kkn/delete/'
    ];

    $kkn = $this->Crud_model->listing('tbl_kkn');
    $data = [

      'kkn' => $kkn,
      'tombol'   => $tombol,
      'content' => 'master/kkn/index'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  function add()
  {

    $this->load->helper('string');

    $valid = $this->form_validation;
    $valid->set_rules('id_kkn', 'Kode Kaategori', 'macthes[tbl_kkn.id_kkn]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));
    $valid->set_rules('nama_kkn', 'Nama Kaategori', 'macthes[tbl_kkn.nama_kkn]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));


    if ($valid->run() === TRUE) {
      $this->index();
    } else {
      $i = $this->input;
      $data = [
        'nama_kkn'   => $i->post('nama_kkn'),
        'id_kkn'   => random_string()
      ];
      $this->Crud_model->add('tbl_kkn', $data);
      $this->session->set_flashdata('msg', 'kkn berhasil ditambah');
      redirect('master/kkn');
    }
  }
  function edit($id_kkn)
  {
    $valid = $this->form_validation;
    // $valid->set_rules('id_kkn', 'Kode Kaategori', 'macthes[tbl_kkn.id_kkn]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));
    // $valid->set_rules('nama_kkn', 'Nama Kaategori', 'macthes[tbl_kkn.nama_kkn]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));


    if ($valid->run() === TRUE) {
      $this->index();
    } else {
      $i = $this->input;
      $data = [
        'nama_kkn'   => $i->post('nama_kkn'),
        'id_kkn'   => $id_kkn,
      ];
      $this->Crud_model->edit('tbl_kkn', 'id_kkn', $id_kkn, $data);
      $this->session->set_flashdata('msg', 'kkn berhasil diedit');
      redirect('master/kkn');
    }
  }

  function delete($id_kkn)
  {
    $this->Crud_model->delete('tbl_kkn', 'id_kkn', $id_kkn);
    $this->session->set_flashdata('msg', 'data telah dihapus');
    redirect('master/kkn');
  }
}

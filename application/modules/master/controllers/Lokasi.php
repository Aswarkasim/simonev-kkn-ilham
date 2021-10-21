<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // is_logged_in_admin();
  }


  public function index()
  {
    $tombol  = [
      'add'     => 'master/lokasi/add',
      'edit'    => 'master/lokasi/edit/',
      'delete'  => 'master/lokasi/delete/'
    ];

    $lokasi = $this->Crud_model->listing('tbl_lokasi');
    $data = [

      'lokasi' => $lokasi,
      'tombol'   => $tombol,
      'content' => 'master/lokasi/index'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  function add()
  {

    $this->load->helper('string');

    $valid = $this->form_validation;
    $valid->set_rules('id_lokasi', 'Kode Kaategori', 'macthes[tbl_lokasi.id_lokasi]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));
    $valid->set_rules('nama_lokasi', 'Nama Kaategori', 'macthes[tbl_lokasi.nama_lokasi]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));


    if ($valid->run() === TRUE) {
      $this->index();
    } else {
      $i = $this->input;
      $data = [
        'nama_lokasi'   => $i->post('nama_lokasi'),
        'id_lokasi'   => random_string()
      ];
      $this->Crud_model->add('tbl_lokasi', $data);
      $this->session->set_flashdata('msg', 'lokasi berhasil ditambah');
      redirect('master/lokasi');
    }
  }
  function edit($id_lokasi)
  {
    $valid = $this->form_validation;
    // $valid->set_rules('id_lokasi', 'Kode Kaategori', 'macthes[tbl_lokasi.id_lokasi]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));
    // $valid->set_rules('nama_lokasi', 'Nama Kaategori', 'macthes[tbl_lokasi.nama_lokasi]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));


    if ($valid->run() === TRUE) {
      $this->index();
    } else {
      $i = $this->input;
      $data = [
        'nama_lokasi'   => $i->post('nama_lokasi'),
        'id_lokasi'   => $id_lokasi,
      ];
      $this->Crud_model->edit('tbl_lokasi', 'id_lokasi', $id_lokasi, $data);
      $this->session->set_flashdata('msg', 'lokasi berhasil diedit');
      redirect('master/lokasi');
    }
  }

  function delete($id_lokasi)
  {
    $this->Crud_model->delete('tbl_lokasi', 'id_lokasi', $id_lokasi);
    $this->session->set_flashdata('msg', 'data telah dihapus');
    redirect('master/lokasi');
  }
}

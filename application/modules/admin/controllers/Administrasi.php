<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Administrasi extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    // $this->load->model('Admin_model', 'AM');
  }


  public function index()
  {
    $administrasi = $this->Crud_model->listing('tbl_administrasi');
    $data = [
      'title'       => 'List Administrasi',
      'add'         => 'admin/administrasi/add',
      'edit'        => 'admin/administrasi/edit/',
      'administrasi' => $administrasi,
      'content'     => 'admin/administrasi/index'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  function detail($id_administrasi)
  {


    // $administrasi = $this->AM->detailAdministrasi($id_administrasi)->row();
    $administrasi = $this->Crud_model->listingOne('tbl_administrasi', 'id_administrasi', $id_administrasi);
    $data =
      [
        'administrasi'   =>  $administrasi,
        'content'  => 'admin/administrasi/detail'
      ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  public function add()
  {

    $this->load->helper('string');


    $required = '%s tidak boleh kosong';
    $valid = $this->form_validation;
    $valid->set_rules('nama_administrasi', 'Judul Administrasi', 'required', ['required' => $required]);
    if ($valid->run()) {
      if (!empty($_FILES['dokumen']['name'])) {
        $config['upload_path']   = './assets/uploads/dokumen/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = '24000'; // KB 
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('dokumen')) {
          $data = [
            'title'    => 'Tambah Administrasi',
            'add'    => 'admin/administrasi/add',
            'edit'    => 'admin/administrasi/edit/',
            'back'    => 'admin/administrasi',
            'error'     => $this->upload->display_errors(),
            'content'  => 'admin/administrasi/add'
          ];
          $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
          $upload_data = ['uploads' => $this->upload->data()];

          $i = $this->input;

          $data = [
            'id_administrasi'       => random_string(),
            'nama_administrasi'     => $i->post('nama_administrasi'),
            'dokumen'               => $config['upload_path'] . $upload_data['uploads']['file_name']
          ];
          $this->Crud_model->add('tbl_administrasi', $data);
          $this->session->set_flashdata('msg', 'Administrasi ditambahkan');
          redirect('admin/administrasi');
        }
      }
    }
    $data = [
      'title'    => 'Tambah Administrasi',
      'add'    => 'admin/administrasi/add',
      'edit'    => 'admin/administrasi/edit/',
      'back'    => 'admin/administrasi',
      'content'  => 'admin/administrasi/add'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  public function edit($id_administrasi)
  {

    $this->load->helper('string');
    $administrasi = $this->Crud_model->listingOne('tbl_administrasi', 'id_administrasi', $id_administrasi);

    $required = '%s tidak boleh kosong';
    $valid = $this->form_validation;
    $valid->set_rules('nama_administrasi', 'Nama Administrasi', 'required', ['required' => $required]);
    if ($valid->run()) {
      if (!empty($_FILES['dokumen']['name'])) {
        $config['upload_path']   = './assets/uploads/dokumen/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = '24000'; // KB 
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('dokumen')) {
          $data = [
            'title'    => 'Edit Administrasi',
            'add'    => 'admin/administrasi/add',
            'edit'    => 'admin/administrasi/edit/' . $id_administrasi,
            'back'    => 'admin/administrasi',
            'administrasi'    => $administrasi,
            'error'     => $this->upload->display_errors(),
            'content'  => 'admin/administrasi/add'
          ];
          $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
          if ($administrasi->dokumen != '') {
            unlink($administrasi->dokumen);
          }
          $upload_data = ['uploads' => $this->upload->data()];

          $i = $this->input;
          $data = [
            'id_administrasi'       => $id_administrasi,
            'nama_administrasi'    => $i->post('nama_administrasi'),
            'dokumen'               => $config['upload_path'] . $upload_data['uploads']['file_name']
          ];
          $this->Crud_model->edit('tbl_administrasi', 'id_administrasi', $id_administrasi, $data);
          $this->session->set_flashdata('msg', 'Administrasi diedit');
          redirect('admin/administrasi');
        }
      } else {
        $i = $this->input;
        $data = [
          'id_administrasi'       => $id_administrasi,
          'nama_administrasi'    => $i->post('nama_administrasi'),
        ];
        $this->Crud_model->edit('tbl_administrasi', 'id_administrasi', $id_administrasi, $data);
        $this->session->set_flashdata('msg', 'Administrasi diedit');
        redirect('admin/administrasi');
      }
    }
    $data = [
      'title'    => 'Edit Administrasi',
      'edit'    => 'admin/administrasi/edit/' . $id_administrasi,
      'back'    => 'admin/administrasi',
      'administrasi'    => $administrasi,
      'content'  => 'admin/administrasi/add'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  function delete($id_administrasi)
  {
    $d = $this->Crud_model->listingOne('tbl_administrasi', 'id_administrasi', $id_administrasi);
    if ($d->dokumen != '') {
      unlink($d->dokumen);
    }
    $this->Crud_model->delete('tbl_administrasi', 'id_administrasi', $id_administrasi);
    $this->session->set_flashdata('msg', 'data telah dihapus');
    redirect('admin/administrasi');
  }

  function downloadPage()
  {
    $id_angkatan = $this->session->userdata('id_angkatan');
    $adm = $this->Crud_model->listingOneAll('tbl_administrasi', 'id_angkatan', $id_angkatan);
    $data = [
      'adm'      => $adm,
      'content'  => 'admin/administrasi/download'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  function download($id_administrasi)
  {

    $this->load->helper('download');
    $adm = $this->Crud_model->listingOne('tbl_administrasi', 'id_administrasi', $id_administrasi);
    force_download($adm->dokumen, null);
  }
}

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin_model', 'AM');
  }


  public function index($laporan)
  {

    $role = $this->session->userdata('role');
    $id_user = $this->session->userdata('id_user');
    $id_lokasi = $this->session->userdata('id_lokasi');

    if ($role == 'Mahasiswa') {
      $laporan = $this->AM->cekLaporan($id_user, $id_lokasi);
      $data = [
        'laporan' => $laporan,
        'add'         => 'admin/laporan/add',
        'content'     => 'admin/laporan/index_mhs'
      ];
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    } else {
      $this->laporanMhs($laporan);
    }
  }

  public function laporanDpl()
  {
    $role = $this->session->userdata('role');
    $id_user = $this->session->userdata('id_user');
    $id_lokasi = $this->session->userdata('id_lokasi');

    $laporan = $this->AM->cekLaporan($id_user, $id_lokasi);
    $data = [
      'laporan' => $laporan,
      'add'         => 'admin/laporan/add',
      'content'     => 'admin/laporan/index_mhs'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  function laporanMhs($laporan)
  {
    $role = $this->session->userdata('role');
    $id_angkatan = $this->session->userdata('id_angkatan');

    if ($laporan == "Mahasiswa") {
      if (($role == 'LP2M') || $role == 'Admin') {
        $mahasiswa = $this->AM->listMhsAngkatan($id_angkatan);
      } else if ($role == 'DPL') {
        $id_dpl = $this->session->userdata('id_user');
        $mahasiswa = $this->AM->listMhsDpl($id_angkatan, $id_dpl);
      }
      $data = [
        'mahasiswa' => $mahasiswa,
        'content'   => 'admin/laporan/list_mhs_laporan'
      ];
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    } else if ($laporan == "DPL") {
      $dpl = $this->AM->listDpl();
      $data = [
        'mahasiswa'       => $dpl,
        'content'   => 'admin/laporan/list_mhs_laporan'
      ];
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
  }

  function detail($id_laporan)
  {


    // $laporan = $this->AM->detailLaporan($id_laporan)->row();
    $laporan = $this->Crud_model->listingOne('tbl_laporan', 'id_laporan', $id_laporan);
    $data =
      [
        'laporan'   =>  $laporan,
        'content'  => 'admin/laporan/detail'
      ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  public function add()
  {

    $this->load->helper('string');

    $role = $this->session->userdata('role');

    $required = '%s tidak boleh kosong';
    $valid = $this->form_validation;
    $valid->set_rules('nama_laporan', 'Judul Laporan', 'required', ['required' => $required]);
    if ($valid->run()) {
      if (!empty($_FILES['dokumen']['name'])) {
        $config['upload_path']   = './assets/uploads/laporan/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = '24000'; // KB 
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('dokumen')) {
          $data = [
            'title'    => 'Tambah Laporan',
            'add'    => 'admin/laporan/add',
            'edit'    => 'admin/laporan/edit/',
            'back'    => 'admin/laporan',
            'error'     => $this->upload->display_errors(),
            'content'  => 'admin/laporan/add'
          ];
          $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
          $upload_data = ['uploads' => $this->upload->data()];

          $i = $this->input;

          $data = [
            'id_laporan'       => random_string(),
            'id_user'           => $this->session->userdata('id_user'),
            'id_lokasi'         => $this->session->userdata('id_lokasi'),
            'id_angkatan'       => $this->session->userdata('id_angkatan'),
            'role'              => $role,
            'nama_laporan'     => $i->post('nama_laporan'),
            'dokumen'          => $config['upload_path'] . $upload_data['uploads']['file_name']
          ];
          $this->Crud_model->add('tbl_laporan', $data);
          $this->session->set_flashdata('msg', 'Laporan ditambahkan');
          redirect('admin/laporan');
        }
      }
    }
    $data = [
      'title'    => 'Tambah Laporan',
      'add'    => 'admin/laporan/add',
      'edit'    => 'admin/laporan/edit/',
      'back'    => 'admin/laporan',
      'content'  => 'admin/laporan/add'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  public function edit($id_laporan)
  {

    $this->load->helper('string');
    $laporan = $this->Crud_model->listingOne('tbl_laporan', 'id_laporan', $id_laporan);

    $required = '%s tidak boleh kosong';
    $valid = $this->form_validation;
    $valid->set_rules('nama_laporan', 'Nama Laporan', 'required', ['required' => $required]);
    if ($valid->run()) {
      if (!empty($_FILES['dokumen']['name'])) {
        $config['upload_path']   = './assets/uploads/laporan/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = '24000'; // KB 
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('dokumen')) {
          $data = [
            'title'    => 'Edit Laporan',
            'add'    => 'admin/laporan/add',
            'edit'    => 'admin/laporan/edit/' . $id_laporan,
            'back'    => 'admin/laporan',
            'laporan'    => $laporan,
            'error'     => $this->upload->display_errors(),
            'content'  => 'admin/laporan/add'
          ];
          $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
          if ($laporan->dokumen != '') {
            unlink($laporan->dokumen);
          }
          $upload_data = ['uploads' => $this->upload->data()];

          $i = $this->input;
          $data = [
            'id_laporan'       => $id_laporan,
            'nama_laporan'    => $i->post('nama_laporan'),
            'dokumen'               => $config['upload_path'] . $upload_data['uploads']['file_name']
          ];
          $this->Crud_model->edit('tbl_laporan', 'id_laporan', $id_laporan, $data);
          $this->session->set_flashdata('msg', 'Laporan diedit');
          redirect('admin/laporan');
        }
      } else {
        $i = $this->input;
        $data = [
          'id_laporan'       => $id_laporan,
          'nama_laporan'    => $i->post('nama_laporan'),
        ];
        $this->Crud_model->edit('tbl_laporan', 'id_laporan', $id_laporan, $data);
        $this->session->set_flashdata('msg', 'Laporan diedit');
        redirect('admin/laporan');
      }
    }
    $data = [
      'title'    => 'Edit Laporan',
      'edit'    => 'admin/laporan/edit/' . $id_laporan,
      'back'    => 'admin/laporan',
      'laporan'    => $laporan,
      'content'  => 'admin/laporan/add'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  function delete($id_laporan)
  {
    $d = $this->Crud_model->listingOne('tbl_laporan', 'id_laporan', $id_laporan);
    if ($d->dokumen != '') {
      unlink($d->dokumen);
    }
    $this->Crud_model->delete('tbl_laporan', 'id_laporan', $id_laporan);
    $this->session->set_flashdata('msg', 'data telah dihapus');
    redirect('admin/laporan');
  }

  function download($id_laporan)
  {

    $this->load->helper('download');
    $adm = $this->Crud_model->listingOne('tbl_laporan', 'id_laporan', $id_laporan);
    force_download($adm->dokumen, null);
  }
}

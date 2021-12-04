<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin_model', 'AM');
  }


  public function index()
  {
    // $berita = $this->AM->listBerita();
    $berita = $this->Crud_model->listing('tbl_berita');
    $data = [
      'title'    => 'List Berita',
      'add'    => 'admin/berita/add',
      'edit'    => 'admin/berita/edit/',
      'berita'   => $berita,
      'content'  => 'admin/berita/index'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  function detail($id_berita)
  {


    // $berita = $this->AM->detailBerita($id_berita)->row();
    $berita = $this->Crud_model->listingOne('tbl_berita', 'id_berita', $id_berita);
    $data =
      [
        'berita'   =>  $berita,
        'content'  => 'admin/berita/detail'
      ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  public function add()
  {

    $this->load->helper('string');

    // $kategori = $this->Crud_model->listing('tbl_kategori');

    $required = '%s tidak boleh kosong';
    $valid = $this->form_validation;
    $valid->set_rules('judul_berita', 'Judul Berita', 'required', ['required' => $required]);
    $valid->set_rules('isi', 'Isi Berita', 'required', ['required' => $required]);
    if ($valid->run()) {
      if (!empty($_FILES['gambar']['name'])) {
        $config['upload_path']   = './assets/uploads/images/';
        $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
        $config['max_size']      = '24000'; // KB 
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('gambar')) {
          $data = [
            'title'    => 'Tambah Berita',
            'add'    => 'admin/berita/add',
            'edit'    => 'admin/berita/edit/',
            'back'    => 'admin/berita',
            // 'kategori'    => $kategori,
            'error'     => $this->upload->display_errors(),
            'content'  => 'admin/berita/add'
          ];
          $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
          $upload_data = ['uploads' => $this->upload->data()];

          $i = $this->input;

          $slug = random_string() . url_title($i->post('-judul_berita', 'dash', true));
          $data = [
            'id_berita'       => random_string(),
            // 'id_kategori'     => $i->post('id_kategori'),
            'judul_berita'    => $i->post('judul_berita'),
            'slug'            => $slug,
            'isi'             => $i->post('isi'),
            'gambar'          => $config['upload_path'] . $upload_data['uploads']['file_name']
          ];
          $this->Crud_model->add('tbl_berita', $data);
          $this->session->set_flashdata('msg', 'Berita ditambahkan');
          redirect('admin/berita/detail/' . $data['id_berita']);
        }
      }
    }
    $data = [
      'title'    => 'Tambah Berita',
      'add'    => 'admin/berita/add',
      'edit'    => 'admin/berita/edit/',
      'back'    => 'admin/berita',
      // 'kategori'    => $kategori,
      'content'  => 'admin/berita/add'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  public function edit($id_berita)
  {

    $this->load->helper('string');

    // $kategori = $this->Crud_model->listing('tbl_kategori');
    $berita = $this->Crud_model->listingOne('tbl_berita', 'id_berita', $id_berita);

    $required = '%s tidak boleh kosong';
    $valid = $this->form_validation;
    $valid->set_rules('judul_berita', 'Judul Berita', 'required', ['required' => $required]);
    $valid->set_rules('isi', 'Isi Berita', 'required', ['required' => $required]);
    if ($valid->run()) {
      if (!empty($_FILES['gambar']['name'])) {
        $config['upload_path']   = './assets/uploads/images/';
        $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
        $config['max_size']      = '24000'; // KB 
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('gambar')) {
          $data = [
            'title'    => 'Edit Berita',
            'add'    => 'admin/berita/add',
            'edit'    => 'admin/berita/edit/',
            'back'    => 'admin/berita',
            // 'kategori'    => $kategori,
            'berita'    => $berita,
            'error'     => $this->upload->display_errors(),
            'content'  => 'admin/berita/edit'
          ];
          $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
          if ($berita->gambar != '') {
            unlink($berita->gambar);
          }
          $upload_data = ['uploads' => $this->upload->data()];

          $i = $this->input;

          $slug = random_string() . '-' . url_title($i->post('judul_berita', 'dash', true));
          $data = [
            'id_berita'       => $id_berita,
            // 'id_kategori'     => $i->post('id_kategori'),
            'judul_berita'    => $i->post('judul_berita'),
            'slug'            => $slug,
            'isi'             => $i->post('isi'),
            'gambar'          => $config['upload_path'] . $upload_data['uploads']['file_name']
          ];
          $this->Crud_model->edit('tbl_berita', 'id_berita', $id_berita, $data);
          $this->session->set_flashdata('msg', 'Berita diedit');
          redirect('admin/berita/detail/' . $id_berita);
        }
      } else {
        $i = $this->input;

        $slug = random_string() . '-' . url_title($i->post('judul_berita', 'dash', true));
        $data = [
          'id_berita'       => $id_berita,
          // 'id_kategori'     => $i->post('id_kategori'),
          'judul_berita'    => $i->post('judul_berita'),
          'slug'            => $slug,
          'isi'             => $i->post('isi'),
        ];
        $this->Crud_model->edit('tbl_berita', 'id_berita', $id_berita, $data);
        $this->session->set_flashdata('msg', 'Berita diedit');
        redirect('admin/berita/detail/' . $id_berita);
      }
    }
    $data = [
      'title'    => 'Edit Berita',
      'edit'    => 'admin/berita/edit/',
      'back'    => 'admin/berita',
      // 'kategori'    => $kategori,
      'berita'    => $berita,
      'content'  => 'admin/berita/edit'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  function delete($id_berita)
  {
    $d = $this->Crud_model->listingOne('tbl_berita', 'id_berita', $id_berita);
    if ($d->gambar != '') {
      unlink($d->gambar);
    }
    $this->Crud_model->delete('tbl_berita', 'id_berita', $id_berita);
    $this->session->set_flashdata('msg', 'data telah dihapus');
    redirect('admin/berita');
  }

  function is_active($id_berita, $value)
  {
    __is_boolean('tbl_berita', 'id_berita', $id_berita, 'is_active', $value);
    $this->session->set_flashdata('msg', 'data telah dihapus');
    redirect('admin/berita/detail/' . $id_berita);
  }


  function terkini()
  {
    $berita = $this->Crud_model->listingOneAll('tbl_berita', 'is_active', '1');
    $data = [
      'title'   => 'Berita Terkini',
      'berita'    => $berita,
      'content'  => 'admin/berita/terkini'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }
}

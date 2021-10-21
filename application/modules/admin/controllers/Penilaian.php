<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        // if (($this->session->penilaiandata('id_penilaian') == "") || $this->session->penilaiandata('role') != "Admin") {
        //     redirect('error_page');
        // }

        $this->load->model('admin/Admin_model', 'AM');
    }


    public function index($dinilai)
    {
        $role = $this->session->userdata('role');
        if ($role == 'Mahasiswa') {
            redirect('admin/penilaian/pageNilai');
        }
        $penilaian = $this->AM->nilaiList($this->session->userdata('id_angkatan'), $dinilai);
        $data = [
            'add'      => 'admin/penilaian/add',
            'edit'      => 'admin/penilaian/edit/',
            'delete'      => 'admin/penilaian/delete/',
            'penilaian'      => $penilaian,
            'content'   => 'admin/penilaian/index'
        ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function pageNilai()
    {

        $this->load->helper('string');

        $id_user = $this->session->userdata('id_user');
        $user = $this->Crud_model->listingOne('tbl_user', 'id_user', $id_user);
        $penilaian = $this->AM->penilaianListMhs($id_user);
        if ($penilaian == null) {
            $dataNilai = [
                'id_penilaian' => random_string(),
                'id_user'      => $id_user,
                'id_lokasi'    => $user->id_lokasi,
                'id_angkatan'  => $user->id_angkatan,
                'id_dpl'       => $user->id_dpl,
                'dinilai'      => 'Lokasi',
                'nilai'        => 0
            ];
            $this->Crud_model->add('tbl_penilaian', $dataNilai);
        }
        $lokasi = $this->Crud_model->listingOne('tbl_lokasi', 'id_lokasi', $user->id_lokasi);
        $data = [
            'penilaian' => $penilaian,
            'content'   => 'admin/penilaian/nilai'
        ];
        $this->load->view('/layout/wrapper', $data, FALSE);
    }

    function inputNilai($id_penilaian)
    {
        $data = [
            'nilai'     => $this->input->post('nilai'),
            'deskripsi'     => $this->input->post('deskripsi')
        ];
        $this->Crud_model->edit('tbl_penilaian', 'id_penilaian', $id_penilaian, $data);
        redirect('admin/penilaian/pageNilai');
    }

    function add()
    {


        $this->load->helper('string');

        $valid = $this->form_validation;

        $valid->set_rules('tanggal', 'Tanggal', 'required');

        if ($valid->run() === FALSE) {
            $data = [
                'title'     => 'Tambah Penilaian',
                'add'       => 'admin/penilaian/add',
                'back'      => 'admin/penilaian',
                'content'   => 'admin/penilaian/add'
            ];
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $data = [
                'id_penilaian'         => random_string(),
                'id_user'           => $this->session->userdata('id_user'),
                'tanggal'       => $i->post('tanggal'),
                'waktu_dari'             => $i->post('waktu_dari'),
                'waktu_sampai'      => $i->post('waktu_sampai'),
                'aktivitas'        => $i->post('aktivitas')
            ];
            $this->Crud_model->add('tbl_penilaian', $data);
            $this->session->set_flashdata('msg', 'ditambah');
            redirect('admin/penilaian/add', 'refresh');
        }
    }

    function edit($id_penilaian)
    {
        $penilaian = $this->Crud_model->listingOne('tbl_penilaian', 'id_penilaian', $id_penilaian);

        $valid = $this->form_validation;

        $valid->set_rules('tanggal', 'Tanggal', 'required');

        if ($valid->run() === FALSE) {
            $data = [
                'title'     => 'Edit ',
                'edit'       => 'admin/penilaian/edit/' . $id_penilaian,
                'back'      => 'admin/penilaian',
                'penilaian'      => $penilaian,
                'content'   => 'admin/penilaian/add'
            ];
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;


            $data = [
                'id_penilaian'       => $id_penilaian,
                'id_user'           => $this->session->userdata('id_user'),
                'tanggal'       => $i->post('tanggal'),
                'waktu_dari'             => $i->post('waktu_dari'),
                'waktu_sampai'      => $i->post('waktu_sampai'),
                'aktivitas'        => $i->post('aktivitas'),
            ];
            $this->Crud_model->edit('tbl_penilaian', 'id_penilaian', $id_penilaian, $data);
            $this->session->set_flashdata('msg', 'diedit');
            redirect('admin/penilaian/edit/' . $id_penilaian, 'refresh');
        }
    }

    function detail($id_penilaian)
    {
        $penilaian = $this->Crud_model->listingOneAll('tbl_penilaian', 'id_penilaian', $id_penilaian);
        $data = [
            'penilaian'      => $penilaian,
            'content'   => 'admin/penilaian/detail'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function delete($id_penilaian)
    {
        $this->Crud_model->delete('tbl_penilaian', 'id_penilaian', $id_penilaian);
        $this->session->set_flashdata('msg', 'dihapus');
        redirect('admin/penilaian');
    }

    public function role()
    {
        $role = $this->Crud_model->listing('tbl_penilaian_role');
        $data = [
            'add'       => 'roleAdd',
            'edit'      => 'roleEdit/',
            'delete'    => 'roleDelete/',
            'role'      => $role,
            'content'   => 'admin/role/index'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
}

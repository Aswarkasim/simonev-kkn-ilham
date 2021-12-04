<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Proker extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        // if (($this->session->prokerdata('id_proker') == "") || $this->session->prokerdata('role') != "Admin") {
        //     redirect('error_page');
        // }

        $this->load->model('admin/Admin_model', 'AM');
    }


    public function index()
    {
        $role = $this->session->userdata('role');
        if ($role == 'Mahasiswa') {
            $id_lokasi = $this->session->userdata('id_user');
            $proker = $this->Crud_model->listingOneAll('tbl_proker', 'id_lokasi', $id_lokasi);
        } else if ($role = 'DPL') {
            $this->dplList();
        } else if ($role = 'LP2M') {
            $this->lp2mList();
        } else {

            $proker = $this->Crud_model->listing('tbl_proker');
        }

        if (isset($proker)) {
            $data = [
                'add'      => 'admin/proker/add',
                'edit'      => 'admin/proker/edit/',
                'delete'      => 'admin/proker/delete/',
                'proker'      => $proker,
                'content'   => 'admin/proker/index'
            ];

            $this->load->view('admin/layout/wrapper', $data, FALSE);
        }
    }

    function lp2mList()
    {
        $id_angkatan = $this->session->userdata('id_angkatan');
        $id_user = $this->session->userdata('id_user');
        $lokasi = $this->AM->listDplLokasi($id_angkatan, $id_user);

        $data = [
            'lokasi'      => $lokasi,
            'content'   => 'admin/proker/dpl_index'
        ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function dplList()
    {
        $id_angkatan = $this->session->userdata('id_angkatan');
        $id_user = $this->session->userdata('id_user');
        $lokasi = $this->AM->listDplLokasi($id_angkatan, $id_user);

        $data = [
            'lokasi'      => $lokasi,
            'content'   => 'admin/proker/dpl_index'
        ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function add()
    {


        $this->load->helper('string');

        $valid = $this->form_validation;

        $valid->set_rules('nama_proker', 'Nama Proker', 'required');

        if ($valid->run() === FALSE) {
            $data = [
                'title'     => 'Tambah Proker',
                'add'       => 'admin/proker/add',
                'back'      => 'admin/proker',
                'content'   => 'admin/proker/add'
            ];
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $data = [
                'id_proker'         => random_string(),
                'id_lokasi'         => $this->session->userdata('id_lokasi'),
                'id_user'         => $this->session->userdata('id_user'),
                'nama_proker'       => $i->post('nama_proker'),
                'biaya'             => $i->post('biaya'),
                'sumber_biaya'      => $i->post('sumber_biaya'),
                'kerja_sama'        => $i->post('kerja_sama'),
                'pj'                => $i->post('pj'),
                'tujuan'            => $i->post('tujuan'),
                'sasaran'           => $i->post('sasaran'),
                'standar_keberhasilan' => $i->post('standar_keberhasilan')
            ];
            $this->Crud_model->add('tbl_proker', $data);
            $this->session->set_flashdata('msg', 'ditambah');
            redirect('admin/proker/add', 'refresh');
        }
    }

    function edit($id_proker)
    {
        $proker = $this->Crud_model->listingOne('tbl_proker', 'id_proker', $id_proker);

        $valid = $this->form_validation;

        $valid->set_rules('nama_proker', 'Nama Proker', 'required');

        if ($valid->run() === FALSE) {
            $data = [
                'title'     => 'Edit ' . $proker->nama_proker,
                'edit'       => 'admin/proker/edit/' . $id_proker,
                'back'      => 'admin/proker',
                'proker'      => $proker,
                'content'   => 'admin/proker/add'
            ];
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;


            $data = [
                'id_proker'       => $id_proker,
                'nama_proker'       => $i->post('nama_proker'),
                'id_user'         => $this->session->userdata('id_user'),
                'biaya'             => $i->post('biaya'),
                'sumber_biaya'      => $i->post('sumber_biaya'),
                'kerja_sama'        => $i->post('kerja_sama'),
                'pj'                => $i->post('pj'),
                'tujuan'            => $i->post('tujuan'),
                'sasaran'           => $i->post('sasaran'),
                'standar_keberhasilan' => $i->post('standar_keberhasilan')
            ];
            $this->Crud_model->edit('tbl_proker', 'id_proker', $id_proker, $data);
            $this->session->set_flashdata('msg', 'diedit');
            redirect('admin/proker/edit/' . $id_proker, 'refresh');
        }
    }

    function detail($id_proker)
    {
        $proker = $this->Crud_model->listingOneAll('tbl_proker', 'id_proker', $id_proker);
        $data = [
            'proker'      => $proker,
            'content'   => 'admin/proker/detail'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function delete($id_proker)
    {
        $this->Crud_model->delete('tbl_proker', 'id_proker', $id_proker);
        $this->session->set_flashdata('msg', 'dihapus');
        redirect('admin/proker');
    }

    public function role()
    {
        $role = $this->Crud_model->listing('tbl_proker_role');
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

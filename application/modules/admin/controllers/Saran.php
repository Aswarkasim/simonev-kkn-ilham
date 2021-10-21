<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Saran extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin/Admin_model', 'AM');
    }


    public function index()
    {
        $saran = $this->AM->listSaran();
        $data = [
            'add'      => 'admin/saran/add',
            'edit'      => 'admin/saran/edit/',
            'delete'      => 'admin/saran/delete/',
            'saran'      => $saran,
            'content'   => 'admin/saran/index'
        ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }



    function add()
    {


        $this->load->helper('string');

        $id_user = $this->session->userdata('id_user');
        $user = $this->Crud_model->listingOne('tbl_user', 'id_user', $id_user);

        $valid = $this->form_validation;

        $valid->set_rules('isi_saran', 'Isi Saran', 'required');

        if ($valid->run() === FALSE) {
            $data = [
                'title'     => 'Kirim Saran',
                'add'       => 'admin/saran/add',
                'back'      => 'admin/saran',
                'content'   => 'admin/saran/add'
            ];
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $data = [
                'id_saran'         => random_string(),
                'id_user'           => $id_user,
                'id_angkatan'       => $user->id_angkatan,
                'id_lokasi'       => $user->id_lokasi,
                'id_dpl'       => $user->id_dpl,
                'isi_saran'       => $i->post('isi_saran'),
            ];
            $this->Crud_model->add('tbl_saran', $data);
            $this->session->set_flashdata('msg', 'ditambah');
            redirect('admin/saran', 'refresh');
        }
    }

    function edit($id_saran)
    {
        $saran = $this->Crud_model->listingOne('tbl_saran', 'id_saran', $id_saran);

        $valid = $this->form_validation;

        $valid->set_rules('tanggal', 'Tanggal', 'required');

        if ($valid->run() === FALSE) {
            $data = [
                'title'     => 'Edit ',
                'edit'       => 'admin/saran/edit/' . $id_saran,
                'back'      => 'admin/saran',
                'saran'      => $saran,
                'content'   => 'admin/saran/add'
            ];
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;


            $data = [
                'id_saran'       => $id_saran,
                'id_user'           => $this->session->userdata('id_user'),
                'tanggal'       => $i->post('tanggal'),
                'waktu_dari'             => $i->post('waktu_dari'),
                'waktu_sampai'      => $i->post('waktu_sampai'),
                'aktivitas'        => $i->post('aktivitas'),
            ];
            $this->Crud_model->edit('tbl_saran', 'id_saran', $id_saran, $data);
            $this->session->set_flashdata('msg', 'diedit');
            redirect('admin/saran/edit/' . $id_saran, 'refresh');
        }
    }

    function detail($id_saran)
    {
        $saran = $this->Crud_model->listingOneAll('tbl_saran', 'id_saran', $id_saran);
        $data = [
            'saran'      => $saran,
            'content'   => 'admin/saran/detail'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function delete($id_saran)
    {
        $this->Crud_model->delete('tbl_saran', 'id_saran', $id_saran);
        $this->session->set_flashdata('msg', 'dihapus');
        redirect('admin/saran');
    }

    public function role()
    {
        $role = $this->Crud_model->listing('tbl_saran_role');
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

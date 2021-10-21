<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Logbook extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin/Admin_model', 'AM');
    }


    public function index()
    {
        $role = $this->session->userdata('role');
        $id_user = $this->session->userdata('id_user');
        if ($role == 'Mahasiswa') {
            $logbook = $this->Crud_model->listingOneAll('tbl_logbook', 'id_user', $id_user);

            $data = [
                'add'      => 'admin/logbook/add',
                'edit'      => 'admin/logbook/edit/',
                'delete'      => 'admin/logbook/delete/',
                'logbook'      => $logbook,
                'content'   => 'admin/logbook/index'
            ];
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $logbook = $this->Crud_model->listing('tbl_logbook');
            $this->listMhsLogbook($role);
        }
    }

    function listMhsLogbook($role)
    {
        $id_angkatan = $this->session->userdata('id_angkatan');
        // print_r($id_angkatan);
        // die;
        if (($role == 'LP2M') || $role == 'Admin') {
            $mahasiswa = $this->AM->listMhsAngkatan($id_angkatan);
        } else if ($role == 'DPL') {
            $id_dpl = $this->session->userdata('id_user');
            $mahasiswa = $this->AM->listMhsDpl($id_angkatan, $id_dpl);
        }

        $data = [
            'mahasiswa' => $mahasiswa,
            'content'   => 'admin/logbook/list_mhs_logbook'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function listLogbook($id_user)
    {
        // $logbook = $this->Crud_model->listingOneAll('tbl_logbook', 'id_user', $id_user);
        $logbook = $this->Crud_model->listingOneAll('tbl_logbook', 'id_user', $id_user);
        $data = [
            'logbook'      => $logbook,
            'content'   => 'admin/logbook/index'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }


    function add()
    {


        $this->load->helper('string');

        $valid = $this->form_validation;

        $valid->set_rules('tanggal', 'Tanggal', 'required');

        if ($valid->run() === FALSE) {
            $data = [
                'title'     => 'Tambah Logbook',
                'add'       => 'admin/logbook/add',
                'back'      => 'admin/logbook',
                'content'   => 'admin/logbook/add'
            ];
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $data = [
                'id_logbook'         => random_string(),
                'id_user'           => $this->session->userdata('id_user'),
                'tanggal'       => $i->post('tanggal'),
                'waktu_dari'             => $i->post('waktu_dari'),
                'waktu_sampai'      => $i->post('waktu_sampai'),
                'aktivitas'        => $i->post('aktivitas')
            ];
            $this->Crud_model->add('tbl_logbook', $data);
            $this->session->set_flashdata('msg', 'ditambah');
            redirect('admin/logbook/add', 'refresh');
        }
    }

    function edit($id_logbook)
    {
        $logbook = $this->Crud_model->listingOne('tbl_logbook', 'id_logbook', $id_logbook);

        $valid = $this->form_validation;

        $valid->set_rules('tanggal', 'Tanggal', 'required');

        if ($valid->run() === FALSE) {
            $data = [
                'title'     => 'Edit ',
                'edit'       => 'admin/logbook/edit/' . $id_logbook,
                'back'      => 'admin/logbook',
                'logbook'      => $logbook,
                'content'   => 'admin/logbook/add'
            ];
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;


            $data = [
                'id_logbook'       => $id_logbook,
                'id_user'           => $this->session->userdata('id_user'),
                'tanggal'       => $i->post('tanggal'),
                'waktu_dari'             => $i->post('waktu_dari'),
                'waktu_sampai'      => $i->post('waktu_sampai'),
                'aktivitas'        => $i->post('aktivitas'),
            ];
            $this->Crud_model->edit('tbl_logbook', 'id_logbook', $id_logbook, $data);
            $this->session->set_flashdata('msg', 'diedit');
            redirect('admin/logbook/edit/' . $id_logbook, 'refresh');
        }
    }

    function detail($id_logbook)
    {
        $logbook = $this->Crud_model->listingOneAll('tbl_logbook', 'id_logbook', $id_logbook);
        $data = [
            'logbook'      => $logbook,
            'content'   => 'admin/logbook/detail'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function delete($id_logbook)
    {
        $this->Crud_model->delete('tbl_logbook', 'id_logbook', $id_logbook);
        $this->session->set_flashdata('msg', 'dihapus');
        redirect('admin/logbook');
    }

    public function role()
    {
        $role = $this->Crud_model->listing('tbl_logbook_role');
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

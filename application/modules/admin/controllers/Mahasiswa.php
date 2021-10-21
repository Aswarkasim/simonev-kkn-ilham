<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin/Admin_model', 'AM');
    }


    public function index()
    {
        $id_angkatan = $this->session->userdata('id_angkatan');
        $user = $this->AM->listMhsAngkatanLokasiNull($id_angkatan);

        $list_lok = $this->Crud_model->listing('tbl_lokasi');
        $data = [
            'add'      => 'admin/mahasiswa/add',
            'edit'      => 'admin/mahasiswa/edit/',
            'delete'      => 'admin/mahasiswa/delete/',
            'user'      => $user,
            'list_lok'    => $list_lok,
            'content'   => 'admin/mahasiswa/index'
        ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function pengelompokan()
    {
        $lokasi = $this->Crud_model->listing('tbl_lokasi');
        $data = [

            'lokasi' => $lokasi,
            'content' => 'admin/mahasiswa/lokasi'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function member($id_lokasi)
    {
        $id_angkatan = $this->session->userdata('id_angkatan');
        $user = $this->AM->listMhsLokasi($id_angkatan, $id_lokasi);
        $lokasi = $this->Crud_model->listingOne('tbl_lokasi', 'id_lokasi', $id_lokasi);

        $list_lok = $this->Crud_model->listing('tbl_lokasi');
        $data = [
            'user'      => $user,
            'lokasi'    => $lokasi,
            'list_lok'    => $list_lok,
            'content'   => 'admin/mahasiswa/member_lokasi'
        ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function submitLokasi()
    {
        $i = $this->input;
        $id_user = $i->post('id_user');
        $uri_member = $i->post('uri_member');
        $data = [
            'id_lokasi' => $i->post('id_lokasi')
        ];
        $this->Crud_model->edit('tbl_user', 'id_user', $id_user, $data);
        if ($uri_member == 'member') {
            redirect('admin/mahasiswa/member/' . $data['id_lokasi']);
        } else {
            redirect('admin/mahasiswa/index');
        }
    }
}

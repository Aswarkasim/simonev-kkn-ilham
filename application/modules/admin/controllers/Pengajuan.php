<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        // if (($this->session->pengajuandata('id_pengajuan') == "") || $this->session->pengajuandata('role') != "Admin") {
        //     redirect('error_page');
        // }

        $this->load->model('admin/Admin_model', 'AM');
    }


    public function index()
    {

        $role = $this->session->userdata('role');
        $id_user = $this->session->userdata('id_user');
        $id_lokasi = $this->session->userdata('id_lokasi');
        $pengajuan = $this->AM->cekPengajuan($id_user, $id_lokasi);
        if ($role == 'Mahasiswa') {
            $this->pengajuanData($pengajuan);
        } else {

            $pengajuan = $this->AM->listPengajuan('tbl_pengajuan');
            $data = [
                'add'           => 'admin/pengajuan/add',
                'edit'          => 'admin/pengajuan/edit/',
                'delete'        => 'admin/pengajuan/delete/',
                'pengajuan'     => $pengajuan,
                'content'       => 'admin/pengajuan/index'
            ];

            $this->load->view('admin/layout/wrapper', $data, FALSE);
        }
    }

    function pengajuanData($pengajuan)
    {
        $data = [
            'pengajuan'     => $pengajuan,
            'content'       => 'admin/pengajuan/list_for_mhs'
        ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function add()
    {


        $this->load->helper('string');
        $lokasi = $this->Crud_model->listing('tbl_lokasi');
        $id_user = $this->session->userdata('id_user');
        $user = $this->AM->userToLokasi($id_user);


        $valid = $this->form_validation;

        $valid->set_rules('alasan', 'Alasan', 'required');

        if ($valid->run() === FALSE) {
            $data = [
                'title'     => 'Tambah Pengajuan',
                'add'       => 'admin/pengajuan/add',
                'back'      => 'admin/pengajuan',
                'lokasi'    => $lokasi,
                'content'   => 'admin/pengajuan/add'
            ];
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $data = [
                'id_pengajuan'      => random_string(),
                'id_user'           => $id_user,
                'id_lokasi_awal'    => $user->id_lokasi,
                'nama_lokasi_awal'  => $user->nama_lokasi,
                'id_lokasi_tujuan'  => $i->post('id_lokasi_tujuan'),
                'alasan'            => $i->post('alasan')
            ];
            $this->Crud_model->add('tbl_pengajuan', $data);
            $this->session->set_flashdata('msg', 'ditambah');
            redirect('admin/pengajuan/index', 'refresh');
        }
    }

    function edit($id_pengajuan)
    {
        $pengajuan = $this->Crud_model->listingOne('tbl_pengajuan', 'id_pengajuan', $id_pengajuan);

        $valid = $this->form_validation;

        $valid->set_rules('tanggal', 'Tanggal', 'required');

        if ($valid->run() === FALSE) {
            $data = [
                'title'     => 'Edit ',
                'edit'       => 'admin/pengajuan/edit/' . $id_pengajuan,
                'back'      => 'admin/pengajuan',
                'pengajuan'      => $pengajuan,
                'content'   => 'admin/pengajuan/add'
            ];
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;


            $data = [
                'id_pengajuan'       => $id_pengajuan,
                'id_user'           => $this->session->userdata('id_user'),
                'tanggal'       => $i->post('tanggal'),
                'waktu_dari'             => $i->post('waktu_dari'),
                'waktu_sampai'      => $i->post('waktu_sampai'),
                'aktivitas'        => $i->post('aktivitas'),
            ];
            $this->Crud_model->edit('tbl_pengajuan', 'id_pengajuan', $id_pengajuan, $data);
            $this->session->set_flashdata('msg', 'diedit');
            redirect('admin/pengajuan/edit/' . $id_pengajuan, 'refresh');
        }
    }

    function detail($id_pengajuan)
    {
        $pengajuan = $this->Crud_model->listingOneAll('tbl_pengajuan', 'id_pengajuan', $id_pengajuan);
        $data = [
            'pengajuan'      => $pengajuan,
            'content'   => 'admin/pengajuan/detail'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function delete($id_pengajuan)
    {
        $this->Crud_model->delete('tbl_pengajuan', 'id_pengajuan', $id_pengajuan);
        $this->session->set_flashdata('msg', 'dihapus');
        redirect('admin/pengajuan');
    }

    public function role()
    {
        $role = $this->Crud_model->listing('tbl_pengajuan_role');
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

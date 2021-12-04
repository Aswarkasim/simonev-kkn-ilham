<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin/Admin_model', 'AM');
    }


    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $role = $this->session->userdata('role');
        $user = $this->Crud_model->listingOne('tbl_user', 'id_user', $id_user);

        $id_angkatan = $this->session->userdata('id_angkatan');
        if (($id_angkatan == '') || $id_angkatan == null) {
            $angkatan = $this->Crud_model->listingOne('tbl_angkatan', 'is_active', '1');
            $this->session->set_userdata('id_angkatan', $angkatan->id_angkatan);
            $this->session->set_userdata('nama_angkatan', $angkatan->nama_angkatan);
        }

        switch ($role) {
            case 'Admin':
                $this->admin($user);
                break;
            case 'Mahasiswa':
                $this->mahasiswa($user);
                break;
            case 'LP2M':
                $this->lp2m($user);
                break;
            case 'DPL':
                $this->dpl($user);
                break;
            case 'Profesi':
                $this->profesi($user);
                break;
            default:
                # code...
                break;
        }
    }

    function profesi($user)
    {
        $data = [
            'title'     => 'Dashboard',
            'user'      => $user,
            'content'   => 'admin/dashboard/profesi'
        ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function lp2m($user)
    {
        $data = [
            'title'     => 'Dashboard',
            'user'      => $user,
            'content'   => 'admin/dashboard/lp2m'
        ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    private function admin($user)
    {

        $saran = $this->Crud_model->listing('tbl_saran');
        $lokasi = $this->Crud_model->listing('tbl_lokasi');
        $prodi = $this->Crud_model->listing('tbl_prodi');
        $angkatan = $this->Crud_model->listing('tbl_angkatan');
        $data = [
            'title'     => 'Dashboard',
            'user'      => $user,
            'saran'      => $saran,
            'lokasi'      => $lokasi,
            'prodi'      => $prodi,
            'angkatan'      => $angkatan,
            'content'   => 'admin/dashboard/index'
        ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }


    private function dpl($user)
    {

        $data = [
            'title'     => 'Dashboard',
            'user'      => $user,
            'content'   => 'admin/dashboard/dpl'
        ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    private function mahasiswa($user)
    {
        $id_lokasi = $this->session->userdata('id_lokasi');
        $id_angkatan = $this->session->userdata('angkatan');
        $administrasi = $this->Crud_model->listingOneAll('tbl_administrasi', 'id_angkatan', $id_angkatan);
        $personil = $this->AM->listMhsLokasi($id_angkatan, $id_lokasi);
        $proker = $this->AM->listProkerLokasi($id_angkatan, $id_lokasi);

        $lokasi = $this->Crud_model->listingOne('tbl_lokasi', 'id_lokasi', $user->id_lokasi);

        $data = [
            'title'        => 'Dashboard',
            'user'         => $user,
            'personil'     => $personil,
            'proker'       => $proker,
            'lokasi'       => $lokasi,
            'administrasi' => $administrasi,
            'content'      => 'admin/dashboard/mahasiswa'
        ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }


    function is_angkatan($id_angkatan)
    {
        $akt = $this->Crud_model->listingOne('tbl_angkatan', 'id_angkatan', $id_angkatan);



        $this->session->set_userdata('id_angkatan', $id_angkatan);
        $this->session->set_userdata('nama_angkatan', $akt->nama_angkatan);
        redirect('admin/dashboard');
    }
}

/* End of file Dashboard.php */

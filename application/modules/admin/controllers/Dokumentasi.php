<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Dokumentasi extends CI_Controller
{


    public function index()
    {
        $this->load->helper('string');

        $dokumentasi = $this->Crud_model->listing('tbl_dokumentasi');
        $required = '%s tidak boleh kosong';
        $valid = $this->form_validation;
        $valid->set_rules('deskripsi', 'Deskripsi', 'required', ['required' => $required]);
        if (empty($_FILES['gambar']['name'])) {
            $valid->set_rules('gambar', 'Gambar', 'required');
        }
        if ($valid->run()) {
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path']   = './assets/uploads/images/';
                $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
                $config['max_size']      = '24000'; // KB 
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar')) {
                    $data = [
                        'dokumentasi'    => $dokumentasi,
                        'error'     => $this->upload->display_errors(),
                        'content'   => 'admin/dokumentasi/index'
                    ];
                    $this->load->view('admin/layout/wrapper', $data, FALSE);
                } else {
                    $upload_data = ['uploads' => $this->upload->data()];

                    $data = [
                        'id_dokumentasi'      => random_string('numeric', '5'),
                        'id_user'        => $this->session->userdata('id_user'),
                        'id_lokasi'        => $this->session->userdata('id_lokasi'),
                        'id_angkatan'        => $this->session->userdata('id_angkatan'),
                        'deskripsi'        => $this->input->post('deskripsi'),
                        'gambar'        => $config['upload_path'] . $upload_data['uploads']['file_name']
                    ];
                    $this->Crud_model->add('tbl_dokumentasi', $data);
                    $this->session->set_flashdata('msg', 'Banner ditambahkan');
                    redirect('admin/konfigurasi/dokumentasi/index');
                }
            }
        }
        $data = [
            'dokumentasi'    => $dokumentasi,
            'content'   => 'admin/dokumentasi/index'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function edit($id_dokumentasi)
    {

        $dokumentasi = $this->Crud_model->listingOne('tbl_dokumentasi', 'id_dokumentasi', $id_dokumentasi);
        $required = '%s tidak boleh kosong';
        $valid = $this->form_validation;
        $valid->set_rules('deskripsi', 'deskripsi', 'required', ['required' => $required]);
        // if (empty($_FILES['gambar']['name'])) {
        //     $valid->set_rules('gambar', 'Gambar', 'required');
        // }
        if ($valid->run()) {
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path']   = './assets/uploads/images/';
                $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
                $config['max_size']      = '24000'; // KB 
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar')) {
                    $data = [
                        'dokumentasi'    => $dokumentasi,
                        'error'     => $this->upload->display_errors(),
                        'content'   => 'admin/dokumentasi/edit'
                    ];
                    $this->load->view('admin/layout/wrapper', $data, FALSE);
                } else {
                    if ($dokumentasi->gambar != "") {
                        unlink('assets/uploads/images/' . $dokumentasi->gambar);
                    }
                    $upload_data = ['uploads' => $this->upload->data()];

                    $data = [
                        'id_dokumentasi'      => $id_dokumentasi,
                        'id_user'        => $this->session->userdata('id_user'),
                        'id_lokasi'        => $this->session->userdata('id_lokasi'),
                        'id_angkatan'        => $this->session->userdata('id_angkatan'),
                        'deskripsi'        => $this->input->post('deskripsi'),
                        'gambar'        => $config['upload_path'] . $upload_data['uploads']['file_name']
                    ];
                    $this->Crud_model->edit('tbl_dokumentasi', 'id_dokumentasi', $id_dokumentasi, $data);
                    $this->session->set_flashdata('msg', 'Banner ditambahkan');
                    redirect('admin/dokumentasi/index');
                }
            } else {
                $data = [
                    'id_dokumentasi'      => $id_dokumentasi,
                    'id_user'        => $this->session->userdata('id_user'),
                    'id_lokasi'        => $this->session->userdata('id_lokasi'),
                    'id_angkatan'        => $this->session->userdata('id_angkatan'),
                    'deskripsi'        => $this->input->post('deskripsi'),
                ];
                $this->Crud_model->edit('tbl_dokumentasi', 'id_dokumentasi', $id_dokumentasi, $data);
                $this->session->set_flashdata('msg', 'Banner ditambahkan');
                redirect('admin/dokumentasi/index');
            }
        }
        $data = [
            'dokumentasi'    => $dokumentasi,
            'content'   => 'admin/dokumentasi/edit'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function delete($id_dokumentasi)
    {
        $gambar = $this->Crud_model->listingOne('tbl_dokumentasi', 'id_dokumentasi', $id_dokumentasi);
        unlink($gambar->gambar);
        $this->Crud_model->delete('tbl_dokumentasi', 'id_dokumentasi', $id_dokumentasi);
        $this->session->set_flashdata('msg', 'Gambar telah dihapus');

        redirect('admin/konfigurasi/dokumentasi', 'refresh');
    }
}

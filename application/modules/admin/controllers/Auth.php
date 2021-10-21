<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {

        $this->load->model('admin/Auth_model', 'Auth');

        $valid = $this->form_validation;

        $valid->set_rules(
            'email',
            'Email',
            'required',
            array('required' => '%s harus diisi')
        );
        $valid->set_rules(
            'password',
            'Password',
            'required|min_length[6]',
            array(
                'required'     => 'Password harus diisi',
                'min_length'  => 'Password minimal 6 karakter'
            )
        );

        if ($valid->run() === FALSE) {
            $data = array(
                'title'     => 'Login Admin Ananda Private',
                'content'   => 'admin/auth/login'
            );
            $this->load->view('admin/auth/layout', $data);
        } else {
            $i          = $this->input;
            $email      = $i->post('email');
            $password   = $i->post('password');
            $cek_login  = $this->Auth->login($email, $password);
            $cek_login_id  = $this->Auth->loginId($email, $password);
            //print_r($email); die;


            if (!empty($cek_login) == 1) {
                $s = $this->session;
                $s->set_userdata('id_user', $cek_login->id_user);
                $s->set_userdata('email', $cek_login->email);
                $s->set_userdata('id_lokasi', $cek_login->id_lokasi);
                $s->set_userdata('namalengkap', $cek_login->namalengkap);
                $s->set_userdata('is_active', $cek_login->is_active);
                $s->set_userdata('role', $cek_login->role);

                redirect(base_url('admin/dashboard'), 'refresh');
            } else if (!empty($cek_login_id) == 1) {
                $s = $this->session;
                $s->set_userdata('id_user', $cek_login_id->id_user);
                $s->set_userdata('namalengkap', $cek_login_id->namalengkap);
                $s->set_userdata('id_lokasi', $cek_login_id->id_lokasi);
                $s->set_userdata('is_active', $cek_login_id->is_active);
                $s->set_userdata('role', $cek_login_id->role);

                redirect(base_url('admin/dashboard'), 'refresh');
            } else {
                $data = array(
                    'title'     => 'Login Admin Ananda Private',
                    'error'     => 'Email atau password salah',
                    'content'   => 'admin/auth/login'
                );
                $this->load->view('admin/auth/layout', $data);
            }
        }
    }


    function register()
    {
        $valid = $this->form_validation;

        $valid->set_rules('id_user', 'NIM/NIP', 'required|is_unique[tbl_user.id_user]', ['is_unique' => '%s telah digunakan']);
        $valid->set_rules('password', 'Password', 'required');
        $valid->set_rules('re_password', 'Konfrimasi Password', 'required|matches[password]', ['matches' => '%s tidak cocok']);

        $prodi = $this->Crud_model->listing('tbl_prodi');
        $angkatan = $this->Crud_model->listingOne('tbl_angkatan', 'is_active', '1');

        if ($valid->run() === FALSE) {
            $data = [
                'title'     => 'Kirim Saran',
                'prodi'     => $prodi,
                'content'   => 'admin/auth/register'
            ];
            $this->load->view('admin/auth/layout', $data);
        } else {
            $i = $this->input;
            $data = [
                'id_user'         => $i->post('id_user'),
                'role'       => $i->post('role'),
                'namalengkap'       => $i->post('namalengkap'),
                'id_prodi'       => $i->post('id_prodi'),
                'id_angkatan'       => $angkatan->id_angkatan,
                'password'       => sha1($i->post('password')),
            ];
            $this->Crud_model->add('tbl_user', $data);
            $this->session->set_flashdata('msg', 'ditambah');
            redirect('admin/auth', 'refresh');
        }
    }

    function logout()
    {
        // $s = $this->session;
        // $s->unset_userdata('id_user');
        // $s->unset_userdata('email');
        // $s->unset_userdata('nama_user');
        // $s->unset_userdata('role');
        // $s->unset_userdata('is_active');
        session_destroy();
        redirect(base_url('admin/auth'), 'refresh');
    }
}

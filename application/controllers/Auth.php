<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }

    function index()
    {    // Redirect ke halaman user jika sudah login
        if ($this->session->userdata('no_kk')) {
            redirect('user');
        }
        // Validasi form login
        $this->form_validation->set_rules('no_kk', 'NO_KK', 'required|trim', [
            'required' => 'Masukan No.Kartu Keluarga!',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Masukan Password!'
        ]);

        if ($this->form_validation->run() == false) {
            $data = [// Menampilkan halaman login
                'title' => "TA-CAKRA | Login"
            ];
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('templates/auth_footer');
        } else {
            // Memanggil fungsi login
            $this->_login();
        }
    }

    private function _login()
    {   // Mendapatkan data dari form login
        $no_kk = htmlspecialchars($this->input->post('no_kk', true));
        $password = $this->input->post('password', true);
        $user = $this->ModelUser->cekLogin(['no_kk' => $no_kk])->row_array();

        // jika usernya ada/terdaftar
        if ($user) {
            // jika user active(aktif)
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    // Menyimpan data user ke dalam session
                    $data = [
                        'no_kk' => $user['no_kk'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    // Redirect sesuai dengan role
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                     // Menampilkan pesan kesalahan jika password salah
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-danger alert-message" role="alert">
                            Password salah!
                        </div>'
                    );
                    redirect('auth');
                }
            } else {
                // Menampilkan pesan kesalahan jika akun belum diaktivasi
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-message" role="alert">
                        Akun belum diaktivasi!
                    </div>'
                );
                redirect('auth');
            }
        } else {
            // Menampilkan pesan kesalahan jika KK belum terdaftar
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-message" role="alert">
                    KK belum terdaftar!
                </div>'
            );
            redirect('auth');
        }
    }

    public function logout()
    {
         // Menghapus data user dari session saat logout
        $this->session->unset_userdata('no_kk');
        $this->session->unset_userdata('role_id');
         // Menampilkan pesan logout berhasil
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
                Kamu telah log out!
            </div>'
        );
        redirect('auth');
    }
}
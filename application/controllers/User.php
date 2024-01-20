<?php

use FontLib\Table\Type\post;

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation'));
        cek_login(); // Memastikan bahwa pengguna telah login
    }

    function index()
    {
        // Mendapatkan nomor KK dari session
        $no_kk = $this->session->userdata('no_kk');
        // Query untuk mendapatkan data transaksi yang sedang diproses untuk pengguna dengan nomor KK tertentu
        $query = "SELECT * FROM transaksi
        JOIN user ON user.id = transaksi.id_user
        WHERE transaksi.status = 'Diproses' AND user.no_kk = " . $no_kk;
        // Data yang akan dikirimkan ke tampilan
        $data = [
            'title' => "",
            'topbar' => $this->ModelUser->cekUser(['no_kk' => $no_kk])->row_array(),
            'sidebar' => $this->ModelUser->cekUser(['no_kk' => $no_kk])->row_array(),
            'tabungan' => $this->ModelTabungan->cekTabungan(['no_kk' => $no_kk])->row_array(),
            'transaksi' => $this->db->query($query)->result_array(),
            'jml_ptransaksi' => $this->db->query($query)->num_rows(),

        ];
        // Memuat tampilan
        $this->load->view('templates/user_header', $data);
        $this->load->view('user/topbar', $data);
        $this->load->view('user/sidebar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/user_footer', $data);
    }
    // Fungsi untuk menangani setoran
    public function setoran($id)
    {
        $this->form_validation->set_rules('nominal', 'nominal', 'required', [
            'required' => 'Masukan Nominal.'
        ]);
        $this->form_validation->set_rules('catatan', 'catatan', 'required', [
            'required' => 'Catatan.'
        ]);

        if ($this->form_validation->run() == false) {
            // Jika validasi gagal, tampilkan halaman setoran
            $no_kk = $this->session->userdata('no_kk');
            $data = [
                'topbar' => $this->ModelUser->cekUser(['no_kk' => $no_kk])->row_array(),
                'sidebar' => $this->ModelUser->cekUser(['no_kk' => $no_kk])->row_array(),
                'tabungan' => $this->ModelTabungan->cekTabungan(['no_kk' => $no_kk])->row_array(),
                'title' => 'Setoran',
            ];
            $this->load->model('ModelTransaksi');
            $this->load->view('templates/user_header', $data);
            $this->load->view('user/topbar', $data);
            $this->load->view('user/sidebar', $data);
            $this->load->view('user/setoran', $data);
            $this->load->view('templates/user_footer');
        } else {
            // Jika validasi berhasil, proses setoran
            $id_user = $this->input->post('id_user');
            $id_tabungan = $this->input->post('id_tabungan');
            $jenis_transaksi = 'Setoran';
            $nominal = $this->input->post('nominal', true);
            $catatan = $this->input->post('catatan', true);
            $metode_pembayaran = $this->input->post('metode_pembayaran');
            $status = 'Diproses';
            $tanggal = time();
            $file_name = str_replace('.', '', $id_user . $tanggal);
            $config['upload_path'] = FCPATH . './uploads/bukti/';
            $config['file_name'] = $file_name;
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['overwrite'] = TRUE;
            $config['max_size'] = 2048;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('bukti')) {
                $no_kk = $this->session->userdata('no_kk');
                $data = [
                    'topbar' => $this->ModelUser->cekUser(['no_kk' => $no_kk])->row_array(),
                    'sidebar' => $this->ModelUser->cekUser(['no_kk' => $no_kk])->row_array(),
                    'tabungan' => $this->ModelTabungan->cekTabungan(['no_kk' => $no_kk])->row_array(),
                    'title' => 'Setoran',
                ];

                $this->load->view('templates/user_header', $data);
                $this->load->view('user/topbar', $data);
                $this->load->view('user/sidebar', $data);
                $this->load->view('user/setoran', $data);
                $this->load->view('templates/user_footer');
                $error = $this->upload->display_errors();
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                    <i class="bi bi-cross-circle me-1"></i>' . $error
                        .
                        '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
                );
            } else {
                $dataTransaksi = array(
                    'id_user' => $id_user,
                    'jenis_transaksi' => $jenis_transaksi,
                    'nominal' => $nominal,
                    'catatan' => $catatan,
                    'metode_pembayaran' => $metode_pembayaran,
                    'bukti' => $this->upload->data('file_name'),
                    'status' => $status,
                    'id_tabungan' => $id_tabungan,
                    'tanggal' => $tanggal
                );
                $this->ModelTransaksi->tambahTransaksi($dataTransaksi);
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    <b>Sukses!</b> Transaksi anda sedang diproses. Harap tunggu.
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
                );
                redirect('user/riwayat/' . $id);
            }
        }
    }

    public function penarikan($id)
     // Fungsi untuk menangani penarikan
    {
        $this->form_validation->set_rules('nominal', 'nominal', 'required', [
            'required' => 'Masukan Nominal.'
        ]);
        $this->form_validation->set_rules('catatan', 'catatan', 'required', [
            'required' => 'Masukan Catatan.'
        ]);

        if ($this->form_validation->run() == false) {
            $no_kk = $this->session->userdata('no_kk');
            $data = [
                'topbar' => $this->ModelUser->cekUser(['no_kk' => $no_kk])->row_array(),
                'sidebar' => $this->ModelUser->cekUser(['no_kk' => $no_kk])->row_array(),
                'tabungan' => $this->ModelTabungan->cekTabungan(['no_kk' => $no_kk])->row_array(),
                'title' => 'Penarikan',
            ];
            $this->load->model('ModelTransaksi');
            $this->load->view('templates/user_header', $data);
            $this->load->view('user/topbar', $data);
            $this->load->view('user/sidebar', $data);
            $this->load->view('user/penarikan', $data);
            $this->load->view('templates/user_footer');
        } else {
            $id_user = $this->input->post('id_user');
            $nominal = $this->input->post('nominal', true);
            $id_tabungan = $this->input->post('id_tabungan');
            $jenis_transaksi = 'Penarikan';
            $nominal = $this->input->post('nominal', true);
            $catatan = $this->input->post('catatan', true);
            $metode_pembayaran = $this->input->post('metode_pembayaran');
            $status = 'Diproses';
            $tanggal = time();
            $dataTransaksi = array(
                'id_user' => $id_user,
                'jenis_transaksi' => $jenis_transaksi,
                'nominal' => $nominal,
                'catatan' => $catatan,
                'metode_pembayaran' => $metode_pembayaran,
                'bukti' => '',
                'status' => $status,
                'id_tabungan' => $id_tabungan,
                'tanggal' => $tanggal
            );

            $saldo = $this->input->post('saldo');
            if ($nominal > $saldo) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                            <i class="bi bi-x-circle me-1"></i>
                            <b>Gagal!</b> Saldo anda tidak cukup.
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>'
                );
                redirect('user/penarikan/' . $id);
            } else {
                $this->ModelTransaksi->tambahTransaksi($dataTransaksi);
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i>
                            <b>Sukses!</b> Transaksi anda sedang diproses. Harap tunggu.
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>'
                );
                redirect('user/riwayat/' . $id);
            }
        };
    }
     // Fungsi untuk menampilkan riwayat transaksi
    function riwayat($id)
    {
        $no_kk = $this->session->userdata('no_kk');
        $data = [
            'title' => "Riwayat",
            'topbar' => $this->ModelUser->cekUser(['no_kk' => $no_kk])->row_array(),
            'sidebar' => $this->ModelUser->cekUser(['no_kk' => $no_kk])->row_array(),
            'uang_masuk' => $this->db->query(
                "SELECT SUM(nominal) AS uang_masuk FROM transaksi 
                WHERE id_user = " . $id . " AND jenis_transaksi = 'Setoran' AND status = 'Diterima'"
            )->row_array(),
            'uang_keluar' => $this->db->query(
                "SELECT SUM(nominal) AS uang_keluar FROM transaksi 
                WHERE id_user = " . $id . " AND jenis_transaksi = 'Penarikan' AND status = 'Diterima'"
            )->row_array(),
            'transaksi_proses' => $this->ModelTransaksi->cekTransaksi([
                'id_user' => $id,
                'status' => 'Diproses'
            ])->result_array(),
            'transaksi_terima' => $this->ModelTransaksi->cekTransaksi([
                'id_user' => $id,
                'status' => 'Diterima'
            ])->result_array(),
            'transaksi_tolak' => $this->ModelTransaksi->cekTransaksi([
                'id_user' => $id,
                'status' => 'Ditolak'
            ])->result_array(),
        ];
        $this->load->view('templates/user_header', $data);
        $this->load->view('user/topbar', $data);
        $this->load->view('user/sidebar', $data);
        $this->load->view('user/riwayat', $data);
        $this->load->view('templates/user_footer', $data);
    }
    // Fungsi untuk menampilkan detail riwayat transaksi
    public function detailRiwayat($id_transaksi)
    {
        $no_kk = $this->session->userdata('no_kk');
        $data = [
            'title' => "Detail Riwayat",
            'topbar' => $this->ModelUser->cekUser(['no_kk' => $no_kk])->row_array(),
            'sidebar' => $this->ModelUser->cekUser(['no_kk' => $no_kk])->row_array(),
            'transaksi' => $this->ModelTransaksi->cekTransaksi([
                'id_transaksi' => $id_transaksi
            ])->row_array(),
            'warga' => $this->db->query(
                "SELECT warga.no_kk, warga.no_telepon, user.nama
                FROM warga
                JOIN user ON warga.no_kk = user.no_kk
                JOIN transaksi ON user.id = transaksi.id_user
                WHERE transaksi.id_transaksi= " . $id_transaksi
            )->row_array(),
        ];
        $this->load->view('templates/user_header', $data);
        $this->load->view('user/topbar', $data);
        $this->load->view('user/sidebar', $data);
        $this->load->view('user/detail_riwayat', $data);
        $this->load->view('templates/user_footer', $data);
    }
     // Fungsi untuk mencetak riwayat transaksi dalam format PDF atau Excel
    public function print_t_diproses($id)
    {
        $no_kk = $this->session->userdata('no_kk');
        $query = "SELECT * FROM transaksi
        JOIN user ON user.id = transaksi.id_user
        JOIN warga ON warga.no_kk = user.no_kk
        WHERE transaksi.status = 'Diproses' AND user.id = " . $id;
        $data = [
            'title' => "Cetak Riwayat - Diproses",
            'transaksi' => $this->db->query($query)->result_array(),
        ];
        $this->load->view('user/print_transaksi', $data);
    }

    public function print_t_diterima($id)
    {
        $no_kk = $this->session->userdata('no_kk');
        $query = "SELECT * FROM transaksi
        JOIN user ON user.id = transaksi.id_user
        JOIN warga ON warga.no_kk = user.no_kk
        WHERE transaksi.status = 'Diterima' AND user.id = " . $id;
        $data = [
            'title' => "Cetak Riwayat - Diterima",
            'transaksi' => $this->db->query($query)->result_array(),
        ];
        $this->load->view('user/print_transaksi', $data);
    }

    public function print_t_ditolak($id)
    {
        $no_kk = $this->session->userdata('no_kk');
        $query = "SELECT * FROM transaksi
        JOIN user ON user.id = transaksi.id_user
        JOIN warga ON warga.no_kk = user.no_kk
        WHERE transaksi.status = 'Ditolak' AND user.id = " . $id;
        $data = [
            'title' => "Cetak Riwayat - Ditolak",
            'transaksi' => $this->db->query($query)->result_array(),
        ];
        $this->load->view('user/print_transaksi', $data);
    }
    public function pdf_t_diproses($id)
    {
        $this->load->library('Dompdf_gen');

        $query = "SELECT * FROM transaksi
        JOIN user ON user.id = transaksi.id_user
        JOIN warga ON warga.no_kk = user.no_kk
        WHERE transaksi.status = 'Diproses' AND user.id = " . $id;

        $data = [
            'transaksi' => $this->db->query($query)->result_array(),
        ];

        $this->load->view('user/pdf_transaksi', $data);

        $paper = 'A4';
        $orien = 'landscape';
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paper, $orien);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('laporan_transaksi_diproses.pdf');
    }

    public function pdf_t_diterima($id)
    {
        $this->load->library('Dompdf_gen');

        $query = "SELECT * FROM transaksi
        JOIN user ON user.id = transaksi.id_user
        JOIN warga ON warga.no_kk = user.no_kk
        WHERE transaksi.status = 'Diterima' AND user.id = " . $id;
        $data = [
            'transaksi' => $this->db->query($query)->result_array(),
        ];
        $this->load->view('user/pdf_transaksi', $data);

        $paper = 'A4';
        $orien = 'landscape';
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paper, $orien);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('laporan_transaksi_diterima.pdf');
    }

    public function pdf_t_ditolak($id)
    {
        $this->load->library('Dompdf_gen');

        $query = "SELECT * FROM transaksi
        JOIN user ON user.id = transaksi.id_user
        JOIN warga ON warga.no_kk = user.no_kk
        WHERE transaksi.status = 'Ditolak' AND user.id = " . $id;
        $data = [
            'transaksi' => $this->db->query($query)->result_array(),
        ];
        $this->load->view('user/pdf_transaksi', $data);

        $paper = 'A4';
        $orien = 'landscape';
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paper, $orien);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('laporan_transaksi_ditolak.pdf');
    }

    public function excel_t_diproses($id)
    {
        $query = "SELECT * FROM transaksi
        JOIN user ON user.id = transaksi.id_user
        JOIN warga ON warga.no_kk = user.no_kk
        WHERE transaksi.status = 'Diproses' AND user.id = " . $id;
        $data = [
            'transaksi' => $this->db->query($query)->result_array(),
            'filename' => "Laporan Transaksi Diproses",
        ];
        $this->load->view('user/excel_transaksi', $data);
    }

    public function excel_t_diterima($id)
    {
        $query = "SELECT * FROM transaksi
        JOIN user ON user.id = transaksi.id_user
        JOIN warga ON warga.no_kk = user.no_kk
        WHERE transaksi.status = 'Diterima' AND user.id = " . $id;
        $data = [
            'transaksi' => $this->db->query($query)->result_array(),
            'filename' => "Laporan Transaksi Diterima",
        ];
        $this->load->view('user/excel_transaksi', $data);
    }

    public function excel_t_ditolak($id)
    {
        $query = "SELECT * FROM transaksi
        JOIN user ON user.id = transaksi.id_user
        JOIN warga ON warga.no_kk = user.no_kk
        WHERE transaksi.status = 'Ditolak' AND user.id = " . $id;
        $data = [
            'transaksi' => $this->db->query($query)->result_array(),
            'filename' => "Laporan Transaksi Ditolak",
        ];
        $this->load->view('user/excel_transaksi', $data);
    }
    // Fungsi untuk mengelola profil pengguna
    public function profile()
    {

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
            'required' => 'Nama belum diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $no_kk = $this->session->userdata('no_kk');
            $query = "SELECT * FROM warga
        JOIN user ON warga.no_kk = user.no_kk
        WHERE warga.no_kk = " . $no_kk;
            $data = [
                'title' => 'Profile',
                'topbar' => $this->ModelUser->cekUser(['no_kk' => $no_kk])->row_array(),
                'user' => $this->ModelUser->cekUser(['no_kk' => $no_kk])->row_array(),
                'sidebar' => $this->ModelUser->cekUser(['no_kk' => $no_kk])->row_array(),
                'profile' => $this->db->query($query)->row_array()
            ];

            $this->load->view('templates/user_header', $data);
            $this->load->view('user/topbar', $data);
            $this->load->view('user/sidebar', $data);
            $this->load->view('user/profile', $data);
            $this->load->view('templates/user_footer');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'image' => $this->input->post('image'),
                'password' => $this->input->post('password'),
                'role_id' => $this->input->post('role_id'),
                'is_active' => $this->input->post('is_active'),
                'date_created' => $this->input->post('date_created')
            ];

            $this->ModelUser->editProfile_proses($data);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    <b>Sukses!</b> Profil telah diperbarui.
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('user/profile');
        }
    }
      // Fungsi untuk mengganti password
    public function ganti_password()
    {
        $password_lama1 = $this->input->post('password_lama1');
        $password_lama2 = $this->input->post('password_lama2');
        $password = $this->input->post('password');
        $password2 = $this->input->post('password2');

        if (password_verify($password_lama2, $password_lama1)) {
            if ($password == $password2 && !$password == '' && !$password2 == '') {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                        <i class="bi bi-x-circle me-1"></i>
                        <b>tuh!</b> Password baru sama.
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                redirect('user/profile');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                        <i class="bi bi-x-circle me-1"></i>
                        <b>Gagal!</b> Password baru tidak sama atau belum diisi.
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                redirect('user/profile');
            }
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                    <i class="bi bi-x-circle me-1"></i>
                    <b>Gagal!</b> Password lama tidak sama.
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('user/profile');
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    // Konstruktor class Admin
    public function __construct()
    {
        parent::__construct();
        cek_login(); // Fungsi cek_login untuk memastikan pengguna telah login sebelum mengakses fungsi ini
    }

    // Fungsi untuk menampilkan halaman utama admin
    function index()
    {
        $no_kk = $this->session->userdata('no_kk');
        // Menyiapkan data yang akan dikirim ke tampilan, Mencakup judul hall, informasi pengguna tobar, data warga, jlm warga dan transaksi yg sedang diproses
        $data = [
            'title' => "Setitik Tabungan, Jejak Keberlanjutan",
            'topbar' => $this->ModelUser->cekUser(['no_kk' => $no_kk])->row_array(),
            'warga' => $this->ModelWarga->getWarga()->result_array(),
            'jmlWarga' => $this->ModelWarga->getWarga()->num_rows(),
            'jmlProses' => $this->ModelTransaksi->cekTransaksi([
                'status' => 'Diproses'
            ])->num_rows(),
        ];
        // Memuat template dan view
        $this->load->view('templates/admin_header', $data); //Memuat tampilan untuk bagian header
        $this->load->view('admin/topbar', $data); //Memuat tampilan untuk bagian atas (topbar)
        $this->load->view('admin/sidebar', $data); //Memuat tampilan untuk bagian samping (sidebar)
        $this->load->view('admin/index', $data); //Memuat tampilan utama halaman admin
        $this->load->view('templates/admin_footer', $data); //Memuat tampilan untuk bagian footer
    }

    // Fungsi untuk menampilkan data warga
    function dataWarga()
    {
        $no_kk = $this->session->userdata('no_kk');
        $data = [
            'title' => "Data Warga",
            'topbar' => $this->ModelUser->cekUser(['no_kk' => $no_kk])->row_array(),
            'warga' => $this->ModelWarga->getWarga()->result_array(),
        ];
    // Memuat template dan view
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/dataWarga', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    // Fungsi untuk menambahkan data warga
    public function tambahWarga()
    {
        $this->form_validation->set_rules('no_kk', 'Nomor KK', 'required|trim|is_unique[user.no_kk]', [
            'required' => 'Masukan NOMOR KK.',
            'is_unique' => 'NOMOR KK sudah ada.'
        ]);

        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Masukan Nama.'
        ]);
        $this->form_validation->set_rules('no_telepon', 'No Telepon', 'required', [
            'required' => 'Masukan No Telepon.'
        ]);

        if ($this->form_validation->run() == false) {
            $no_kk = $this->session->userdata('no_kk');
            $data = [
                'topbar' => $this->ModelUser->cekUser(['no_kk' => $no_kk])->row_array(),
                'title' => 'Tambah Warga'
            ];

            // Memuat template dan view
            $this->load->view('templates/admin_header', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/tambahWarga', $data);
            $this->load->view('templates/admin_footer');
        } else {
            // Menyimpan data warga
            $no_kk = $this->input->post('no_kk', true);
            $dataWarga = [
                'no_kk' => htmlspecialchars($no_kk),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'no_telepon' => htmlspecialchars($this->input->post('no_telepon', true)),
                'komplek' => $this->input->post('komplek'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tahun_masuk' => $this->input->post('tahun_masuk'),
            ];
            $this->ModelWarga->tambahWarga($dataWarga);
            
            // Menyimpan data user
            $dataUser = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'no_kk' => htmlspecialchars($no_kk),
                'image' => 'default.jpg',
                'password' => password_hash(
                    'tacakra2023',
                    PASSWORD_DEFAULT
                ),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->ModelUser->simpanData($dataUser);

            // Menyimpan data tabungan
            $dataTabungan = [
                'no_kk' => htmlspecialchars($no_kk),
            ];
            $this->ModelTabungan->tambahTabungan($dataTabungan);

            // Menampilkan pesan sukses dan redirect ke halaman data warga
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                <b>Sukses!</b> Warga baru telah ditambahkan.
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
            );
            redirect('admin/dataWarga');
        }
    }

    // Fungsi untuk menampilkan data transaksi
    function dataTransaksi()
    {
        $no_kk = $this->session->userdata('no_kk');
        $data = [
            'title' => "Data Transaksi",
            'topbar' => $this->ModelUser->cekUser(['no_kk' => $no_kk])->row_array(),
            'setoran_proses' => $this->ModelTransaksi->cekTransaksi([
                'jenis_transaksi' => 'Setoran',
                'status' => 'Diproses'
            ])->result_array(),
            'penarikan_proses' => $this->ModelTransaksi->cekTransaksi([
                'jenis_transaksi' => 'Penarikan',
                'status' => 'Diproses'
            ])->result_array(),

        ];
         // Memuat template dan view
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/dataTransaksi', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    // Fungsi untuk menampilkan detail transaksi setoran
    function detailSetoran($id_transaksi)
    {
        $no_kk = $this->session->userdata('no_kk');

        $data = [
            'title' => "Detail Setoran",
            'topbar' => $this->ModelUser->cekUser(['no_kk' => $no_kk])->row_array(),
            'transaksi' => $this->ModelTransaksi->cekTransaksi([
                'id_transaksi' => $id_transaksi
            ])->row_array(),
            'tabungan' => $this->db->query(
                "SELECT tabungan.id_tabungan, tabungan.no_kk, tabungan.saldo
                FROM tabungan
                INNER JOIN transaksi ON tabungan.id_tabungan = transaksi.id_tabungan
                WHERE transaksi.id_transaksi= " . $id_transaksi
            )->row_array(),
            'warga' => $this->db->query(
                "SELECT warga.no_kk, warga.no_telepon, user.nama
                FROM warga
                JOIN user ON warga.no_kk = user.no_kk
                JOIN transaksi ON user.id = transaksi.id_user
                WHERE transaksi.id_transaksi= " . $id_transaksi
            )->row_array(),

        ];
        // Memuat template dan view
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/detail_setoran', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    // Fungsi untuk memproses transaksi setoran (menerima)
    function terimaSetoran($id_transaksi)
    {
        $id_user = $this->input->post('id_user');
        $id_tabungan = $this->input->post('id_tabungan');
        $jenis_transaksi = $this->input->post('jenis_transaksi');
        $nominal = $this->input->post('nominal', true);
        $catatan = $this->input->post('catatan', true);
        $metode_pembayaran = $this->input->post('metode_pembayaran');
        $status = 'Diterima';
        $bukti = $this->input->post('bukti');
        $tanggal = $this->input->post('tanggal');
        $dataTransaksi = array(
            'id_user' => $id_user,
            'jenis_transaksi' => $jenis_transaksi,
            'nominal' => $nominal,
            'catatan' => $catatan,
            'metode_pembayaran' => $metode_pembayaran,
            'bukti' => $bukti,
            'status' => $status,
            'id_tabungan' => $id_tabungan,
            'tanggal' => $tanggal
        );
        $this->ModelTransaksi->updateTransaksi($dataTransaksi);
        $no_kk = $this->input->post('no_kk');
        $old_saldo = $this->input->post('saldo');
        $saldo = $old_saldo + $nominal;
        $dataTabungan = array(
            'no_kk' => $no_kk,
            'saldo' => $saldo,
        );
        $this->ModelTabungan->updateTabungan($dataTabungan);
        // Menampilkan pesan sukses dan redirect ke halaman data transaksi
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    <b>Sukses!</b> Transaksi telah diproses.
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
        );
        redirect('admin/dataTransaksi');
    }

    // Fungsi untuk memproses transaksi setoran (menolak)
    function tolakSetoran($id_transaksi)
    {
        $id_user = $this->input->post('id_user');
        $id_tabungan = $this->input->post('id_tabungan');
        $jenis_transaksi = $this->input->post('jenis_transaksi');
        $nominal = $this->input->post('nominal', true);
        $catatan = $this->input->post('catatan', true);
        $metode_pembayaran = $this->input->post('metode_pembayaran');
        $status = 'Ditolak';
        $bukti = $this->input->post('bukti');
        $tanggal = $this->input->post('tanggal');
        $dataTransaksi = array(
            'id_user' => $id_user,
            'jenis_transaksi' => $jenis_transaksi,
            'nominal' => $nominal,
            'catatan' => $catatan,
            'metode_pembayaran' => $metode_pembayaran,
            'bukti' => $bukti,
            'status' => $status,
            'id_tabungan' => $id_tabungan,
            'tanggal' => $tanggal
        );
        $this->ModelTransaksi->updateTransaksi($dataTransaksi);
        // Menampilkan pesan sukses dan redirect ke halaman data transaksi
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    <b>Sukses!</b> Transaksi telah ditolak.
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
        );
        redirect('admin/dataTransaksi');
    }

    // Fungsi untuk menampilkan detail transaksi penarikan
    function detailPenarikan($id_transaksi)
    {
        $no_kk = $this->session->userdata('no_kk');

        $data = [
            'title' => "Detail Penarikan",
            'topbar' => $this->ModelUser->cekUser(['no_kk' => $no_kk])->row_array(),
            'transaksi' => $this->ModelTransaksi->cekTransaksi([
                'id_transaksi' => $id_transaksi
            ])->row_array(),
            'tabungan' => $this->db->query(
                "SELECT tabungan.id_tabungan, tabungan.no_Kk, tabungan.saldo
                FROM tabungan
                INNER JOIN transaksi ON tabungan.id_tabungan = transaksi.id_tabungan
                WHERE transaksi.id_transaksi= " . $id_transaksi
            )->row_array(),
            'warga' => $this->db->query(
                "SELECT warga.no_kk, warga.no_telepon, user.nama
                FROM warga
                JOIN user ON warga.no_kk = user.no_kk
                JOIN transaksi ON user.id = transaksi.id_user
                WHERE transaksi.id_transaksi= " . $id_transaksi
            )->row_array(),

        ];
        // Memuat template dan view
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/detail_penarikan', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    // Fungsi untuk memproses transaksi penarikan (menerima)
    function terimaPenarikan($id_transaksi)
    {
        $id_user = $this->input->post('id_user');
        $id_tabungan = $this->input->post('id_tabungan');
        $jenis_transaksi = $this->input->post('jenis_transaksi');
        $nominal = $this->input->post('nominal', true);
        $catatan = $this->input->post('catatan', true);
        $metode_pembayaran = $this->input->post('metode_pembayaran');
        $status = 'Diterima';
        $tanggal = $this->input->post('tanggal');
        $file_name = str_replace('.', '', $id_user . $tanggal);
        $config['upload_path'] = FCPATH . './uploads/bukti/';
        $config['file_name'] = $file_name;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['overwrite'] = TRUE;
        $config['max_size'] = 2048;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('bukti')) {
            $error = $this->upload->display_errors();
            // Menampilkan pesan sukses dan redirect ke halaman data transaksi
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                <i class="bi bi-cross-circle me-1"></i>' . $error
                    .
                    '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
            );
            redirect('admin/detailPenarikan/' . $id_transaksi);
        } else {
            // Menyiapkan data transaksi untuk diupdate
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
            // Memproses update transaksi
            $this->ModelTransaksi->updateTransaksi($dataTransaksi);
            $no_kk = $this->input->post('no_kk');
            $old_saldo = $this->input->post('saldo');
            $saldo = $old_saldo - $nominal;
            // Menyiapkan data tabungan untuk diupdate
            $dataTabungan = array(
                'no_kk' => $no_kk,
                'saldo' => $saldo,
            );
            // Memproses update tabungan
            $this->ModelTabungan->updateTabungan($dataTabungan);
            // Menampilkan pesan sukses dan redirect ke halaman data transaksi
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        <b>Sukses!</b> Transaksi telah diproses.
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
            );
            redirect('admin/dataTransaksi');
        }
    }

    // Fungsi untuk memproses transaksi penarikan (menolak)
    function tolakPenarikan($id_transaksi)
    {
        $id_user = $this->input->post('id_user');
        $id_tabungan = $this->input->post('id_tabungan');
        $jenis_transaksi = $this->input->post('jenis_transaksi');
        $nominal = $this->input->post('nominal', true);
        $catatan = $this->input->post('catatan', true);
        $metode_pembayaran = $this->input->post('metode_pembayaran');
        $status = 'Ditolak';
        $bukti = $this->input->post('bukti');
        $tanggal = $this->input->post('tanggal');
        // Menyiapkan data transaksi untuk diupdate
        $dataTransaksi = array(
            'id_user' => $id_user,
            'jenis_transaksi' => $jenis_transaksi,
            'nominal' => $nominal,
            'catatan' => $catatan,
            'metode_pembayaran' => $metode_pembayaran,
            'bukti' => $bukti,
            'status' => $status,
            'id_tabungan' => $id_tabungan,
            'tanggal' => $tanggal
        );
        // Memproses update transaksi
        $this->ModelTransaksi->updateTransaksi($dataTransaksi);

        // Menampilkan pesan sukses dan redirect ke halaman data transaksi
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    <b>Sukses!</b> Transaksi telah ditolak.
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
        );
        redirect('admin/dataTransaksi');
    }

    function dataTabungan()
    {
        // Mendapatkan nomor KK dari sesi pengguna
        $no_kk = $this->session->userdata('no_kk');
        // Query untuk mendapatkan detail tabungan dengan join ke tabel transaksi dan warga
        $query = "SELECT * FROM tabungan 
        JOIN user ON user.no_kk = tabungan.no_kk
        JOIN warga ON warga.no_kk = tabungan.no_kk";
         // Query untuk mendapatkan total saldo dari tabungan tertentu
        $sumSaldo = $this->db->query("SELECT SUM(saldo) AS saldo_diterima FROM tabungan");
        // Data yang akan dikirim ke tampilan
        $data = [
            'title' => "Data Tabungan Warga",
            'topbar' => $this->ModelUser->cekUser(['no_kk' => $no_kk])->row_array(),
            'saldo' => $sumSaldo->row_array(),
            'tabungan' => $this->db->query($query)->result_array(),
            'saldo_masuk' => $this->db->query(
                "SELECT SUM(nominal) AS saldo_masuk FROM transaksi 
                WHERE jenis_transaksi = 'Setoran' AND status = 'Diterima'"
            )->row_array(),
            'saldo_keluar' => $this->db->query(
                "SELECT SUM(nominal) AS saldo_keluar FROM transaksi 
                WHERE jenis_transaksi = 'Penarikan' AND status = 'Diterima'"
            )->row_array(),
        ];
        // Memuat tampilan dan mengirimkan data
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/dataTabungan', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    function detailTabungan($id_tabungan)
    // Mendapatkan nomor KK dari sesi pengguna
    {
        $no_kk = $this->session->userdata('no_kk');

        // Query untuk mendapatkan detail tabungan dengan join ke tabel transaksi dan warga
        $query = "SELECT * FROM tabungan 
        JOIN transaksi ON transaksi.id_tabungan = tabungan.id_tabungan
        JOIN warga ON warga.no_kk = tabungan.no_kk
        WHERE tabungan.id_tabungan = " . $id_tabungan;

        // Query untuk mendapatkan informasi pengguna terkait dengan tabungan
        $user = "SELECT * FROM tabungan 
        JOIN user ON user.no_kk = tabungan.no_kk
        JOIN warga ON warga.no_kk = tabungan.no_kk
        WHERE tabungan.id_tabungan = " . $id_tabungan;

        // Query untuk mendapatkan total saldo dari tabungan tertentu
        $sumSaldo = $this->db->query("SELECT SUM(saldo) AS saldo_diterima FROM tabungan WHERE id_tabungan = " . $id_tabungan);
        // Data yang akan dikirim ke tampilan
        $data = [
            'title' => "Detail Tabungan Warga",
            'topbar' => $this->ModelUser->cekUser(['no_kk' => $no_kk])->row_array(),
            'saldo' => $sumSaldo->row_array(),
            'tabungan' => $this->db->query($query)->result_array(),
            'user' => $this->db->query($user)->row_array(),
            'saldo_masuk' => $this->db->query(
                "SELECT SUM(nominal) AS saldo_masuk FROM transaksi 
                WHERE jenis_transaksi = 'Setoran' AND status = 'Diterima' AND id_tabungan = " . $id_tabungan
            )->row_array(),
            'saldo_keluar' => $this->db->query(
                "SELECT SUM(nominal) AS saldo_keluar FROM transaksi 
                WHERE jenis_transaksi = 'Penarikan' AND status = 'Diterima' AND id_tabungan = " . $id_tabungan
            )->row_array(),
        ];
        // Memuat tampilan dan mengirimkan data
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/detailTabungan', $data);
        $this->load->view('templates/admin_footer', $data);
    }



    public function profile()
    {
        // Validasi formulir untuk Nama Lengkap
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
            'required' => 'Nama belum diisi!'
        ]);
        // Jika validasi tidak berhasil, tampilkan halaman profil
        if ($this->form_validation->run() == false) {
            $no_kk = $this->session->userdata('no_kk');
            $data = [
                'title' => 'Profile',
                'topbar' => $this->ModelUser->cekUser(['no_kk' => $no_kk])->row_array(),
                'user' => $this->ModelUser->cekUser(['no_kk' => $no_kk])->row_array()
            ];
            // Memuat tampilan profil
            $this->load->view('templates/admin_header', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/profile', $data);
            $this->load->view('templates/admin_footer');
        } else {
            // Jika validasi berhasil, proses pembaruan profiL
            $data = [
                'id' => $this->input->post('id'),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'image' => $this->input->post('image'),
                'password' => $this->input->post('password'),
                'role_id' => $this->input->post('role_id'),
                'is_active' => $this->input->post('is_active'),
                'date_created' => $this->input->post('date_created')
            ];
            // Memanggil model untuk melakukan pembaruan profil
            $this->ModelUser->editProfile_proses($data);
            // Menetapkan pesan sukses dan mengalihkan ke halaman profil
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    <b>Sukses!</b> Profil telah diperbarui.
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('admin/profile');
        }
    }

    public function print_data_warga()
    {
        // Data yang akan dikirim ke tampilan
        $data = [
            'title' => "Cetak Data Warga",
            'warga' => $this->ModelWarga->getWarga()->result_array(),
        ];
        // Memuat tampilan untuk mencetak data warga
        $this->load->view('admin/print_data_warga', $data);
    }

    public function pdf_data_warga()
    {
        // Memuat library Dompdf
        $this->load->library('Dompdf_gen');

        // Data yang akan dikirim ke tampilan PDF
        $data = [
            'title' => "Cetak Data Warga",
            'warga' => $this->ModelWarga->getWarga()->result_array(),
        ];
        // Memuat tampilan PDF
        $this->load->view('admin/pdf_data_warga', $data);

        // Konfigurasi kertas dan orientasi
        $paper = 'A4';
        $orien = 'landscape';
        $html = $this->output->get_output();
        // Mengatur kertas dan orientasi untuk file PDF
        $this->dompdf->set_paper($paper, $orien);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('laporan_data_warga.pdf');
    }

    public function excel_data_warga()
    {
        // Data yang akan dikirim ke tampilan Excel
        $data = [
            'title' => "Cetak Data Warga",
            'filename' => "Laporan Data Warga",
            'warga' => $this->ModelWarga->getWarga()->result_array(),
        ];
        // Memuat tampilan untuk mencetak data warga dalam format Excel
        $this->load->view('admin/excel_data_warga', $data);
    }

    public function print_transaksi($status)
    {
        // Query untuk mendapatkan data transaksi berdasarkan status
        $transaksi = $this->db->query("SELECT * FROM transaksi
        JOIN user ON user.id = transaksi.id_user
        JOIN warga ON user.no_kk = warga.no_kk
        WHERE transaksi.status = '" . $status .
            "' ORDER BY transaksi.tanggal ASC")->result_array();
        
        // Data yang akan dikirim ke tampilan
        $data = [
            'title' => "Cetak Transaksi",
            'transaksi' => $transaksi,
        ];
        // Memuat tampilan untuk mencetak data transaksi
        $this->load->view('admin/print_transaksi', $data);
    }

    public function pdf_transaksi($status)
    {
        // Memuat library Dompdf
        $this->load->library('Dompdf_gen');
        // Query untuk mendapatkan data transaksi berdasarkan status
        $transaksi = $this->db->query("SELECT * FROM transaksi
        JOIN user ON user.id = transaksi.id_user
        JOIN warga ON user.no_kk = warga.no_kk
        WHERE transaksi.status = '" . $status .
            "' ORDER BY transaksi.tanggal ASC")->result_array();
        // Data yang akan dikirim ke tampilan PDF
        $data = [
            'title' => "Cetak Transaksi",
            'transaksi' => $transaksi,
        ];
        // Memuat tampilan PDF
        $this->load->view('admin/pdf_transaksi', $data);
        // Konfigurasi kertas dan orientasi
        $paper = 'A4';
        $orien = 'landscape';
        $html = $this->output->get_output();
        // Mengatur kertas dan orientasi untuk file PDF
        $this->dompdf->set_paper($paper, $orien);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_transaksi_" . $status . ".pdf");
    }

    public function excel_transaksi($status)
    {
        // Query untuk mendapatkan data transaksi berdasarkan status
        $transaksi = $this->db->query("SELECT * FROM transaksi
        JOIN user ON user.id = transaksi.id_user
        JOIN warga ON user.no_kk = warga.no_kk
        WHERE transaksi.status = '" . $status .
            "' ORDER BY transaksi.tanggal ASC")->result_array();
        // Data yang akan dikirim ke tampilan Excel
        $data = [
            'title' => "Cetak Data Transaksi",
            'filename' => "Laporan Data Transaksi " . $status,
            'transaksi' => $transaksi,
        ];
        // Memuat tampilan untuk mencetak data transaksi dalam format Excel
        $this->load->view('admin/excel_transaksi', $data);
    }

    public function print_data_tabungan()
    {
        // Query untuk mendapatkan data tabungan dengan join ke tabel user dan warga
        $query = "SELECT * FROM tabungan 
        JOIN user ON user.no_kk = tabungan.no_kk
        JOIN warga ON warga.no_kk = tabungan.no_kk";
        $data = [
            'title' => "Cetak Data Tabungan Warga",
            'tabungan' => $this->db->query($query)->result_array(),
        ];
        // Memuat tampilan untuk mencetak data tabungan
        $this->load->view('admin/print_data_tabungan', $data);
    }

    public function pdf_data_tabungan()
    {
        // Memuat library Dompdf
        $this->load->library('Dompdf_gen');
        // Query untuk mendapatkan data tabungan dengan join ke tabel user dan warga
        $query = "SELECT * FROM tabungan 
        JOIN user ON user.no_kk = tabungan.no_kk
        JOIN warga ON warga.no_kk = tabungan.no_kk";
        // Data yang akan dikirim ke tampilan PDF
        $data = [
            'title' => "Cetak Data Tabungan Warga",
            'tabungan' => $this->db->query($query)->result_array(),
        ];
        // Memuat tampilan PDF
        $this->load->view('admin/pdf_data_tabungan', $data);
        // Konfigurasi kertas dan orientasi
        $paper = 'A4';
        $orien = 'landscape';
        $html = $this->output->get_output();
        // Mengatur kertas dan orientasi untuk file PDF
        $this->dompdf->set_paper($paper, $orien);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('laporan_data_tabungan.pdf');
    }

    public function excel_data_tabungan()
    {
        // Query untuk mendapatkan data tabungan dengan join ke tabel user dan warga
        $query = "SELECT * FROM tabungan 
        JOIN user ON user.no_kk = tabungan.no_kk
        JOIN warga ON warga.no_kk = tabungan.no_kk";
        // Data yang akan dikirim ke tampilan
        $data = [
            'title' => "Cetak Data Tabungan Warga",
            'filename' => "Laporan Data Tabungan Warga",
            'tabungan' => $this->db->query($query)->result_array(),
        ];
        // Memuat tampilan untuk mencetak data tabungan
        $this->load->view('admin/excel_data_tabungan', $data);
    }
}

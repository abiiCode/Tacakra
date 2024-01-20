<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * ModelUser Class
 * 
 * Ini adalah model untuk mengelola data pengguna (user) dalam aplikasi.
 */
class ModelUser extends CI_Model
{
    /**
     * Memeriksa login pengguna berdasarkan kriteria tertentu.
     * 
     * @param array|null $where Kriteria pencarian data login pengguna.
     * @return mixed Hasil query berdasarkan kriteria.
     */
    public function cekLogin($where = null)
    {
        return $this->db->get_where('user', $where);
    }
    /**
     * Menyimpan data pengguna ke dalam tabel user.
     * 
     * @param array|null $data Data pengguna yang akan disimpan.
     * @return bool True jika berhasil, False jika gagal.
     */

    public function simpanData($data = null)
    {
        return $this->db->insert('user', $data);
    }
    /**
     * Memeriksa data pengguna berdasarkan kriteria tertentu.
     * 
     * @param array|null $where Kriteria pencarian data pengguna.
     * @return mixed Hasil query berdasarkan kriteria.
     */

    public function cekUser($where = null)
    {
        return $this->db->get_where('user', $where);
    }
    /**
     * Memperbarui data pengguna berdasarkan ID pengguna.
     * 
     * @param array|null $data Data pengguna yang akan diperbarui.
     * @return void
     */
    public function editUser_proses($data = null)
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
    /**
     * Memperbarui data profil pengguna berdasarkan nomor KK.
     * 
     * @param array|null $data Data profil pengguna yang akan diperbarui.
     * @return void
     */
    public function editProfile_proses($data = null)
    {
        $no_kk = $this->input->post('no_kk');
        $this->db->where('no_kk', $no_kk);
        $this->db->update('user', $data);
    }
}

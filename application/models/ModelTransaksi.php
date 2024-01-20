<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * ModelTransaksi Class
 * 
 * Ini adalah model untuk mengelola data transaksi dalam aplikasi.
 */
class ModelTransaksi extends CI_Model
{
    /**
     * Menambahkan data transaksi ke dalam tabel transaksi.
     * 
     * @param array|null $data Data transaksi yang akan ditambahkan.
     * @return bool True jika berhasil, False jika gagal.
     */
    public function tambahTransaksi($data = null)
    {
        return $this->db->insert('transaksi', $data);
    }
     /**
     * Mengambil data transaksi berdasarkan kriteria tertentu.
     * 
     * @param array|null $where Kriteria pencarian data transaksi.
     * @return mixed Hasil query berdasarkan kriteria.
     */
    public function cekTransaksi($where = null)
    {
        return $this->db->get_where('transaksi', $where);
    }
    /**
     * Memperbarui data transaksi berdasarkan ID transaksi.
     * 
     * @param array|null $data Data transaksi yang akan diperbarui.
     * @return void
     */

    public function updateTransaksi($data = null)
    {
        $id_transaksi = $this->input->post('id_transaksi');
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi', $data);
    }
}

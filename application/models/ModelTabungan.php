<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelTabungan extends CI_Model
{
    // Mendapatkan semua data tabungan dari tabel 'tabungan'.
    public function getTabungan()
    {
        return $this->db->get('tabungan');
    }
    // Mengecek data tabungan berdasarkan kondisi tertentu.
    // Parameter $where digunakan untuk mencocokkan data tabungan.
    public function cekTabungan($where = null)
    {
        return $this->db->get_where('tabungan', $where);
    }
    // Menambahkan data tabungan baru ke dalam tabel 'tabungan'.
    // Parameter $data berisi array data tabungan yang akan ditambahkan.
    public function tambahTabungan($data = null)
    {
        return $this->db->insert('tabungan', $data);
    }
    // Memperbarui data tabungan berdasarkan ID tabungan.
    // Parameter $data berisi array data tabungan yang akan diperbarui.
    // ID tabungan diambil dari input post dengan nama 'id_tabungan'.
    public function updateTabungan($data = null)
    {
        $id_tabungan = $this->input->post('id_tabungan');
        $this->db->where('id_tabungan', $id_tabungan);
        $this->db->update('tabungan', $data);
    }
}

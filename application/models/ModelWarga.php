<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelWarga extends CI_Model
{
     /**
     * Mengambil semua data warga dari tabel 'warga'.
     *
     * @return CI_DB_result
     */
    public function getWarga()
    {
        return $this->db->get('warga');
    }
     /**
     * Menambahkan data warga ke dalam tabel 'warga'.
     *
     * @param array|null $data Data warga yang akan ditambahkan.
     *
     * @return bool Hasil operasi penambahan data.
     */
    public function tambahWarga($data = null)
    {
        return $this->db->insert('warga', $data);
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelTabungan extends CI_Model
{
    public function getTabungan()
    {
        return $this->db->get('tabungan');
    }

    public function cekTabungan($where = null)
    {
        return $this->db->get_where('tabungan', $where);
    }

    public function tambahTabungan($data = null)
    {
        return $this->db->insert('tabungan', $data);
    }

    public function updateTabungan($data = null)
    {
        $id_tabungan = $this->input->post('id_tabungan');
        $this->db->where('id_tabungan', $id_tabungan);
        $this->db->update('tabungan', $data);
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{
    public function cekLogin($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    public function simpanData($data = null)
    {
        return $this->db->insert('user', $data);
    }

    public function cekUser($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    public function editUser_proses($data = null)
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
    public function editProfile_proses($data = null)
    {
        $no_kk = $this->input->post('no_kk');
        $this->db->where('no_kk', $no_kk);
        $this->db->update('user', $data);
    }
}

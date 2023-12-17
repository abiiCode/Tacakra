<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelWarga extends CI_Model
{
    public function getWarga()
    {
        return $this->db->get('warga');
    }
    public function tambahWarga($data = null)
    {
        return $this->db->insert('warga', $data);
    }
}

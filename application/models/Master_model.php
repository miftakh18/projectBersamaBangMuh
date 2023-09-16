<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Master_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_header()
    {
        $this->db->where('active', 1);
        $this->db->order_by('urutan', 'ASC');

        $query = $this->db->get('hmenu');
        return $query->result();
    }
    public function get_headerAll()
    {
        $query = $this->db->get('hmenu');
        return $query->result();
    }
    public function get_menuByHeader($hid)
    {
        $this->db->where('active', 1);
        $this->db->where('hid', $hid);
        $this->db->order_by('urutan', 'ASC');

        $query = $this->db->get('menu');
        return $query->result();
    }
    public function get_smenuBymenudanHeader($hid, $mid)
    {
        $this->db->where('active', 1);
        $this->db->where('hid', $hid);
        $this->db->where('mid', $mid);
        $this->db->order_by('urutan', 'ASC');

        $query = $this->db->get('smenu');
        return $query->result();
    }

    public function getone_smenuBymenudanHeader($hid, $mid)
    {
        $this->db->where('active', 1);
        $this->db->where('hid', $hid);
        $this->db->where('mid', $mid);

        $this->db->order_by('urutan', 'ASC');

        $query = $this->db->get('smenu');
        return $query->row_array();
    }
}

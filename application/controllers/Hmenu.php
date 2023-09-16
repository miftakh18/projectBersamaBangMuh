<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Hmenu extends CI_Controller
{
    public function __construct()
    {
        parent::__Construct();
        $this->load->model('Master_model', 'headermenu');
    }
    public function index()
    {
        if ($this->session->userdata('poslogged')) {
            $sql = $this->headermenu->get_headerAll();
            $data =
                [
                    'title' => 'Master Akses',
                    'subtitle' => 'Akses Group',
                    'alert' => false,
                    'sql' => $sql
                ];
            $this->load->view('page/headmenu', ['data' => $data]);
        }
    }
}

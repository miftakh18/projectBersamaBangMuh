<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akses extends CI_Controller
{
    public function __Construct()
    {
        parent::__Construct();
        $this->load->model("master_model", "mst");
        // $this->load->model("api");
        $this->load->library('upload');
    }

    public function index()
    {

        if ($this->session->userdata('poslogged')) {

            $data =
                [
                    'title' => 'Master Akses',
                    'subtitle' => 'Akses Group',
                    'alert' => false
                ];

            $this->load->view('page/akses', ['data' => $data]);
        } else {
            $data = array(
                'title' => 'Project 1',
                'subtitle' => 'Admin Project 1',
                'alert' => false
            );
            $this->load->view('auth/index', $data);
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    public function __Construct()
    {
        parent::__Construct();
        $this->load->model("master_model", "mst");
        // $this->load->model("api");
        $this->load->library('upload');
    }

    public function ruang()
    {

        if ($this->session->userdata('poslogged')) {
            //$res = $this->menu_model->getMenu();
            $data = array(
                'title' => 'Project 1',
                //'menu' => $res,
                'subtitle' => 'Dashboard',
                'alert' => false
            );

            $this->load->view('page/ruang', $data);
            // $this->load->view('footer');
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

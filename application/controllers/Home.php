<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __Construct()
    {
        parent::__Construct();
        $this->load->model("authentication_model", "authen");
        // $this->load->model("api");
        $this->load->library('upload');
    }

    public function index()
    {
        if (isset($_SESSION['posid'])) {

            if ($this->session->userdata('poslogged')) {
                //$res = $this->menu_model->getMenu();
                $data = array(
                    'title' => 'Project 1',
                    //'menu' => $res,
                    'subtitle' => 'Dashboard',
                    'alert' => false
                );


                // $this->load->view('template/topbar', $data);
                $this->load->view('page/index', $data);
                // $this->load->view('template/footer', $data);
            } else {
                $data = array(
                    'title' => 'Project 1',
                    'subtitle' => 'Admin Project 1',
                    'alert' => false
                );
                $this->load->view('auth/index', $data);
            }
        } else {
            redirect(base_url("/"));
        }
    }
}

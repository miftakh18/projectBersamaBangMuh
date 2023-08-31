<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Authentication extends CI_Controller
{

    public function __Construct()
    {
        parent::__Construct();
        $this->load->model("authentication_model", "authen");
    }

    public function index()
    {

        if ($this->session->userdata('poslogged')) {
            redirect(base_url("home"));
        } else {
            $data = array(
                'title' => 'Project 1',
                'subtitle' => 'Admin Project 1',
                'alert' => false
            );
            $this->load->view('auth/index', $data);
        }
    }

    public function login()
    {
        $postData = $this->input->post();
        $validate = $this->authen->validate_login($postData);

        if ($validate == true) {
            $newdata = array(
                'posuser'  => $validate[0]->username,
                'posnama'  => $validate[0]->nama,
                'poslevel' => $validate[0]->is_level,
                'posid' => $validate[0]->usid,
                'poslogged' => TRUE,

            );
            $this->session->set_userdata($newdata);
            redirect(base_url("home"));
        } else {
            $this->session->set_flashdata('msg', 'Error, Tidak berhasil login!');
            redirect(base_url('authentication'));
        }
    }
    public function logout()
    {

        $this->session->unset_userdata(array(
            'posuser',
            'posnama',
            'poslevel',
            'posid',
            'poslogged'
        ));
        $this->session->sess_destroy();
        redirect(base_url("/"));
    }
}

<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Authentication_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }


    function validate_login($postData)
    {
        $user =  html_escape($postData['login_name']);
        $pass =  trim(html_escape($postData['login_pass']));
        $this->db->select('*');
        $this->db->where('username', $user);
        $this->db->where('password', SHA1($postData['login_pass']));
        $this->db->where('is_active', '1');
        $this->db->from('user');
        $query = $this->db->get();
        if ($query->num_rows() == 0)
            return false;
        else
            return $query->result();
    }
}

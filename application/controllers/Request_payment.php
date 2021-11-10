<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Request_payment extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {

    	if (!$this->session->userdata('is_login')) {
    		redirect(base_url());
    	}

    	$data['payment'] = $this->db->get('konfirmasi_payment');

    	$data['title'] = 'Request payment';
    	$this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/request_payment', $data);
        $this->load->view('admin/_partials/footer');
    }
}
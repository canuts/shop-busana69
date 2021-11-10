<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Get_kategori extends CI_Controller
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

    	$data['kategori'] = $this->db->get('kategori');
    	$data['subkategori'] = $this->db->get('subkategori');
    	$data['title'] = 'Semua kategori dan subkategori';
    	$this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/kategori', $data);
        $this->load->view('admin/_partials/footer');
    }
}
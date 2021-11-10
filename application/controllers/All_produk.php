<?php
defined('BASEPATH') or exit('No direct script access allowed');

class All_produk extends CI_Controller
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

    	$data['produk'] = $this->admin->startQuery('select', 'produk');

    	$data['subkategori'] = $this->admin->startQuery('select', 'subkategori', ['is_active' => '1']);

    	$data['title'] = 'Semua produk';
    	$this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/produk', $data);
        $this->load->view('admin/_partials/footer', $data);
    }

}
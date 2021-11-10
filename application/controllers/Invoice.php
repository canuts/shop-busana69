<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
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
   		//$this->db->order_by('DESC');
    	$data['invoice'] = $this->admin->startQuery('select', 'detail_order_id');

    	$data['title'] = 'Invoice';
    	$this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/all_invoice', $data);
        $this->load->view('admin/_partials/footer');
    }

    public function getInvoice($orderid)
    {
    	if (!$this->session->userdata('is_login')) {
    		redirect(base_url());
    	}
    	
    	$cek = $this->admin->startQuery('select', 'detail_order_id', ['order_id' => $orderid]);
    	if ($cek->num_rows() == 0) {
    		redirect(base_url() . 'admin/invoice');
    	} else {
    		$data['detail_id'] = $cek->row();
	    	$data['pelanggan'] = $this->admin->startQuery('select', 'detail_pelanggan', ['id' => $data['detail_id']->id_pelanggan])->row();
	    	$data['produk'] = $this->admin->startQuery('select', 'detail_order_produk', ['order_id' => $orderid]);

	    	$data['subtotal'] = $this->db->select_sum('harga')
	    	->from('detail_order_produk')->where('order_id', $orderid)
	    	->get()->row();

	    	$data['title'] = 'Invoice ' . $orderid;
	    	$this->load->view('admin/_partials/header', $data);
	        $this->load->view('admin/invoice', $data);
	        $this->load->view('admin/_partials/footer');
    	}
    	
    }

    public function edit($order)
    {
    	$data['title'] = 'Edit invoice';
    	$this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/edit_invoice', $data);
        $this->load->view('admin/_partials/footer');
    }

}
<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Settings extends CI_Controller

{
	public function index()
	{
		if (!$this->session->userdata('is_login')) {
			redirect(base_url());
		} else {

			$data['awb'] = $this->db->get('settings')->row();

			$data['title'] = 'Setting web admin';
			$this->load->view('admin/_partials/header', $data);

			$this->load->view('admin/settings', $data);

			$this->load->view('admin/_partials/footer');
		}
	}

	public function update()
	{
		if (!$this->input->post()) {
			redirect(base_url());
		} else {
			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$keyword = $this->input->post('keyword');
			$nohp = $this->input->post('nohp');
			$alamat = $this->input->post('alamat');
			$email = $this->input->post('email');
			$copyright = $this->input->post('copyright');
			$url = $this->input->post('url');
			$nama_site = $this->input->post('nama_site');
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$cek = $this->db->get('settings')->row();

			if ($_FILES['logo_white']['name']) {
				$this->load->library('upload');
				$this->upload->initialize($this->_options_upload());
				if ($this->upload->do_upload('logo_white')) {
					$logo_white = $this->upload->data('file_name');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
					redirect('settings');
					exit();
				}
			} else {
				$logo_white = $cek->logo_white;
			}

			if ($_FILES['logo_dark']['name']) {
				$this->load->library('upload');
				$this->upload->initialize($this->_options_upload());
				if ($this->upload->do_upload('logo_dark')) {
					$logo_dark = $this->upload->data('file_name');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
					redirect('settings');
					exit();
				}
			} else {
				$logo_dark = $cek->logo_dark;
			}

			$update = $this->db->query("UPDATE settings SET title = '$title', description = '$description', keyword = '$keyword', nohp = '$nohp', alamat = '$alamat', email = '$email', copyright = '$copyright', `url` = '$url', nama_site = '$nama_site', logo_white = '$logo_white', logo_dark = '$logo_dark', username = '$username', password = '$password'");
			if ($update) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Settings update</div>');
				redirect('settings');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Update error!</div>');
				redirect('settings');
			}
		}
	}

	private function _options_upload()
	{
		$config = array();
		$config['upload_path'] = './assets/img/';
    	$config['allowed_types'] = 'jpg|jpeg|png';
    	$config['max_size']      = '2048';
    	$config['encrypt_name'] = true;
    	return $config;
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Query_model', 'queri');
		$this->load->library('pagination');
	}

	public function index()
	{
		$data['title'] = 'Busana69 - busana pria maupun wanita terlengkap kualitas sangat good';
		$data['produk'] = $this->queri->getProduk();
		$data['hotproduk'] = $this->db->query("SELECT * FROM produk WHERE is_diskon != '0' AND is_active = '1' ORDER BY RAND() LIMIT 8");
		$data['type1'] = $this->queri->kategoriImage('1')->row();
		$data['type1a'] = $this->queri->kategoriImage('1')->row();
		$data['type1b'] = $this->queri->kategoriImage('1')->row();
		$data['type2'] = $this->queri->kategoriImage('2');
		$data['thumb'] = $this->queri->thumb()->row();
		//$data['getkate'] = $this->queri->getKategori();
		$data['kate1'] = $this->queri->kategori();
		//$data['countsubkate'] = $this->queri->getSubKategori()->num_rows();

		

		$this->load->view('_partials/headers', $data);
		$this->load->view('_partials/navbar', $data);
		$this->load->view('index', $data);
		$this->load->view('_partials/footer');
	}

	public function detail($id)
	{
		$cek = $this->queri->detailProduk(strtolower($id));
		if ($cek->num_rows() == 0) {
			redirect(base_url());
		} else {
			//$dari = array();
			$data['detail'] = $cek->row();
			$data['related'] = $this->queri->relatedProduk($data['detail']->kategori);
			$gmb = explode('|', $data['detail']->gambar);
			$count = count($gmb) - 1;
			for ($i = 0; $i <= $count; $i++) {
				$dari[] = $gmb[$i];
			}
			$this->queri->viewUpdate($data['detail']->id);
			$data['type1'] = $this->queri->kategoriImage('1')->row();
			$data['type1a'] = $this->queri->kategoriImage('1')->row();
			$data['type1b'] = $this->queri->kategoriImage('1')->row();
			$data['type2'] = $this->queri->kategoriImage('2');
			$data['thumb'] = $this->queri->thumb()->row();
			$data['titleimg'] = $dari[0];
			//$data['getkate'] = $this->queri->getKategori();
			$data['kate1'] = $this->queri->kategori();
			$data['title'] = $data['detail']->nama;
			$data['dari'] = $dari;
			$data['price'] = $this->_setdiskon($data['detail']->id);
			$this->db->order_by('id', 'desc');
			$data['ulasan'] = $this->db->get_where('rating', ['sku_produk' => $data['detail']->sku_produk]);
			$this->load->view('_partials/headers', $data);
			$this->load->view('detail', $data);
			$this->load->view('_partials/footer');
		}
	}

	private function _setdiskon($id)
	{
		$data = $this->db->get_where('produk', ['id' => $id])->row();
		if ($data->is_diskon == 0) {
			$gas = '<div class="price_main"><span class="new_price">Rp. ' . number_format($data->price, 0, ',', '.') . '</span></div>';
		} else {
			$a = $data->price * $data->is_diskon;
			$hasil = $a / 100;
			$get = $data->price - $hasil;
			$gas = '<div class="price_main"><span class="new_price">Rp. ' . number_format($get, 0, ',', '.') . '</span><span class="percentage">-' . $data->is_diskon . '%</span> <span class="old_price">Rp. ' . number_format($data->price, 0, ',', '.') . '</span></div>';
		}
		return $gas;
	}



	public function produk()
	{
		$data['type1'] = $this->queri->kategoriImage('1')->row();
		$data['type1a'] = $this->queri->kategoriImage('1')->row();
		$data['type1b'] = $this->queri->kategoriImage('1')->row();
		$data['type2'] = $this->queri->kategoriImage('2');
		$data['thumb'] = $this->queri->thumb()->row();
		$data['kate1'] = $this->queri->kategori();
		$data['kate5'] = $this->queri->subKategori();

		$config['base_url'] = base_url() . 'produk/page';
		$config['total_rows'] = $this->db->get_where('produk', ['is_active' => '1'])->num_rows();
		$config['per_page'] = 12;
		$config['uri_segment'] = 3;
		// $choice = $config["total_rows"] / $config["per_page"];
		// $tampil = floor($choice);
		$config["num_links"] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['reuse_query_string'] = TRUE;

		$config['full_tag_open'] = '<div class="pagination__wrapper"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div>';

		$config['next_link'] = '&#10095;';
		$config['next_tag_open'] = '<li>';
		$config['atribut'] = array('class' => 'next');
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&#10094;';
		$config['prev_tag_open'] = '<li>';
		$config['atribut'] = array('class' => 'prev');
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li><a href="#0" class="active">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['first_link'] = false;
		$config['last_link'] = false;

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
		$data['paging'] = $this->pagination->create_links();
		$data['produk'] = $this->queri->getPagination($config['per_page'], $page * $config['per_page']);

		$data['title'] = 'Semua produk';
		$this->load->view('_partials/headers', $data);
		$this->load->view('kategori', $data);
		$this->load->view('_partials/footer');
	}

	public function produkTerlaris()
	{
		$data['type1'] = $this->queri->kategoriImage('1')->row();
		$data['type1a'] = $this->queri->kategoriImage('1')->row();
		$data['type1b'] = $this->queri->kategoriImage('1')->row();
		$data['type2'] = $this->queri->kategoriImage('2');
		$data['thumb'] = $this->queri->thumb()->row();
		$data['kate1'] = $this->queri->kategori();
		$data['kate5'] = $this->queri->subKategori();

		$config['base_url'] = base_url() . 'produk-terlaris/page';
		$config['total_rows'] = $this->db->query("SELECT * FROM produk WHERE terjual >= 5")->num_rows();
		$config['per_page'] = 12;
		$config['uri_segment'] = 3;
		// $choice = $config["total_rows"] / $config["per_page"];
		// $tampil = floor($choice);
		$config["num_links"] = 4;
		$config['use_page_numbers'] = TRUE;
		$config['reuse_query_string'] = TRUE;

		$config['full_tag_open'] = '<div class="pagination__wrapper"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div>';

		$config['next_link'] = '&#10095;';
		$config['next_tag_open'] = '<li>';
		$config['atribut'] = array('class' => 'next');
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&#10094;';
		$config['prev_tag_open'] = '<li>';
		$config['atribut'] = array('class' => 'prev');
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li><a href="#0" class="active">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['first_link'] = false;
		$config['last_link'] = false;

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
		$data['paging'] = $this->pagination->create_links();
		//$data['produk'] = $this->queri->getPagination($config['per_page'], $page * $config['per_page']);
		$lim = $config['per_page'];
		$off = $page * $config['per_page'];
		$data['produk'] = $this->db->query("SELECT * FROM produk WHERE terjual >= 5 AND is_active = '1' ORDER BY terjual DESC LIMIT $off,$lim");

		$data['title'] = 'Produk terlaris';
		$this->load->view('_partials/headers', $data);
		$this->load->view('kategori', $data);
		$this->load->view('_partials/footer');
	}

	public function contacts()
	{
		$data['produk'] = $this->queri->getProduk();
		$data['hotproduk'] = $this->db->query("SELECT * FROM produk WHERE is_diskon != '0' AND is_active = '1'");
		$data['type1'] = $this->queri->kategoriImage('1')->row();
		$data['type1a'] = $this->queri->kategoriImage('1')->row();
		$data['type1b'] = $this->queri->kategoriImage('1')->row();
		$data['type2'] = $this->queri->kategoriImage('2');
		$data['thumb'] = $this->queri->thumb()->row();
		//$data['getkate'] = $this->queri->getKategori();
		$data['kate1'] = $this->queri->kategori();

		$data['title'] = 'Hubungi kami';
		$this->load->view('_partials/headers', $data);
		$this->load->view('contacts', $data);
		$this->load->view('_partials/footer');
	}

	public function rating($orderid)
	{
		if ($this->input->post()) {
			$rating = $this->input->post('rating_input');
			$pesan = $this->input->post('pesan_rating');
			$sku = $this->input->post('sku_produk');

			$gambar = $_FILES['gambar']['name'];
			if ($gambar) {
				$this->load->library('upload');
				$config['upload_path'] = './assets/img/rating/';
		    	$config['allowed_types'] = 'gif|jpg|jpeg|png';
		    	$config['encrypt_name'] = true;

		    	$this->upload->initialize($config);
		    	$this->upload->do_upload('gambar');
		    	$gambar = $this->upload->data('file_name');
			} else {
				$gambar = '';
			}

			$cekid = $this->db->get_where('detail_order_id', ['order_id' => $orderid, 'status' => '1'])->row();
			$cekpel = $this->db->get_where('detail_pelanggan', ['id' => $cekid->id_pelanggan])->row();
			$produk = $this->db->get_where('produk', ['sku_produk' => $sku])->row();

			$data_insert = [
				'sku_produk' => $sku,
				'order_id' => $orderid,
				'nama' => $cekpel->nama_lengkap,
				'rate' => $rating,
				'pesan' => $pesan,
				'gambar' => $gambar,
				'date_created' => date('Y-m-d')
			];
			$insert = $this->db->insert('rating', $data_insert);
			$this->db->query("UPDATE detail_order_produk SET is_rating = '1' WHERE sku_produk = '$sku' AND order_id = '$orderid' AND is_rating = '0'");
			if ($insert) {
				$cekproduk = $this->db->get_where('detail_order_produk', ['order_id' => $orderid, 'is_rating' => '0'], 1);
				if ($cekproduk->num_rows() == 0) {
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil menambahkan ulasan ke produk.</div>');
					redirect(base_url() . 'produk/' . $produk->slug);
				} else {
					$get1 = $cekproduk->row();
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil menambahkan ulasan ke produk.</div>');
					redirect(base_url() . 'tambah-ulasan/' . $get1->order_id);
				}
			}

		} else {
			$data['produk'] = $this->queri->getProduk();
			$data['hotproduk'] = $this->db->query("SELECT * FROM produk WHERE is_diskon != '0' AND is_active = '1'");
			$data['type1'] = $this->queri->kategoriImage('1')->row();
			$data['type1a'] = $this->queri->kategoriImage('1')->row();
			$data['type1b'] = $this->queri->kategoriImage('1')->row();
			$data['type2'] = $this->queri->kategoriImage('2');
			$data['thumb'] = $this->queri->thumb()->row();
			//$data['getkate'] = $this->queri->getKategori();
			$data['kate1'] = $this->queri->kategori();
			$cek = $this->db->get_where('detail_order_produk', ['order_id' => $orderid, 'is_rating' => '0'], 1);
			if ($cek->num_rows() == 0) {
				redirect(base_url());
			} else {
				$get = $cek->row();
				$data['akses'] = 'sukses';
				$data['getnum'] = $orderid;
				$data['sku_produk'] = $get->sku_produk;
				$data['nama_produk'] = $get->produk;
			}

			$data['title'] = 'Busana69 - tambah ulasan';
			$this->load->view('_partials/headers', $data);
			$this->load->view('rating', $data);
			$this->load->view('_partials/footer');
		}
	}

	public function terms()
	{
		$data['produk'] = $this->queri->getProduk();
		$data['hotproduk'] = $this->db->query("SELECT * FROM produk WHERE is_diskon != '0' AND is_active = '1'");
		$data['type1'] = $this->queri->kategoriImage('1')->row();
		$data['type1a'] = $this->queri->kategoriImage('1')->row();
		$data['type1b'] = $this->queri->kategoriImage('1')->row();
		$data['type2'] = $this->queri->kategoriImage('2');
		$data['thumb'] = $this->queri->thumb()->row();
		//$data['getkate'] = $this->queri->getKategori();
		$data['kate1'] = $this->queri->kategori();

		$data['title'] = 'Syarat dan ketentuan';
		$this->load->view('_partials/headers', $data);
		$this->load->view('terms', $data);
		$this->load->view('_partials/footer');
	}

	public function privacy()
	{
		$data['produk'] = $this->queri->getProduk();
		$data['hotproduk'] = $this->db->query("SELECT * FROM produk WHERE is_diskon != '0' AND is_active = '1'");
		$data['type1'] = $this->queri->kategoriImage('1')->row();
		$data['type1a'] = $this->queri->kategoriImage('1')->row();
		$data['type1b'] = $this->queri->kategoriImage('1')->row();
		$data['type2'] = $this->queri->kategoriImage('2');
		$data['thumb'] = $this->queri->thumb()->row();
		//$data['getkate'] = $this->queri->getKategori();
		$data['kate1'] = $this->queri->kategori();

		$data['title'] = 'Privacy police';
		$this->load->view('_partials/headers', $data);
		$this->load->view('privacy', $data);
		$this->load->view('_partials/footer');
	}

	public function error()
	{
		$this->load->view('errors/error');
	}

	public function crons()
	{
		$this->db->query("UPDATE produk SET is_diskon = '0', expired = '' WHERE date(expired) = DATE_FORMAT(CURDATE(), '%Y/%m/%d')");
	}
	public function updatecoba()
	{
		$c = $this->db->query("UPDATE produk SET is_diskon = '0', expired = ''");
		if ($c) {
			echo "Berhasil";
		} else {
			echo "Gagal";
		}
	}
}

<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Konfirmasi_payment extends CI_Controller

{

    public function __construct()

    {

        parent::__construct();

        $this->load->model('Query_model', 'queri');

    }



    public function index()

    {

    	if ($this->input->post()) {

        	$this->form_validation->set_rules('invoice', 'Invoice', 'required|trim', [

        		'required' => 'No invoice tidak boleh kosong'

        	]);

        	$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [

        		'required' => 'Email tidak boleh kosong',

        		'valid_email' => 'Mohon input email'

        	]);

        	$this->form_validation->set_rules('nama', 'Nama lengkap', 'required|trim', [

        		'required' => 'Nama lengkap tidak boleh kosong'

        	]);

        	$this->form_validation->set_rules('rekening', 'No rekening', 'required|trim', [

        		'required' => 'No rekening tidak boleh kosong'

        	]);

        	$this->form_validation->set_rules('bank', 'Bank', 'required', [

        		'required' => 'Bank tidak boleh kosong'

        	]);

        	$this->form_validation->set_rules('jumlah', 'Jumlah pembayaran', 'required|trim', [

        		'required' => 'Jumlah pembayaran tidak boleh kosong'

        	]);

        	$this->form_validation->set_rules('tanggal', 'Tanggal pembayaran', 'required|trim', [

        		'required' => 'Tanggal pembayaran tidak boleh kosong'

        	]);





        	if ($this->form_validation->run() == false) {

        		$data['title'] = 'Konfirmasi pembayaran pesanan';

		        $data['produk'] = $this->queri->getProduk();

		        $data['hotproduk'] = $this->db->query("SELECT * FROM produk WHERE is_diskon != '0' AND is_active = '1'");

		        $data['type1'] = $this->queri->kategoriImage('1')->row();

		        $data['type1a'] = $this->queri->kategoriImage('1')->row();

		        $data['type1b'] = $this->queri->kategoriImage('1')->row();

		        $data['type2'] = $this->queri->kategoriImage('2');

		        $data['thumb'] = $this->queri->thumb()->row();

		        //$data['getkate'] = $this->queri->getKategori();

		        $data['kate1'] = $this->queri->kategori();



		        $this->load->view('_partials/headers', $data);

		        $this->load->view('konfirmasi', $data);

		        $this->load->view('_partials/footer');

        	} else {

        		$invoice = htmlspecialchars($this->input->post('invoice'));

        		$email = htmlspecialchars($this->input->post('email'));

        		$nama = htmlspecialchars($this->input->post('nama'));

        		$rekening = htmlspecialchars($this->input->post('rekening'));

        		$bank = htmlspecialchars($this->input->post('bank'));

        		$jumlah = htmlspecialchars($this->input->post('jumlah'));

        		$tanggal = htmlspecialchars($this->input->post('tanggal'));

        		$keterangan = htmlspecialchars($this->input->post('keterangan'));

        		$bukti_gambar = htmlspecialchars($this->input->post('bukti_gambar'));



        		$cek_order = $this->db->get_where('detail_order_id', ['order_id' => $invoice]);

        		if ($cek_order->num_rows() == 0) {

        			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">

                        Invoice tidak ditemukan .</div>');

                        redirect(base_url() . 'konfirmasi');

        		} else {

        			$hasil = $cek_order->row();

        			$cek_pay = $this->db->get_where('konfirmasi_payment', ['invoice' => $invoice])->num_rows();

        			if ($hasil->status == '1') {

        				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">

                        Gagal no invoice ini sudah selesai .</div>');

                        redirect(base_url() . 'konfirmasi');

        			} elseif ($cek_pay == 1) {

        				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">

                        Gagal no invoice ini sudah dikirim mohon tunggu balasan dari kami .</div>');

                        redirect(base_url() . 'konfirmasi');

        			} else {

        				$count = $_FILES['bukti_gambar']['name'];

        				if ($count) {

        					$config['upload_path'] = './assets/img/bukti/';

        					$config['max_size']      = '2048';

    						$config['allowed_types'] = 'jpg|jpeg|png';

    						$config['encrypt_name'] = true;



    						$this->load->library('upload', $config);

    						if ($this->upload->do_upload('bukti_gambar')) {

    							$bukti_gambar = $this->upload->data('file_name');

    						} else {

    							$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');

			                        redirect(base_url() . 'konfirmasi');

    						}

        				} else {

        					$bukti_gambar = '';

        				}

        				$data = [

        					'invoice' => $invoice,

        					'email' => $email,

        					'nama' => $nama,

        					'rekening' => $rekening,

        					'ke_bank' => $bank,

        					'jumlah' => $jumlah,

        					'tanggal' => $tanggal,

        					'keterangan' => $keterangan,

        					'bukti_gambar' => $bukti_gambar,

        					'status' => '0',

        					'date_created' => date('d-m-Y H:i:s')

        				];

        				$this->_sendEmail('admin');
                        $this->_sendEmail('users');

        				if ($this->db->insert('konfirmasi_payment', $data)) {

        					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data anda berhasil dikirim mhon untuk menunggu balasan dari kami melalui email , terimakasih ..</div>');

			                        redirect(base_url() . 'konfirmasi');

        				} else {

        					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal insert</div>');

			                        redirect(base_url() . 'konfirmasi');

        				}

        			}

        		}

        	}

    	} else {

    	$data['title'] = 'Konfirmasi pembayaran pesanan';

        $data['produk'] = $this->queri->getProduk();

        $data['hotproduk'] = $this->db->query("SELECT * FROM produk WHERE is_diskon != '0' AND is_active = '1'");

        $data['type1'] = $this->queri->kategoriImage('1')->row();

        $data['type1a'] = $this->queri->kategoriImage('1')->row();

        $data['type1b'] = $this->queri->kategoriImage('1')->row();

        $data['type2'] = $this->queri->kategoriImage('2');

        $data['thumb'] = $this->queri->thumb()->row();

        //$data['getkate'] = $this->queri->getKategori();

        $data['kate1'] = $this->queri->kategori();



        $this->load->view('_partials/headers', $data);

        $this->load->view('konfirmasi', $data);

        $this->load->view('_partials/footer');

       }

    }



    private function _sendEmail($type)
    {
        $config = [
            'protocol'  => 'smtp',

            'smtp_host' => 'ssl://busana69.my.id',

            'smtp_user' => 'suport@busana69.my.id',

            'smtp_pass' => 'canuts123canuts',

            'smtp_port' => 465,

            'mailtype'  => 'html',

            'charset'   => 'utf-8',

            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);
       
        if ($type == 'admin') {
            $pesannya = 'terdapat 1 request pembayaran baru berikut detailnya: <br>';
            $pesannya .= 'Invoice: ' . $this->input->post('invoice') . '<br>';
            $pesannya .= 'Email: ' . $this->input->post('email') . '<br>';
            $pesannya .= 'Nama: ' . $this->input->post('nama') . '<br>';
            $pesannya .= 'Rekening: ' . $this->input->post('rekening') . '<br>';
            $pesannya .= 'Tujuan bank: ' . $this->input->post('bank') . '<br>';
            $pesannya .= 'Jumlah pembayaran: ' . $this->input->post('jumlah') . '<br>';
            $pesannya .= 'Tanggal pembayaran: ' . $this->input->post('tanggal') . '<br>';
            $pesannya .= 'Keterangan: ' . $this->input->post('keterangan') . '<br>';
            $this->email->from('suport@busana69.my.id', 'Busana69');
            $this->email->to('tutorialcandra@gmail.com');

            $this->email->subject('Request konfirmasi pembayaran');
            $this->email->message($pesannya);
        } else {
            $pesannya = 'Hallo ' . $this->input->post('nama') . ' terimakasih telah mengonfirmasi pesanan anda dengan detail sebagai berikut: <br><br>';
            $pesannya .= 'Invoice: ' . $this->input->post('invoice') . '<br>';
            $pesannya .= 'Email: ' . $this->input->post('email') . '<br>';
            $pesannya .= 'Nama: ' . $this->input->post('nama') . '<br>';
            $pesannya .= 'Rekening: ' . $this->input->post('rekening') . '<br>';
            $pesannya .= 'Tujuan bank: ' . $this->input->post('bank') . '<br>';
            $pesannya .= 'Jumlah pembayaran: ' . $this->input->post('jumlah') . '<br>';
            $pesannya .= 'Tanggal pembayaran: ' . $this->input->post('tanggal') . '<br>';
            $pesannya .= 'Keterangan: ' . $this->input->post('keterangan') . '<br><br>';
            $pesannya .= 'Mohon tunggu kami akan memberi tahukan anda jika pembayaran telah dikonfirmasi';

            $this->email->from('suport@busana69.my.id', 'Busana69 request pembayaran');
            $this->email->to($this->input->post('email'));
            $this->email->subject('Request konfirmasi pembayaran');
            $this->email->message($pesannya);
        }
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

}
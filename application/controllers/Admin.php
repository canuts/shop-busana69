<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Admin extends CI_Controller

{



	public function __construct()

    {

        parent::__construct();

        $this->load->model('Admin_model', 'admin');

    }



	public function index()

	{

		if(!$this->session->userdata('is_login')) {

			redirect(base_url() . 'admin/login');

		} else {

            $data['title'] = 'Admin dashboard';

            $data['count'] = [

                'produk' => $this->admin->startQuery('count','produk'),

                'pelanggan' => $this->admin->startQuery('count','detail_pelanggan'),

                'produk_terjual' => $this->admin->startQuery('count','detail_order_produk'),

                'transaksi_pending' => $this->admin->startQuery('select','detail_order_id', ['status' => '0'])->num_rows()

            ];



            // $data['transaksi'] = $this->admin->startQuery('select', 'detail_order_id');
            $this->db->limit(10);
            $this->db->order_by('id', 'DESC');
            $data['transaksi'] = $this->db->get('detail_order_id');

            
            // $data['produk'] = $this->admin->startQuery('select', 'produk', ['is_active' => '1']);
            $this->db->order_by('id','DESC');
            $data['produk'] = $this->db->get_where('produk', ['is_active' => '1'], 8);


			$this->load->view('admin/_partials/header', $data);

            $this->load->view('admin/index', $data);

            $this->load->view('admin/_partials/footer');

		}

	}



	public function login()

	{

        if ($this->session->userdata('verif_login') || $this->session->userdata('is_login')) {

            redirect(base_url() . 'admin/verif');

        }

        $cek = $this->db->get('settings')->row();

		define('USERNAME', $cek->username);

		define('PASSWORD', $cek->password);



        if ($this->input->post('login')) {

        	$username = htmlspecialchars($this->input->post('username'));

        	$password = htmlspecialchars($this->input->post('password'));

        	if ($username !== USERNAME || $password !== PASSWORD) {

        		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">

                    Wrong password!

                    </div>');

                redirect('admin/login');

        	} else {

                $verif = $this->_random(6);

                $this->admin->startQuery('insert', 'verif_login', ['code' => $verif], null);

        		$data = [

                        'verif_login' => $verif

                  ];
                  //$this->_sendEmail($verif);

                  $this->session->set_userdata($data);

                  redirect(base_url() . 'admin/verif');

        	}

        }

		$this->load->view('auth/login');

		

	}



    public function verif()

    {

        if (!$this->session->userdata('verif_login')) {

            redirect(base_url() . 'admin');

        }



        if ($this->input->post('verif')) {

            $code = $this->input->post('verif');

            $cek = $this->admin->startQuery('select', 'verif_login', ['code' => $code], null);

            if ($cek->num_rows() == 0) {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">

                    Kode verifikasi salah

                    </div>');

                redirect('admin/verif');

            } else {

                $this->admin->startQuery('delete', 'verif_login', ['code' => $code], null);

                $this->session->unset_userdata('verif_login');

                $data = [

                    'is_login' => 'is_login'

                ];

                $this->session->set_userdata($data);

                redirect(base_url('admin'));

            } 

        } else {

            $this->load->view('auth/verif');

        }

    }



    public function newsletter()

    {

        if (!$this->session->userdata('is_login')) {

            redirect(base_url());

        }



        $data['newsletter'] = $this->db->get('newsletter');



        $data['title'] = 'Admin kelola newsletter';

        $this->load->view('admin/_partials/header', $data);

        $this->load->view('admin/newsletter_admin', $data);

        $this->load->view('admin/_partials/footer');

    }



	public function logout()

    {

        $this->session->unset_userdata('is_login');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">

        You have been logged out!

        </div>');

        redirect('admin/login');

    }



    private function _random($length)

    {

        $str = "";

        $characters = array_merge(range('0', '9'));

        $max = count($characters) - 1;

        for ($i = 0; $i < $length; $i++) {

            $rand = mt_rand(0, $max);

            $str .= $characters[$rand];

        }

        return $str;

    }

    private function _sendEmail($token)
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
       

        $this->email->from('suport@busana69.my.id', 'busana69 login verif');
        $this->email->to('tutorialcandra@gmail.com');

        $this->email->subject("kode verif login");
        $this->email->message("Kode verif login " . $token);
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function ulasan()
    {
        if (!$this->session->userdata('is_login')) {
            redirect(base_url());
        }

        $data['ulasan'] = $this->db->get('rating');

        // $this->db->select('sku_produk', COUNT(sku_produk) as total)
        $data['ulasancount'] = $this->db->query("SELECT sku_produk, COUNT(*) as total FROM rating GROUP BY sku_produk ORDER BY total desc");

        $data['title'] = 'Admin semua ulasan';

        $this->load->view('admin/_partials/header', $data);

        $this->load->view('admin/rate', $data);

        $this->load->view('admin/_partials/footer');
    }



}
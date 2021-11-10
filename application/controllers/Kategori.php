<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Kategori extends CI_Controller

{

    public function __construct()

    {

        parent::__construct();

        $this->load->library('pagination');

        $this->load->model('Query_model', 'queri');

    }



    public function index()

    {

        if ($this->input->post('gori')) {

            $repleace = str_replace(" ", "-", $this->input->post('get_gori'));

            redirect(base_url() . 'kategori/' . $repleace);

        } else {

            redirect(base_url());

        }

    }



    public function getProdukBySlug($slug)

    {

        $cek = $this->queri->getProdukBy($slug);

        if ($cek->num_rows() == 0) {

            redirect(base_url());

        } else {





            $data['type1'] = $this->queri->kategoriImage('1')->row();

            $data['type1a'] = $this->queri->kategoriImage('1')->row();

            $data['type1b'] = $this->queri->kategoriImage('1')->row();

            $data['type2'] = $this->queri->kategoriImage('2');

            $data['thumb'] = $this->queri->thumb()->row();

            //$data['getkate'] = $this->queri->getKategori();



            $config['base_url'] = base_url() . 'kategori/' . $this->uri->segment(2) . '/page';

            $config['total_rows'] = $this->queri->countSubKategori($slug);

            $config['per_page'] = 12;

            $config['uri_segment'] = 4;



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

            $page = ($this->uri->segment(4)) ? ($this->uri->segment(4) - 1) : 0;

            $data['paging_kate'] = $this->pagination->create_links();

            $data['produk'] = $this->queri->getProdukBy($slug, $config['per_page'], $page * $config['per_page']);



            $data['kate1'] = $this->queri->kategori();

            $data['kate5'] = $this->queri->subKategori();

            $data['title'] = 'Kategori - ' . str_replace("-", " ", $slug);

            $this->load->view('_partials/headers', $data);

            $this->load->view('kategori', $data);

            $this->load->view('_partials/footer');

        }

    }

}


<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Query_model', 'queri');
    }

    public function index()
    {
        $data['title'] = 'Keranjang - belanja';
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
        $this->load->view('cart', $data);
        $this->load->view('_partials/footer');
    }

    public function addToCart()
    {
        $data = [
            'id' => $this->input->post('produk_id'),
            'name' => $this->input->post('produk_nama'),
            'price' => $this->input->post('produk_harga'),
            'qty' => $this->input->post('quantity'),
            'options' => array('img' => $this->input->post('produk_image'), 'variasi' => $this->input->post('variasi'))
        ];
        $this->cart->insert($data);
    }

    public function delCart()
    {
        $data = [
            'rowid' => $this->input->post('row_id'),
            'qty' => 0,
        ];
        $this->cart->update($data);
        // redirect(base_url() . 'cart');
    }

    public function updateCart()
    {
        if ($this->input->post('quan')) {
            $quan = $this->input->post('quan');

            $ambil = $quan;
            foreach ($ambil as $key => $value) {
                $data = [
                    'rowid' => $key,
                    'qty' => $value
                ];
                $this->cart->update($data);
            }
            redirect(base_url() . 'cart');
        }
        //redirect(base_url() . 'cart');
    }

    // public function showCart()
    // {
    //     $output = '';
    //     $no = 0;
    //     foreach ($this->cart->contents() as $items) {
    //         $no++;
    //     }
    // }
}

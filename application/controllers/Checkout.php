<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Checkout extends CI_Controller

{



    public function __construct()

    {

        parent::__construct();

        $this->load->model('Query_model', 'queri');

    }



    public function index()

    {



        if (count($this->cart->contents()) == 0) {

            redirect(base_url());

        }



        if ($this->input->post('provinsi_id2')) {

            $result = '<option value="" selected>Pilih Kota/Kab</option><br>';

            $provinsi = $this->input->post('provinsi_id2');

            $hasil = $this->db->get_where('kota', ['province_id' => $provinsi]);



            foreach ($hasil->result() as $get) {

                if ($get->type == 'Kabupaten') {

                    $result .= '<option value="' . $get->city_id . '">Kab. ' . $get->city_name . '</option><br>';

                } else {

                    $result .= '<option value="' . $get->city_id . '">Kota. ' . $get->city_name . '</option><br>';

                }

            }

            echo $result;

        } elseif ($this->input->post('kota_id2')) {

            $kota = $this->input->post('kota_id2');

            echo $this->_getKecamatan2($kota);

        } else {

        $data['title'] = 'Checkout';

        $data['produk'] = $this->queri->getProduk();

        $data['hotproduk'] = $this->db->query("SELECT * FROM produk WHERE is_diskon != '0' AND is_active = '1'");

        $data['type1'] = $this->queri->kategoriImage('1')->row();

        $data['type1a'] = $this->queri->kategoriImage('1')->row();

        $data['type1b'] = $this->queri->kategoriImage('1')->row();

        $data['type2'] = $this->queri->kategoriImage('2');

        $data['thumb'] = $this->queri->thumb()->row();

        //$data['getkate'] = $this->queri->getKategori();

        $data['kate1'] = $this->queri->kategori();



        $data['getprovinsi'] = $this->queri->getCekProvinsi();



        $this->load->view('_partials/headers', $data);

        $this->load->view('checkout', $data);

        $this->load->view('_partials/footer');

      }

    }



    public function getOngkir2()

    {

        $getini = '<h6 class="pb-2">Pilih kurir</h6><div class="form-group"><select class="form-control" id="pengiriman"><option value="" selected>Kurir</option><br>';

        $kecamatan_id2 = $this->input->post('kecamatan_id2');



        $get = file_get_contents('http://api.shipping.esoftplay.com/domesticCost/6075/' . $kecamatan_id2 . '/1000/jne/subdistrict/subdistrict');

        $hasil = json_decode($get, true);



        for ($i=0; $i < count($hasil['result'][0]['costs']) ; $i++) { 

            $getini .= '<option value="'. $hasil['result'][0]['costs'][$i]['cost'][0]['value'] . '|JNE - ' . $hasil['result'][0]['costs'][$i]['service'] .'">JNE - ' . $hasil['result'][0]['costs'][$i]['service'] . ' Rp '. number_format($hasil['result'][0]['costs'][$i]['cost'][0]['value'], 0, ',', '.') .' ~ '. $hasil['result'][0]['costs'][$i]['cost'][0]['etd'] .' Hari</option><br>';

        }



        $get1 = file_get_contents('http://api.shipping.esoftplay.com/domesticCost/6075/' . $kecamatan_id2 . '/1000/jnt/subdistrict/subdistrict');

        $hasil1 = json_decode($get1, true);





        for ($j=0; $j < count($hasil1['result'][0]['costs']) ; $j++) { 

            $getini .= '<option value="'. $hasil1['result'][0]['costs'][$j]['cost'][0]['value'] . '|J&T - ' . $hasil1['result'][0]['costs'][$j]['service'] .'">J&T - ' . $hasil1['result'][0]['costs'][$j]['service'] . ' Rp '. number_format($hasil1['result'][0]['costs'][$j]['cost'][0]['value'], 0, ',', '.') .' ~ '. $hasil1['result'][0]['costs'][$j]['cost'][0]['etd'] .' Hari</option><br>';

        }



        $get2 = file_get_contents('http://api.shipping.esoftplay.com/domesticCost/6075/' . $kecamatan_id2 . '/1000/pos/subdistrict/subdistrict');

        $hasil2 = json_decode($get2, true);





        for ($k=0; $k < count($hasil2['result'][0]['costs']) ; $k++) { 

            $getini .= '<option value="'. $hasil2['result'][0]['costs'][$k]['cost'][0]['value'] . '|POS - ' . $hasil2['result'][0]['costs'][$k]['service'] .'">POS - ' . $hasil2['result'][0]['costs'][$k]['service'] . ' Rp '. number_format($hasil2['result'][0]['costs'][$k]['cost'][0]['value'], 0, ',', '.') .' ~ '. $hasil2['result'][0]['costs'][$k]['cost'][0]['etd'] .'</option><br>';

        }



        $get3 = file_get_contents('http://api.shipping.esoftplay.com/domesticCost/6075/' . $kecamatan_id2 . '/1000/sicepat/subdistrict/subdistrict');

        $hasil3 = json_decode($get3, true);





        for ($n=0; $n < count($hasil3['result'][0]['costs']) ; $n++) { 

            $getini .= '<option value="'. $hasil3['result'][0]['costs'][$n]['cost'][0]['value'] . '|SICEPAT - ' . $hasil3['result'][0]['costs'][$n]['service'] .'">SICEPAT - ' . $hasil3['result'][0]['costs'][$n]['service'] . ' Rp '. number_format($hasil3['result'][0]['costs'][$n]['cost'][0]['value'], 0, ',', '.') .' ~ '. $hasil3['result'][0]['costs'][$n]['cost'][0]['etd'] .' Hari</option><br>';

        }

        $getini .= '</select></div>';

        echo $getini;

    }



    public function cekOngkir()

    {

        if ($this->input->post('pengiriman')) {

            $pengiriman = $this->input->post('pengiriman');

            $get = explode("|", $pengiriman);

            $gaga = $get[0];

            $tambah = $this->cart->total() + $gaga;

            $hasilnya = number_format($tambah, 0, ',', '.');

            $dta1 = [

                'total' => '<div class="total clearfix">TOTAL <span id="tampiltotal">Rp. ' . $hasilnya . '</span></div>',

                'shipping' => '<li class="clearfix"><em><strong>Shipping</strong></em> <span>Rp. ' . number_format($gaga, 0, ',', '.') . '</span></li>',

                'subtotalori_i' => $this->cart->total(),

                'shipping_i' => $gaga,

                'total_i' => $tambah

            ];

            $jojo1 = json_encode($dta1);

            echo $jojo1;

        } else {

            $dta = [

                'total' => '<div class="total clearfix">TOTAL <span id="tampiltotal">Rp. ' . number_format($this->cart->total(), 0, ', ','.') . '</span></div>',

                'shipping' => '<li class="clearfix"><em><strong>Shipping</strong></em> <span>Rp. 0</span></li>',

                'subtotalori_i' => $this->cart->total(),

                'shipping_i' => 0,

                'total_i' => $this->cart->total()

            ];

            $jojo = json_encode($dta);

            echo $jojo;

        }

    }



    public function contoh()

    {

        if ($this->input->post('coba')) {

            echo $this->input->post('coba');

        }

    }



    private function _getapi($type, $kurir)

    {

        // $curl = curl_init();



        // curl_setopt_array($curl, array(

        //     CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",

        //     CURLOPT_RETURNTRANSFER => true,

        //     CURLOPT_ENCODING => "",

        //     CURLOPT_MAXREDIRS => 10,

        //     CURLOPT_TIMEOUT => 30,

        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

        //     CURLOPT_CUSTOMREQUEST => "POST",

        //     CURLOPT_POSTFIELDS => "origin=440&destination=" . $desti . "&weight=1700&courier=jne",

        //     CURLOPT_HTTPHEADER => array(

        //         "content-type: application/x-www-form-urlencoded",

        //         "key: c44888f4d923607bd6b304cd734d65ce"

        //     ),

        // ));



        // $response = curl_exec($curl);

        // $err = curl_error($curl);



        // curl_close($curl);

        // $hasil = json_decode($response, true);

        // if ($type == 'express') {

        //     return $hasil['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value'];

        // } else {

        //     return $hasil['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];

        // }



        $get = file_get_contents('http://api.shipping.esoftplay.com/domesticCost/6075/' . $kecamatan_id . '/1000/' . $kurir . '/subdistrict/subdistrict');

        $hasil = json_decode($get, true);

    }





    // Get Order



    public function getOrder()

    {

        $email = $this->input->post('email');

        $nama_a = $this->input->post('nama_a');

        $nama_b = $this->input->post('nama_b');

        $alamat = $this->input->post('alamat');

        $kodepos = $this->input->post('kodepos');

        $alamat_p = $this->input->post('alamat_p');

        $whatsapp = $this->input->post('whatsapp');

        $ship_kota = $this->input->post('ship_kota');

        $ship_kecamatan = $this->input->post('ship_kecamatan');

        $keterangan = $this->input->post('keterangan');

        $payment = $this->input->post('payment');

        $metode = $this->input->post('metode');

        $subtotal = $this->cart->total();

        $shipping = $this->input->post('shipping');

        $total = $this->input->post('total');

        $courier = $this->input->post('courier');

        $newsletter = $this->input->post('newsletter');



        



        if (empty($email) || empty($nama_a) || empty($nama_b) || empty($alamat) || empty($kodepos) || empty($alamat_p) || empty($whatsapp) || empty($ship_kota) || empty($ship_kecamatan) || $courier == '0') {

            $json = [
                'type' => 'gagal',
                'pesan' => '<div class="alert alert-danger" role="alert">Mohon isi input yang kosong</div>'
            ];

            echo json_encode($json);

        } else {

            $cek_users = $this->db->get_where('detail_pelanggan', ['email' => $email]);

            if ($cek_users->num_rows() == 1) {

                $aa = $cek_users->row();

                $cek_status = $this->db->get_where('detail_order_id', ['id_pelanggan' => $aa->id, 'status' => '0']);

                if ($cek_status->num_rows() == 1) {

                    $json = [
                            'type' => 'gagal',
                            'pesan' => '<div class="alert alert-danger" role="alert">Kamu memiliki pesanan yang belum dibayar ,mhon selesaikan pesanan sebelumnya </div>'
                        ];

                    echo json_encode($json);
                    exit();

                }

            }

            $order_id = $this->_random(8);



            $data_pelanggan = [

                'email' => $email,

                'nama_lengkap' => $nama_a . ' ' . $nama_b,

                'alamat_lengkap' => $alamat,

                'kodepos' => $kodepos,

                'is_pengiriman' => $this->_getShipping('all', $ship_kecamatan, $ship_kota),

                'whatsapp' => $whatsapp,

                'keterangan' => $keterangan,

                'date_created' => date('d-m-Y H:i:s')

            ];

            $id_pelanggan = $this->queri->insertOrder('insert_pelanggan', $data_pelanggan);

            if ($id_pelanggan) {



                if ($newsletter == 'is_checked') {

                    $data_newsletter = [

                        'id_pelanggan' => $id_pelanggan,

                        'email' => $email,

                        'status' => '1'

                    ];

                    $this->queri->insertNewsletter($data_newsletter);

                }



                $data_id = [

                    'order_id' => $order_id,

                    'id_pelanggan' => $id_pelanggan,

                    'payment' => $payment,

                    'is_bank' => $metode,

                    'courier' => $courier,

                    'shipping_addres' => $this->_getShipping('all', $ship_kecamatan, $ship_kota),

                    'shipping' => $shipping,

                    'noresi' => '',

                    'total' => $total,

                    'date_created' => date('d-m-Y H:i:s'),

                    'timestamp' => time(),

                    'status' => '0'

                ];

                $insert_id = $this->queri->insertOrder('insert_id', $data_id);

                if ($insert_id) {

                    foreach ($this->cart->contents() as $item) {

                        $data_produk = [

                            'sku_produk' => $item['id'],

                            'order_id' => $order_id,

                            'produk' => $item['name'],

                            'variasi' => $item['options']['variasi'],

                            'qty' => $item['qty'],

                            'harga' => $item['price'],
                            'is_rating' => '0',

                            'status' => '0'

                        ];

                        $this->queri->insertOrder('proses', $data_produk);

                    }

                    $proses = $this->_sendEmail($order_id);

                    if ($proses) {

                        $this->cart->destroy();

                        $json = [
                            'type' => 'sukses',
                            'pesan' => '<div class="alert alert-success" role="alert">Anda berhasil melakukan pemesanan mhon cek email anda untuk menyelesaikan pembayaran anda..</div>'
                        ];

                        echo json_encode($json);

                    }

                }

            }

        }

    }





    private function _fakturOrder($id)

    {

        $cek = $this->db->get_where('detail_order_id', ['order_id' => $id]);

        if ($cek->num_rows() == 1) {

            $result = '';

            $data = $cek->row();

            $pelanggan = $this->db->get_where('detail_pelanggan', ['id' => $data->id_pelanggan])->row();

            $produk = $this->db->get_where('detail_order_produk', ['order_id' => $id])->row();

            $alamat_p = $this->db->get_where('kota', ['city_id' => $pelanggan->is_pengiriman])->row();

            $payment = ($data->is_bank == '') ? $data->payment : 'Transfer ' . $data->is_bank . ' 443601029297536 a/n DEDE MARYANI';



            $pesan = file_get_contents('././assets/faktur.html');

            $pesan = str_replace("%welcome%", "Hallo {$pelanggan->nama_lengkap} silahkan selesaikan pembayaran anda dengan detail di bawah ini, untuk melakukan pembayaran transfer mhon transfer dengan nominal yg tepat Rp" .number_format($data->total, 0, ',','.'). " ke rekening berikut <b>443601029297536 a/n DEDE MARYANI</b>, dan jika anda sudah melakukan pembayaran mhon kirim bukti transfer anda ke no whatsapp berikut 089670402864 atau kunjungi halaman ini <a href='https://busana69.my.id/konfirmasi'>https://busana69.my.id/konfirmasi</a> untuk mengecek pesanan anda kunjungi halaman ini <a href='https://busana69.my.id/cekorder'>https://busana69.my.id/cekorder</a> terimakasih telah memesan produk dari kami :)..", $pesan);

            $pesan = str_replace("%idorder%", "#{$id}", $pesan);

            $pesan = str_replace("%payment%", "{$payment}", $pesan);

            $pesan = str_replace("%courier%", "{$data->courier} : Rp " . number_format($data->shipping, 0, ',', '.'), $pesan);

            $pesan = str_replace("%date_created%", "{$data->date_created}", $pesan);

            $pesan = str_replace("%subtotal%", "Rp " . number_format($this->cart->total(), 0, ',', '.'), $pesan);

            $pesan = str_replace("%total%", "Rp " . number_format($data->total, 0, ',', '.'), $pesan);

            $pesan = str_replace("%alamat%", "{$pelanggan->alamat_lengkap}", $pesan);

            $pesan = str_replace("%alamat_shipping%", "{$pelanggan->is_pengiriman}", $pesan);



            foreach ($this->cart->contents() as $items) {

                $result .= '<tr><td><img src="' . base_url() . 'assets/img/upload/' . $this->_cokotsatu($items['options']['img']) . '" alt="" width="70"></td>

                                <td valign="top" style="padding-left: 15px;">

                                    <h5 style="margin-top: 15px;">' . $items['name'] . '</h5>

                                </td>

                                <td valign="top" style="padding-left: 15px;">

                                    

                                    <h5 style="font-size: 14px; color:#444;margin-top: 10px;"><span>' . $items['qty'] . '</span></h5>                                    

                                </td>

                                <td valign="top" style="padding-left: 15px;">

                                    <h5 style="font-size: 14px; color:#444;margin-top:15px"><b>Rp ' . number_format($items['price'], 0, ',', '.') . '</b></h5>                  

                                </td></tr>';

            }

            $pesan = str_replace("%produkloop%", $result, $pesan);

        } else {

            $pesan = 'tidak bisa mengirim html';

        }



        return $pesan;

    }



    private function _cokotsatu($mana)

    {

        $exp = explode("|", $mana);

        return $exp[0];

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



    private function _sendEmail($idnya)

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

        $pesan = $this->_fakturOrder($idnya);



        $this->email->from('suport@busana69.my.id', 'Busana69');

        $this->email->to($this->input->post('email'));



        $this->email->subject('Payment order requested');

        $this->email->message($pesan);

        if ($this->email->send()) {

            return true;

        } else {

            echo $this->email->print_debugger();

            die;

        }

    }



    private function _getKecamatan2($kota)

    {

        $kecamatan = '<option value="" selected>Pilih kecamatan</option><br>';

        $get = file_get_contents('http://api.shipping.esoftplay.com/subdistrict/' . $kota);

        $hasil = json_decode($get, true);



        for ($i=0; $i < count($hasil['result']) ; $i++) { 

            $kecamatan .= '<option value="' . $hasil['result'][$i]['subdistrict_id'] . '">' . $hasil['result'][$i]['subdistrict_name'] . '</option><br>';

        }

        return $kecamatan;

    }



    private function _getShipping($type,$id,$idkota = null)

    {



        if ($type == 'provinsi') {

            $cek = $this->db->get_where('provinsi', ['province_id' => $id])->row();

            $result = $cek->province;

        } elseif ($type == 'kota') {

            $cek = $this->db->get_where('kota', ['city_id' => $id])->row();

            $result = $cek->type . ' ' . $cek->city_name;

        } else {

            $get = file_get_contents('http://api.shipping.esoftplay.com/subdistrict/' . $idkota . '/' . $id);

            $cek = json_decode($get, true);

            $type = ($cek['result']['type'] == 'Kabupaten') ? 'Kab.' : 'Kota';

            $result = $cek['result']['province'] . ', ' . $type . ' ' . $cek['result']['city'] . ' Kecamatan ' . $cek['result']['subdistrict_name'];

        }

        return $result;

    }

}


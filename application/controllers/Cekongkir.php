<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cekongkir extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Query_model', 'queri');
    }

    public function index()
    {
    	if ($this->input->post('provinsi_id')) {
    		$result = '<option value="" selected>Kota</option><br>';
    		$provinsi_id = $this->input->post('provinsi_id');
    		$hasil = $this->db->get_where('kota', ['province_id' => $provinsi_id]);
    		foreach ($hasil->result() as $dt) {
    			if ($dt->type == 'Kabupaten') {
    				$result .= '<option value="' . $dt->city_id . '">Kab. ' . $dt->city_name . '</option><br>';
    			} else {
    				$result .= '<option value="' . $dt->city_id . '">Kota. ' . $dt->city_name . '</option><br>';
    			}
    			
    		}
    		echo $result;
    		
    	} elseif ($this->input->post('kota_id')) {
    		$kota_id = $this->input->post('kota_id');
    		echo $this->_getKecamatan($kota_id);
    	} else {
    	$data['title'] = 'Cek ongkir';
        $data['produk'] = $this->queri->getProduk();
        $data['hotproduk'] = $this->db->query("SELECT * FROM produk WHERE is_diskon != '0' AND is_active = '1'");
        $data['type1'] = $this->queri->kategoriImage('1')->row();
        $data['type1a'] = $this->queri->kategoriImage('1')->row();
        $data['type1b'] = $this->queri->kategoriImage('1')->row();
        $data['type2'] = $this->queri->kategoriImage('2');
        $data['thumb'] = $this->queri->thumb()->row();
        //$data['getkate'] = $this->queri->getKategori();
        $data['kate1'] = $this->queri->kategori();

        $data['provinsi'] = $this->db->get('provinsi');

        $this->load->view('_partials/headers', $data);
        $this->load->view('cekongkir', $data);
        $this->load->view('_partials/footer');
      }
    }

    public function getOngkir()
    {
    	$getini = '';
    	$kecamatan_id = $this->input->post('kecamatan_id');
    	$kurir = $this->input->post('kurir');

    	$get = file_get_contents('http://api.shipping.esoftplay.com/domesticCost/6075/' . $kecamatan_id . '/1000/' . $kurir . '/subdistrict/subdistrict');
    	$hasil = json_decode($get, true);

    	if ($kurir == 'jne') {
    		for ($i=0; $i < count($hasil['result'][0]['costs']) ; $i++) { 
    			$getini .= '<div class="card"><div class="card-header">JNE - '. $hasil['result'][0]['costs'][$i]['service'] .'</div><ul class="list-group list-group-flush">
	    <li class="list-group-item">Deskripsi: '. $hasil['result'][0]['costs'][$i]['description'] .'</li>
	    <li class="list-group-item">Harga: Rp '. number_format($hasil['result'][0]['costs'][$i]['cost'][0]['value'], 0, ',', '.') .'</li>
	    <li class="list-group-item">Estimasi: '. $hasil['result'][0]['costs'][$i]['cost'][0]['etd'] .' Hari</li></ul></div><br>';
    		}
    	} elseif ($kurir == 'jnt') {
    		for ($i=0; $i < count($hasil['result'][0]['costs']) ; $i++) { 
    			$getini .= '<div class="card"><div class="card-header">J&T - '. $hasil['result'][0]['costs'][$i]['service'] .'</div><ul class="list-group list-group-flush">
	    <li class="list-group-item">Deskripsi: '. $hasil['result'][0]['costs'][$i]['description'] .'</li>
	    <li class="list-group-item">Harga: Rp '. number_format($hasil['result'][0]['costs'][$i]['cost'][0]['value'], 0, ',', '.') .'</li>
	    <li class="list-group-item">Estimasi: '. $hasil['result'][0]['costs'][$i]['cost'][0]['etd'] .' Hari</li></ul></div><br>';
    	    }
        } elseif ($kurir == 'pos') {
        	for ($i=0; $i < count($hasil['result'][0]['costs']) ; $i++) { 
    			$getini .= '<div class="card"><div class="card-header">POS - '. $hasil['result'][0]['costs'][$i]['service'] .'</div><ul class="list-group list-group-flush">
	    <li class="list-group-item">Deskripsi: '. $hasil['result'][0]['costs'][$i]['description'] .'</li>
	    <li class="list-group-item">Harga: Rp '. number_format($hasil['result'][0]['costs'][$i]['cost'][0]['value'], 0, ',', '.') .'</li>
	    <li class="list-group-item">Estimasi: '. $hasil['result'][0]['costs'][$i]['cost'][0]['etd'] .'</li></ul></div><br>';
    	    }
        } elseif ($kurir == 'sicepat') {
        	for ($i=0; $i < count($hasil['result'][0]['costs']) ; $i++) { 
    			$getini .= '<div class="card"><div class="card-header">SICEPAT - '. $hasil['result'][0]['costs'][$i]['service'] .'</div><ul class="list-group list-group-flush">
	    <li class="list-group-item">Deskripsi: '. $hasil['result'][0]['costs'][$i]['description'] .'</li>
	    <li class="list-group-item">Harga: Rp '. number_format($hasil['result'][0]['costs'][$i]['cost'][0]['value'], 0, ',', '.') .'</li>
	    <li class="list-group-item">Estimasi: '. $hasil['result'][0]['costs'][$i]['cost'][0]['etd'] .' Hari</li></ul></div><br>';
    	    }
        }

    	echo $getini;

    }

    private function _getKecamatan($kota)
    {
    	$kecamatan = '<option value="" selected>Kecamatan</option><br>';
    	$get = file_get_contents('http://api.shipping.esoftplay.com/subdistrict/' . $kota);
    	$hasil = json_decode($get, true);

    	for ($i=0; $i < count($hasil['result']) ; $i++) { 
    		$kecamatan .= '<option value="' . $hasil['result'][$i]['subdistrict_id'] . '">' . $hasil['result'][$i]['subdistrict_name'] . '</option><br>';
    	}
    	return $kecamatan;
    }

}
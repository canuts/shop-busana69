<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Cekorder extends CI_Controller

{



    public function __construct()

    {

        parent::__construct();

        $this->load->model('Query_model', 'queri');

    }



    public function index()

    {

    	if ($this->input->post('idpesanan')) {

    		$idpesanan = $this->input->post('idpesanan');



    		$cek = $this->db->get_where('detail_order_id', ['order_id' => $idpesanan]);



    		if ($cek->num_rows() == 1) {

    			$hasil = $cek->row();

    			$pelanggan = $this->db->get_where('detail_pelanggan', ['id' => $hasil->id_pelanggan])->row();

    			$status = ($hasil->status == '0') ? 'BELUM DIBAYAR' : 'DIBAYAR';

    			if ($hasil->noresi == '' && $status == 'BELUM DIBAYAR') {

    				$btn = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button><button type="submit" class="btn btn-primary" id="bayar">Bayar sekarang</button>';

    				$resi = '';

    			} else {

    				$exp = explode(" - ", $hasil->courier);

    				$kurir = strtolower($exp[0]);

    				$btn = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button><br><button type="submit" id="cekresi5" class="btn btn-primary" data-resi="'. $hasil->noresi .'" data-kurir="'. $kurir .'">Cek status pengiriman</button>';

    				$resi = '<li class="list-group-item">Noresi: <strong>'. $hasil->noresi .'</strong></li>';

    			}

    			$data = [

    				'type' => 'success',

    				'pesan' => '<div class="card"><ul class="list-group list-group-flush">

   				<li class="list-group-item">OrderId: <strong>#'. $hasil->order_id .'</strong></li>

            	<li class="list-group-item">AtasNama: <strong>'. $pelanggan->nama_lengkap .'</strong></li>

            	<li class="list-group-item">AlamatLengkap: <strong>'.$pelanggan->alamat_lengkap.'</strong></li>

            	<li class="list-group-item">AlamatPengiriman: <strong>'.$pelanggan->is_pengiriman.'</strong></li>

            	<li class="list-group-item">KurirPengiriman: <strong>'.$hasil->courier.' ~ Rp '. number_format($hasil->shipping, 0, ',', '.') .'</strong></li>

            	<li class="list-group-item">Keterangan: <strong>'.$pelanggan->keterangan.'</strong></li>

            	<li class="list-group-item">WaktuPemesanan: <strong>'.$pelanggan->date_created.'</strong></li>

            	<li class="list-group-item">Pembayaran: <strong>'.$hasil->payment.' ' .$hasil->is_bank.'</strong></li>

            	<li class="list-group-item">Status: <strong>'.$status.'</strong></li>

            	<li class="list-group-item">SubtotalProduk: <strong>Rp '. number_format($hasil->total, 0, ',', '.') .'</strong></li>' . $resi . '</ul></div>',

          			'btn' => $btn

    				];

    				echo json_encode($data);

    		} else {

    			$data = [

    				'type' => 'error',

    				'pesan' => '<div class="alert alert-danger" role="alert">IdPesanan tidak ditemukan mohon cek yang teliti.. </div>',

    				'btn' => '<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>'

    			];

    			echo json_encode($data);

    		}

    	} else {

    	$data['title'] = 'Cek Order';

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

        $this->load->view('cekorder', $data);

        $this->load->view('_partials/footer');

      }

    }



    public function goresi()

    {

    		$resi = $this->input->post('resi');

    		$kurir = $this->input->post('kurir');

    		// $hasil_kurir = ($kurir == 'j&t') ? 'jnt' : $kurir;

    		

    		if ($kurir == 'j&t') {

    			$kurir = 'jnt';

    			$resi_cek = $this->db->get_where('detail_order_id', ['noresi' => $resi])->row();

    			$select = $this->db->get_where('detail_pelanggan', ['id' => $resi_cek->id_pelanggan])->row();

    			$alamat_gw = 'kmp.cibungur,kecamatan jatinangor kab.sumedang desa jatimukti';

    			$destination = $select->alamat_lengkap . ' ' . $select->is_pengiriman;

    			$pesan = $this->_cekresi($resi, $kurir,$alamat_gw,$destination);

    		} elseif ($kurir == 'pos' || $kurir == 'sicepat') {

    			$resi_cek = $this->db->get_where('detail_order_id', ['noresi' => $resi])->row();

    			$select = $this->db->get_where('detail_pelanggan', ['id' => $resi_cek->id_pelanggan])->row();

    			$alamat_gw = 'kmp.cibungur,kecamatan jatinangor kab.sumedang desa jatimukti';

    			$destination = $select->alamat_lengkap . ' ' . $select->is_pengiriman;

    			$pesan = $this->_cekresi($resi, $kurir,$alamat_gw,$destination);

    		} else {

    			$pesan = $this->_cekresi($resi, $kurir);

    		}



    		if ($pesan == 'error') {

    			$data = [

    			'pesan' => '<div class="alert alert-danger" role="alert">Gagal mengecek noresi anda, mungkin belum terdeteksi mhon tunggu beberapa saat..</div>',

    			'btn' => '<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>'

    			];

    			echo json_encode($data);

    		} else {

    			$data = [

    			'pesan' => $pesan,

    			'btn' => '<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>'

    			];

    			echo json_encode($data);

    		}

    }



    private function _cekresi($resi,$kurir,$origin = null,$destination = null)

    {

    	$hasil = '';

    	$get = file_get_contents('http://api.shipping.esoftplay.com/waybill/'. $resi .'/'. $kurir);

    	$data = json_decode($get, true);
        if ($data['success'] == 0) {
            $hasil .= 'error';
        } else {
    	if($kurir == 'jne') {

    		$data = $data['result'];

    		$hasil .= '<div class="card"><ul class="list-group list-group-flush">

    <li class="list-group-item">Resi: <strong>' . $data['summary']['waybill_number'] . '</strong></li>

    <li class="list-group-item">Kurir: <strong>'. $data['summary']['courier_name'] .' ~ '. $data['summary']['service_code'] .'</strong></li>

    <li class="list-group-item">NamaPengirim: <strong>'. $data['summary']['shipper_name'] .'</strong></li>

    <li class="list-group-item">NamaPenerima: <strong>'. $data['summary']['receiver_name'] .'</strong></li>

    <li class="list-group-item">DikirimDari: <strong>'. $data['details']['origin'] . ' '. $data['details']['shipper_address1'] . '' . $data['details']['shipper_address2'] . '' . $data['details']['shipper_address3'] . ', '. $data['details']['shipper_city'] .'</strong></li>

    <li class="list-group-item">Diterima: <strong>'. $data['details']['destination'] . ' '. $data['details']['receiver_address1'] . '' . $data['details']['receiver_address2'] . '' . $data['details']['receiver_address3'] . ', '. $data['details']['receiver_city'] .'</strong></li>

    <li class="list-group-item">Status: <strong>' . $data['summary']['status'] . '</strong></li>

    <li class="list-group-item">Tracking<br><br>';



    	for ($i=0; $i < count($data['manifest']) ; $i++) { 

    		$hasil .= '<li class="list-group-item"><strong>' . $data['manifest'][$i]['manifest_date'] . ' ' . $data['manifest'][$i]['manifest_time'] . '<br>' . $data['manifest'][$i]['manifest_description'] . '</strong></li><br>';

    	}

    		$hasil .= '</ul></div>';

    	} elseif ($kurir == 'jnt') {

    		$data = $data['result'];

    		$hasil .= '<div class="card"><ul class="list-group list-group-flush">

    		<li class="list-group-item">Resi: <strong>' . $data['summary']['waybill_number'] . '</strong></li>

    		<li class="list-group-item">Kurir: <strong>'. $data['summary']['courier_name'] .'</strong></li>

    		<li class="list-group-item">DikirimDari: <strong>'. $origin .'</strong></li>

    		<li class="list-group-item">Diterima: <strong>'. $destination .'</strong></li>

    		<li class="list-group-item">Status: <strong>' . $data['summary']['status'] . '</strong></li>

    		<li class="list-group-item">Tracking<br><br>';



    		for ($i=0; $i < count($data['manifest']) ; $i++) { 

    		$hasil .= '<li class="list-group-item"><strong>' . $data['manifest'][$i]['manifest_date'] . ' ' . $data['manifest'][$i]['manifest_time'] . '<br>' . $data['manifest'][$i]['city_name'] . '<br>' . $data['manifest'][$i]['manifest_description'] . '</strong></li><br>';

    		}

    		$hasil .= '</ul></div>';

    	} elseif ($kurir == 'pos') {

    		$data = $data['result'];

    		$hasil .= '<div class="card"><ul class="list-group list-group-flush">

    <li class="list-group-item">Resi: <strong>' . $data['summary']['waybill_number'] . '</strong></li>

    <li class="list-group-item">Kurir: <strong>'. $data['summary']['courier_name'] .' ~ '. $data['summary']['service_code'] .'</strong></li>

    <li class="list-group-item">NamaPengirim: <strong>'. $data['summary']['shipper_name'] .'</strong></li>

    <li class="list-group-item">NamaPenerima: <strong>'. $data['summary']['receiver_name'] .'</strong></li>

    <li class="list-group-item">DikirimDari: <strong>'. $origin .'</strong></li>

    <li class="list-group-item">Diterima: <strong>'. $destination .'</strong></li>

    <li class="list-group-item">Status: <strong>' . $data['summary']['status'] . '</strong></li>

    <li class="list-group-item">Tracking<br><br>';



    	for ($i=0; $i < count($data['manifest']) ; $i++) { 

    		$hasil .= '<li class="list-group-item"><strong>' . $data['manifest'][$i]['manifest_date'] . ' ' . $data['manifest'][$i]['manifest_time'] . '<br>' . $data['manifest'][$i]['city_name'] . '<br>' . $data['manifest'][$i]['manifest_description'] . '<br>' . $data['manifest'][$i]['manifest_code'] . '</strong></li><br>';

    	}

    		$hasil .= '</ul></div>';

    	} elseif ($kurir == 'sicepat') {

    		$data = $data['result'];

    		$hasil .= '<div class="card"><ul class="list-group list-group-flush">

    <li class="list-group-item">Resi: <strong>' . $data['summary']['waybill_number'] . '</strong></li>

    <li class="list-group-item">Kurir: <strong>'. $data['summary']['courier_name'] .' ~ '. $data['summary']['service_code'] .'</strong></li>

    <li class="list-group-item">NamaPengirim: <strong>'. $data['summary']['shipper_name'] .'</strong></li>

    <li class="list-group-item">NamaPenerima: <strong>'. $data['summary']['receiver_name'] .'</strong></li>

    <li class="list-group-item">DikirimDari: <strong>'. $origin .'</strong></li>

    <li class="list-group-item">Diterima: <strong>'. $destination .'</strong></li>

    <li class="list-group-item">Status: <strong>' . $data['summary']['status'] . '</strong></li>

    <li class="list-group-item">Tracking<br><br>';



    	for ($i=0; $i < count($data['manifest']) ; $i++) { 

    		$hasil .= '<li class="list-group-item"><strong>' . $data['manifest'][$i]['manifest_date'] . ' ' . $data['manifest'][$i]['manifest_time'] . '<br>' . $data['manifest'][$i]['city_name'] . '<br>' . $data['manifest'][$i]['manifest_description'] . '</strong></li><br>';

    	}

    		$hasil .= '</ul></div>';

    	}

    }


    	return $hasil;

    }

}
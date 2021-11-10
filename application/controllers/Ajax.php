<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Ajax extends CI_Controller

{



	public function __construct()

    {

        parent::__construct();

        $this->load->model('Admin_model', 'admin');

    }



    public function index()

    {

    	redirect(base_url());

    }



    public function editInvoice()

    {

    	if ($this->input->post('orderid')) {

    		$orderid = $this->input->post('orderid');

    		$pelanggan = $this->input->post('pelanggan');

    		$payment = $this->input->post('payment');

    		$is_bank = $this->input->post('isbank');

    		$kurir = $this->input->post('kurir');

    		$shippingaddres = $this->input->post('shippingaddres');

    		$shipping = $this->input->post('shipping');

    		$noresi = $this->input->post('noresi');

    		$total = $this->input->post('total');

    		$datecreated = $this->input->post('datecreated');

    		$status = $this->input->post('status');

    		



    		$update = $this->db->query("UPDATE detail_order_id SET order_id = '$orderid', payment = '$payment', is_bank = '$is_bank', courier = '$kurir', shipping_addres = '$shippingaddres', shipping = '$shipping', noresi = '$noresi', total = '$total', date_created = '$datecreated', status = '$status' WHERE order_id = '$orderid'");

    		$update = $this->db->query("UPDATE detail_order_produk SET status = '$status' WHERE order_id = '$orderid'");

    		if ($update) {

    			$data = [

    				'type' => 'success',

    				'pesan' => 'Berhasil mengedit'

    			];

    			echo json_encode($data);

    		} else {

    			$data = [

    				'type' => 'error',

    				'pesan' => 'Gagal mengedit'

    			];

    			echo json_encode($data);

    		}

    	}

    }



    public function deleteInvoice()

    {

    	if ($this->input->post('orderid')) {

    		$orderid = $this->input->post('orderid');

    		$delete = $this->db->query("DELETE FROM detail_order_id WHERE order_id = '$orderid'");

    		$delete = $this->db->query("DELETE FROM detail_order_produk WHERE order_id = '$orderid'");

    		if ($delete) {

    			echo "success";

    		} else {

    			echo "Gagal";

    		}

    	}

    }



    public function addProduk()

    {

    	$nama = $this->input->post('nama');

    	$price = $this->input->post('price');

    	$desc = $this->input->post('desc');

    	$is_diskon = $this->input->post('is_diskon');

    	$expired = $this->input->post('expired');

    	$warna = $this->input->post('warna');

    	$size = $this->input->post('size');

    	$berat = $this->input->post('berat');

    	$kategori = $this->input->post('kategori');

    	$is_active = $this->input->post('is_active');

    	$thumb_text = $this->input->post('thumb_text');

    	//$gambar = $this->input->post('gambar');



    	$this->load->library('upload');

    	$datainfo = array();

    	$files = $_FILES;

    	$count = count($_FILES['gambar']['name']);



    	for ($i=0; $i < $count; $i++) { 

    		$_FILES['gambar']['name'] = $files['gambar']['name'][$i];

    		$_FILES['gambar']['type'] = $files['gambar']['type'][$i];

    		$_FILES['gambar']['tmp_name'] = $files['gambar']['tmp_name'][$i];

    		$_FILES['gambar']['error'] = $files['gambar']['error'][$i];

    		$_FILES['gambar']['size'] = $files['gambar']['size'][$i];



    		//$this->load->library('upload', $this->upload_options());

    		$this->upload->initialize($this->upload_options());

    		$this->upload->do_upload('gambar');

    		$datainfo[] = $this->upload->data('file_name');

    	}



    	$this->resize_image($datainfo);

    	$gambar = implode("|", $datainfo);

    	$slug = str_replace(" ", "-", $nama);

    	$sku_produk = $this->_skuRandom(7);

    	// $terjual = 0;

    	// $review = 0;

    	$thumb = $this->resize_image_thumb($datainfo[0]) . '|' . $thumb_text;



    	$datanya = [

    		'slug' => trim(strtolower($slug)),

    		'nama' => $nama,

    		'price' => $price,

    		'desc' => $desc,

    		'sku_produk' => $sku_produk,

    		'is_diskon' => $is_diskon,

    		'expired' => $expired,

    		'warna' => $warna,

    		'size' => $size,

    		'berat' => $berat,

    		'kategori' => $kategori,

    		'is_active' => $is_active,

    		'terjual' => '0',

    		'review' => '0',

    		'gambar' => $gambar,

    		'thumb' => $thumb

    	];



    	$insert = $this->db->insert('produk', $datanya);

    	if ($insert) {

    		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">

            Produk berhasil ditambahkan.</div>');

            redirect(base_url() . 'all_produk');

    	} else {

    		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">

            Produk gagal ditambahkan.</div>');

            redirect(base_url() . 'all_produk');

    	}



    }



    public function deleteProduk()

    {

    	$id = $this->input->post('id');



    	$cek = $this->db->get_where('produk', ['id' => $id]);



    	if ($cek->num_rows() == 0) {

    		echo "error";

    	} else {

    		$data = $cek->row();

    		$gambar = explode("|", $data->gambar);

    		$thumb = explode("|", $data->thumb);

            unlink(FCPATH . 'assets/img/upload/' . $thumb[0]);



        		for ($i=0; $i < count($gambar) ; $i++) { 

        			unlink(FCPATH . 'assets/img/upload/' . $gambar[$i]);

        		}

            		$hasil = $this->db->query("DELETE FROM produk WHERE id = '$id'");

        			if ($hasil == true) {

                        echo "succ";

                    } else {

                        echo "gagal";

                    }

    		

    		}

    	}



        public function editProdukForm()

        {

            $id = $this->input->post('id');

            $get = $this->db->get_where('produk', ['id' => $id])->row();

            $form = '<div class="form-group">

                <label>Slug produk</label>

                <input type="text" value="'.$get->slug.'" class="form-control" name="edit_slug">

                </div><br>';

                $form .= '<input type="hidden" value="'.$get->id.'" name="edit_id">';

            $form .= '<div class="form-group">

                <label>Nama produk</label>

                <input type="text" value="'.$get->nama.'" class="form-control" name="edit_nama">

              </div><br>';

            $form .= '<div class="form-group">

                <label>Price produk</label>

                <input type="number" value="'.$get->price.'" class="form-control" name="edit_price">

              </div><br>';

            $form .= '<div class="form-group">

                <label>Deskripsi produk</label>

                <textarea name="edit_desc" rows="10" cols="80" class="form-control">'.$get->desc.'</textarea>

              </div><br>';

            $form .= '<div class="form-group">

                <label>Sku produk</label>

                <input type="text" name="edit_sku" value="'.$get->sku_produk.'" class="form-control" readonly>

              </div><br>';

            $form .= '<div class="form-group">

                <label>Diskon produk</label>

                <input type="number" value="'.$get->is_diskon.'" class="form-control" name="edit_is_diskon">

              </div><br>';

            $form .= '<div class="form-group">

                <label>Expired diskon produk</label>

                <input type="text" value="'.$get->expired.'" class="form-control" name="edit_expired">

              </div><br>';

            $form .= '<div class="form-group">

                <label>Warna produk</label>

                <input type="text" value="'.$get->warna.'" class="form-control" name="edit_warna">

              </div><br>';

            $form .= '<div class="form-group">

                <label>Size produk</label>

                <input type="text" value="'.$get->size.'" class="form-control" name="edit_size">

              </div><br>';

            $form .= '<div class="form-group">

                <label>Berat produk</label>

                <input type="number" value="'.$get->berat.'" class="form-control" name="edit_berat">

              </div><br>';

              //kategori

            $kategori = '<div class="form-group">

                <label>Kategori produk</label><select class="form-control" name="edit_kategori"><option value="'.$get->kategori.'" selected>'.$get->kategori.'</option><br>';

            $cek_subkategori = $this->db->get_where('subkategori', ['is_active' => '1']);

            foreach ($cek_subkategori->result() as $kate) {

                $kategori .= '<option value="'.$kate->nama.'">'.$kate->nama.'</option><br>';

            }

            $kategori .= '</select></div><br>';

            //Endkategori

            $form .= $kategori;

            $form .= '<div class="form-group">

                <label>Status produk</label>

                <select class="form-control" name="edit_is_active">

                <option value="1">Aktif</option>

                <option value="0">Tidak Aktif</option>

                </select>

              </div><br>';

            $form .= '<div class="form-group">

                <label>Produk terjual</label>

                <input type="number" value="'.$get->terjual.'" class="form-control" name="edit_terjual">

              </div><br>';

            $form .= '<div class="form-group">

                <label>Review produk</label>

                <input type="number" value="'.$get->review.'" class="form-control" name="edit_review">

              </div><br>';

            // Gambar

              $exp_gambar = explode("|", $get->gambar);



              for ($i=0; $i < count($exp_gambar); $i++) { 

                  $form .= '<div class="form-group">

                    <label>Gambar produk</label><br>

                    <img src="'.base_url().'assets/img/upload/'.$exp_gambar[$i].'" style="width: 80px;height:80px;" class="img-fluid">

                    <input type="hidden" name="source_gambar[]" value="'.$exp_gambar[$i].'" class="form-control" readonly>

                    </div><br>';

              }



              $form .= '<div class="form-group">

              <label>Ubah gambar</label>

              <input type="file" name="edit_gambar[]" class="form-control" multiple>

              </div><br>';

              // End gambar

              $exp_thumb = explode("|", $get->thumb);



              $form .= '<div class="form-group">

                    <label>Thumb gambar produk</label>

                    <br>

                        <img src="'.base_url().'assets/img/upload/'.$exp_thumb[0].'" style="width: 90px;height:90px;">

                        <input type="hidden" name="source_gambar_thumb" value="'.$exp_thumb[0].'" class="form-control" readonly>

                        <input type="file" name="edit_thumb" class="form-control">

                    </div><br>';



            $form .= '<div class="form-group">

            <label>Thumb text produk</label>

            <input type="text" value="'.$exp_thumb[1].'" class="form-control" name="edit_thumb_text">

          </div><br>';

            echo $form;

        }



        public function editProduk()

        {

            $edit_id = $this->input->post('edit_id');

            $edit_slug = $this->input->post('edit_slug');

            $edit_nama = $this->input->post('edit_nama');

            $edit_price = $this->input->post('edit_price');

            $edit_desc = $this->input->post('edit_desc');

            $edit_sku = $this->input->post('edit_sku');

            $edit_is_diskon = $this->input->post('edit_is_diskon');

            $edit_expired = $this->input->post('edit_expired');

            $edit_warna = $this->input->post('edit_warna');

            $edit_size = $this->input->post('edit_size');

            $edit_berat = $this->input->post('edit_berat');

            $edit_kategori = $this->input->post('edit_kategori');

            $edit_is_active = $this->input->post('edit_is_active');

            $edit_terjual = $this->input->post('edit_terjual');

            $edit_review = $this->input->post('edit_review');

            $source_gambar = $this->input->post('source_gambar');

            $g = $this->input->post('source_gambar');

            $source_gambar_thumb = $this->input->post('source_gambar_thumb');

            //$edit_gambar = $this->input->post('edit_gambar');

            //$edit_thumb = $this->input->post('edit_thumb');

            $edit_thumb_text = $this->input->post('edit_thumb_text');



            $source_gambar = implode("|", $source_gambar);



            $cek_gambar = $_FILES['edit_gambar']['name'];

            $cek_thumb = $_FILES['edit_thumb']['name'];



            if ($cek_gambar[0] !== '') {

                $this->load->library('upload');

                $datainfo = array();

                $files = $_FILES;

                for ($i=0; $i < count($cek_gambar); $i++) { 

                $_FILES['edit_gambar']['name'] = $files['edit_gambar']['name'][$i];

                $_FILES['edit_gambar']['type'] = $files['edit_gambar']['type'][$i];

                $_FILES['edit_gambar']['tmp_name'] = $files['edit_gambar']['tmp_name'][$i];

                $_FILES['edit_gambar']['error'] = $files['edit_gambar']['error'][$i];

                $_FILES['edit_gambar']['size'] = $files['edit_gambar']['size'][$i];



                //$this->load->library('upload', $this->upload_options());

                $this->upload->initialize($this->upload_options());

                $this->upload->do_upload('edit_gambar');

                $datainfo[] = $this->upload->data('file_name');

                }



                for ($t=0; $t < count($g) ; $t++) { 

                    unlink(FCPATH . 'assets/img/upload/' . $g[$t]);

                }

                $this->resize_image($datainfo);

                $source_gambar = implode("|", $datainfo);

            }



            if ($cek_thumb) {

                $this->load->library('upload');

                $this->upload->initialize($this->upload_options());

                $this->upload->do_upload('edit_thumb');

                $new_image_thumb = $this->upload->data('file_name');

                unlink(FCPATH . 'assets/img/upload/' . $source_gambar_thumb);

                $hasil = $this->resize_image_thumb($new_image_thumb);

                $source_gambar_thumb = $hasil . '|' . $edit_thumb_text;

                unlink(FCPATH . 'assets/img/upload/' . $new_image_thumb);

            } else {

                $source_gambar_thumb = $source_gambar_thumb . '|' . $edit_thumb_text;

            }



            $update = $this->db->query("UPDATE produk SET slug = '$edit_slug', nama = '$edit_nama', price = '$edit_price', `desc` = '$edit_desc', sku_produk = '$edit_sku', is_diskon = '$edit_is_diskon', expired = '$edit_expired', warna = '$edit_warna', size = '$edit_size', berat = '$edit_berat', kategori = '$edit_kategori', is_active = '$edit_is_active', terjual = '$edit_terjual', review = '$edit_review', gambar = '$source_gambar', thumb = '$source_gambar_thumb' WHERE id = '$edit_id'");



            if ($update) {

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">

                    Produk berhasil diupdate.</div>');

                    redirect(base_url() . 'all_produk');

            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">

                    Produk gagal diupdate.</div>');

                    redirect(base_url() . 'all_produk');

            }

        }



        public function addKategori()

        {

            $nama_kategori = $this->input->post('nama_kategori');

            $kate = $this->input->post('kate');

            $status = $this->input->post('status');



            $cek = $this->db->get_where('kategori', ['kate' => $kate]);



            if (empty($nama_kategori) || empty($kate) || empty($status)) {

                $arr = [

                    'type' => 'salah',

                    'pesan' => 'Gagal mhon isi input yang kosong..'

                ];

                echo json_encode($arr);

            } elseif ($cek->num_rows() == 1) {

                $arr = [

                    'type' => 'salah',

                    'pesan' => 'Gagal terdapat id kategori yang sama.'

                ];

                echo json_encode($arr);

            } else {

                $data = [

                    'nama_kategori' => $nama_kategori,

                    'kate' => $kate,

                    'is_active' => $status

                ];

                $insert = $this->db->insert('kategori', $data);

                if ($insert) {

                    $arr = [

                    'type' => 'benar',

                    'pesan' => 'Kategori berhasil ditambahkan..'

                ];

                echo json_encode($arr);

                } else {

                    $arr = [

                    'type' => 'salah',

                    'pesan' => 'Kategori gagal ditambahkan..'

                ];

                echo json_encode($arr);

                }

            }

        }



        public function deleteKategori()

        {

            $id = $this->input->post('id');



            $cek = $this->db->get_where('kategori', ['id' => $id])->row();

            $cek_sub = $this->db->get_where('subkategori', ['kate_id' => $cek->kate]);

            if ($cek_sub->num_rows() > 0) {

                $this->db->query("UPDATE subkategori SET is_active = '0' WHERE kate_id = '$cek->kate'");

            }



            $delete = $this->db->query("DELETE FROM kategori WHERE id = '$id'");

                if ($delete) {

                    echo "yesdelete";

                } else {

                    echo "nodel";

                }

        }



        public function editKategori()

        {

            $id = $this->input->post('idnya1');

            $edit_nama_kategori = $this->input->post('edit_nama_kategori');

            $edit_kate = $this->input->post('edit_kate');

            $edit_status = $this->input->post('edit_status');

            $cek = $this->db->get_where('kategori', ['id' => $id])->row();

            $cek1 = $this->db->get_where('subkategori', ['kate_id' => $edit_kate])->num_rows();

            if ($cek1 == 0) {

                $action = $this->db->query("UPDATE kategori SET nama_kategori = '$edit_nama_kategori', kate = '$edit_kate', is_active = '$status' WHERE id = '$id'");

            } else {

                $action = $this->db->query("UPDATE kategori INNER JOIN subkategori ON kategori.kate = subkategori.kate_id SET kategori.nama_kategori = '$edit_nama_kategori', kategori.kate = '$edit_kate', kategori.is_active = '$edit_status', subkategori.kate_id = '$edit_kate', subkategori.is_active = '$edit_status' WHERE kategori.id = '$id' AND subkategori.kate_id = '$cek->kate'");

            }



            if ($action) {

                echo "sukses";

            } else {

                echo "gag";

            }

        }



        public function addSubkategori()

        {

            $nama = $this->input->post('nama');

            $title = $this->input->post('title');

            $desc = $this->input->post('desc');

            $type = $this->input->post('type');

            $kate_id = $this->input->post('kate_id');

            $gambar = $this->input->post('gambar');

            $is_active = $this->input->post('is_active');



            $cek = $this->db->get_where('subkategori', ['nama' => $nama]);



            if ($cek->num_rows() == 1) {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">

                    Nama subkategori sudah ada silahkan plih yg lain.</div>');

                    redirect(base_url() . 'get_kategori');

            } else {

                $this->load->library('upload');

                $gambar_d = $_FILES['gambar']['name'];

                if ($gambar_d) {

                    $this->upload->initialize($this->upload_options());

                    $this->upload->do_upload('gambar');

                    $gambar = $this->upload->data('file_name');

                    $this->resizeSubType($type, $gambar);



                    $data = [

                        'nama' => $nama,

                        'title' => $title,

                        'desc' => $desc,

                        'type' => $type,

                        'kate_id' => $kate_id,

                        'gambar' => $gambar,

                        'is_active' => $is_active

                    ];
                    
                    $prosessub= $this->db->insert('subkategori', $data);

                    if ($prosessub) {

                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">

                        Subkategori berhasil ditambahkan .</div>');

                        redirect(base_url() . 'get_kategori');

                    } else {

                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">

                        Subkategori gagal ditambahkan .</div>');

                        redirect(base_url() . 'get_kategori');

                    }

                } else {

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">

                    Mhon isi gambar .</div>');

                    redirect(base_url() . 'get_kategori');

                }

            }

        }



        public function deleteSubKategori()

        {

            $id = $this->input->post('id');



            $cek = $this->db->get_where('subkategori', ['id' => $id])->row();

            unlink(FCPATH . 'assets/img/upload/' . $cek->gambar);

            $delete = $this->db->query("DELETE FROM subkategori WHERE id = '$id'");

            if ($delete) {

                echo "yesdeletesub";

            } else {

                echo "now";

            }

        }



        public function editSubKategori()

        {

            $id = $this->input->post('editsub_id');

            $editsub_nama = $this->input->post('editsub_nama');

            $editsub_title = $this->input->post('editsub_title');

            $editsub_desc = $this->input->post('editsub_desc');

            $editsub_type = $this->input->post('editsub_type');

            $editsub_kate_id = $this->input->post('editsub_kate_id');

            $editsub_gambar = $this->input->post('editsub_gambar');

            $editsub_is_active = $this->input->post('editsub_is_active');



            $cek = $this->db->get_where('subkategori', ['id' => $id])->row();



            $subgmb = $_FILES['editsub_gambar']['name'];

            if ($subgmb) {

                $this->load->library('upload');

                $this->upload->initialize($this->upload_options());

                $this->upload->do_upload('editsub_gambar');

                unlink(FCPATH . 'assets/img/upload/' . $cek->gambar);

                $editsub_gambar = $this->upload->data('file_name');

                $this->resizeSubType($editsub_type, $editsub_gambar);

            } else {

                $editsub_gambar = $cek->gambar;

                $this->resizeSubType($editsub_type, $editsub_gambar);

            }

            $update = $this->db->query("UPDATE subkategori SET nama = '$editsub_nama', title = '$editsub_title', `desc` = '$editsub_desc', type = '$editsub_type', kate_id = '$editsub_kate_id', gambar = '$editsub_gambar', is_active = '$editsub_is_active' WHERE id = '$id'");
            $update = $this->db->query("UPDATE produk SET kategori = '$editsub_nama' WHERE kategori = '$cek->nama'");

            // $update = $this->db->query("UPDATE subkategori INNER JOIN produk ON subkategori.nama = produk.kategori SET subkategori.nama = '$editsub_nama', subkategori.title = '$editsub_title', subkategori.desc = '$editsub_desc', subkategori.type = '$editsub_type', subkategori.kate_id = '$editsub_kate_id', subkategori.gambar = '$editsub_gambar', subkategori.is_active = '$editsub_is_active', produk.kategori = '$editsub_nama' WHERE subkategori.id = '$id' AND produk.kategori = '$cek->nama'");



            if ($update) {

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">

                    Subkategori berhasil diupdate .</div>');

                    redirect(base_url() . 'get_kategori');

            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">

                    Subkategori gagal diupdate .</div>');

                    redirect(base_url() . 'get_kategori');

            }

        }



        public function editRequestPay()

        {

            $id = $this->input->post('id');

            $cek = $this->db->get_where('konfirmasi_payment', ['id' => $id])->row();



            if ($cek->status == '1') {

                $update = $this->db->query("UPDATE konfirmasi_payment SET status = '0' WHERE id = '$id'");

                $pesan = 'Pembayaran telah berhasil dibatalkan konfirmasi';

            } else {
                $order_id = $this->db->get_where('detail_order_id', ['order_id' => $cek->invoice])->row();
                $pelanggan = $this->db->get_where('detail_pelanggan', ['id' => $order_id->id_pelanggan])->row();
                $subject = 'Busana69 pembayaran dikonfirmasi';
                $act = 'Hallo <b>' . $pelanggan->nama_lengkap . '</b> pembayaran anda telah berhasil di konfirmasi dengan detail berikut: <br><br>';
                $act .= 'Invoice: <b>' . $order_id->order_id . '</b><br>';
                $act .= 'Atas nama: <b>' . $pelanggan->nama_lengkap . '</b><br>';
                $act .= 'No whatsapp: <b>' . $pelanggan->whatsapp . '</b><br>';
                $act .= 'Keterangan: <b>' . $pelanggan->keterangan . '</b><br>';
                $act .= 'Pembayaran via: <b>' . $order_id->payment . ' ' . $order_id->is_bank . '</b><br>';
               $act .= 'Kurir pengiriman: <b>' . $order_id->courier . '</b><br>';
               $act .= 'Biaya pengiriman: Rp <b>' . number_format($order_id->shipping, 0, ',', '.') . '</b><br>';
                $act .= 'Alamat lengkap & pengiriman produk: <b>' . $pelanggan->alamat_lengkap . ', ' . $pelanggan->kodepos . ', ' . $pelanggan->is_pengiriman . '</b><br>';
                $act .= 'Total produk + pengiriman: Rp <b>' . number_format($order_id->total, 0, ',', '.') . '</b><br><br>';
                $act .= 'Jika anda ingin melacak status pesanan / ingin mengetahui noresi pesanan anda silahkan kunjungi ke halaman berikut ini dengan memasukan invoice berikut ' . $order_id->order_id . ' <a href="'.base_url().'cekorder">'.base_url().'cekorder</a><br>';
                $act .= 'Berikan ulasan anda untuk produk yang anda beli <a href="'.base_url().'tambah-ulasan/'.$order_id->order_id.'">'.base_url().'tambah-ulasan/'.$order_id->order_id.'</a>';

                $this->_sendEmail('users', $subject, $act, $pelanggan->email);

                $update = $this->db->query("UPDATE konfirmasi_payment SET status = '1' WHERE id = '$id'");
                $update = $this->db->query("UPDATE detail_order_id SET status = '1' WHERE order_id = '$cek->invoice'");
                $update = $this->db->query("UPDATE detail_order_produk SET status = '1' WHERE order_id = '$cek->invoice'");

                $pesan = 'Pembayaran telah berhasil dikonfirmasi';

            }



            if ($update) {

                $json = [

                    'type' => 'yesberhasil',

                    'pesan' => $pesan

                ];

                echo json_encode($json);

            } else {

                $json = [

                    'type' => 'gagal',

                    'pesan' => 'gagal update'

                ];

                echo json_encode($json);

            }

        }



        private function _sendEmail($type,$subject,$pesan,$email = null)

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
            $this->email->from('suport@busana69.my.id', 'Busana69 Hubungi');

            $this->email->to('tutorialcandra@gmail.com');
        } else {
            $this->email->from('suport@busana69.my.id', 'Busana69 pesanan dikonfirmasi');

            $this->email->to($email);
        }

        $this->email->subject($subject);

        $this->email->message($pesan);

        if ($this->email->send()) {

            return true;

        } else {

            echo $this->email->print_debugger();

            die;

        }

    }



        private function resizeSubType($type,$image)

        {

            $this->load->library('image_lib');

            if ($type == '1') {

                $config['image_library'] = 'gd2';

                $config['source_image'] = './assets/img/upload/' . $image;

                $config['create_thumb'] = false;

                $config['maintain_ratio'] = false;

                //$config['quality'] = '50%';

                $config['width'] = 1450;

                $config['height'] = 750;



                $this->image_lib->clear();

                $this->image_lib->initialize($config);

                $this->image_lib->resize();

            } else {

                $config['image_library'] = 'gd2';

                $config['source_image'] = './assets/img/upload/' . $image;

                $config['create_thumb'] = false;

                $config['maintain_ratio'] = false;

                //$config['quality'] = '50%';

                $config['width'] = 600;

                $config['height'] = 400;



                $this->image_lib->clear();

                $this->image_lib->initialize($config);

                $this->image_lib->resize();

            }

        }



    private function resize_image($image)

    {

    	$this->load->library('image_lib');

    	for ($j=0; $j < count($image) ; $j++) { 

    		

			$config['image_library'] = 'gd2';

			$config['source_image'] = './assets/img/upload/' . $image[$j];

			$config['create_thumb'] = false;

			$config['maintain_ratio'] = false;

			//$config['quality'] = '60%';

			$config['width'] = 400;

			$config['height'] = 400;



			$this->image_lib->clear();

			$this->image_lib->initialize($config);

			$this->image_lib->resize();

    	}

		

    }



    private function resize_image_thumb($image)

    {

    	$this->load->library('image_lib');

    		

			$config['image_library'] = 'gd2';

			$config['source_image'] = './assets/img/upload/' . $image;

			$config['create_thumb'] = true;

			$config['maintain_ratio'] = false;

			//$config['quality'] = '60%';

			$config['width'] = 1200;

			$config['height'] = 800;



			$this->image_lib->clear();

			$this->image_lib->initialize($config);

			$this->image_lib->resize();

		$data = explode(".", $image);

		return $data[0] . '_thumb.' . $data[1];

    }



    private function upload_options()

    {

    	$config = array();

    	$config['upload_path'] = './assets/img/upload/';

    	$config['allowed_types'] = 'gif|jpg|jpeg|png';

    	//$config['max_size']      = '2048';

    	//$config['width']      = '400';

    	//$config['height']      = '400';

    	$config['encrypt_name'] = true;



    	return $config;

    }



    private function _skuRandom($length)

    {

    	$karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';

    	$string = '';



    	for ($i=0; $i < $length ; $i++) { 

    		$pos = rand(0, strlen($karakter)-1);



    		$string .= $karakter[$pos];

    	}

    	return $string;

    }



    public function newsletter()

    {

        $email = htmlspecialchars(trim($this->input->post('email')));

        $cek = $this->db->get_where('newsletter', ['email' => $email]);

        if ($cek->num_rows() == 1) {

            $data = [

                'type' => 'error',

                'pesan' => 'Email sudah terdaftar di server kami..'

            ];

            echo json_encode($data);

        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $data = [

                'type' => 'error',

                'pesan' => 'Mohon input email..'

            ];

            echo json_encode($data);

        } else {

            $data_u = [

                'id_pelanggan' => 0,

                'email' => $email,

                'status' => '1'



            ];

            if ($this->db->insert('newsletter', $data_u)) {

                $data = [

                'type' => 'sukses',

                'pesan' => 'Email berhasil disimpan dan anda akan mendapatkan pembaruan produk terbaru dari kami, terimakasih telah berlangganan dengan kami..'

                ];

                echo json_encode($data);

            }

            

        }

    }



    public function hubungi()

    {

        $nama = $this->input->post('nama');

        $email = $this->input->post('email');

        $pesan = $this->input->post('pesan');



        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $json = [

                'type' => 'error',

                'pesan' => 'Mohon isi email yang benar'

            ];

            echo json_encode($json);

        } else {

            $mess = 'Terdapat user penghubung baru dengan detail berikut :<br><br>';

            $mess .= 'Nama: ' . $nama . '<br>';

            $mess .= 'Email: ' . $email . '<br>';

            $mess .= 'Pesan: ' . $pesan;

            $subject = 'Contacts users';



            $kirim = $this->_sendEmail('admin', $subject, $mess);

            if ($kirim) {

                $json = [

                'type' => 'sukses',

                'pesan' => 'Anda berhasil mengirim email kepada kami,mhon tunggu balasan dari kami, terimakasih ' . $nama

                ];

            echo json_encode($json);

            } else {

                $json = [

                'type' => 'error',

                'pesan' => 'Gagal mengirim pesan hon coba beberapa saat'

            ];

            echo json_encode($json);

            }

        }

    }

    public function autocompleteMobile()
    {
        $term = htmlspecialchars(trim($this->input->get('term')));
        $cek = $this->db->query("SELECT nama FROM produk WHERE nama LIKE '%$term%' OR `desc` LIKE '%$term%' OR kategori LIKE '%$term%' and is_active = '1'");
        // $arr = [
        //     'nama' => $term,
        //     'desc' => $term,
        //     'kategori' => $term
        // ];
        // $this->db->like($arr);
        // $this->db->where('is_active', '1');
        // $cek = $this->db->get('produk');
        foreach ($cek->result_array() as $da) {
            $da['value'] = $da['nama'];
            $row_set[] = $da;
        }

        echo json_encode($row_set);

    }

    public function cekAutocompleteMobile()
    {
        $nama = strtolower(htmlspecialchars(trim($this->input->post('nama'))));
        $get = str_replace(" ", "-", $nama);
        $cek = $this->db->get_where('produk', ['slug' => $get, 'is_active' => '1']);
        if ($cek->num_rows() == 0) {
            $data = [
                'type' => 'tidaka',
                'slug' => 'Produk tidak ditemukan'
            ];
            echo json_encode($data);
        } else {
            $data = [
                'type' => 'ada',
                'slug' => $get
            ];
            echo json_encode($data);
        }

    }

    public function cekRating()
    {
        $inv = $this->input->post('invoice');

        $cek = $this->db->get_where('detail_order_produk', ['order_id' => $inv, 'is_rating' => '0'], 1);
        if ($cek->num_rows() == 0) {
            $return = [
                'type' => 'gagal',
                'pesan' => 'Maaf no invoice tidak ditemukan atau anda sudah memberi ulasan'
            ];
            echo json_encode($return);
        } else {
            $get = $cek->row();
            if ($get->status == 0) {
                $return = [
                'type' => 'gagal',
                'pesan' => 'Maaf pesanan anda belum diselesaikan mhon selesaikan pembayaran anda untuk menambahkan ulasan'
                ];
                echo json_encode($return);
            } elseif ($get->is_rating == 1) {
                $return = [
                'type' => 'gagal',
                'pesan' => 'Anda sudah memberi ulasan ke produk yang terkait'
                ];
                echo json_encode($return);
            } else {
                $return = [
                'type' => 'sukses',
                'pesan' => $inv
                ];
                echo json_encode($return);
            }
        }
    }

    public function editUlasan()
    {
        if ($this->input->post()) {
            $id = $this->input->post('id_ulasan');
            $sku_produk = $this->input->post('sku_produk_ulasan');
            $orderid = $this->input->post('order_id_ulasan');
            $nama = $this->input->post('nama_ulasan');
            $rating = $this->input->post('rating_ulasan');
            $pesan = $this->input->post('pesan_ulasan');
            $date = $this->input->post('date_ulasan');

            $gambar = $_FILES['ubah_gambar_ulasan']['name'];
            $cek = $this->db->get_where('rating', ['id' => $id])->row();
            if ($gambar) {
                if ($cek->gambar !== '') {
                    unlink(FCPATH . 'assets/img/rating/' . $cek->gambar);
                }
                $this->load->library('upload');
                $config['upload_path'] = './assets/img/rating/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['encrypt_name'] = true;

                $this->upload->initialize($config);
                $this->upload->do_upload('ubah_gambar_ulasan');
                $gambar = $this->upload->data('file_name');
            } else {
                $gambar = $cek->gambar;
            }
            $update = $this->db->query("UPDATE rating SET sku_produk = '$sku_produk', order_id = '$orderid', nama = '$nama', rate = '$rating', pesan = '$pesan', gambar = '$gambar', date_created = '$date' WHERE id = '$id'");
            if ($update) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">

                Ulasan telah berhasil diupdate.</div>');

                redirect(base_url() . 'ulasan');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">

                Ulasan gagal diupdate.</div>');

                redirect(base_url() . 'ulasan');
            }
        }
    }

    public function hapusUlasan()
    {
        $id = $this->input->post('id');
        $cek = $this->db->get_where('rating', ['id' => $id])->row();
        if ($cek->gambar !== '') {
            unlink(FCPATH . 'assets/img/rating/' . $cek->gambar);
        }

        $delete = $this->db->query("DELETE FROM rating WHERE id = '$id'");
        if ($delete) {
            $json = [
                'type' => 'ok',
                'pesan' => 'Ulasan telah berhasil di hapus'
            ];
            echo json_encode($json);
        } else {
            $json = [
                'type' => 'gagal',
                'pesan' => 'Ulasan gagal di hapus'
            ];
            echo json_encode($json);
        }
    }

    public function tambahUlasan()
    {
        if ($this->input->post()) {
            $sku_produk = $this->input->post('add_sku_ulasan');
            $orderid = $this->input->post('add_orderid_ulasan');
            $nama = $this->input->post('add_nama_ulasan');
            $rating = $this->input->post('add_rating_ulasan');
            $pesan = $this->input->post('add_pesan_ulasan');
            $date = $this->input->post('add_date_ulasan');

            $gambar = $_FILES['add_gambar_ulasan']['name'];
            $cek = $this->db->get_where('rating', ['nama' => $nama]);
            if ($cek->num_rows() == 1) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">

                Nama sudah ada di database.</div>');

                redirect(base_url() . 'ulasan');
            } else {
                if ($gambar) {
                    $this->load->library('upload');
                    $config['upload_path'] = './assets/img/rating/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['encrypt_name'] = true;

                    $this->upload->initialize($config);
                    $this->upload->do_upload('add_gambar_ulasan');
                    $gambar = $this->upload->data('file_name');
                } else {
                    $gambar = '';
                }

                $data_insert = [
                    'sku_produk' => $sku_produk,
                    'order_id' => $orderid,
                    'nama' => $nama,
                    'rate' => $rating,
                    'pesan' => $pesan,
                    'gambar' => $gambar,
                    'date_created' => $date
                ];
                $insert = $this->db->insert('rating', $data_insert);
                if ($insert) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">

                    Ulasan berhasil ditambahkan.</div>');

                    redirect(base_url() . 'ulasan');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">

                    Ulasan gagal ditambahkan.</div>');

                    redirect(base_url() . 'ulasan');
                }
            }
        }
    }
}
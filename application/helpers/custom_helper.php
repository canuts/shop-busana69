<?php
if (!function_exists('exp')) {
    function exp($str)
    {
        $dari = array();
        $data = explode('|', $str);
        $no = 0;
        while ($no <= count($data)) {
            $dari[] = $data[$no];
            $no++;
        }
        return $dari;
    }
}

if (!function_exists('setDiskon')) {
    function setDiskon($price, $diskon)
    {
        $data = $price * $diskon / 100;
        $hasil = $price - $data;
        return $hasil;
    }
}

if (!function_exists('oneImage')) {
    function oneImage($produk)
    {
        $data = explode("|", $produk);
        return $data[0];
    }
}

if (!function_exists('thumbdetails')) {
    function thumbdetails($produk)
    {
        $data = explode("|", $produk);
        return $data[1];
    }
}

if (!function_exists('slug')) {
    function slug($text)
    {
        $data = str_replace(" ", "-", trim($text));
        return $data;
    }
}

if (!function_exists('setPrice')) {
    function setPrice($harga, $diskon = null)
    {
        if ($diskon == null) {
            $price = $harga;
            return $price;
        } else {
            $a = $harga * $diskon;
            $hasil = $a / 100;
            $get = $harga - $hasil;
            $price = $get;
            return $price;
        }
    }
}

if (!function_exists('getapi')) {
    function getapi($type, $desti)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=440&destination=" . $desti . "&weight=1700&courier=jne",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: c44888f4d923607bd6b304cd734d65ce"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $hasil = json_decode($response, true);
        if ($type == 'express') {
            return $hasil['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value'];
        } else {
            return $hasil['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
        }
    }
}

if (!function_exists('adminFooter')) {
    function adminFooter()
    {
        return '<footer class="main-footer"><strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>';
    }
}

if (!function_exists('repString')) {
    function repString($str, $length)
    {
        $data = substr($str, 0, $length);
        return $data . ' ...';
    }
}

if (!function_exists('status')) {
    function status($dta)
    {
        if ($dta == '0') {
            return 'BELUM DIBAYAR';
        } else {
            return 'DIBAYAR';
        }
    }
}
if (!function_exists('set')) {
    function set($apa)
    {
        $ci = get_instance();
        $data = $ci->db->get('settings')->row();
        return $data->$apa;
    }
}




// if ($data->review == 0) {
//     $kontol = '<div class="rating"><i class="icon-star"><i class="icon-star"><i class="icon-star"><i class="icon-star"><i class="icon-star"></div>';
//     echo $kontol;
// } elseif ($data->review == 1) {
//     $kontol = '<div class="rating"><i class="icon-star voted"><i class="icon-star"><i class="icon-star"><i class="icon-star"><i class="icon-star"></div>';
//     echo $kontol;
// } elseif ($data->review == 2) {
//     $kontol = '<div class="rating"><i class="icon-star voted"><i class="icon-star voted"><i class="icon-star"><i class="icon-star"><i class="icon-star"></div>';
//     echo $kontol;
// } elseif ($data->review == 3) {
//     $kontol = '<div class="rating"><i class="icon-star voted"><i class="icon-star voted"><i class="icon-star voted"><i class="icon-star"><i class="icon-star"></div>';
//     echo $kontol;
// } elseif ($data->review == 4) {
//     $kontol = '<div class="rating"><i class="icon-star voted"><i class="icon-star voted"><i class="icon-star voted"><i class="icon-star voted"><i class="icon-star"></div>';
//     echo $kontol;
// } elseif ($data->review == 5) {
//     $kontol = '<div class="rating"><i class="icon-star voted"><i class="icon-star voted"><i class="icon-star voted"><i class="icon-star voted"><i class="icon-star voted"></div>';
//     echo $kontol;
// } else {
//     $kontol = '';
//     echo $kontol;
// }

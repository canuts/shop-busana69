<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Query_model extends CI_Model

{



    public function getProduk()

    {

        $this->db->limit(8);

        $this->db->order_by('id', 'RANDOM');

        return $this->db->get_where('produk', ['is_active' => '1']);

    }

    public function viewUpdate($id)
    {
        $this->db->set('review', 'review+1', FALSE);
        $this->db->where('id', $id);
        $this->db->update('produk');
    }



    public function detailProduk($slug)

    {

        $data = $this->db->get_where('produk', ['slug' => $slug, 'is_active' => '1']);

        return $data;

    }



    public function relatedProduk($kategori)

    {

        $this->db->limit(8);
        $this->db->order_by('id', 'RANDOM');
        return $this->db->get_where('produk', ['kategori' => $kategori, 'is_active' => '1']);

    }



    public function kategoriImage($type)

    {

        if ($type == '1') {

            $this->db->limit(1);

            $this->db->order_by('id', 'RANDOM');

            return $this->db->get_where('subkategori', ['type' => '1', 'is_active' => '1']);

        } elseif ($type == '2') {

            $this->db->limit(3);

            $this->db->order_by('id', 'RANDOM');

            return $this->db->get_where('subkategori', ['type' => '2', 'is_active' => '1']);

        }

    }



    public function thumb()

    {

        $this->db->limit(1);

        $this->db->order_by('RAND()');
        $this->db->where('is_active', '1');

        return $this->db->get('produk');

    }



    public function kategori()

    {

        return $this->db->get_where('kategori', ['is_active' => '1']);

    }



    public function subKategori()

    {

        return $this->db->get_where('subkategori', ['is_active' => '1']);

    }



    public function getProdukBy($slug, $limit = null, $start = null)

    {

        $replace = str_replace("-", " ", trim(strtolower($slug)));

        $cek = $this->db->get_where('subkategori', ['nama' => $replace, 'is_active' => '1']);

        if ($cek) {

            $data = [

                'is_active' => '1',

                'kategori' => $replace

            ];

            $this->db->limit($limit, $start);

            return $this->db->get_where('produk', $data);

        } else {

            return 0;

        }

    }



    public function getPagination($limit, $start)

    {

        $this->db->limit($limit, $start);
        $this->db->where('is_active', '1');
        return $this->db->get('produk');

    }



    public function countSubKategori($sub)

    {

        $replace = str_replace("-", " ", trim(strtolower($sub)));

        return $this->db->get_where('produk', ['kategori' => $replace, 'is_active' => '1'])->num_rows();

    }



    public function getCekProvinsi()

    {

        return $this->db->get('provinsi');

    }



    public function insertOrder($type,$data)

    {

        if ($type == 'insert_pelanggan') {

            $this->db->insert('detail_pelanggan', $data);

            $id = $this->db->insert_id();

            $result = $id;

        } elseif($type == 'insert_id') {

            $result = $this->db->insert('detail_order_id', $data);

        } else {

            $result = $this->db->insert('detail_order_produk', $data);

        }

        return $result;

    }



    public function insertNewsletter($data)

    {

        return $this->db->insert('newsletter', $data);

    }





    // Admin

}


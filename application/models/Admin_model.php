<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{


 public function startQuery($type, $table, $data = null, $updt = null)
    {
        if ($type == 'select') {
            if ($data == null) {
                $tampil = $this->db->get($table);
            } else {
                $tampil = $this->db->get_where($table, $data);
            }
        } elseif ($type == 'insert') {
            $tampil = $this->db->insert($table, $data);
        } elseif ($type == 'update') {
            if ($updt !== null) {
                $tampil = $this->db->update($table, $data, $updt);
            }
        } elseif ($type == 'delete') {
            $tampil = $this->db->delete($table, $data);
        } elseif ($type == 'count') {
            $tampil = $this->db->count_all($table);
        }
        return $tampil;
    }

}
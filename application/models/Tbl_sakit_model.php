<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_sakit_model extends CI_Model
{

    public $table = 'tbl_sakit';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function get_all($user_id = null)
    {
		if($user_id) {
			$this->db->select('tbl_izin.*, tbl_users.nama_lengkap');
			$this->db->join('tbl_users', 'tbl_users.id = tbl_izin.users_id');
			$this->db->where('tbl_izin.users_id', $user_id);
			$this->db->order_by($this->id, $this->order);
			return $this->db->get($this->table)->result();
		} else {
			$this->db->select('tbl_izin.*, tbl_users.nama_lengkap');
			$this->db->join('tbl_users', 'tbl_users.id = tbl_izin.users_id');
			$this->db->order_by($this->id, $this->order);
			return $this->db->get($this->table)->result();
		}
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('users_id', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('alasan', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('created_at', $q);
	$this->db->or_like('updated_at', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }


    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

	function get_by_tanggal_user_id($tanggal,$user_id){
		$query = $this->db->query("SELECT * FROM tbl_sakit WHERE tanggal = '$tanggal' AND users_id = '$user_id' AND (status = 'approved' OR status IS NULL)");
		return $query;
	}

}

/* End of file Tbl_sakit_model.php */
/* Location: ./application/models/Tbl_sakit_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-02-03 09:11:29 */
/* http://harviacode.com */

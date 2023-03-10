<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_absensi_model extends CI_Model
{

    public $table = 'tbl_absensi';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all($lapangan_id = null)
    {
		if($lapangan_id != null) {
			 $userlistInLapangan = $this->db->query("SELECT * FROM tbl_absensi WHERE users_id IN (SELECT id_users FROM tbl_penempatan_karyawan WHERE id_lapangan = '$lapangan_id') ORDER BY tanggal DESC, jam DESC")->result();
			 return $userlistInLapangan;
		} else {
			$this->db->order_by($this->id, $this->order);
			return $this->db->get($this->table)->result();
		}
    }

	function get_all_with_users_identity() {
		$data = $this->db->query("SELECT * FROM tbl_absensi INNER JOIN tbl_users ON tbl_absensi.users_id = tbl_users.id ORDER BY tanggal DESC, jam DESC")->result();
		return $data;
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
	$this->db->or_like('jam', $q);
	$this->db->or_like('latitude', $q);
	$this->db->or_like('longitude', $q);
	$this->db->or_like('foto', $q);
	$this->db->or_like('ip_address', $q);
	$this->db->or_like('telat', $q);
	$this->db->or_like('status', $q);
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

	function get_by_users_id($id)
	{
		$this->db->where('users_id', $id)->order_by('jam', 'DESC');
		return $this->db->get($this->table)->row();
	}

	function get_by_users_id_and_tanggal($id, $tanggal)
	{
		$this->db->where('users_id', $id)->where('tanggal', $tanggal)->order_by('jam', 'ASC');
		return $this->db->get($this->table)->last_row();
	}

}

/* End of file Tbl_absensi_model.php */
/* Location: ./application/models/Tbl_absensi_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-02-08 02:37:00 */
/* http://harviacode.com */

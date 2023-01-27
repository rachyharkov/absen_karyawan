 <?php defined('BASEPATH') or exit('No direct script access allowed');

	class Auth_model extends CI_Model
	{
		public function login($post)
		{
			$datakaryawan = $this->db->select('*')->from('tbl_users')->where('username', $post['username'])->where('password', sha1($post['password']));

			if($datakaryawan->get()->num_rows() > 0) {
				$query = $datakaryawan->get();
				// add new data to $query
				$query->row()->level = 4;
				return $query;
			} else {
				$dataadmin = $this->db->select('*')->from('tbl_admin')->where('username', $post['username'])->where('password', sha1($post['password']));
				return $dataadmin->get();
			}
		}

		public function get($id = null)
		{
			$this->db->select('tbl_admin.*');
			$this->db->from('tbl_admin');
			if ($id != null) {
				$this->db->where('id', $id);
			}
			$query = $this->db->get();
			return $query;
		}

		public function ubah_data($data, $id)
		{
			$this->db->where('id', $id);
			$this->db->update('tbl_admin', $data);
		}

		public function user_token($user_token)
		{
			$this->db->insert('user_token', $user_token);
		}
	}

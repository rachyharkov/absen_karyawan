 <?php defined('BASEPATH') or exit('No direct script access allowed');

	class User_m extends CI_Model
	{
		public function login($post)
		{
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('username', $post['username']);
			$this->db->where('password', sha1($post['password']));
			$query = $this->db->get();
			return $query;
		}

		public function get($id = null)
		{
			$this->db->select('user.*');
			$this->db->from('user');
			if ($id != null) {
				$this->db->where('user_id', $id);
			}
			$query = $this->db->get();
			return $query;
		}

		public function ubah_data($data, $id)
		{
			$this->db->where('user_id', $id);
			$this->db->update('user', $data);
		}

		public function user_token($user_token)
		{
			$this->db->insert('user_token', $user_token);
		}
	}

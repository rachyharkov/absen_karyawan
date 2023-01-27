<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Tbl_karyawan_model');
		$this->load->library('form_validation');
		$this->load->helper('fungsi');
	}

	public function index()
	{
		$karyawan = $this->Tbl_karyawan_model->get_all();
		$data = array(
			'karyawan_data' => $karyawan,
		);
		$this->template->load('template', 'karyawan/tbl_karyawan_list', $data);
	}

	public function read($id)
	{
		$row = $this->Tbl_karyawan_model->get_by_id(decrypt_url($id));
		if ($row) {
			$data = array(

				'id' => $row->id,
				'id_user' => $row->id_user,
				'nama_lengkap' => $row->nama_lengkap,
				'jenis_kelamin' => $row->jenis_kelamin,
				'alamat' => $row->alamat,
				'nik' => $row->nik,
				'email' => $row->email,
				'no_telp' => $row->no_telp,
			);
			$this->template->load('template', 'karyawan/tbl_karyawan_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('karyawan'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('karyawan/create_action'),
			'id' => set_value('id'),
			'id_user' => set_value('id_user'),
			'nama_lengkap' => set_value('nama_lengkap'),
			'jenis_kelamin' => set_value('jenis_kelamin'),
			'alamat' => set_value('alamat'),
			'nik' => set_value('nik'),
			'email' => set_value('email'),
			'no_telp' => set_value('no_telp'),
		);
		$this->template->load('template', 'karyawan/tbl_karyawan_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'id_user' => null,
				'nama_lengkap' => $this->input->post('nama_lengkap', TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
				'nik' => $this->input->post('nik', TRUE),
				'email' => $this->input->post('email', TRUE),
				'no_telp' => $this->input->post('no_telp', TRUE),
			);

			if($this->input->post('checkBuatAkun')) {
				$this->_akun_rules();

				if ($this->form_validation->run() == FALSE) {
					$this->create();
				}

				$photo = 'default.jpg';

				if(!empty($_FILES['foto']['name']))
				{
					$config['upload_path']      = './assets/assets/img/user';
					$config['allowed_types']    = 'jpg|png|jpeg';
					$config['max_size']         = 10048;
					$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					$this->upload->do_upload("foto");
					$data = $this->upload->data();
					$photo = $data['file_name'];
				}

				$dataakun = array(
					'username' => $this->input->post('username', TRUE),
					'password' => sha1($this->input->post('password', TRUE)),
					'level' => 4,
					'photo' => $photo
				);

				// print_r($dataakun);
				$this->load->model('User_model');
				$this->User_model->insert($dataakun);

				$data['id_user'] = $this->db->insert_id();
			}

			// print_r($data);

			$this->Tbl_karyawan_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('karyawan'));
		}
	}

	public function update($id)
	{
		$row = $this->Tbl_karyawan_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('karyawan/update_action'),
				'id' => set_value('id', $row->id),
				'id_user' => set_value('id_user', $row->id_user),
				'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
				'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
				'alamat' => set_value('alamat', $row->alamat),
				'nik' => set_value('nik', $row->nik),
				'email' => set_value('email', $row->email),
				'no_telp' => set_value('no_telp', $row->no_telp),
				'punya_akun' => [
					'status' => false
				]
			);
			
			if($data['id_user']) {
				$this->load->model('User_model');
				$dataakun = $this->User_model->get_by_id($data['id_user']);

				if($dataakun) {
					$data['punya_akun'] = [
						'status' => true,
						'id' => $dataakun->id,
						'username' => $dataakun->username,
						'password' => $dataakun->password,
						'photo' => $dataakun->photo
					];
				}
			}

			$this->template->load('template', 'karyawan/tbl_karyawan_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('karyawan'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update(encrypt_url($this->input->post('id', TRUE)));
		} else {
			$data = array(
				'id_user' => $this->input->post('id_user', TRUE),
				'nama_lengkap' => $this->input->post('nama_lengkap', TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
				'nik' => $this->input->post('nik', TRUE),
				'email' => $this->input->post('email', TRUE),
				'no_telp' => $this->input->post('no_telp', TRUE),
			);
			$this->load->model('User_model');

			if($this->input->post('checkBuatAkun')) {
				

				$dataakun = $this->User_model->get_by_id($this->input->post('id_user', TRUE));
				if($dataakun) {

					if($this->input->post('username') == '') {
						$this->session->set_flashdata('error', 'Username tidak boleh kosong');
						redirect(site_url('karyawan/update/'.encrypt_url($this->input->post('id', TRUE))));
					}

					$photo = 'default.jpg';

					if(!empty($_FILES['foto']['name']))
					{
						$config['upload_path']      = './assets/assets/img/user';
						$config['allowed_types']    = 'jpg|png|jpeg';
						$config['max_size']         = 10048;
						$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						$this->upload->do_upload("foto");
						$datapoto = $this->upload->data();
						$photo = $datapoto['file_name'];
					}

					$dataakunnew = array(
						'username' => $this->input->post('username', TRUE),
						'password' => sha1($this->input->post('password', TRUE)),
						'level' => 4,
						'photo' => $photo
					);
					// echo 'data AKUN updated';
					$this->User_model->update($this->input->post('id_user', TRUE), $dataakunnew);
					$oldphoto = $dataakun->photo;
					if($oldphoto != 'default.jpg') {
						// echo 'berhasil unlink';
						unlink('./assets/assets/img/user/'.$oldphoto);
					}
				} else {

					if(
						$this->input->post('username') == '' ||
						$this->input->post('password') == ''
					) {
						$this->session->set_flashdata('error', 'Username dan Password tidak boleh kosong');
						redirect(site_url('karyawan/update/'.encrypt_url($this->input->post('id', TRUE))));
					}

					$photo = 'default.jpg';

					if(!empty($_FILES['foto']['name']))
					{
						$config['upload_path']      = './assets/assets/img/user';
						$config['allowed_types']    = 'jpg|png|jpeg';
						$config['max_size']         = 10048;
						$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						$this->upload->do_upload("foto");
						$datapoto = $this->upload->data();
						$photo = $datapoto['file_name'];
					}

					$dataakunnew = array(
						'username' => $this->input->post('username', TRUE),
						'password' => sha1($this->input->post('password', TRUE)),
						'level' => 4,
						'photo' => $photo
					);
					// echo 'data inserted - NEW AKUN';

					$this->User_model->insert($dataakunnew);
					
					$data['id_user'] = $this->db->insert_id();
				}
				
			} else {
				$dataakun = $this->User_model->get_by_id($this->input->post('id_user', TRUE));
				if($dataakun) {
					$oldphoto = $dataakun->photo;
					// echo 'data deleted';
					$this->User_model->delete($this->input->post('id_user', TRUE));
					if($oldphoto != 'default.jpg') {
						unlink('./assets/assets/img/user/'.$oldphoto);
					}
					$data['id_user'] = null;
				}
			}
			// echo 'data karyawan updated - LAST';
			$this->Tbl_karyawan_model->update($this->input->post('id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('karyawan'));
		}
	}

	public function changeStatus($id) {
		$row = $this->Tbl_karyawan_model->get_by_id(decrypt_url($id));
		if ($row) {
			$data = array(
				'status' => $row->status == 1 ? 0 : 1
			);
			
			$this->Tbl_karyawan_model->update(decrypt_url($id), $data);

			$message = $row->status == 1 ? 'Disable Karyawan Success' : 'Enable Record Success';

			$this->session->set_flashdata('message', $message);
			redirect(site_url('karyawan'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('karyawan'));
		}

	}

	public function delete($id)
	{
		$row = $this->Tbl_karyawan_model->get_by_id(decrypt_url($id));

		if ($row) {
			$this->Tbl_karyawan_model->delete(decrypt_url($id));
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('karyawan'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('karyawan'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('nik', 'nik', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function _akun_rules() {
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
	public function _akun_username_rules() {
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function excel()
	{
		$this->load->helper('exportexcel');
		$namaFile = "tbl_karyawan.xls";
		$judul = "tbl_karyawan";
		$tablehead = 0;
		$tablebody = 1;
		$nourut = 1;
		//penulisan header
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment;filename=" . $namaFile . "");
		header("Content-Transfer-Encoding: binary ");

		xlsBOF();

		$kolomhead = 0;
		xlsWriteLabel($tablehead, $kolomhead++, "No");
		xlsWriteLabel($tablehead, $kolomhead++, "Id User");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Lengkap");
		xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
		xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
		xlsWriteLabel($tablehead, $kolomhead++, "Nik");
		xlsWriteLabel($tablehead, $kolomhead++, "Email");
		xlsWriteLabel($tablehead, $kolomhead++, "No Telp");

		foreach ($this->Tbl_karyawan_model->get_all() as $data) {
			$kolombody = 0;

			//ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
			xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteNumber($tablebody, $kolombody++, $data->id_user);
			xlsWriteLabel($tablebody, $kolombody++, $data->nama_lengkap);
			xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
			xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
			xlsWriteNumber($tablebody, $kolombody++, $data->nik);
			xlsWriteLabel($tablebody, $kolombody++, $data->email);
			xlsWriteNumber($tablebody, $kolombody++, $data->no_telp);

			$tablebody++;
			$nourut++;
		}

		xlsEOF();
		exit();
	}

	public function fetch_petugas() {
		$datakaryawan = $this->Tbl_karyawan_model->get_all();
		$data = array();
		$no = 1;
		foreach ($datakaryawan as $karyawan) {
			$row = array();
			$row[] = $no++;
			$row[] = $karyawan->nama_lengkap;
			$row[] = $karyawan->jenis_kelamin;
			$row[] = $karyawan->alamat;
			$row[] = $karyawan->nik;
			$row[] = $karyawan->email;
			$row[] = $karyawan->no_telp;
			$row[] = $karyawan->username;
			$row[] = $karyawan->password;
			$row[] = $karyawan->status == 1 ? 'Aktif' : 'Tidak Aktif';
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_karyawan('."'".$karyawan->id_karyawan."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_karyawan('."'".$karyawan->id_karyawan."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Tbl_karyawan_model->count_all(),
			"recordsFiltered" => $this->Tbl_karyawan_model->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}
}

/* End of file Karyawan.php */
/* Location: ./application/controllers/Karyawan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-01-26 11:35:47 */
/* http://harviacode.com */

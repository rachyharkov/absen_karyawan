<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Absensi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model([
					'Tbl_absensi_model',
					'Tbl_lapangan_model'
				]);
				$this->load->helper('fungsi');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $absensi = $this->Tbl_absensi_model->get_all();
        $data = array(
            'absensi_data' => $absensi,
        );
        $this->template->load('template','pengguna_berlevel/absensi/tbl_absensi_list_with_approval', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_absensi_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
				
		'id' => $row->id,
		'users_id' => $row->users_id,
		'tanggal' => $row->tanggal,
		'jam' => $row->jam,
		'latitude' => $row->latitude,
		'longitude' => $row->longitude,
		'foto' => $row->foto,
		'ip_address' => $row->ip_address,
		'telat' => $row->telat,
		'status' => $row->status,
	    );
            $this->template->load('template','pengguna_berlevel/absensi/tbl_absensi_list_with_approval', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url(levelUser($this->session->userdata('level')).'absensi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url(levelUser($this->session->userdata('level')).'/absensi/create_action'),
			'id' => set_value('id'),
			'users_id' => set_value('users_id'),
			'tanggal' => set_value('tanggal'),
			'jam' => set_value('jam'),
			'lapangan_id' => set_value('lapangan_id'),
			'jenis_absen' => set_value('jenis_absen'),
			'latitude' => set_value('latitude'),
			'longitude' => set_value('longitude'),
			'foto' => set_value('foto'),
			'ip_address' => set_value('ip_address'),
			'telat' => set_value('telat'),
			'status' => set_value('status'),
		);
        $this->template->load('template','pengguna_berlevel/absensi/tbl_absensi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'users_id' => $this->input->post('users_id',TRUE),
				'tanggal' => $this->input->post('tanggal',TRUE),
				'jam' => $this->input->post('jam',TRUE),
				'latitude' => $this->input->post('latitude',TRUE),
				'longitude' => $this->input->post('longitude',TRUE),
				'ip_address' => 'N/A',
				// 'foto' => null,
				'telat' => cekTelat($this->input->post('jam',TRUE), $this->input->post('lapangan_id',TRUE), $this->input->post('jenis_absen',TRUE)),
				'status' => $this->input->post('jenis_absen',TRUE) == 'masuk' ? 1 : 2,
	    	);

			$config['upload_path']      = './assets/assets/img/bukti_absen';
			$config['allowed_types']    = 'jpg|png|jpeg';
			$config['max_size']         = 10048;
			$config['file_name']        = $data['users_id'].'-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('foto'))
			{
				$this->session->set_flashdata('error', $this->upload->display_errors());
				$this->create();
				return;
			}
			else
			{
				$upload_data = $this->upload->data();
				$data['foto'] = $upload_data['file_name'];
			}

            $this->Tbl_absensi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(levelUser($this->session->userdata('level')).'/absensi');
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_absensi_model->get_by_id(decrypt_url($id));

		$statusnya = $row->status;

		if ($statusnya == 1) {
			$statusnya = 'masuk';
		} elseif ($statusnya == 2) {
			$statusnya = 'pulang';
		} else {
			$statusnya = 'N/A';
		}

		$getlapanganid = $this->db->get_where('tbl_penempatan_karyawan', ['id_users' => $row->users_id])->row();
		$lapanganid = $getlapanganid->id_lapangan;
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url(levelUser($this->session->userdata('level')).'/absensi/update_action'),
				'id' => set_value('id', $row->id),
				'users_id' => set_value('users_id', $row->users_id),
				'tanggal' => set_value('tanggal', $row->tanggal),
				'jenis_absen' => set_value('jenis_absen', $statusnya),
				'lapangan_id' => set_value('lapangan_id', $lapanganid),
				'jam' => set_value('jam', $row->jam),
				'latitude' => set_value('latitude', $row->latitude),
				'longitude' => set_value('longitude', $row->longitude),
				'foto' => set_value('foto', $row->foto),
				'ip_address' => set_value('ip_address', $row->ip_address),
				'telat' => set_value('telat', $row->telat),
				'status' => set_value('status', $row->status),
	    	);
            $this->template->load('template','pengguna_berlevel/absensi/tbl_absensi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(levelUser($this->session->userdata('level')).'/absensi');
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
			$this->update(encrypt_url($this->input->post('id', TRUE)));
        } else {
			$data = array(
				'users_id' => $this->input->post('users_id',TRUE),
				'tanggal' => $this->input->post('tanggal',TRUE),
				'jam' => $this->input->post('jam',TRUE),
				'latitude' => $this->input->post('latitude',TRUE),
				'longitude' => $this->input->post('longitude',TRUE),
				'ip_address' => 'N/A',
				// 'foto' => null,
				'telat' => cekTelat($this->input->post('jam',TRUE), $this->input->post('lapangan_id',TRUE), $this->input->post('jenis_absen',TRUE)),
				'status' => $this->input->post('jenis_absen',TRUE) == 'masuk' ? 1 : 2,
	    	);

			$filelampiran = $_FILES['lampiran'] ?? FALSE;
			if ($filelampiran) {

				$apakahadafilelama = $this->input->post('lampiran_old',TRUE) ?? FALSE;
				if ($apakahadafilelama) {
					unlink('./assets/assets/img/user/izin/'.$this->input->post('lampiran_old',TRUE));
				}

				$config['upload_path']      = './assets/assets/img/bukti_absen';
				$config['allowed_types']    = 'jpg|png|jpeg';
				$config['max_size']         = 10048;
				$config['file_name']        = $data['users_id'].'-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('foto'))
				{
					$this->session->set_flashdata('error', $this->upload->display_errors());
					$this->update(encrypt_url($this->input->post('id', TRUE)));
					return;
				}
				else
				{
					$upload_data = $this->upload->data();
					$data['foto'] = $upload_data['file_name'];
				}
			}

            $this->Tbl_absensi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(levelUser($this->session->userdata('level')).'/absensi');
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_absensi_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Tbl_absensi_model->delete(decrypt_url($id));
			
			if(file_exists('./assets/assets/img/bukti_absen/'.$row->foto) && $row->foto){
				unlink('./assets/assets/img/bukti_absen/'.$row->foto);
			}

            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(levelUser($this->session->userdata('level')).'/absensi');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(levelUser($this->session->userdata('level')).'/absensi');
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('jenis_absen', 'jenis absen', 'trim|required');
		$this->form_validation->set_rules('users_id', 'users id', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
		$this->form_validation->set_rules('jam', 'jam', 'trim|required');
		$this->form_validation->set_rules('lapangan_id', 'lapangan', 'trim|required');
		$this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
		$this->form_validation->set_rules('longitude', 'longitude', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

		public function update_status($id, $status) {

			$absensiIni = $this->Tbl_absensi_model->get_by_id($id);

			if($status == 'approved') {

				$apakahAdaAbsenOrangIniPadaTanggalIni = $this->db->get_where('tbl_absensi', [
					'users_id' => $absensiIni->users_id,
					'tanggal' => $absensiIni->tanggal
				]);

				$id_usersnya = $absensiIni->users_id;
				$getDataLapanganUser = $this->Tbl_lapangan_model->get_lapangan_user($id_usersnya); 

				$status = 1; // Masuk

				if($apakahAdaAbsenOrangIniPadaTanggalIni->num_rows() == 2) {
					$status = 2; // Pulang
				}

				$data = [
					'status' => $status,
					'updated_at' => date('Y-m-d H:i:s'),
				];
		
				$this->Tbl_absensi_model->update($id, $data);
		
				$this->session->set_flashdata('message', 'Update Record Success');
				redirect(levelUser($this->session->userdata('level')).'/absensi');
			} else {
				if(file_exists('./assets/assets/img/bukti_absen/'.$absensiIni->foto) && $absensiIni->foto){
					unlink('./assets/assets/img/bukti_absen/'.$absensiIni->foto);
				}
				$this->db->delete('tbl_absensi', ['id' => $id]);
				$this->session->set_flashdata('message', 'Update Record Success');
				redirect(levelUser($this->session->userdata('level')).'/absensi');
			}
		}

}

/* End of file Absensi.php */
/* Location: ./application/controllers/Absensi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-02-08 02:37:00 */
/* http://harviacode.com */

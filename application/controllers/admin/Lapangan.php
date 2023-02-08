<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lapangan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model([
			'Tbl_lapangan_model',
			'Manage_users_model'
		]);
		$this->load->helper('fungsi');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $lapangan = $this->Tbl_lapangan_model->get_all();
        $data = array(
            'lapangan_data' => $lapangan,
        );
        $this->template->load('template','pengguna_berlevel/lapangan/tbl_lapangan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_lapangan_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
				
		'id' => $row->id,
		'nama_lapangan' => $row->nama_lapangan,
		'latitude' => $row->latitude,
		'longitude' => $row->longitude,
		'radius_diizinkan' => $row->radius_diizinkan,
		'jam_masuk_diizinkan' => $row->jam_masuk_diizinkan,
		'jam_keluar_diizinkan' => $row->jam_keluar_diizinkan,
		'petugas' => $row->petugas,
	    );
            $this->template->load('template','pengguna_berlevel/lapangan/tbl_lapangan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url(levelUser($this->session->userdata('level')).'/lapangan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url(levelUser($this->session->userdata('level')).'/lapangan/create_action'),
	    'id' => set_value('id'),
	    'nama_lapangan' => set_value('nama_lapangan'),
	    'latitude' => set_value('latitude'),
	    'longitude' => set_value('longitude'),
	    'radius_diizinkan' => set_value('radius_diizinkan'),
	    'jam_masuk_diizinkan' => set_value('jam_masuk_diizinkan'),
	    'jam_keluar_diizinkan' => set_value('jam_keluar_diizinkan'),
	    'petugas' => set_value('petugas'),
	);
        $this->template->load('template','pengguna_berlevel/lapangan/tbl_lapangan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_lapangan' => $this->input->post('nama_lapangan',TRUE),
		'latitude' => $this->input->post('latitude',TRUE),
		'longitude' => $this->input->post('longitude',TRUE),
		'radius_diizinkan' => $this->input->post('radius_diizinkan',TRUE),
		'jam_masuk_diizinkan' => $this->input->post('jam_masuk_diizinkan',TRUE),
		'jam_keluar_diizinkan' => $this->input->post('jam_keluar_diizinkan',TRUE),
		'petugas' => $this->input->post('petugas',TRUE),
	    );

            $this->Tbl_lapangan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url(levelUser($this->session->userdata('level')).'/lapangan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_lapangan_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url(levelUser($this->session->userdata('level')).'/lapangan/update_action'),
		'id' => set_value('id', $row->id),
		'nama_lapangan' => set_value('nama_lapangan', $row->nama_lapangan),
		'latitude' => set_value('latitude', $row->latitude),
		'longitude' => set_value('longitude', $row->longitude),
		'radius_diizinkan' => set_value('radius_diizinkan', $row->radius_diizinkan),
		'jam_masuk_diizinkan' => set_value('jam_masuk_diizinkan', $row->jam_masuk_diizinkan),
		'jam_keluar_diizinkan' => set_value('jam_keluar_diizinkan', $row->jam_keluar_diizinkan),
		'petugas' => set_value('petugas', $row->petugas),
	    );
            $this->template->load('template','pengguna_berlevel/lapangan/tbl_lapangan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url(levelUser($this->session->userdata('level')).'/lapangan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
			$this->update(encrypt_url($this->input->post('id', TRUE)));
        } else {
            $data = array(
		'nama_lapangan' => $this->input->post('nama_lapangan',TRUE),
		'latitude' => $this->input->post('latitude',TRUE),
		'longitude' => $this->input->post('longitude',TRUE),
		'radius_diizinkan' => $this->input->post('radius_diizinkan',TRUE),
		'jam_masuk_diizinkan' => $this->input->post('jam_masuk_diizinkan',TRUE),
		'jam_keluar_diizinkan' => $this->input->post('jam_keluar_diizinkan',TRUE),
		'petugas' => $this->input->post('petugas',TRUE),
	    );

            $this->Tbl_lapangan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url(levelUser($this->session->userdata('level')).'/lapangan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_lapangan_model->get_by_id(decrypt_url($id));

        if ($row) {
			$deleteStatus = $this->Tbl_lapangan_model->delete(decrypt_url($id));

			$this->session->set_flashdata('message', $deleteStatus);
			redirect(site_url(levelUser($this->session->userdata('level')).'/lapangan'));
			
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url(levelUser($this->session->userdata('level')).'/lapangan'));
        }
    }

	public function assign_users($id) {
		$row = $this->Tbl_lapangan_model->get_by_id(decrypt_url($id));
		$users_not_assigned_yet = $this->Tbl_lapangan_model->get_users_which_is_not_assigned(decrypt_url($id));
		$users_assigned = $this->Tbl_lapangan_model->get_users_assigned(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Assign Users',
				'action' => site_url(levelUser($this->session->userdata('level')).'/lapangan/assign_users_action'),
				'id' => set_value('id', $id),
				'nama_lapangan' => set_value('nama_lapangan', $row->nama_lapangan),
				'users_not_assigned_yet' => $users_not_assigned_yet,
				'users_assigned' => $users_assigned,
			);
			$this->template->load('template','pengguna_berlevel/lapangan/tbl_lapangan_assign_users', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url(levelUser($this->session->userdata('level')).'/lapangan'));
		}
	}

	public function save_assigned_user() {
		$id_lapangan = $this->input->post('lapangan_id');
		$id_user = $this->input->post('user_id');
		// $nama_lapangan = $this->input->post('nama_lapangan');
		$this->Tbl_lapangan_model->kosongkan_assigned_user(decrypt_url($id_lapangan));
		foreach ($id_user as $key => $value) {
			$data = array(
				'id_lapangan' => decrypt_url($id_lapangan),
				'id_users' => decrypt_url($value),
			);
			$this->Tbl_lapangan_model->save_assigned_user($data);
		}
		$response = array(
			'status' => 'success',
			'message' => 'Berhasil menyimpan',
		);

		echo json_encode($response);
	}

	public function find_lapangan() {
		$keyword = $this->input->get('q');
		$data = $this->Tbl_lapangan_model->get_by_keyword($keyword);
		// output for selectize output
		$output = [
			'data' => [],
			'more' => false,
		];
		foreach ($data as $row) {
			$output['data'][] = [
				'id' => $row->id,
				'text' => $row->nama_lapangan,
			];
		}
		echo json_encode($output);
	}

	public function get_lapangan() {
		$id = $this->input->get('id');
		$data = $this->Tbl_lapangan_model->get_by_id($id);

		$resp = [
			'data' => [
				'id' => $data->id,
				'nama_lapangan' => $data->nama_lapangan,
				'latitude' => $data->latitude,
				'longitude' => $data->longitude,
				'radius_diizinkan' => $data->radius_diizinkan,
			]
		];

		echo json_encode($data);
	}

    public function _rules() 
    {
		$this->form_validation->set_rules('nama_lapangan', 'nama lapangan', 'trim|required');
		$this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
		$this->form_validation->set_rules('longitude', 'longitude', 'trim|required');
		$this->form_validation->set_rules('radius_diizinkan', 'radius diizinkan', 'trim|required');
		$this->form_validation->set_rules('jam_masuk_diizinkan', 'jam masuk diizinkan', 'trim|required');
		$this->form_validation->set_rules('jam_keluar_diizinkan', 'jam keluar diizinkan', 'trim|required');
		$this->form_validation->set_rules('petugas', 'petugas', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Lapangan.php */
/* Location: ./application/controllers/Lapangan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-01-27 01:03:48 */
/* http://harviacode.com */

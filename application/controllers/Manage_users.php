<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manage_users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Manage_users_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $manage_users = $this->Manage_users_model->get_all();
        $data = array(
            'manage_users_data' => $manage_users,
        );
        $this->template->load('template','manage_users/tbl_users_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Manage_users_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
				
		'id' => $row->id,
		'nama_lengkap' => $row->nama_lengkap,
		'jenis_kelamin' => $row->jenis_kelamin,
		'alamat' => $row->alamat,
		'nik' => $row->nik,
		'email' => $row->email,
		'no_telp' => $row->no_telp,
		'username' => $row->username,
		'password' => $row->password,
		'photo' => $row->photo,
		'status' => $row->status,
	    );
            $this->template->load('template','manage_users/tbl_users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('manage_users'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('manage_users/create_action'),
	    'id' => set_value('id'),
	    'nama_lengkap' => set_value('nama_lengkap'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'alamat' => set_value('alamat'),
	    'nik' => set_value('nik'),
	    'email' => set_value('email'),
	    'no_telp' => set_value('no_telp'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'photo' => set_value('photo'),
	    'status' => set_value('status'),
	);
        $this->template->load('template','manage_users/tbl_users_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'email' => $this->input->post('email',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'photo' => $this->input->post('photo',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Manage_users_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('manage_users'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Manage_users_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('manage_users/update_action'),
		'id' => set_value('id', $row->id),
		'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'alamat' => set_value('alamat', $row->alamat),
		'nik' => set_value('nik', $row->nik),
		'email' => set_value('email', $row->email),
		'no_telp' => set_value('no_telp', $row->no_telp),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'photo' => set_value('photo', $row->photo),
		'status' => set_value('status', $row->status),
	    );
            $this->template->load('template','manage_users/tbl_users_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('manage_users'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
			$this->update(encrypt_url($this->input->post('id', TRUE)));
        } else {
            $data = array(
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'email' => $this->input->post('email',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'photo' => $this->input->post('photo',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Manage_users_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('manage_users'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Manage_users_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Manage_users_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('manage_users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('manage_users'));
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
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('photo', 'photo', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Manage_users.php */
/* Location: ./application/controllers/Manage_users.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-01-27 03:32:25 */
/* http://harviacode.com */
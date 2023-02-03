<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sakit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_sakit_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $sakit = $this->Tbl_sakit_model->get_all();
        $data = array(
            'sakit_data' => $sakit,
        );
        $this->template->load('template','sakit/tbl_sakit_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_sakit_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
				
		'id' => $row->id,
		'users_id' => $row->users_id,
		'tanggal' => $row->tanggal,
		'alasan' => $row->alasan,
		'status' => $row->status,
		'created_at' => $row->created_at,
		'updated_at' => $row->updated_at,
	    );
            $this->template->load('template','sakit/tbl_sakit_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url(levelUser($this->session->userdata('level')).'sakit'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url(levelUser($this->session->userdata('level')).'/sakit/create_action'),
	    'id' => set_value('id'),
	    'users_id' => set_value('users_id'),
	    'tanggal' => set_value('tanggal'),
	    'alasan' => set_value('alasan'),
	    'status' => set_value('status'),
	    'created_at' => set_value('created_at'),
	    'updated_at' => set_value('updated_at'),
	);
        $this->template->load('template','sakit/tbl_sakit_form', $data);
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
		'alasan' => $this->input->post('alasan',TRUE),
		'status' => $this->input->post('status',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Tbl_sakit_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(levelUser($this->session->userdata('level')).'/sakit');
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_sakit_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url(levelUser($this->session->userdata('level')).'/sakit/update_action'),
		'id' => set_value('id', $row->id),
		'users_id' => set_value('users_id', $row->users_id),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'alasan' => set_value('alasan', $row->alasan),
		'status' => set_value('status', $row->status),
		'created_at' => set_value('created_at', $row->created_at),
		'updated_at' => set_value('updated_at', $row->updated_at),
	    );
            $this->template->load('template','sakit/tbl_sakit_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(levelUser($this->session->userdata('level')).'sakit');
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
		'alasan' => $this->input->post('alasan',TRUE),
		'status' => $this->input->post('status',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Tbl_sakit_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(levelUser($this->session->userdata('level')).'/sakit');
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_sakit_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Tbl_sakit_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(levelUser($this->session->userdata('level')).'sakit');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(levelUser($this->session->userdata('level')).'sakit');
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('users_id', 'users id', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('alasan', 'alasan', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Sakit.php */
/* Location: ./application/controllers/Sakit.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-02-03 09:11:29 */
/* http://harviacode.com */

<?php
function check_already_login()
{

	$ci = &get_instance();
	$user_session = $ci->session->userdata('userid');
	if ($user_session) {
		redirect('dashboard');
	}
}

//untuk semua ctrl cek seesion login dan session unit
function is_login()
{
	$ci = &get_instance();
	$user_session = $ci->session->userdata('userid');
	if (!$user_session) {
		redirect('auth');
	}
}

//untuk bagian dashboard saja
function cek_login_aja()
{
	$ci = &get_instance();
	$user_session = $ci->session->userdata('userid');
	if (!$user_session) {
		redirect('auth');
	}
}

function cek_asal_lapangan($user_id) {
	$ci = &get_instance();
	$ci->load->model('Manage_users_model');
	$lapangan = $ci->Manage_users_model->getLapanganByUserId($user_id)->row();
	return $lapangan->id_lapangan;
}

function apakahDataIzinAda($tanggal, $user_id, $jenis_izin) {
	$ci = &get_instance();
	$cek = null;
	if($jenis_izin == 'izin') {
		$ci->load->model('Tbl_izin_model');
		$cek = $ci->Tbl_izin_model->get_by_tanggal_user_id($tanggal, $user_id);
	}

	if($jenis_izin == 'cuti') {
		$ci->load->model('Tbl_cuti_model');
		$cek = $ci->Tbl_cuti_model->get_by_tanggal_user_id($tanggal, $user_id);
	}

	if($jenis_izin == 'sakit') {
		$ci->load->model('Tbl_sakit_model');
		$cek = $ci->Tbl_sakit_model->get_by_tanggal_user_id($tanggal, $user_id);
	}

	// print_r($cek->num_rows());

	if($cek->num_rows() > 0) {
		return 'ada';
	}

	return 'ga_ada';
}

//format rupiah
function rupiah($angka = null)
{
	if ($angka == null) {
		return 0;
	} else {
		$hasil_rupiah = number_format($angka, 0, ',', '.');
		return $hasil_rupiah;
	}
}

function levelUser($level_id) {
	if($level_id == 1) {
		return 'admin';
	}

	if($level_id == 2) {
		return 'owner';
	}

	if($level_id == 3) {
		return 'koordinator_lapangan';
	}

	return 'karyawan';
}

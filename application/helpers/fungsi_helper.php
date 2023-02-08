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

function count_users_active($lapangan_id = null) {
	$ci = &get_instance();
	$query = '';
	if ($lapangan_id == null) {
		$query = 'SELECT COUNT(*) as jumlah FROM tbl_users WHERE status = 1';
	} else {
		$query = 'SELECT COUNT(*) as jumlah FROM tbl_users JOIN tbl_penempatan_karyawan ON tbl_users.id = tbl_penempatan_karyawan.id_users
		WHERE tbl_users.status = 1 AND id_lapangan = '.$lapangan_id;
	}

	$data = $ci->db->query($query)->row_array();
	return $data;
}

function count_total_absensi_users($lapangan_id = null) {
	$ci = &get_instance();
	$query = '';
	if ($lapangan_id == null) {
		$query = 'SELECT COUNT(*) as jumlah FROM tbl_absensi';
	} else {
		$query = 'SELECT COUNT(*) as jumlah FROM tbl_absensi JOIN tbl_users ON tbl_absensi.users_id = tbl_users.id JOIN tbl_penempatan_karyawan ON tbl_users.id = tbl_penempatan_karyawan.id_users
		WHERE tbl_users.status = 1 AND id_lapangan = '.$lapangan_id;
	}

	$data = $ci->db->query($query)->row_array();
	return $data;
}

function apakahDataIzinAda($tanggal, $user_id, $jenisdata = null) {
	$ci = &get_instance();
	$cek = null;

	$ci->load->model('Tbl_izin_model');
	$ci->load->model('Tbl_cuti_model');
	$ci->load->model('Tbl_sakit_model');
	$cek1 = $ci->Tbl_izin_model->get_by_tanggal_user_id($tanggal, $user_id);
	$cek2 = $ci->Tbl_cuti_model->get_by_tanggal_user_id($tanggal, $user_id);
	$cek3 = $ci->Tbl_sakit_model->get_by_tanggal_user_id($tanggal, $user_id);


	// print_r($cek->num_rows());

	if($cek1->num_rows() > 0) {
		if($cek1->row()->tanggal != $tanggal) {
			return 'ada';
		}

		if($jenisdata == 'new') {
			return 'ada';
		}
	}
	if($cek2->num_rows() > 0) {
		if($cek2->row()->tanggal != $tanggal) {
			return 'ada';
		}

		if($jenisdata == 'new') {
			return 'ada';
		}
	}
	if($cek3->num_rows() > 0) {
		if($cek3->row()->tanggal != $tanggal) {
			return 'ada';
		}

		if($jenisdata == 'new') {
			return 'ada';
		}
	}

	return 'ga_ada';
}

function cekTelat($jam, $lapangannya, $jenis) {
	$ci = &get_instance();
	$ci->load->model('Tbl_lapangan_model');
	$lapangan = $ci->Tbl_lapangan_model->get_by_id($lapangannya);
	
	if($jenis == 'masuk') {
		$jam_masuk = $lapangan->jam_masuk_diizinkan;
		$jam_masuk = explode(':', $jam_masuk);
		$jam_masuk = $jam_masuk[0];
		$jam = explode(':', $jam);
		$jam = $jam[0];
		$telat = $jam - $jam_masuk;
		if($telat > 0) {
			return 1;
		}
	}

	if($jenis == 'pulang') {
		$jam_pulang = $lapangan->jam_keluar_diizinkan;
		$jam_pulang = explode(':', $jam_pulang);
		$jam_pulang = $jam_pulang[0];
		$jam = explode(':', $jam);
		$jam = $jam[0];
		$telat = $jam_pulang - $jam;
		if($telat > 0) {
			return 1;
		}
	}

	return 0;
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

function deteksiMasukAtauPulang($users_id, $tanggal) {
	$ci = &get_instance();
	$ci->load->model('Tbl_absensi_model');
	$absensi = $ci->Tbl_absensi_model->get_by_users_id_and_tanggal($users_id, $tanggal);

	if($absensi) {
		
		if($absensi->status == 1) {
			return 'pulang';
		} else {
			return 'udah_absen';
		}
	} else {
		return 'masuk';
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

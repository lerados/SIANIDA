<?php

class User extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function lihat_user(){
		$seru = $this->db->query("SELECT * FROM user WHERE id!=1 ORDER BY id ASC");
		return $seru->result_array();
	}
	function m_cari_user(){
		$id_a = $this->input->post('filter_cari');
		$id_b = $this->input->post('kunci_cari');
		$teangan = $this->db->query("SELECT * FROM user WHERE $id_a LIKE '%$id_b%' AND id!=1 ORDER BY $id_a ASC");
		return $teangan->result_array();
	}
	function cek_username(){
		$user = $this->input->post('user');
		$cek_user = $this->db->query("SELECT * FROM user WHERE username='$user'");
		if($cek_user->num_rows() > 0){
			return "ayaan";
		}
		else{
			return "euweuhan";
		}
	}
	function t_user(){
		$id = $this->input->post('aidi');
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$lvl = $this->input->post('level');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$jabatan = $this->input->post('jabatan');
		$tgl = $this->input->post('tgl_lahir');
		$kontak = $this->input->post('kontak');
		$this->db->query("INSERT INTO user VALUES ('$id','$user','$pass','$lvl','$nama','$alamat','$jabatan','$tgl','$kontak')");
		$teangan = $this->db->query("SELECT * FROM user WHERE username='$user'");
		return $teangan->result_array();
	}
	function edit_user(){
		$id = $this->input->post('aidi');
		$password = $this->input->post('pass');
		$lvl = $this->input->post('level');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$jabatan = $this->input->post('jabatan');
		$tgl = $this->input->post('tgl_lahir');
		$kontak = $this->input->post('kontak');
		$this->db->query("UPDATE user SET password='$password', level='$lvl', nama='$nama', alamat='$alamat', jabatan='$jabatan', tgl_lahir='$tgl', kontak='$kontak' WHERE id='$id'");
		$teangan = $this->db->query("SELECT * FROM user WHERE id='$id'");
		//
		$n_login = $this->session->userdata('user');
		$a = array('masuk' => TRUE, 'user' => $n_login, 'proses' => 'Edit data user berhasil');
		$this->session->set_userdata($a);
		//
		return $teangan->result_array();
	}
	function hapus_user($id){
		$this->db->query("DELETE FROM user WHERE id='$id'");
	}
}

?>
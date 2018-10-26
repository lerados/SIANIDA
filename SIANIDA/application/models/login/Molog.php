<?php

class Molog extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->fak = 'user';
	}
	function cek_log(){
		$nama = $this->input->post('user');
		$word = $this->input->post('pass');
		$x = $this->db->query("SELECT * FROM user WHERE username='$nama' AND password='$word'");
		if($x->num_rows() > 0){

			$a = array('masuk' => TRUE, 'user' => $nama, 'proses' => '');
			$this->session->set_userdata($a);
			return TRUE;
		}
		else{
			$b = array('masuk' => 'FALSE');
			$this->session->set_userdata($b);
			return FALSE;
		}
	}
	function cek_user($ax){
		$ambil = $this->db->get_where($this->fak, array('username' => $ax));
		$hasil = $ambil->result_array();
		if($hasil){
			return $hasil[0];
		}
	}
}

?>
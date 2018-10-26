<?php

class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('login/molog');
		$this->load->model('kelola_user/user');
		$this->load->model('kelola_surat/surat');
	}

	function index(){
		$p = $this->input->get('p');
		if($p=="home"){
			$this->imah();	
		}
		//login
		elseif($p=="login"){
			$this->cek_login();
		}
		elseif($p=="logout"){
			$this->logout();
		}
		//login
		//kelola user
		elseif($p=="kelola_user"){
			$this->lihat_user();
		}
		elseif($p=="proses_tambah_user"){
			$this->proses_t_user();
		}
		elseif($p=="proses_edit_user"){
			$this->p_edit_user();
		}
		elseif($p=="proses_hapus_user"){
			$this->proses_hapus_user();
		}
		//kelola user
		//surat masuk
		elseif($p=="surat_masuk"){
			$this->surat_masuk();
		}
		//surat masuk
		//pesan surat
		elseif($p=="pesan_surat"){
			$this->pesan_surat();
		}
		//pesan surat
		//surat keluar
		elseif($p=="surat_keluar"){
			$this->surat_keluar();
		}
		//surat keluar
		//disposisi
		elseif($p=="disposisi"){
			$this->disposisi();
		}
		//disposisi
		//laporan
		elseif($p=="laporan"){
			$this->laporan();
		}
		elseif($p=="cetak_laporan"){
			$this->cetak_laporan();
		}
		//laporan
		//kelola surat
		elseif($p=="kelola_surat"){
			$this->lihat_surat();
		}
		elseif($p=="cetak_sm"){
			$this->cetak_sm();
		}
		elseif($p=="cetak_sk"){
			$this->cetak_sk();
		}
		elseif($p=="cetak_disposisi"){
			$this->cetak_disposisi();
		}
		//kelola surat
		else{
			redirect(base_url('?p=home'));
		}
	}
	//login
	function imah(){
		if($this->session->userdata('masuk') == 'TRUE'){
			$er = $this->session->userdata('user');
			$us = array('id' => 'masuk', 'isi' => $er);
			$aa['user'] = $us;
			$this->load->view('hiasan/kepala');
			$this->navigate();
			$this->load->view('page/rumah', $aa);
			$this->load->view('hiasan/kaki');
		}
		else{
			$us = array('id' => 'keluar', 'isi' => '');
			$aa['user'] = $us;
			$this->load->view('hiasan/kepala');
			$this->navigate();
			$this->load->view('page/rumah', $aa);
			$this->load->view('hiasan/kaki');
		}
	}
	function navigate(){
		if($this->session->userdata('masuk') == 'TRUE'){
			$na = $this->molog->cek_user($this->session->userdata('user'));
			$use_r['level'] = $na;
			$this->load->view('nav/navout', $use_r);
		}
		else{
			$this->load->view('nav/navin');
			$this->load->view('nav/modlogin');
		}
	}
	//login
	function cek_login(){
		if($this->input->post('slogin')){
			$this->molog->cek_log($this->input->post('slogin'));
			if($this->session->userdata('masuk') == 'TRUE'){
				redirect(base_url('?p=home'));
				return TRUE;
			}
			else{
				$this->cek_gagal();
			}
		}
		elseif($this->session->userdata('masuk') == 'TRUE'){
			redirect(base_url('?p=home'));
			return TRUE;
		}
		else{
			$this->cek_gagal();
		}
	}
	function cek_gagal(){
		if($this->session->userdata('masuk') == 'TRUE'){
			redirect(base_url('?p=home'));
			return TRUE;
		}
		elseif($this->session->userdata('masuk') == 'FALSE'){
			$this->session->unset_userdata('masuk');
			$gagal = array('id' => 'salah' , 'salah' => 'Username Atau Password Salah!');
			$ga['gag'] = $gagal;
			$this->load->view('hiasan/kepala');
			$this->navigate();
			$this->load->view('page/masuk', $ga);
			$this->load->view('hiasan/kaki');
		}
		else{
			$us = array('id' => 'keluar', 'isi' => '');
			$aa['user'] = $us;
			$this->load->view('hiasan/kepala');
			$this->navigate();
			$this->load->view('page/rumah', $aa);
			$this->load->view('hiasan/kaki');
		}
	}
	function logout(){
		if($this->session->userdata('masuk') == 'TRUE'){
			$this->session->unset_userdata('masuk');
			$this->session->unset_userdata('user');
			$this->session->unset_userdata('proses');
			$this->session->sess_destroy();
			$this->cek_gagal();
			return FALSE;
		}
		else{
			redirect(base_url());
		}
	}
	//login
	//kelola user
	function lihat_user(){
		if($this->session->userdata('masuk') == 'TRUE'){
			$lih['hat'] = $this->user->lihat_user();
			$pro['ses'] = $ayaan = array('proses' => 'lihat' , 'teks' => '');
			$this->load->view('hiasan/kepala', $pro);
			$this->navigate();
			$this->load->view('page/kelola_user/lihat_user', $lih);
			$this->load->view('hiasan/kaki');
		}
		else{
			redirect(base_url());
		}
	}
	function proses_t_user(){
		if($this->session->userdata('masuk') == 'TRUE'){
			$cek_username = $this->user->cek_username($this->input->post('user_tambah'));
			if($cek_username == 'ayaan'){
				$lih['hat'] = $this->user->lihat_user();
				$pro['ses'] = $ayaan = array('proses' => 'gagal_tambah' , 'teks' => 'Username Telah Digunakan!');
				$this->load->view('hiasan/kepala', $pro);
				$this->navigate();
				$this->load->view('page/kelola_user/lihat_user', $lih);
				$this->load->view('hiasan/kaki');
			}
			else{
				$lih['hat'] = $this->user->t_user($this->input->post('user_tambah'));
				$pro['ses'] = $ayaan = array('proses' => 'berhasil_tambah' , 'teks' => 'User Berhasil Ditambah');
				$this->load->view('hiasan/kepala', $pro);
				$this->navigate();
				$this->load->view('page/kelola_user/cari_user', $lih);
				$this->load->view('hiasan/kaki');
			}
		}
		else{
			redirect(base_url());
		}
	}
	function cari_user(){
		if($this->session->userdata('masuk') == 'TRUE'){
			$lih['hat'] = $this->user->m_cari_user($this->input->post('cari'));
			$this->load->view('hiasan/kepala');
			$this->navigate();
			$this->load->view('page/kelola_user/cari_user', $lih);
			$this->load->view('hiasan/kaki');
		}
		else{
			redirect(base_url());
		}
	}
	function p_edit_user(){
		if($this->session->userdata('masuk') == 'TRUE'){
			$lih['hat'] = $this->user->edit_user($this->input->post('user_edit'));
			$pro['ses'] = $ayaan = array('proses' => 's_edit' , 'teks' => 'User Berhasil Diubah');
			$this->load->view('hiasan/kepala', $pro);
			$this->navigate();
			$this->load->view('page/kelola_user/cari_user', $lih);
			$this->load->view('hiasan/kaki');
		}
		else{
			redirect(base_url());
		}
	}
	function proses_hapus_user(){
		if($this->session->userdata('masuk') == 'TRUE'){
			$this->user->hapus_user($this->input->get('id'));
			$lih['hat'] = $this->user->lihat_user();
			$pro['ses'] = $ayaan = array('proses' => 's_hapus' , 'teks' => 'User Berhasil Dihapus');
			$this->load->view('hiasan/kepala', $pro);
			$this->navigate();
			$this->load->view('page/kelola_user/lihat_user', $lih);
			$this->load->view('hiasan/kaki');
		}
		else{
			redirect(base_url());
		}
	}
	//kelola user
	//surat masuk
	function surat_masuk(){
		if($this->session->userdata('masuk') == 'TRUE'){
			if($this->input->post('surat_tambah_y')){
				$this->surat->surat_masuk_y($this->input->post('surat_tambah_y'));
				$kon['fir'] = array('status_sm' => 'ya', 'teks' => 'Surat Masuk Berhasil Ditambahkan');
				$this->load->view('hiasan/kepala');
				$this->navigate();
				$this->load->view('page/surat_masuk/surat_masuk', $kon);
				$this->load->view('hiasan/kaki');
			}
			elseif($this->input->post('surat_tambah_t')){
				$this->surat->surat_masuk_t($this->input->post('surat_tambah_t'));
				$kon['fir'] = array('status_sm' => 'tidak', 'teks' => 'Surat Masuk Berhasil Ditambahkan Tanpa Membuat Permintaan Disposisi');
				$this->load->view('hiasan/kepala');
				$this->navigate();
				$this->load->view('page/surat_masuk/surat_masuk', $kon);
				$this->load->view('hiasan/kaki');
			}
			else{
				$kon['fir'] = array('status_sm' => 'kosong', 'teks' => '');
				$this->load->view('hiasan/kepala');
				$this->navigate();
				$this->load->view('page/surat_masuk/surat_masuk', $kon);
				$this->load->view('hiasan/kaki');
			}
		}
		else{
			redirect(base_url());
		}
	}
	//surat masuk
	//pesan surat
	function pesan_surat(){
		if($this->session->userdata('masuk') == 'TRUE'){
			if($this->input->post('pesan')){
				$this->surat->pesan_surat($this->input->post('pesan'));
				$kon['fir'] = array('status_pesan' => 'berhasil', 'teks' => 'Pesanan Surat Telah Dikirim');
				$this->load->view('hiasan/kepala');
				$this->navigate();
				$this->load->view('page/pesan_surat/pesan_surat', $kon);
				$this->load->view('hiasan/kaki');
			}
			else{
				$kon['fir'] = array('status_pesan' => 'kosong', 'teks' => '');
				$this->load->view('hiasan/kepala');
				$this->navigate();
				$this->load->view('page/pesan_surat/pesan_surat', $kon);
				$this->load->view('hiasan/kaki');
			}
		}
		else{
			redirect(base_url());
		}
	}
	//pesan surat
	//surat keluar
	function surat_keluar(){
		if($this->session->userdata('masuk') == 'TRUE'){
			if($this->input->post('proses_pesanan')){
				$pes['an'] = $this->surat->surat_keluar($this->input->post('proses_pesanan'));
				$this->load->view('hiasan/kepala');
				$this->navigate();
				$this->load->view('page/surat_keluar/disposisi_sk', $pes);
				$this->load->view('hiasan/kaki');
			}
			elseif($this->input->post('surat_keluar_y')){
				$pes['an'] = $this->surat->lihat_pesanan();
				$kelu['ar'] = array('surat_akhir' => 'berhasil', 'teks' => 'Data Surat Keluar Berhasil Ditambahkan');
				$this->load->view('hiasan/kepala');
				$this->navigate();
				$this->load->view('page/surat_keluar/data/sk', $kelu);
				$this->load->view('page/surat_keluar/surat_keluar', $pes);
				$this->load->view('hiasan/kaki');
			}
			elseif($this->input->post('surat_keluar_t')){
				$this->surat->surat_keluar_t($this->input->post('surat_keluar_t'));
				$pes['an'] = $this->surat->lihat_pesanan();
				$kelu['ar'] = array('surat_akhir' => 'tidak', 'teks' => 'Data Surat Keluar Berhasil Ditambahkan Tanpa Membuat Permintaan Disposisi');
				$this->load->view('hiasan/kepala');
				$this->navigate();
				$this->load->view('page/surat_keluar/data/sk', $kelu);
				$this->load->view('page/surat_keluar/surat_keluar', $pes);
				$this->load->view('hiasan/kaki');
			}
			elseif($this->input->get('hapus') == '1'){
				$this->surat->hapus_pesanan($this->input->get('id'));
				$pes['an'] = $this->surat->lihat_pesanan();
				$kelu['ar'] = array('surat_akhir' => 'hapus', 'teks' => 'Data Surat Pesanan Berhasil Dihapus');
				$this->load->view('hiasan/kepala');
				$this->navigate();
				$this->load->view('page/surat_keluar/data/sk', $kelu);
				$this->load->view('page/surat_keluar/surat_keluar', $pes);
				$this->load->view('hiasan/kaki');
			}
			else{
				$kelu['ar'] = array('surat_akhir' => 'kosong', 'teks' => '');
				$pes['an'] = $this->surat->lihat_pesanan();
				$this->load->view('hiasan/kepala');
				$this->navigate();
				$this->load->view('page/surat_keluar/data/sk', $kelu);
				$this->load->view('page/surat_keluar/surat_keluar', $pes);
				$this->load->view('hiasan/kaki');
			}
		}
		else{
			redirect(base_url());
		}
	}
	//surat keluar
	//disposisi
	function disposisi(){
		if($this->session->userdata('masuk') == 'TRUE'){
			if($this->input->post('proses_disposisi')){
				$this->surat->disposisi('proses_disposisi');
				$si['si'] = array('disposisi' => 'disposisi', 'teks' => 'Surat Telah Diberi Disposisi Surat');
				$dism['sm'] = $this->surat->lihat_disposisi_sm();
				$disk['sk'] = $this->surat->lihat_disposisi_sk();
				$this->load->view('hiasan/kepala');
				$this->navigate();
				$this->load->view('page/disposisi/data/di', $dism);
				$this->load->view('page/disposisi/data/sm', $disk);
				$this->load->view('page/disposisi/data/sk', $si);
				$this->load->view('page/disposisi/disposisi');
				$this->load->view('hiasan/kaki');
			}
			else{
				$si['si'] = array('disposisi' => 'kosong', 'teks' => '');
				$dism['sm'] = $this->surat->lihat_disposisi_sm();
				$disk['sk'] = $this->surat->lihat_disposisi_sk();
				$this->load->view('hiasan/kepala');
				$this->navigate();
				$this->load->view('page/disposisi/data/di', $dism);
				$this->load->view('page/disposisi/data/sm', $disk);
				$this->load->view('page/disposisi/data/sk', $si);
				$this->load->view('page/disposisi/disposisi');
				$this->load->view('hiasan/kaki');
			}
		}
		else{
			redirect(base_url());
		}
	}
	//disposisi
	//laporan
	function laporan(){
		if($this->session->userdata('masuk') == 'TRUE'){
			if($this->input->post('proses_laporan')){
				$sm['sm'] = $this->surat->sm('proses_laporan');
				$dsm['dsm'] = $this->surat->dsm('proses_laporan');
				$sk['sk'] = $this->surat->sk('proses_laporan');
				$dsk['dsk'] = $this->surat->dsk('proses_laporan');
				$tgl['tanggal'] = array('awal' => ($this->input->post('t_awal')), 'akhir' => ($this->input->post('t_akhir')), 'laporan' => ($this->input->post('tgl_laporan')));
				$lapo['ran'] = array('laporan' => 'laporan', 'teks' => '');
				$this->load->view('hiasan/kepala');
				$this->navigate();
				$this->load->view('page/laporan/data/lp', $tgl);
				$this->load->view('page/laporan/data/j_sm', $sm);
				$this->load->view('page/laporan/data/j_dsm', $dsm);
				$this->load->view('page/laporan/data/j_sk', $sk);
				$this->load->view('page/laporan/data/j_dsk', $dsk);
				$this->load->view('page/laporan/laporan', $lapo);
				$this->load->view('hiasan/kaki');
			}
			else{
				$lapo['ran'] = array('laporan' => 'kosong', 'teks' => 'Silahkan Filter Laporan');
				$this->load->view('hiasan/kepala');
				$this->navigate();
				$this->load->view('page/laporan/laporan', $lapo);
				$this->load->view('hiasan/kaki');
			}
		}
		else{
			redirect(base_url());
		}
	}
	function cetak_laporan(){
		if($this->session->userdata('masuk') == 'TRUE'){
			$sm['sm'] = $this->surat->sm('laporan_cetak');
			$dsm['dsm'] = $this->surat->dsm('laporan_cetak');
			$sk['sk'] = $this->surat->sk('laporan_cetak');
			$dsk['dsk'] = $this->surat->dsk('laporan_cetak');
			$tgl['tanggal'] = array('awal' => ($this->input->post('t_awal')), 'akhir' => ($this->input->post('t_akhir')), 'laporan' => ($this->input->post('tgl_laporan')));
			$this->load->view('page/laporan/data/lp', $tgl);
			$this->load->view('page/laporan/data/j_sm', $sm);
			$this->load->view('page/laporan/data/j_dsm', $dsm);
			$this->load->view('page/laporan/data/j_sk', $sk);
			$this->load->view('page/laporan/data/j_dsk', $dsk);
			$this->load->view('hiasan/kepala_cetak');
			$this->load->view('page/laporan/cetak_laporan');
			$this->load->view('hiasan/kaki');
		}
		else{
			redirect(base_url());
		}
	}
	//laporan
	//kelola surat
	function lihat_surat(){
		if($this->session->userdata('masuk') == 'TRUE'){
			if($this->input->post('cari_all')){
				if($this->input->post('filter_jenis') == 'surat_masuk'){
					$sm['masuk'] = $this->surat->cari_kelola_surat_sm($this->input->post('cari_all'));
					$sm_d['masuk_d'] = $this->surat->cari_kelola_surat_sm_d($this->input->post('cari_all'));
					$this->load->view('page/kelola_surat/data/sm', $sm);
					$this->load->view('page/kelola_surat/data/sm', $sm_d);
					$this->load->view('hiasan/kepala');
					$this->navigate();
					$this->load->view('page/kelola_surat/cari_surat');
					$this->load->view('hiasan/kaki');
				}
				elseif($this->input->post('filter_jenis') == 'surat_keluar'){
					$sk['keluar'] = $this->surat->kelola_surat_sk($this->input->post('cari_all'));
					$sk_d['keluar_d'] = $this->surat->kelola_surat_sk_d($this->input->post('cari_all'));
					$this->load->view('page/kelola_surat/data/sk', $sk);
					$this->load->view('page/kelola_surat/data/sk', $sk_d);
					$this->load->view('hiasan/kepala');
					$this->navigate();
					$this->load->view('page/kelola_surat/cari_surat_sk');
					$this->load->view('hiasan/kaki');
				}
			}
			elseif($this->input->get('filter') == 'sm'){
				$sm['masuk'] = $this->surat->kelola_surat_sm();
				$sm_d['masuk_d'] = $this->surat->kelola_surat_sm_d();
				$this->load->view('page/kelola_surat/data/sm', $sm);
				$this->load->view('page/kelola_surat/data/sm', $sm_d);
				$this->load->view('hiasan/kepala');
				$this->navigate();
				$this->load->view('page/kelola_surat/filter_sm');
				$this->load->view('hiasan/kaki');
			}
			elseif($this->input->get('filter') == 'sk'){
				$sk['keluar'] = $this->surat->kelola_surat_sk();
				$sk_d['keluar_d'] = $this->surat->kelola_surat_sk_d();
				$this->load->view('page/kelola_surat/data/sk', $sk);
				$this->load->view('page/kelola_surat/data/sk', $sk_d);
				$this->load->view('hiasan/kepala');
				$this->navigate();
				$this->load->view('page/kelola_surat/filter_sk');
				$this->load->view('hiasan/kaki');
			}
			elseif($this->input->post('sm_edit')){
				$sm['edit'] = $this->surat->edit_sm($this->input->post('sm_edit'));
				$ed['it'] = array('sdit' => 'berhasil', 'teks' => 'Surat Berhasil Diubah');
				$this->load->view('hiasan/kepala', $ed);
				$this->navigate();
				$this->load->view('page/kelola_surat/edit_sm', $sm);
				$this->load->view('hiasan/kaki');
			}
			elseif($this->input->get('hapus') == '1'){
				$this->surat->hapus_sm($this->input->get('id'));
				$ed['it'] = array('sdit' => 'hapus', 'teks' => 'Surat Berhasil Dihapus');
				$sm['masuk'] = $this->surat->kelola_surat_sm();
				$sk['keluar'] = $this->surat->kelola_surat_sk();
				$sm_d['masuk_d'] = $this->surat->kelola_surat_sm_d();
				$sk_d['keluar_d'] = $this->surat->kelola_surat_sk_d();
				$this->load->view('hiasan/kepala', $ed);
				$this->navigate();
				$this->load->view('page/kelola_surat/data/sm', $sm);
				$this->load->view('page/kelola_surat/data/sk', $sk);
				$this->load->view('page/kelola_surat/data/sm', $sm_d);
				$this->load->view('page/kelola_surat/data/sk', $sk_d);
				$this->load->view('page/kelola_surat/lihat_surat');
				$this->load->view('hiasan/kaki');
			}
			else{
				$ed['it'] = array('sdit' => 'kosong', 'teks' => '');
				$sm['masuk'] = $this->surat->kelola_surat_sm();
				$sk['keluar'] = $this->surat->kelola_surat_sk();
				$sm_d['masuk_d'] = $this->surat->kelola_surat_sm_d();
				$sk_d['keluar_d'] = $this->surat->kelola_surat_sk_d();
				$this->load->view('hiasan/kepala', $ed);
				$this->navigate();
				$this->load->view('page/kelola_surat/data/sm', $sm);
				$this->load->view('page/kelola_surat/data/sk', $sk);
				$this->load->view('page/kelola_surat/data/sm', $sm_d);
				$this->load->view('page/kelola_surat/data/sk', $sk_d);
				$this->load->view('page/kelola_surat/lihat_surat');
				$this->load->view('hiasan/kaki');
			}
		}
		else{
			redirect(base_url());
		}
	}
	function cetak_sm(){
		if($this->session->userdata('masuk') == 'TRUE'){
			$cetak['sm'] = $this->surat->cetak_sm($this->input->post('id_sm'));
			$this->load->view('hiasan/kepala_cetak');
			$this->load->view('page/kelola_surat/cetak/cetak_sm', $cetak);
			$this->load->view('hiasan/kaki');
		}
		else{
			redirect(base_url());
		}
	}
	function cetak_sk(){
		if($this->session->userdata('masuk') == 'TRUE'){
			$cetak['sk'] = $this->surat->cetak_sk($this->input->post('sk_cetak'));
			$this->load->view('hiasan/kepala_cetak');
			$this->load->view('page/kelola_surat/cetak/cetak_sk', $cetak);
			$this->load->view('hiasan/kaki');
		}
		else{
			redirect(base_url());
		}
	}
	function cetak_disposisi(){
		if($this->session->userdata('masuk') == 'TRUE'){
			$di['sp'] = $this->surat->cetak_disposisi($this->input->post('id_disposisi'));
			$this->load->view('hiasan/kepala_cetak');
			$this->load->view('page/kelola_surat/cetak/cetak_disposisi', $di);
			$this->load->view('hiasan/kaki');
		}
		else{
			redirect(base_url());
		}
	}
	//kelola surat
}

?>
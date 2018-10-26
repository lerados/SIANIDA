<?php

class Surat Extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function surat_masuk_y(){
		$id_sm = $this->input->post('id_sm');
		$disposisi = $this->input->post('id_disposisi');
		$asal = $this->input->post('asal_surat');
		$tujuan = $this->input->post('tujuan_surat');
		$isi = $this->input->post('isi_surat');
		$tgl_sm = $this->input->post('tgl_sm');
		$tgl_terima = $this->input->post('tgl_terimasm');
		$perihal = $this->input->post('perihal');
		$file = $this->input->post('file');
		$surat_masuk = $this->db->query("INSERT INTO surat_masuk VALUES('$id_sm','$disposisi','$asal','$tujuan','$isi','$tgl_sm','$tgl_terima','$perihal','$file')");
		$this->db->query("INSERT INTO disposisi VALUES('$disposisi','0000-00-00','','Belum Didisposisi','','')");
	}
	function surat_masuk_t(){
		$id_sm = $this->input->post('id_sm');
		$asal = $this->input->post('asal_surat');
		$tujuan = $this->input->post('tujuan_surat');
		$isi = $this->input->post('isi_surat');
		$tgl_sm = $this->input->post('tgl_sm');
		$tgl_terima = $this->input->post('tgl_terimasm');
		$perihal = $this->input->post('perihal');
		$file = $this->input->post('file');
		$this->db->query("INSERT INTO surat_masuk VALUES('$id_sm','','$asal','$tujuan','$isi','$tgl_sm','$tgl_terima','$perihal','$file')");
	}
	function pesan_surat(){
		$id_pesan = $this->input->post('id_pesanan');
		$tujuan = $this->input->post('tujuan_surat');
		$isi = $this->input->post('isi_surat');
		$pengirim = $this->input->post('pengirim');
		$tgl_pesan = $this->input->post('tgl_pesan');
		$this->db->query("INSERT INTO surat_pesanan VALUES('$id_pesan','$tujuan','$isi','$pengirim','$tgl_pesan','')");
	}
	function lihat_pesanan(){
		$lihat_pesanan = $this->db->query("SELECT * FROM surat_pesanan WHERE status_pesan!='selesai' ORDER BY id_pesanan ASC");
		return $lihat_pesanan->result_array();
	}
	function hapus_pesanan($id){
		$this->db->query("DELETE FROM surat_pesanan WHERE id_pesanan='$id'");
	}
	function surat_keluar(){
		$id_sk = $this->input->post('id_sk');
		$id_disposisi = $this->input->post('id_disposisi');
		$id_pesanan = $this->input->post('id_pesan');
		$tgl_sk = $this->input->post('tgl_sk');
		$perihal = $this->input->post('perihal');
		$file = $this->input->post('file');
		$this->db->query("INSERT INTO surat_keluar VALUES('$id_sk','$id_disposisi','$id_pesanan','$tgl_sk','$perihal','$file')");
		$this->db->query("INSERT INTO disposisi VALUES('$id_disposisi','0000-00-00','','Belum Didisposisi','','')");
		$this->db->query("UPDATE surat_pesanan SET status_pesan='selesai' WHERE id_pesanan='$id_pesanan'");
		$surat_keluar = $this->db->query("SELECT * FROM surat_keluar WHERE id_sk='$id_sk'");
		return $surat_keluar->result_array();
	}
	function surat_keluar_t(){
		$id_sk = $this->input->post('id_sk');
		$id_disposisi = $this->input->post('id_disposisi');
		$this->db->query("DELETE FROM disposisi WHERE id_disposisi='$id_disposisi'");
		$this->db->query("UPDATE surat_keluar SET id_disposisi='' WHERE id_sk='$id_sk'");
	}
	function lihat_disposisi_sm(){
		$lihat_disposisi = $this->db->query("SELECT * FROM kelola_surat_sm WHERE status='Belum Didisposisi' ORDER BY id_disposisi ASC");
		return $lihat_disposisi->result_array();
	}
	function lihat_disposisi_sk(){
		$lihat_disposisi = $this->db->query("SELECT * FROM kelola_surat_sk WHERE status='Belum Didisposisi' ORDER BY id_disposisi ASC");
		return $lihat_disposisi->result_array();
	}
	function disposisi(){
		$id = $this->input->post('id_disposisi');
		$tgl = $this->input->post('tgl_disposisi');
		$sifat = $this->input->post('sifat_surat');
		$terusan_surat = $this->input->post('terusan_surat');
		$instruksi = $this->input->post('instruksi');
		$this->db->query("UPDATE disposisi SET tgl_disposisi='$tgl', sifat_surat='$sifat', status='Sudah Didisposisi', terusan_surat='$terusan_surat', instruksi='$instruksi' WHERE id_disposisi='$id'");
	}
	function kelola_surat_sm(){
		$surat_sm = $this->db->query("SELECT * FROM kelola_surat_sm");
		return $surat_sm->result_array();
	}
	function kelola_surat_sk(){
		$surat_sk = $this->db->query("SELECT * FROM kelola_surat_sk");
		return $surat_sk->result_array();
	}
	function kelola_surat_sm_d(){
		$surat_sm = $this->db->query("SELECT * FROM kelola_surat_sm_d");
		return $surat_sm->result_array();
	}
	function kelola_surat_sk_d(){
		$surat_sk = $this->db->query("SELECT * FROM kelola_surat_sk_d");
		return $surat_sk->result_array();
	}
	function cari_kelola_surat_sm(){
		$filter_jenis = $this->input->post('filter_jenis');
		$filter_atribut = $this->input->post('filter_atribut');
		$kunci = $this->input->post('kunci');
		if($filter_jenis == 'surat_masuk'){
			if($filter_atribut == 'perihal'){
				$atribut = 'perihal';
			}
			elseif($filter_atribut == 'tgl'){
				$atribut = 'tgl_sm';
			}
			elseif($filter_atribut == 'id'){
				$atribut = 'id_sm';
			}
			$cari_all = $this->db->query("SELECT * FROM kelola_surat_sm WHERE $atribut LIKE '%$kunci%'");
			return $cari_all->result_array();
		}
	}
	function cari_kelola_surat_sm_d(){
		$filter_jenis = $this->input->post('filter_jenis');
		$filter_atribut = $this->input->post('filter_atribut');
		$kunci = $this->input->post('kunci');
		if($filter_jenis == 'surat_masuk'){
			if($filter_atribut == 'perihal'){
				$atribut = 'perihal';
			}
			elseif($filter_atribut == 'tgl'){
				$atribut = 'tgl_sm';
			}
			elseif($filter_atribut == 'id'){
				$atribut = 'id_sm';
			}
			$cari_all = $this->db->query("SELECT * FROM kelola_surat_sm_d WHERE $atribut LIKE '%$kunci%'");
			return $cari_all->result_array();
		}
	}
	function cari_kelola_surat_sk(){
		$filter_jenis = $this->input->post('filter_jenis');
		$filter_atribut = $this->input->post('filter_atribut');
		$kunci = $this->input->post('kunci');
		if($filter_jenis == 'surat_masuk'){
			if($filter_atribut == 'perihal'){
				$atribut = 'perihal';
			}
			elseif($filter_atribut == 'tgl'){
				$atribut = 'tgl_sm';
			}
			elseif($filter_atribut == 'id'){
				$atribut = 'id_sm';
			}
			$cari_all = $this->db->query("SELECT * FROM kelola_surat_sk WHERE $atribut LIKE '%$kunci%'");
			return $cari_all->result_array();
		}
	}
	function cari_kelola_surat_sk_d(){
		$filter_jenis = $this->input->post('filter_jenis');
		$filter_atribut = $this->input->post('filter_atribut');
		$kunci = $this->input->post('kunci');
		if($filter_jenis == 'surat_masuk'){
			if($filter_atribut == 'perihal'){
				$atribut = 'perihal';
			}
			elseif($filter_atribut == 'tgl'){
				$atribut = 'tgl_sm';
			}
			elseif($filter_atribut == 'id'){
				$atribut = 'id_sm';
			}
			$cari_all = $this->db->query("SELECT * FROM kelola_surat_sk_d WHERE $atribut LIKE '%$kunci%'");
			return $cari_all->result_array();
		}
	}
	function sm(){
		$awal = $this->input->post('t_awal');
		$akhir = $this->input->post('t_akhir');
		$sm = $this->db->query("SELECT COUNT(id_sm) AS id_esm FROM surat_masuk WHERE tgl_sm BETWEEN '$awal' AND '$akhir'");
		return $sm->result_array();
	}
	function dsm(){
		$awal = $this->input->post('t_awal');
		$akhir = $this->input->post('t_akhir');
		$dsm = $this->db->query("SELECT COUNT(id_disposisi) AS id_desm FROM disposisi WHERE LEFT(id_disposisi,4)='dism' AND tgl_disposisi BETWEEN '$awal' AND '$akhir' AND status='Sudah Didisposisi'");
		return $dsm->result_array();
	}
	function sk(){
		$awal = $this->input->post('t_awal');
		$akhir = $this->input->post('t_akhir');
		$sk = $this->db->query("SELECT COUNT(id_sk) AS id_esk FROM surat_keluar WHERE tgl_sk BETWEEN '$awal' AND '$akhir'");
		return $sk->result_array();
	}
	function dsk(){
		$awal = $this->input->post('t_awal');
		$akhir = $this->input->post('t_akhir');
		$dsk = $this->db->query("SELECT COUNT(id_disposisi) AS id_desk FROM disposisi WHERE LEFT(id_disposisi,4)='disk' AND tgl_disposisi BETWEEN '$awal' AND '$akhir' AND status='Sudah Didisposisi'");
		return $dsk->result_array();
	}
	function cetak_sm($id){
		$cetak_sm = $this->db->query("SELECT * FROM surat_masuk WHERE id_sm='$id'");
		return $cetak_sm->result_array();
	}
	function cetak_disposisi($id){
		$cetak_sm = $this->db->query("SELECT * FROM disposisi WHERE id_disposisi='$id'");
		return $cetak_sm->result_array();
	}
	function edit_sm(){
		$id_sm = $this->input->post('id_sm');
		$asal = $this->input->post('asal_surat');
		$tujuan = $this->input->post('tujuan_surat');
		$isi = $this->input->post('isi_surat');
		$tgl_sm = $this->input->post('tgl_sm');
		$tgl_terima = $this->input->post('tgl_terimasm');
		$perihal = $this->input->post('perihal');
		$file = $this->input->post('file');
		$this->db->query("UPDATE surat_masuk SET asal_surat='$asal', tujuan_surat='$tujuan', isi_surat='$isi', tgl_sm='$tgl_sm', tgl_terimasm='$tgl_terima', perihal='$perihal', file='$file' WHERE id_sm='$id_sm'");
		$edit_sm = $this->db->query("SELECT * FROM surat_masuk WHERE id_sm='$id_sm'");
		return $edit_sm->result_array();
	}
	function hapus_sm($id){
		$this->db->query("DELETE FROM surat_masuk WHERE id_sm='$id'");
	}
}

?>
<?php
	foreach($sp as $key => $value){
?>
<table border="0" class="table-condensed" align="center" style="margin-top: 20px;">
<tr>
	<td width="120px">ID Disposisi</td>
	<td>:</td>
	<td><?php echo $value['id_disposisi']; ?></td>
</tr>
<tr>
	<td>Tanggal</td>
	<td>:</td>
	<td><?php echo $value['tgl_disposisi']; ?></td>
</tr>
<tr>
	<td>Sifat</td>
	<td>:</td>
	<td><?php echo $value['sifat_surat']; ?></td>
</tr>
<tr>
	<td>Status</td>
	<td>:</td>
	<td><?php echo $value['status']; ?></td>
</tr>
<tr>
	<td valign="top">Terusan Surat</td>
	<td valign="top">:</td>
	<td><?php echo $value['terusan_surat']; ?></td>
</tr>
<tr>
	<td valign="top">Instruksi</td>
	<td valign="top">:</td>
	<td><?php echo $value['instruksi']; ?></td>
</tr>
</table>
<?php
	}
?>
<script type="text/javascript">window.print();</script>
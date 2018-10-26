<?php
	foreach($sk as $key => $value){
?>
<table border="0" class="table-condensed" align="center" width="600px" style="margin-top: 20px;">
<tr>
	<td width="120px">ID Surat Masuk</td>
	<td>:</td>
	<td><?php echo $value['id_sk']; ?></td>
</tr>
<tr>
	<td>Asal</td>
	<td>:</td>
	<td><?php echo $value['asal_surat']; ?></td>
</tr>
<tr>
	<td>Tujuan</td>
	<td>:</td>
	<td><?php echo $value['tujuan_surat']; ?></td>
</tr>
<tr>
	<td>Perihal</td>
	<td>:</td>
	<td><?php echo $value['perihal']; ?></td>
</tr>
<tr>
	<td valign="top">Isi</td>
	<td valign="top">:</td>
	<td><?php echo $value['isi_surat']; ?></td>
</tr>	
<tr>
	<td>Tanggal Surat</td>
	<td>:</td>
	<td><?php echo $value['tgl_sk']; ?></td>
</tr>
</table>
<?php
	}
?>
<script type="text/javascript">window.print();</script>
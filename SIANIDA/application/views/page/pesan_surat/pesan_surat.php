		<?php
			if($level['level'] == "P"){
		?>
		<table class="kelola" align="center" width="1024">
		<tr>
			<td height="400px" valign="top">
				<div class="col-md-12" align="center">
					<h4>Pesan Surat</h4>
				  	<form method="post" action="?p=pesan_surat">
						<input type="hidden" name="id_pesanan" value="<?php echo "ps".date('YmdHis'); ?>">
						<input type="hidden" name="tgl_pesan" value="<?php echo date('Ymd'); ?>">
						<table class="table-condensed table-hover handap luhur2" align="center">
						<?php
							if($fir['status_pesan'] == 'berhasil'){
								echo "<tr><td colspan='9' align='center'><font color='blue'>".$fir['teks']."</font></td></tr>";
							}
						?>
						<tr>
							<td width="140px">Pengirim</td>
							<td>
								<input type="text" name="pengirim" class="form-control" size="35" placeholder="Pengirim" required="True">
							</td>
						</tr>
						<tr>
							<td>Tujuan Surat</td>
							<td>
								<input type="text" name="tujuan_surat" class="form-control" placeholder="Tujuan Surat" required="True">
							</td>
						</tr>
						<tr>
							<td>Tanggal Surat</td>
							<td>
								<input type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>" disabled="True">
							</td>
						</tr>
						<tr>
							<td valign="top">Isi Surat</td>
							<td>
								<textarea name="isi_surat" rows="7" class="form-control" placeholder="Isi Surat" required="True"></textarea>	
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" name="pesan" class="btn btn-info" value="Pesan">
							</td>
						</tr>
						</table>
					</form>
				</div>
			</td>
		</tr>
		</table>
		<?php
			}
			else{
				redirect(base_url());
			}
		?>
	</div>
</div>
		<?php
			if($level['level'] == "a" or $level['level'] == "U"){
		?>
		<table class="kelola" align="center" width="1024">
		<tr>
			<td height="400px" valign="top">
				<div class="col-md-12" align="center">
					<h4>Surat Masuk</h4>
				  	<form method="post" action="?p=surat_masuk">
						<input type="hidden" name="id_sm" value="<?php echo "sm".date('YmdHis'); ?>">
						<input type="hidden" name="id_disposisi" value="<?php echo "dism".date('YmdHis'); ?>">
						<table class="table-condensed table-hover handap luhur2" align="center">
						<?php
							if($fir['status_sm'] == 'ya'){
								echo "<tr><td colspan='9' align='center'><font color='blue'>".$fir['teks']."</font></td></tr>";
							}
							elseif($fir['status_sm'] == 'tidak'){
								echo "<tr><td colspan='9' align='center'><font color='blue'>".$fir['teks']."</font></td></tr>";
							}
						?>
						<tr>
							<td width="140px">ID Surat Masuk</td>
							<td>
								<input type="text" class="form-control" value="<?php echo "sm".date('YmdHis'); ?>" disabled="True">
							</td>
						</tr>
						<tr>
							<td>Asal Surat</td>
							<td>
								<input type="text" name="asal_surat" class="form-control" placeholder="Asal Surat" required="True">
							</td>
						</tr>
						<tr>
							<td>Tujuan Surat</td>
							<td>
								<input type="text" name="tujuan_surat" class="form-control" placeholder="Tujuan Surat" required="True">
							</td>
						</tr>
						<tr>
							<td valign="top">Isi Surat</td>
							<td>
								<textarea name="isi_surat" rows="4" class="form-control" placeholder="Isi Surat" required="True"></textarea>	
							</td>
						</tr>
						<tr>
							<td>Tanggal Surat</td>
							<td>
								<input type="date" name="tgl_sm" class="form-control" required="True">
							</td>
						</tr>
						<tr>
							<td>Tanggal Terima</td>
							<td>
								<input type="date" name="tgl_terimasm" class="form-control" required="True">
							</td>
						</tr>
						<tr>
							<td>Perihal</td>
							<td>
								<input type="text" name="perihal" class="form-control" placeholder="Perihal" required="True">
							</td>
						</tr>
						<tr>
							<td>File</td>
							<td>
								<input type="file" name="file" class="form-control" placeholder="file">
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<a href="" data-toggle="modal" data-target=".sm_disposisi"><button class="btn btn-info">Simpan</button></a>
								<!-- modal surat masuk -->
								<div class="modal fade sm_disposisi" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-sm">
										<div class="modal-content">
											<div class="modal-header">
												<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-tittle" align="center">Surat Masuk</h4>
											</div>
											<div class="modal-body">
												<table class="table-condensed" align="center">
													<tr>
														<td align="center">Mintai disposisi surat ?</td>
													</tr>
													<tr>
														<td></td>
													</tr>
													<tr>
														<td align="center">
															<input type="submit" name="surat_tambah_y" class="btn btn-info" value="Ya">
															<input type="submit" name="surat_tambah_t" class="btn btn-warning" value="Tidak">
														</td>
													</tr>
												</table>
											</div>
											<div class="modal-footer">
												<!-- kaki -->
											</div>
										</div>
									</div>
								</div>
								<!-- akhir modal surat masuk -->
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
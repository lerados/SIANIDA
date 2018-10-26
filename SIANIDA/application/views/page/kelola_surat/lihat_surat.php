		<?php
			if($level['level'] == "a" or $level['level'] == "U"){
		?>
		<table class="kelola" align="center" width="1024">
		<tr>
			<td height="400px" valign="top">
				<div class="col-md-12" align="center">
					<h4>Kelola Surat</h4>
					<table border="0" class="col-md-12 luhur" align="center" style="margin-bottom: 10px">
					<tr>
						<td class="col-md-3"></td>
						<td align="right">
							<a href="?p=kelola_surat&filter=sm"><button type="button" class="btn btn-primary">Surat Masuk</button></a>
						</td>
						<td class="col-md-2"></td>
						<td align="left">
							<a href="?p=kelola_surat&filter=sk"><button type="button" class="btn btn-primary">Surat Keluar</button></a>
						</td>
						<td class="col-md-3"></td>
					</tr>
					</table>
					<form method="post" action="?p=kelola_surat">
						<table border="0" align="center" style="margin-bottom: 10px">
						<tr>
							<td>Jenis</td>
							<td>&nbsp;&nbsp;</td>
							<td>
								<select name="filter_jenis" class="form-control">
									<option value="surat_masuk" selected>Surat Masuk</option>
									<option value="surat_keluar">Surat Keluar</option>
								</select>
							</td>
							<td>&nbsp;&nbsp;</td>
							<td>Berdasarkan</td>
							<td>&nbsp;&nbsp;</td>
							<td>
								<select name="filter_atribut" class="form-control">
									<option value="perihal" selected>Perihal</option>
									<option value="tgl">Tanggal Surat</option>
									<option value="id">ID Surat</option>
								</select>
							</td>
							<td>&nbsp;&nbsp;</td>
							<td>
								<input type="text" name="kunci" class="form-control" placeholder="Kata Kunci Pencarian" size="60">
							</td>
							<td>&nbsp;&nbsp;</td>
							<td>
								<input type="submit" name="cari_all" class="btn btn-info" value="Cari">
							</td>
						</tr>
						</table>
					</form>
				  	<table class="table table-bordered table-condensed table-hover handap" align="center">
					<?php
						if($it['sdit'] == 'hapus'){
							echo "<tr><td colspan='5' align='center'><font color='red'>".$it['teks']."</font></td></tr>";
						}
					?>
					<tr style="background-color: #eeeeee;">
						<td width="120px">ID Surat</td>
						<td width="120px">ID Disposisi</td>
						<td width="">Perihal</td>
						<td width="100px">Tanggal Surat</td>
						<td width="300px">Aksi</td>
					</tr>
					<?php
						foreach($masuk as $key => $value){
					?>
					<tr>
						<td><?php echo $value['id_sm']; ?></td>
						<td><?php echo $value['id_disposisi']; ?></td>
						<td><?php echo $value['perihal']; ?></td>
						<td><?php echo $value['tgl_sm']; ?></td>
						<td>
							<a href="" data-toggle="modal" data-target=".<?php echo "rcsm".$value['id_sm']; ?>"><button type="button" class="btn btn-info">Rincian</button></a>
							<a href="" data-toggle="modal" data-target=".<?php echo "dism".$value['id_sm']; ?>"><button type="button" class="btn btn-warning">Disposisi</button></a>
							<a href="" data-toggle="modal" data-target=".<?php echo "edsm".$value['id_sm']; ?>"><button type="button" class="btn btn-success">Edit</button></a>
							<a href="" data-toggle="modal" data-target=".<?php echo "hpsm".$value['id_sm']; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
							<!-- modal rincian surat masuk-->
							<div class="modal fade <?php echo "rcsm".$value['id_sm']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-tittle" align="center">Rincian Surat Masuk</h4>
										</div>
										<div class="modal-body">
											<form method="post" action="?p=cetak_sm" target="_blank">
												<input type="hidden" name="id_sm" value="<?php echo $value['id_sm']; ; ?>">
												<table class="table-condensed table-hover" align="center">
												<tr>
													<td width="120px">ID Surat Masuk</td>
													<td>&nbsp;:&nbsp;</td>
													<td><?php echo $value['id_sm']; ?></td>
												</tr>
												<tr>
													<td>Asal Surat</td>
													<td>&nbsp;:&nbsp;</td>
													<td><?php echo $value['asal_surat']; ?></td>
												</tr>
												<tr>
													<td>Tujuan Surat</td>
													<td>&nbsp;:&nbsp;</td>
													<td><?php echo $value['tujuan_surat']; ?></td>
												</tr>
												<tr>
													<td valign="top">Isi Surat</td>
													<td valign="top">&nbsp;:&nbsp;</td>
													<td><?php echo $value['isi_surat']; ?></td>
												</tr>
												<tr>
													<td>Tanggal Surat</td>
													<td>&nbsp;:&nbsp;</td>
													<td><?php echo $value['tgl_sm']; ?></td>
												</tr>
												<tr>
													<td>Tanggal Terima</td>
													<td>&nbsp;:&nbsp;</td>
													<td><?php echo $value['tgl_terimasm']; ?></td>
												</tr>
												<tr>
													<td>Perihal</td>
													<td>&nbsp;:&nbsp;</td>
													<td><?php echo $value['perihal']; ?></td>
												</tr>
												<tr>
													<td>File</td>
													<td>&nbsp;:&nbsp;</td>
													<td>
														<a href="?p=kelola_surat&file=<?php echo $value['file']; ?>">
														<?php
															if($value['file'] != ''){
																echo $value['file'];
															}
															else{
																echo "File Tidak Tersedia";
															}
														?>
													</a>
													</td>
												</tr>
												<tr>
													<td colspan="3">
														<?php
															if($value['status'] == 'Sudah Didisposisi'){
														?>
														<input type="submit" name="sm_cetak" class="btn btn-info" value="Cetak">
														<?php
															}
														?>
														<button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
													</td>
												</tr>
												</table>
											</form>
										</div>
										<div class="modal-footer">
											<!-- kaki -->
										</div>
									</div>
								</div>
							</div>
							<!-- akhir modal rincian surat masuk -->
							<!-- modal disposisi surat masuk-->
							<div class="modal fade <?php echo "dism".$value['id_sm']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-tittle" align="center">Rincian Disposisi</h4>
										</div>
										<div class="modal-body">
											<form method="post" action="?p=cetak_disposisi" target="_blank">
												<input type="hidden" name="id_disposisi" value="<?php echo $value['id_disposisi']; ; ?>">
												<table class="table-condensed table-hover" align="center">
												<tr>
													<td width="120px">ID Disposisi</td>
													<td>&nbsp;:&nbsp;</td>
													<td><?php echo $value['id_disposisi']; ?></td>
												</tr>
												<tr>
													<td>Tanggal Disposisi</td>
													<td>&nbsp;:&nbsp;</td>
													<td><?php echo $value['tgl_disposisi']; ?></td>
												</tr>
												<tr>
													<td>Sifat</td>
													<td>&nbsp;:&nbsp;</td>
													<td><?php echo $value['sifat_surat']; ?></td>
												</tr>
												<tr>
													<td>Status</td>
													<td>&nbsp;:&nbsp;</td>
													<td><?php echo $value['status']; ?></td>
												</tr>
												<tr>
													<td valign="top">Terusan Surat</td>
													<td valign="top">&nbsp;:&nbsp;</td>
													<td><?php echo $value['terusan_surat']; ?></td>
												</tr>
												<tr>
													<td valign="top">Instruksi</td>
													<td valign="top">&nbsp;:&nbsp;</td>
													<td><?php echo $value['instruksi']; ?></td>
												</tr>
												<tr>
													<td colspan="3">
														<?php
															if($value['status'] == 'Sudah Didisposisi'){
														?>
														<input type="submit" name="dis_cetak" class="btn btn-info" value="Cetak">
														<?php
															}
														?>
														<button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
													</td>
												</tr>
												</table>
											</form>
										</div>
										<div class="modal-footer">
											<!-- kaki -->
										</div>
									</div>
								</div>
							</div>
							<!-- akhir modal disposisi surat masuk -->
							<!-- modal edit surat masuk-->
							<div class="modal fade <?php echo "edsm".$value['id_sm']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-tittle" align="center">Edit Surat Masuk</h4>
										</div>
										<div class="modal-body">
											<form method="post" action="?p=kelola_surat">
												<input type="hidden" name="id_sm" value="<?php echo $value['id_sm']; ; ?>">
												<table class="table-condensed table-hover" align="center">
												<tr>
													<td width="120px">ID Surat Masuk</td>
													<td>
														<input type="text" class="form-control" value="<?php echo $value['id_sm']; ?>" disabled="True">
													</td>
												</tr>
												<tr>
													<td>Asal Surat</td>
													<td>
														<input type="text" name="asal_surat" class="form-control" value="<?php echo $value['asal_surat']; ?>" required="True">
													</td>
												</tr>
												<tr>
													<td>Tujuan Surat</td>
													<td>
														<input type="text" name="tujuan_surat" class="form-control" value="<?php echo $value['tujuan_surat']; ?>" required="True">
													</td>
												</tr>
												<tr>
													<td valign="top">Isi Surat</td>
													<td>
														<textarea name="isi_surat" rows="3" class="form-control" required="True"><?php echo $value['isi_surat']; ?></textarea>	
													</td>
												</tr>
												<tr>
													<td>Tanggal Surat</td>
													<td>
														<input type="date" name="tgl_sm" class="form-control" value="<?php echo $value['tgl_sm']; ?>" required="True">
													</td>
												</tr>
												<tr>
													<td>Tanggal Terima</td>
													<td>
														<input type="date" name="tgl_terimasm" class="form-control" value="<?php echo $value['tgl_terimasm']; ?>" required="True">
													</td>
												</tr>
												<tr>
													<td>Perihal</td>
													<td>
														<input type="text" name="perihal" class="form-control" value="<?php echo $value['perihal']; ?>" required="True">
													</td>
												</tr>
												<tr>
													<td>File</td>
													<td>
														<input type="hidden" name="file_lama" class="form-control" value="<?php echo $value['file']; ?>">
														<input type="file" name="file" class="form-control" value="<?php echo $value['file']; ?>">
													</td>
												</tr>
												<tr>
													<td colspan="2">
														<input type="submit" name="sm_edit" class="btn btn-info" value="Simpan">
														<button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
													</td>
												</tr>
												</table>
											</form>
										</div>
										<div class="modal-footer">
											<!-- kaki -->
										</div>
									</div>
								</div>
							</div>
							<!-- akhir modal edit surat masuk -->
							<!-- modal hapus surat masuk -->
							<div class="modal fade <?php echo "hpsm".$value['id_sm']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-tittle" align="center">Hapus Surat</h4>
										</div>
										<div class="modal-body">
											<table class="table-condensed" align="center">
											<tr>
												<td align="center">Anda yakin akan menghapus surat ?</td>
											</tr>
											<tr>
												<td></td>
											</tr>
											<tr>
												<td align="center">
													<a href="?p=kelola_surat&hapus=1&id=<?php echo $value['id_sm']; ?>"><button type="button" class="btn btn-danger">Ya</button></a>
													<a href=""><button type="button" class="btn btn-warning">Tidak</button></a>
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
							<!-- akhir modal hapus surat masuk -->
						</td>
					</tr>
					<?php
						}
					?>
					<?php
						foreach($keluar as $key => $value){
					?>
					<tr>
						<td><?php echo $value['id_sk']; ?></td>
						<td><?php echo $value['id_disposisi']; ?></td>
						<td><?php echo $value['perihal']; ?></td>
						<td><?php echo $value['tgl_sk']; ?></td>
						<td>
							<a href="" data-toggle="modal" data-target=".<?php echo "rcsk".$value['id_sk']; ?>"><button type="button" class="btn btn-info">Rincian</button></a>
							<a href="" data-toggle="modal" data-target=".<?php echo "disk".$value['id_sk']; ?>"><button type="button" class="btn btn-warning">Disposisi</button></a>
							<a href="" data-toggle="modal" data-target=".<?php echo "edsk".$value['id_sk']; ?>"><button type="button" class="btn btn-success">Edit</button></a>
							<a href="" data-toggle="modal" data-target=".<?php echo "hpsk".$value['id_sk']; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
							<!-- modal edit surat keluar -->
							<div class="modal fade <?php echo "edsk".$value['id_sk']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-tittle" align="center">Edit Surat Keluar</h4>
										</div>
										<div class="modal-body">
											<form method="post" action="?p=edit_sk">
												<input type="hidden" name="id_sk" value="<?php echo $value['id_sk']; ; ?>">
												<table class="table-condensed table-hover" align="center">
												<tr>
													<td width="120px">ID Surat Keluar</td>
													<td>
														<input type="text" class="form-control" value="<?php echo $value['id_sk']; ?>" disabled="True">
													</td>
												</tr>
												<tr>
													<td>Pengirim</td>
													<td>
														<input type="text" name="pengirim" class="form-control" value="<?php echo $value['pengirim']; ?>" required="True">
													</td>
												</tr>
												<tr>
													<td>Tujuan Surat</td>
													<td>
														<input type="text" name="tujuan_surat" class="form-control" value="<?php echo $value['tujuan_surat']; ?>" required="True">
													</td>
												</tr>
												<tr>
													<td valign="top">Isi Surat</td>
													<td>
														<textarea name="isi_surat" rows="3" class="form-control" required="True"><?php echo $value['isi_surat']; ?></textarea>	
													</td>
												</tr>
												<tr>
													<td>Tanggal Surat</td>
													<td>
														<input type="date" name="tgl_sk" class="form-control" value="<?php echo $value['tgl_sk']; ?>" required="True">
													</td>
												</tr>
												<tr>
													<td>Perihal</td>
													<td>
														<input type="text" name="perihal" class="form-control" value="<?php echo $value['perihal']; ?>" required="True">
													</td>
												</tr>
												<tr>
													<td>File</td>
													<td>
														<input type="file" name="file" class="form-control" value="<?php echo $value['file']; ?>">
													</td>
												</tr>
												<tr>
													<td colspan="2">
														<input type="submit" name="sk_edit" class="btn btn-info" value="Simpan">
														<button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
													</td>
												</tr>
												</table>
											</form>
										</div>
										<div class="modal-footer">
											<!-- kaki -->
										</div>
									</div>
								</div>
							</div>
							<!-- akhir modal edit surat keluar -->
							<!-- modal hapus surat keluar -->
							<div class="modal fade <?php echo "hpsk".$value['id_sk']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-tittle" align="center">Hapus Surat</h4>
										</div>
										<div class="modal-body">
											<table class="table-condensed" align="center">
											<tr>
												<td align="center">Anda yakin akan menghapus surat ?</td>
											</tr>
											<tr>
												<td></td>
											</tr>
											<tr>
												<td align="center">
													<a href="?p=hapus_sk&id=<?php echo $value['id_sk']; ?>"><button type="button" class="btn btn-danger">Ya</button></a>
													<a href=""><button type="button" class="btn btn-warning">Tidak</button></a>
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
							<!-- akhir modal hapus surat keluar -->
						</td>
					</tr>
					<?php
						}
					?>
					<?php
						foreach($masuk_d as $key => $value){
					?>
					<tr>
						<td><?php echo $value['id_sm']; ?></td>
						<td>
							<?php
								if($value['id_disposisi'] == ''){
									echo "Tidak Dimintai Disposisi";
								}
								else{
									echo $value['id_disposisi'];
								}
							?>
						</td>
						<td><?php echo $value['perihal']; ?></td>
						<td><?php echo $value['tgl_sm']; ?></td>
						<td>
							<a href="" data-toggle="modal" data-target=".<?php echo "rcdsm".$value['id_sm']; ?>"><button type="button" class="btn btn-info">Rincian</button></a>
							<a href="" data-toggle="modal" data-target=".<?php echo "dism".$value['id_sm']; ?>"><button type="button" class="btn btn-warning">Disposisi</button></a>
							<a href="" data-toggle="modal" data-target=".<?php echo "edsm".$value['id_sm']; ?>"><button type="button" class="btn btn-success">Edit</button></a>
							<a href="" data-toggle="modal" data-target=".<?php echo "hpsm".$value['id_sm']; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
							<!-- modal rincian surat masuk-->
							<div class="modal fade <?php echo "rcdsm".$value['id_sm']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-tittle" align="center">Rincian Surat Masuk</h4>
										</div>
										<div class="modal-body">
											<form method="post" action="?p=cetak_sm" target="_blank">
												<input type="hidden" name="id_sm" value="<?php echo $value['id_sm']; ; ?>">
												<table class="table-condensed table-hover" align="center">
												<tr>
													<td width="120px">ID Surat Masuk</td>
													<td>&nbsp;:&nbsp;</td>
													<td><?php echo $value['id_sm']; ?></td>
												</tr>
												<tr>
													<td>Asal Surat</td>
													<td>&nbsp;:&nbsp;</td>
													<td><?php echo $value['asal_surat']; ?></td>
												</tr>
												<tr>
													<td>Tujuan Surat</td>
													<td>&nbsp;:&nbsp;</td>
													<td><?php echo $value['tujuan_surat']; ?></td>
												</tr>
												<tr>
													<td valign="top">Isi Surat</td>
													<td valign="top">&nbsp;:&nbsp;</td>
													<td><?php echo $value['isi_surat']; ?></td>
												</tr>
												<tr>
													<td>Tanggal Surat</td>
													<td>&nbsp;:&nbsp;</td>
													<td><?php echo $value['tgl_sm']; ?></td>
												</tr>
												<tr>
													<td>Tanggal Terima</td>
													<td>&nbsp;:&nbsp;</td>
													<td><?php echo $value['tgl_terimasm']; ?></td>
												</tr>
												<tr>
													<td>Perihal</td>
													<td>&nbsp;:&nbsp;</td>
													<td><?php echo $value['perihal']; ?></td>
												</tr>
												<tr>
													<td>File</td>
													<td>&nbsp;:&nbsp;</td>
													<td>
														<a href="?p=kelola_surat&file=<?php echo $value['file']; ?>">
														<?php
															if($value['file'] != ''){
																echo $value['file'];
															}
															else{
																echo "File Tidak Tersedia";
															}
														?>
													</a>
													</td>
												</tr>
												<tr>
													<td colspan="3">
														<input type="submit" name="sm_cetak" class="btn btn-info" value="Cetak">
														<button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
													</td>
												</tr>
												</table>
											</form>
										</div>
										<div class="modal-footer">
											<!-- kaki -->
										</div>
									</div>
								</div>
							</div>
							<!-- akhir modal rincian surat masuk -->
							<!-- modal edit surat masuk-->
							<div class="modal fade <?php echo "edsm".$value['id_sm']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-tittle" align="center">Edit Surat Masuk</h4>
										</div>
										<div class="modal-body">
											<form method="post" action="?p=edit_sm">
												<input type="hidden" name="id_sm" value="<?php echo $value['id_sm']; ; ?>">
												<table class="table-condensed table-hover" align="center">
												<tr>
													<td width="120px">ID Surat Masuk</td>
													<td>
														<input type="text" class="form-control" value="<?php echo $value['id_sm']; ?>" disabled="True">
													</td>
												</tr>
												<tr>
													<td>Asal Surat</td>
													<td>
														<input type="text" name="asal_surat" class="form-control" value="<?php echo $value['asal_surat']; ?>" required="True">
													</td>
												</tr>
												<tr>
													<td>Tujuan Surat</td>
													<td>
														<input type="text" name="tujuan_surat" class="form-control" value="<?php echo $value['tujuan_surat']; ?>" required="True">
													</td>
												</tr>
												<tr>
													<td valign="top">Isi Surat</td>
													<td>
														<textarea name="isi_surat" rows="3" class="form-control" required="True"><?php echo $value['isi_surat']; ?></textarea>	
													</td>
												</tr>
												<tr>
													<td>Tanggal Surat</td>
													<td>
														<input type="date" name="tgl_sm" class="form-control" value="<?php echo $value['tgl_sm']; ?>" required="True">
													</td>
												</tr>
												<tr>
													<td>Tanggal Terima</td>
													<td>
														<input type="date" name="tgl_terimasm" class="form-control" value="<?php echo $value['tgl_terimasm']; ?>" required="True">
													</td>
												</tr>
												<tr>
													<td>Perihal</td>
													<td>
														<input type="text" name="perihal" class="form-control" value="<?php echo $value['perihal']; ?>" required="True">
													</td>
												</tr>
												<tr>
													<td>File</td>
													<td>
														<input type="file" name="file" class="form-control" value="<?php echo $value['file']; ?>">
													</td>
												</tr>
												<tr>
													<td colspan="2">
														<input type="submit" name="sm_edit_d" class="btn btn-info" value="Simpan">
														<button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
													</td>
												</tr>
												</table>
											</form>
										</div>
										<div class="modal-footer">
											<!-- kaki -->
										</div>
									</div>
								</div>
							</div>
							<!-- akhir modal edit surat masuk -->
							<!-- modal hapus surat masuk -->
							<div class="modal fade <?php echo "hpsm".$value['id_sm']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-tittle" align="center">Hapus Surat</h4>
										</div>
										<div class="modal-body">
											<table class="table-condensed" align="center">
											<tr>
												<td align="center">Anda yakin akan menghapus surat ?</td>
											</tr>
											<tr>
												<td></td>
											</tr>
											<tr>
												<td align="center">
													<a href="?p=hapus_sm&id=<?php echo $value['id_sm']; ?>"><button type="button" class="btn btn-danger">Ya</button></a>
													<a href=""><button type="button" class="btn btn-warning">Tidak</button></a>
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
							<!-- akhir modal hapus surat masuk -->
						</td>
					</tr>
					<?php
						}
					?>
					<?php
						foreach($keluar_d as $key => $value){
					?>
					<tr>
						<td><?php echo $value['id_sk']; ?></td>
						<td>
							<?php
								if($value['id_disposisi'] == ''){
									echo "Tidak Dimintai Disposisi";
								}
								else{
									echo $value['id_disposisi'];
								}
							?>
						</td>
						<td><?php echo $value['perihal']; ?></td>
						<td><?php echo $value['tgl_sk']; ?></td>
						<td>
							<a href="" data-toggle="modal" data-target=".<?php echo "rcsm".$value['id_sk']; ?>"><button type="button" class="btn btn-info">Rincian</button></a>
							<a href="" data-toggle="modal" data-target=".<?php echo "dism".$value['id_sk']; ?>"><button type="button" class="btn btn-warning">Disposisi</button></a>
							<a href="" data-toggle="modal" data-target=".<?php echo "edsk".$value['id_sk']; ?>"><button type="button" class="btn btn-success">Edit</button></a>
							<a href="" data-toggle="modal" data-target=".<?php echo "hpsk".$value['id_sk']; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
							<!-- modal edit surat keluar -->
							<div class="modal fade <?php echo "edsk".$value['id_sk']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-tittle" align="center">Edit Surat Keluar</h4>
										</div>
										<div class="modal-body">
											<form method="post" action="?p=edit_sk">
												<input type="hidden" name="id_sk" value="<?php echo $value['id_sk']; ; ?>">
												<table class="table-condensed table-hover" align="center">
												<tr>
													<td width="120px">ID Surat Keluar</td>
													<td>
														<input type="text" class="form-control" value="<?php echo $value['id_sk']; ?>" disabled="True">
													</td>
												</tr>
												<tr>
													<td>Tujuan Surat</td>
													<td>
														<input type="text" name="tujuan_surat" class="form-control" value="<?php echo $value['tujuan_surat']; ?>" required="True">
													</td>
												</tr>
												<tr>
													<td valign="top">Isi Surat</td>
													<td>
														<textarea name="isi_surat" rows="3" class="form-control" required="True"><?php echo $value['isi_surat']; ?></textarea>	
													</td>
												</tr>
												<tr>
													<td>Tanggal Surat</td>
													<td>
														<input type="date" name="tgl_sk" class="form-control" value="<?php echo $value['tgl_sk']; ?>" required="True">
													</td>
												</tr>
												<tr>
													<td>Perihal</td>
													<td>
														<input type="text" name="perihal" class="form-control" value="<?php echo $value['perihal']; ?>" required="True">
													</td>
												</tr>
												<tr>
													<td>File</td>
													<td>
														<input type="file" name="file" class="form-control" value="<?php echo $value['file']; ?>">
													</td>
												</tr>
												<tr>
													<td colspan="2">
														<input type="submit" name="sk_edit_d" class="btn btn-info" value="Simpan">
														<button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
													</td>
												</tr>
												</table>
											</form>
										</div>
										<div class="modal-footer">
											<!-- kaki -->
										</div>
									</div>
								</div>
							</div>
							<!-- akhir modal edit surat keluar -->
							<!-- modal hapus surat keluar -->
							<div class="modal fade <?php echo "hpsk".$value['id_sk']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-tittle" align="center">Hapus Surat</h4>
										</div>
										<div class="modal-body">
											<table class="table-condensed" align="center">
											<tr>
												<td align="center">Anda yakin akan menghapus surat ?</td>
											</tr>
											<tr>
												<td></td>
											</tr>
											<tr>
												<td align="center">
													<a href="?p=hapus_sk&id=<?php echo $value['id_sk']; ?>"><button type="button" class="btn btn-danger">Ya</button></a>
													<a href=""><button type="button" class="btn btn-warning">Tidak</button></a>
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
							<!-- akhir modal hapus surat keluar -->
						</td>
					</tr>
					<?php
						}
					?>
					</table>
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
		<?php
			if($level['level'] == "K"){
		?>
		<table class="kelola" align="center" width="1024">
		<tr>
			<td height="400px" valign="top">
				<div class="col-md-12" align="center">
					<h4>Daftar Permintaan Disposisi</h4>
				  	<table class="table table-bordered table-condensed table-hover handap luhur2" align="center">
					<?php
						if($si['disposisi'] == 'disposisi'){
							echo "<tr><td colspan='9' align='center'><font color='blue'>".$si['teks']."</font></td></tr>";
						}
					?>
					<tr style="background-color: lightgray;">
						<td width="120px">ID Surat</td>
						<td width="120px">ID Disposisi</td>
						<td width="">Perihal</td>
						<td width="100px">Tanggal Surat</td>
						<td width="170px">Aksi</td>
					</tr>
					<?php
						foreach($sm as $key => $value){
					?>
					<tr>
						<td><?php echo $value['id_sm']; ?></td>
						<td><?php echo $value['id_disposisi']; ?></td>
						<td><?php echo $value['perihal']; ?></td>
						<td><?php echo $value['tgl_sm']; ?></td>
						<td>
							<a href="" data-toggle="modal" data-target=".<?php echo "rcdi".$value['id_disposisi']; ?>"><button type="button" class="btn btn-info">Rincian</button></a>
							<a href="" data-toggle="modal" data-target=".<?php echo "prdi".$value['id_disposisi']; ?>"><button type="button" class="btn btn-success">Proses</button></a>
							<!-- modal rincian disposisi surat masuk -->
							<div class="modal fade <?php echo "rcdi".$value['id_disposisi']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-tittle" align="center">Rincian Surat</h4>
										</div>
										<div class="modal-body">
											<table class="table-condensed table-hover" align="center">
											<tr>
												<td width="150px">ID Surat</td>
												<td>&nbsp;:&nbsp;</td>
												<td><?php echo $value['id_sm']; ?></td>
											</tr>
											<tr>
												<td>ID Disposisi</td>
												<td>&nbsp;:&nbsp;</td>
												<td><?php echo $value['id_disposisi']; ?></td>
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
												<td>Tanggal Terima Surat</td>
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
													<a href="<?php $value['file']; ?>">
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
													<button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
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
							<!-- akhir modal rincian disposisi surat masuk -->
							<!-- modal proses disposisi-->
							<div class="modal fade <?php echo "prdi".$value['id_disposisi']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-tittle" align="center">Disposisi</h4>
										</div>
										<div class="modal-body">
											<form method="post" action="?p=disposisi">
												<input type="hidden" name="id_disposisi" value="<?php echo $value['id_disposisi'] ?>">
												<input type="hidden" name="tgl_disposisi" value="<?php echo date('Ymd'); ?>">
												<table class="table-condensed table-hover" align="center">
												<tr>
													<td width="130px">Sifat Surat</td>
													<td>
														<select name="sifat_surat" class="form-control" required="True">
															<option value="a">Rahasia</option>
															<option value="b">Amat Segera</option>
															<option value="c">Penting</option>
															<option value="d" selected>Biasa</option>
														</select>
													</td>
												</tr>
												<tr>
													<td valign="top">Terusan Surat</td>
													<td>
														<textarea name="terusan_surat" class="form-control" placeholder="Terusan Surat" rows="3" cols="30" required="True"></textarea>
													</td>
												</tr>
												<tr>
													<td valign="top">Instruksi</td>
													<td>
														<textarea name="instruksi" class="form-control" placeholder="Instruksi" rows="3" cols="30" required="True"></textarea>
													</td>
												</tr>
												<tr>
													<td colspan="2">
														<input type="submit" name="proses_disposisi" class="btn btn-info" value="Disposisi">
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
							<!-- akhir modal proses disposisi -->
						</td>
					</tr>
					<?php
						}
					?>
					<?php
						foreach($sk as $key => $value){
					?>
					<tr>
						<td><?php echo $value['id_sk']; ?></td>
						<td><?php echo $value['id_disposisi']; ?></td>
						<td><?php echo $value['perihal']; ?></td>
						<td><?php echo $value['tgl_sk']; ?></td>
						<td>
							<a href="" data-toggle="modal" data-target=".<?php echo "rcdisk".$value['id_disposisi']; ?>"><button type="button" class="btn btn-info">Rincian</button></a>
							<a href="" data-toggle="modal" data-target=".<?php echo "prdisk".$value['id_disposisi']; ?>"><button type="button" class="btn btn-success">Proses</button></a>
							<!-- modal rincian disposisi surat keluar -->
							<div class="modal fade <?php echo "rcdisk".$value['id_disposisi']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-tittle" align="center">Rincian Surat</h4>
										</div>
										<div class="modal-body">
											<table class="table-condensed table-hover" align="center">
											<tr>
												<td width="150px">ID Surat</td>
												<td>&nbsp;:&nbsp;</td>
												<td><?php echo $value['id_sk']; ?></td>
											</tr>
											<tr>
												<td>ID Disposisi</td>
												<td>&nbsp;:&nbsp;</td>
												<td><?php echo $value['id_disposisi']; ?></td>
											</tr>
											<tr>
												<td>Pengirim</td>
												<td>&nbsp;:&nbsp;</td>
												<td><?php echo $value['pengirim']; ?></td>
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
												<td><?php echo $value['tgl_sk']; ?></td>
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
													<a href="<?php $value['file']; ?>">
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
													<button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
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
							<!-- akhir modal rincian disposisi surat keluar -->
							<!-- modal proses disposisi-->
							<div class="modal fade <?php echo "prdisk".$value['id_disposisi']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-tittle" align="center">Disposisi</h4>
										</div>
										<div class="modal-body">
											<form method="post" action="?p=disposisi">
												<input type="hidden" name="id_disposisi" value="<?php echo $value['id_disposisi'] ?>">
												<input type="hidden" name="tgl_disposisi" value="<?php echo date('Ymd'); ?>">
												<table class="table-condensed table-hover" align="center">
												<tr>
													<td width="130px">Sifat Surat</td>
													<td>
														<select name="sifat_surat" class="form-control" required="True">
															<option value="a">Rahasia</option>
															<option value="b">Amat Segera</option>
															<option value="c">Penting</option>
															<option value="d" selected>Biasa</option>
														</select>
													</td>
												</tr>
												<tr>
													<td valign="top">Terusan Surat</td>
													<td>
														<textarea name="terusan_surat" class="form-control" placeholder="Terusan Surat" rows="3" cols="30" required="True"></textarea>
													</td>
												</tr>
												<tr>
													<td valign="top">Instruksi</td>
													<td>
														<textarea name="instruksi" class="form-control" placeholder="Instruksi" rows="3" cols="30" required="True"></textarea>
													</td>
												</tr>
												<tr>
													<td colspan="2">
														<input type="submit" name="proses_disposisi" class="btn btn-info" value="Disposisi">
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
							<!-- akhir modal proses disposisi -->
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
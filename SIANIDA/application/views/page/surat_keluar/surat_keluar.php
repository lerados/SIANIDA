		<?php
			if($level['level'] == "a" or $level['level'] == "U"){
		?>
		<table class="kelola" align="center" width="1024">
		<tr>
			<td height="400px" valign="top">
				<div class="col-md-12" align="center">
					<h4>Daftar Pesanan</h4>
				  	<table class="table table-bordered table-condensed table-hover handap luhur2" align="center">
					<?php
						if($ar['surat_akhir'] == 'berhasil'){
							echo "<tr><td colspan='9' align='center'><font color='blue'>".$ar['teks']."</font></td></tr>";
						}
						elseif($ar['surat_akhir'] == 'tidak'){
							echo "<tr><td colspan='9' align='center'><font color='blue'>".$ar['teks']."</font></td></tr>";
						}
						elseif($ar['surat_akhir'] == 'hapus'){
							echo "<tr><td colspan='9' align='center'><font color='red'>".$ar['teks']."</font></td></tr>";
						}
					?>
					<tr style="background-color: #eeeeee;">
						<td width="120px">ID Pesanan</td>
						<td width="160px">Pengirim</td>
						<td width="">Tujuan Surat</td>
						<td width="110px">Tanggal Pesan</td>
						<td width="230px">Aksi</td>
					</tr>
					<?php
						foreach($an as $key => $value){
					?>
					<tr>
						<td><?php echo $value['id_pesanan']; ?></td>
						<td><?php echo $value['pengirim']; ?></td>
						<td><?php echo $value['tujuan_surat']; ?></td>
						<td><?php echo $value['tgl_pesan']; ?></td>
						<td>
							<a href="" data-toggle="modal" data-target=".<?php echo "rcps".$value['id_pesanan']; ?>"><button type="button" class="btn btn-info">Rincian</button></a>
							<a href="" data-toggle="modal" data-target=".<?php echo "prps".$value['id_pesanan']; ?>"><button type="button" class="btn btn-success">Proses</button></a>
							<a href="" data-toggle="modal" data-target=".<?php echo "hpps".$value['id_pesanan']; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
							<!-- modal rincian surat keluar-->
							<div class="modal fade <?php echo "rcps".$value['id_pesanan']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-tittle" align="center">Rincian Surat Pesanan</h4>
										</div>
										<div class="modal-body">
											<table class="table-condensed table-hover" align="center">
											<tr>
												<td width="120px">ID Pesanan</td>
												<td>&nbsp;:&nbsp;</td>
												<td><?php echo $value['id_pesanan']; ?></td>
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
												<td>Pengirim</td>
												<td>&nbsp;:&nbsp;</td>
												<td><?php echo $value['pengirim']; ?></td>
											</tr>
											<tr>
												<td>Tanggal Pesan</td>
												<td>&nbsp;:&nbsp;</td>
												<td><?php echo $value['tgl_pesan']; ?></td>
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
							<!-- akhir modal rincian surat keluar -->
							<!-- modal proses surat keluar-->
							<div class="modal fade <?php echo "prps".$value['id_pesanan']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-tittle" align="center">Surat Keluar</h4>
										</div>
										<div class="modal-body">
											<form method="post" action="?p=surat_keluar">
												<input type="hidden" name="id_sk" value="<?php echo "sk".date('YmdHis'); ?>">
												<input type="hidden" name="id_disposisi" value="<?php echo "disk".date('YmdHis'); ?>">
												<input type="hidden" name="tgl_sk" value="<?php echo date('Ymd'); ?>">
												<input type="hidden" name="id_pesan" value="<?php echo $value['id_pesanan'] ?>">
												<table class="table-condensed table-hover" align="center">
												<tr>
													<td width="120px">ID Surat Keluar</td>
													<td>
														<input type="text" class="form-control" value="<?php echo "sk".date('YmdHis'); ?>" disabled="True">
													</td>
												</tr>
												<tr>
													<td>Tujuan Surat</td>
													<td>
														<input type="text" name="tujuan_surat" class="form-control" value="<?php echo $value['tujuan_surat']; ?>" required="True">
													</td>
												</tr>
												<tr>
													<td>Tanggal Surat</td>
													<td>
														<input type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>" disabled="True" required="True">
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
														<input type="file" name="file" class="form-control">
													</td>
												</tr>
												<tr>
													<td colspan="2">
														<input type="submit" name="proses_pesanan" class="btn btn-info" value="Simpan">
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
							<!-- akhir modal proses surat keluar -->
							<!-- modal hapus surat pesanan -->
							<div class="modal fade <?php echo "hpps".$value['id_pesanan']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-tittle" align="center">Hapus Surat Pesanan</h4>
										</div>
										<div class="modal-body">
											<table class="table-condensed" align="center">
											<tr>
												<td align="center">Anda yakin akan menghapus surat pesanan ?</td>
											</tr>
											<tr>
												<td></td>
											</tr>
											<tr>
												<td align="center">
													<a href="?p=surat_keluar&hapus=1&id=<?php echo $value['id_pesanan']; ?>"><button type="button" class="btn btn-danger">Ya</button></a>
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
							<!-- akhir modal hapus surat pesanan -->
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
		<?php
			if($level['level'] == "a"){
		?>
		<table class="kelola" align="center" width="1024">
		<tr>
			<td height="400px" valign="top">
				<div class="col-md-12" align="center">
					<h4>Kelola User</h4>
					<table border="0" class="col-md-12 luhur" align="left" style="margin-bottom: 10px">
					<tr>
						<td>
							<a href="?p=kelola_user"><button type="button" class="btn btn-primary">Kembali</button></a>
						</td>
					</tr>
					</table>
				  	<table class="table table-bordered table-condensed table-hover handap" align="center">
					<?php
						if($ses['proses'] == 's_edit'){
							echo "<tr><td colspan='9' align='center'><font color='blue'>".$ses['teks']."</font></td></tr>";
						}
						elseif($ses['proses'] == 'berhasil_tambah'){
							echo "<tr><td colspan='9' align='center'><font color='blue'>".$ses['teks']."</font></td></tr>";
						}
					?>
					<tr style="background-color: #eeeeee;">
						<td width="120px">ID</td>
						<td width="80px">Username</td>
						<td width="47px">Level</td>
						<td width="100px">Nama</td>
						<td width="200px">Alamat</td>
						<td width="70px">Jabatan</td>
						<td width="100px">Tanggal Lahir</td>
						<td width="110px">Kontak</td>
						<td width="135px">Aksi</td>
					</tr>
					<?php
						foreach($hat as $key => $value){
					?>
					<tr>
						<td><?php echo $value['id']; ?></td>
						<td><?php echo $value['username']; ?></td>
						<td><?php echo $value['level']; ?></td>
						<td><?php echo $value['nama']; ?></td>
						<td><?php echo $value['alamat']; ?></td>
						<td><?php echo $value['jabatan']; ?></td>
						<td><?php echo $value['tgl_lahir']; ?></td>
						<td><?php echo $value['kontak']; ?></td>
						<td>
							<a href="" data-toggle="modal" data-target=".<?php echo "ed".$value['id']; ?>"><button type="button" class="btn btn-success">Edit</button></a>
							<a href="" data-toggle="modal" data-target=".<?php echo "hp".$value['id']; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
							<!-- modal edit user -->
							<div class="modal fade <?php echo "ed".$value['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-tittle" align="center">Edit User</h4>
										</div>
										<div class="modal-body">
											<form method="post" action="?p=proses_edit_user">
												<input type="hidden" name="aidi" value="<?php echo $value['id']; ; ?>">
												<table class="table-condensed table-hover" align="center">
													<tr>
														<td width="120px">ID</td>
														<td>
															<input type="text" class="form-control" value="<?php echo $value['id']; ?>" disabled="True">
														</td>
													</tr>
													<tr>
														<td>Username</td>
														<td>
															<input type="text" class="form-control" value="<?php echo $value['username']; ?>" disabled="True">
														</td>
													</tr>
													<tr>
														<td>Password</td>
														<td>
															<input type="text" name="pass" class="form-control" value="<?php echo $value['password']; ?>">
														</td>
													</tr>
													<tr>
														<td>Level</td>
														<td>
															<select name="level" class="form-control">
																<option value="<?php echo $value['level']; ?>" selected>
																	<?php
																		if($value['level'] == "K"){
																			echo "Kapus";
																		}
																		elseif($value['level'] == "U"){
																			echo "UP";
																		}
																		elseif($value['level'] == "P"){
																			echo "PT";
																		}
																	?>
																</option>
																<option value="K">Kapus</option>
																<option value="U">UP</option>
																<option value="P">PT</option>
															</select>
														</td>
													</tr>
													<tr>
														<td>Nama</td>
														<td>
															<input type="text" name="nama" class="form-control" value="<?php echo $value['nama']; ?>" required="True">
														</td>
													</tr>
													<tr>
														<td>Alamat</td>
														<td>
															<textarea name="alamat" class="form-control" rows="3" required="True"><?php echo $value['alamat']; ?></textarea>
														</td>
													</tr>
													<tr>
														<td>Jabatan</td>
														<td>
															<select name="jabatan" class="form-control">
																<option value="<?php echo $value['jabatan']; ?>" selected><?php echo $value['jabatan']; ?></option>
																<option value="Kepala Persuratan">Kepala Persuratan</option>
																<option value="Unit Persuratan">Unit Persuratan</option>
																<option value="Pejabat Terkait">Pejabat Terkait</option>
															</select>
														</td>
													</tr>
													<tr>
														<td>Tanggal Lahir</td>
														<td>
															<input type="date" name="tgl_lahir" class="form-control" value="<?php echo $value['tgl_lahir']; ?>" required="True">
														</td>
													</tr>
													<tr>
														<td>Kontak</td>
														<td>
															<input type="text" name="kontak" class="form-control" value="<?php echo $value['kontak']; ?>" required="True">
														</td>
													</tr>
													<tr>
														<td colspan="2">
															<input type="submit" class="btn btn-info" name="user_edit" value="Simpan">
															<input type="reset" class="btn btn-warning" value="Reset">
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
							<!-- akhir modal edit user -->
							<!-- modal hapus user -->
							<div class="modal fade <?php echo "hp".$value['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-tittle" align="center">Hapus User</h4>
										</div>
										<div class="modal-body">
											<table class="table-condensed" align="center">
												<tr>
													<td align="center">Anda yakin akan menghapus user ?</td>
												</tr>
												<tr>
													<td align="center">
														<a href="?p=proses_hapus_user&id=<?php echo $value['id']; ?>"><button type="button" class="btn btn-danger">Ya</button></a>
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
							<!-- akhir modal hapus user -->
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
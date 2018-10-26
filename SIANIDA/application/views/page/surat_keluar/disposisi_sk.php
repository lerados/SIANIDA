		<?php
			if($level['level'] == "a" or $level['level'] == "U"){
		?>
		<table class="kelola" align="center" width="1024">
		<tr>
			<td height="400px" valign="top">
				<div class="col-md-12" align="center">
					<h4>Surat Keluar</h4>
				  	<form method="post" action="?p=surat_keluar">
					  	<table class="table-condensed handap luhur2" align="center">
						<?php
							foreach($an as $key => $value){
						?>
						<tr>
							<td align="center">
								Mintai disposisi surat ?
								<input type="hidden" name="id_sk" value="<?php echo $value['id_sk']; ?>">
								<input type="hidden" name="id_disposisi" value="<?php echo $value['id_disposisi']; ?>">
							</td>
						</tr>
						<tr>
							<td></td>
						</tr>
						<tr>
							<td align="center">
								<input type="submit" name="surat_keluar_y" class="btn btn-info" value="Ya">
								<input type="submit" name="surat_keluar_t" class="btn btn-warning" value="Tidak">
							</td>
						</tr>
						<?php
						}
						?>
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
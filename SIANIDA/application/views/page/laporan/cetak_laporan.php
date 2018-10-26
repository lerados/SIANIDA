<table border="0" class="table-condensed handap luhur2" align="center" width="800px">
<tr>
	<td>
		<table class="" align="center">
		<tr>
			<td>
				<table align="center">
				<tr>
					<td>
						<table border="0" class="table-condensed handap luhur2" align="center" width="700px">
						<tr>
							<td align="center" colspan="7"><font size="4"><b>LAPORAN PERIODE</b></font></td>
						</tr>
						<tr>
							<td align="center" colspan="7"><font size="4"><b>UNIT PERSURATAN DI PPPPTK CIANJUR</b></font></td>
						</tr>
						<tr>
							<td align="center" colspan="7">
								<?php echo $tanggal['awal']; ?> s/d <?php echo $tanggal['akhir']; ?>
							</td>
						</tr>
						<tr>
							<td colspan="7"><hr></td>
						</tr>
						<tr>
							<td colspan="7">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="7">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berikut rincian laporan periode unit persuratan Pusat Pengembangan dan Pemberdayaan Pendidik dan Tenaga Kependidikan Cianjur :
							</td>
						</tr>
						<tr>
							<td colspan="7">&nbsp;</td>
						</tr>
						<tr>
							<td>Jumlah Surat Masuk</td>
							<td>:</td>
							<td>
								<?php
									foreach($sm as $key => $value){
										echo $value['id_esm'];
									}
								?>
							</td>
							<td width="200px">&nbsp;</td>
							<td>Jumlah Surat Keluar</td>
							<td>:</td>
							<td>
								<?php
									foreach($sk as $key => $value){
										echo $value['id_esk'];
									}
								?>
							</td>
						</tr>
						<tr>
							<td>Jumlah Surat Masuk Yang Didisposisi</td>
							<td>:</td>
							<td>
								<?php
									foreach($dsm as $key => $value){
										echo $value['id_desm'];
									}
								?>
							</td>
							<td>&nbsp;</td>
							<td>Jumlah Surat Keluar Yang Didisposisi</td>
							<td>:</td>
							<td>
								<?php
									foreach($dsk as $key => $value){
										echo $value['id_desk'];
									}
								?>
							</td>
						</tr>
						<tr>
							<td colspan="7" align="center" height="70px"></td>
						</tr>
						<tr>
							<td colspan="7" align="center">
								Jumlah Surat :
								<?php
									foreach($sm as $key => $value){
										$smv =  $value['id_esm'];
									}
									foreach($sk as $key => $value){
										$skv =  $value['id_esk'];
									}
									echo $smv+$skv;
								?>
							</td>
						</tr>
						<tr>
							<td colspan="7" align="center">
								Jumlah Surat Didisposisi :
								<?php
									foreach($dsm as $key => $value){
										$smdv =  $value['id_desm'];
									}
									foreach($dsk as $key => $value){
										$skdv =  $value['id_desk'];
									}
									echo $smdv+$skdv;
								?>
							</td>
						</tr>
						<tr>
							<td colspan="7" align="center" height="50px"></td>
						</tr>
						<tr>
							<td colspan="7" align="right">Cianjur, <?php echo $tanggal['laporan']; ?></td>
						</tr>
						<tr>
							<td colspan="7" align="center" height="50px"></td>
						</tr>
						<tr>
							<td colspan="7" align="right">Unit Persuratan</td>
						</tr>
						</table>
					</td>
				</tr>
				</table>
			</td>
		</tr>
		</table>
	</td>
</tr>
</table>
<script type="text/javascript">window.print();</script>
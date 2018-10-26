		<table class="table-bordered kelola" align="center" width="1024">
		<tr>
			<td height="400px">
				<div class="col-md-12" align="center">
					<h4>Login</h4>
					<br>
					<?php
						if($gag['id'] == "salah"){
							echo "<font color='red'>".$gag['salah']."</font>";
						}
					?>
					<form method="post" action="<?php echo base_url('?p=login'); ?>">
						<table border="0" class="table-condensed" align="center">
						<tr>
							<td><input type="text" name="user" class="form-control" placeholder="Username" required="true"></td>
						</tr>
						<tr>
							<td><input type="password" name="pass" class="form-control" placeholder="Password" required="true"></td>
						</tr>
						<tr>
							<td align="center"><input type="submit" name="slogin" class="btn btn-primary" value="Login"></td>
						</tr>
						</table>
					</form>
				</div>
			</td>
		</tr>
		</table>
	</div>
</div>
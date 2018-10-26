		<div class="modal fade login" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-tittle" align="center">Login</h4>
					</div>
					<div class="modal-body">
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
					<div class="modal-footer">
						<!-- kaki -->
					</div>
				</div>
			</div>
		</div>
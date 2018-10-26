<div class="container">
	<div class="row">
		<table align="center" width="1024px">
		<tr>
			<td>
				<?php
					if($level['level'] == "a"){
				?>
				<nav class="navbar" role="navigation" style="background-color: #77d21e">
					<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand" href="?p=home"><font color="white">SIANIDA</font></a>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li><a href="?p=home"><font color="white">Home</font></a></li>
								<li><a href="?p=surat_masuk"><font color="white">Surat Masuk</font></a></li>
								<li><a href="?p=surat_keluar"><font color="white">Surat Keluar</font></a></li>
								<li><a href="?p=kelola_surat"><font color="white">Kelola Surat</font></a></li>
								<li><a href="?p=kelola_user"><font color="white">Kelola User</font></a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="?p=logout"><font color="white">Logout</font></a></li>
							</ul>
						</div>
					</div>
				</nav>
				<?php
					}
					elseif($level['level'] == "K"){
				?>
				<nav class="navbar" role="navigation" style="background-color: #77d21e">
					<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand" href="?p=home"><font color="white">SIANIDA</font></a>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li><a href="?p=home"><font color="white">Home</font></a></li>
								<li><a href="?p=disposisi"><font color="white">Disposisi</font></a></li>
								<li><a href="?p=laporan"><font color="white">Laporan</font></a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="?p=logout"><font color="white">Logout</font></a></li>
							</ul>
						</div>
					</div>
				</nav>
				<?php
					}
					elseif($level['level'] == "U"){
				?>
				<nav class="navbar" role="navigation" style="background-color: #77d21e">
					<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand" href="?p=home"><font color="white">SIANIDA</font></a>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li><a href="?p=home"><font color="white">Home</font></a></li>
								<li><a href="?p=surat_masuk"><font color="white">Surat Masuk</font></a></li>
								<li><a href="?p=surat_keluar"><font color="white">Surat Keluar</font></a></li>
								<li><a href="?p=kelola_surat"><font color="white">Kelola Surat</font></a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="?p=logout"><font color="white">Logout</font></a></li>
							</ul>
						</div>
					</div>
				</nav>
				<?php
					}
					elseif($level['level'] == "P"){
				?>
				<nav class="navbar" role="navigation" style="background-color: #77d21e">
					<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand" href="?p=home"><font color="white">SIANIDA</font></a>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li><a href="?p=home"><font color="white">Home</font></a></li>
								<li><a href="?p=pesan_surat"><font color="white">Pesan Surat</font></a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="?p=logout"><font color="white">Logout</font></a></li>
							</ul>
						</div>
					</div>
				</nav>
				<?php
					}
					else{
				?>
				<nav class="navbar" role="navigation" style="background-color: #77d21e">
					<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand" href="?p=home"><font color="white">SIANIDA</font></a>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="" data-toggle="modal" data-target=".login"><font color="white">Login</font></a></li>
							</ul>
						</div>
					</div>
				</nav>
				<?php
					}
				?>
			</td>
		</tr>
		</table>
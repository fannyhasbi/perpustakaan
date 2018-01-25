
			<div class="jumbotron alert-danger">
				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-6">
						<form method="POST" action="<?php echo site_url('admin/hapus/buku/'.$buku['id_buku']);?>">
							<table class="table">
								<tr>
									<th>ID</th>
									<td><?php echo $buku['id_buku'];?></td>
								</tr>
								<tr>
									<th>Judul</th>
									<td><?php echo $buku['judul_buku'];?></td>
								</tr>
								<tr>
									<th>Pengarang</th>
									<td><?php echo $buku['pengarang'];?></td>
								</tr>
								<tr>
									<th>Jumlah</th>
									<td><?php echo $buku['jumlah'];?></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" class="btn btn-danger" name="hapus" value="Hapus"></td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>

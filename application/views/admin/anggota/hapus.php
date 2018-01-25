
			<div class="jumbotron alert-danger">
				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-6">
						<form method="POST" action="<?php echo site_url('admin/hapus/anggota/'.$anggota['id_anggota']);?>">
							<table class="table">
								<tr>
									<th>ID</th>
									<td><?php echo $anggota['id_anggota'];?></td>
								</tr>
								<tr>
									<th>Username</th>
									<td><?php echo $anggota['username'];?></td>
								</tr>
								<tr>
									<th>Nama</th>
									<td><?php echo $anggota['nama'];?></td>
								</tr>
								<tr>
									<th>Total pinjam</th>
									<td><?php echo $anggota['jumlah_pinjam'];?></td>
								</tr>
								<tr>
									<th>Status</th>
									<td>
										
									<?php
									$message = ($anggota['status'] == 1 ? "Aktif" : "Nonaktif");
									echo $message;
									?>

									</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<input type='submit' class='btn btn-warning' name='nonaktif_anggota' value='Nonaktif' <?php if($anggota['status'] != 1) echo 'disabled'; ?>>
										<input type="submit" class="btn btn-danger" name="hapus_anggota" value="Hapus">
									</td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>

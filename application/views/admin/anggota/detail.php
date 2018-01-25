
			<div class="text-center">
				<h2><?php echo $title;?></h2>
			</div>

			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>ID pinjam</th>
								<th>Judul buku</th>
								<th>Tanggal pinjam</th>
								<th>Tanggal kembali</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>

							<?php foreach($anggota as $details): ?>
								
							<tr <?php if($details['status'] == 'kembali') echo "class='success'";?>>
								<td><?php echo $details['id_pinjam'];?></td>
								<td><?php echo $details['judul_buku'];?></td>
								<td><?php echo $details['tgl_pinjam'];?></td>
								<td><?php echo $details['tgl_kembali'];?></td>
								<td><?php echo $details['status'];?></td>
								<td>
									
								<?php
								if($details['status'] == 'belum'){
									echo "<a href='kembali/". $details['id_pinjam'] . "' class='btn btn-primary'>Kembalikan</a>";
								} else {
									echo "Sudah dikembalikan";
								}
								?>

								</td>
							</tr>
							<?php endforeach; ?>

						</tbody>
					</table>
				</div>
			</div>

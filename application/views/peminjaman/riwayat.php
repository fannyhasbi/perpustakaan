
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
							<?php foreach($pinjam as $items):
								if($items['status'] == 'kembali'){
									$class = " class='success'";
								} else if($items['jangka_pinjam'] > 14){
									$class = " class='warning'";
								} else $class = '';
							?>

							<tr<?php echo $class;?>>
								<td><?php echo $items['id_pinjam'];?></td>
								<td><?php echo $items['judul_buku'];?></td>
								<td><?php echo $items['tgl_pinjam'];?></td>
								<td><?php echo $items['tgl_kembali'];?></td>
								<td><?php echo $items['status'];?></td>
								<td>
									
								<?php
								if($items['status'] == 'belum'){
									echo "<a href='kembali/". $items['id_pinjam'] . "' class='btn btn-primary'>Kembalikan</a>";
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

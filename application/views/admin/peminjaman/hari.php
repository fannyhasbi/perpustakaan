
			<table class="table table-striped table-bordered">
				<tr>
					<th class="text-center">Tanggal</th>
					<th class="text-center">Jumlah Pinjam</th>
				</tr>

				<?php foreach($peminjaman as $items): ?>

				<tr>
					<td><?php echo $items['tanggal'];?></td>
					<td><?php echo $items['jumlah_pinjam'];?></td>
				</tr>

				<?php endforeach; ?>
			</table>

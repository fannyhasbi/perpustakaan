
			<table class="table table-striped table-bordered">
				<tr>
					<th class="text-center">Tahun</th>
					<th class="text-center">Jumlah Pinjam</th>
				</tr>

				<?php foreach($peminjaman as $items): ?>

				<tr>
					<td><?php echo $items['tahun'];?></td>
					<td><?php echo $items['jumlah_pinjam'];?></td>
				</tr>

				<?php endforeach; ?>
			</table>

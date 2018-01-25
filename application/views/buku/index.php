
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No.</th>
						<th>Judul</th>
						<th>Pengarang</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					
					$no = 1;
					foreach($buku as $items):
					?>

					<tr>
						<td><?php echo $no ?></td>
						<td><a href="<?php echo site_url('buku/'.$items['slug']);?>"><?php echo $items['judul_buku'];?></a></td>
						<td><?php echo $items['pengarang'] ?></td>
					  <td>
					  	<a href="<?php echo site_url('pinjam/'.$items['slug']);?>" class='btn btn-sm btn-primary'>Pinjam</a>
					  </td>
					</tr>
					
					<?php
					$no++;
					endforeach;
					?>

				</tbody>
			</table>


			<table class="table table-striped">
				<tr>
					<th>ID</th>
					<th>Judul</th>
					<th>Pengarang</th>
					<th>Jumlah</th>
					<th>Aksi</th>
				</tr>
				<?php foreach($buku as $items): ?>
					<tr>
						<td><?php echo $items['id_buku'];?></td>
						<td><?php echo $items['judul_buku'];?></td>
						<td><?php echo $items['pengarang'];?></td>
						<td><?php echo $items['jumlah'];?></td>
						<td><a href="<?php echo site_url('admin/edit/buku/'.$items['id_buku']);?>" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a> <a href="<?php echo site_url('admin/hapus/buku/'.$items['id_buku']);?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a></td>
					</tr>
				<?php endforeach; ?>
				
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><a href="<?php echo site_url('admin/buku/tambah');?>" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Tambah</a></td>
				</tr>
			</table>

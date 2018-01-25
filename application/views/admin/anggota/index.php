
			<table class="table">
				<tr>
					<th class="text-center">ID</th>
					<th class="text-center">Username</th>
					<th class="text-center">Nama Lengkap</th>
					<th class="text-center">Total Pinjam</th>
					<th class="text-center">Status</th>
					<th class="text-center">Aksi</th>
				</tr>
				
				<?php
				foreach($anggota as $items):
					 $message = ($items['status'] == 1 ? 'Aktif' : "<a href='". site_url('admin/aktif/anggota/'.$items['id_anggota']) ."'>Nonaktif</a>");
				?>

					<tr <?php if($items['status'] != 1) echo "class='alert-warning'" ?>>
						<td class="text-center"><?php echo $items['id_anggota'];?></td>
						<td class="text-center"><?php echo $items['username'];?></td>
						<td class="text-center"><?php echo $items['nama'];?></td>
						<td class="text-center"><a href="<?php echo site_url('admin/anggota/'.$items['id_anggota']);?>"><?php echo $items['jumlah_pinjam'];?></a></td>
						<td class="text-center"><?php echo $message; ;?></td>
						<td class="text-center">
							<a href="<?php echo site_url('admin/edit/anggota/'.$items['id_anggota']);?>" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a>
							<a href="<?php echo site_url('admin/hapus/anggota/'.$items['id_anggota']);?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
						</td>
					</tr>

				<?php endforeach; ?>
			
			</table>

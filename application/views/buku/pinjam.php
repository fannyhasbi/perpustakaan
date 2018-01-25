
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-6">
					<table class="table">
						<tr>
							<th>Judul buku</th>
							<td><?php echo $buku['judul_buku'];?></td>
						</tr>
						<tr>
							<th>Peminjam</th>
							<td><?php echo $this->session->userdata('username');?></td>
						</tr>
						<tr>
							<th>Tanggal pinjam</th>
							<td><?php echo date('Y-m-d');?></td>
						</tr>
						<tr>
							<td><a href="<?php echo site_url('pinjam/buku/'.$buku['id_buku']);?>" class="btn btn-primary">Pinjam</a></td>
						</tr>
					</table>
				</div>
			</div>

			<script>
				
			</script>

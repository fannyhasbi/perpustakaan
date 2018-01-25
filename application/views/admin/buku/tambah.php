
			<form method="post" action="<?php echo site_url('admin/buku/tambah');?>" class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-2" for="judul">Judul</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="judul" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="pengarang">Pengarang</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="pengarang" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="deskripsi">Deskripsi</label>
					<div class="col-sm-6">
						<textarea class="form-control" name="deskripsi" required></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="jumlah">Jumlah</label>
					<div class="col-sm-6">
						<input type="number" class="form-control" name="jumlah" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-6">
						<input type="submit" class="btn btn-primary" name="tambah_buku" value="Tambah">
					</div>
				</div>

				<?php
				if($success != NULL){
					echo "<div class='alert alert-success'>". $success ."</div>";
				}
				?>

			</form>

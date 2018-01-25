
			<form method="post" action="<?php echo site_url('admin/edit/buku/'.$buku['id_buku']);?>" class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-2" for="id_buku">ID buku</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" value="<?php echo $buku['id_buku'];?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="judul">Judul</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="judul" value="<?php echo $buku['judul_buku'];?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="pengarang">Pengarang</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="pengarang" value="<?php echo $buku['pengarang'];?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="deskripsi">Deskripsi</label>
					<div class="col-sm-6">
						<textarea class="form-control" name="deskripsi" required><?php echo $buku['deskripsi'];?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="jumlah">Jumlah</label>
					<div class="col-sm-6">
						<input type="number" class="form-control" name="jumlah" value="<?php echo $buku['jumlah'];?>" required>
					</div>
				</div>
				
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-6">
						<input type="submit" class="btn btn-primary" name="edit_buku" value="Update">
					</div>
				</div>

				<?php
				if($success != NULL){
					echo "<div class='alert alert-success'>". $success ."</div>";
				}
				?>

			</form>

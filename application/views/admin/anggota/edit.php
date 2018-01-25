
			<form method="post" action="<?php echo site_url('admin/edit/anggota/'.$anggota['id_anggota']);?>" class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-2" for="id_anggota">ID anggota</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" value="<?php echo $anggota['id_anggota'];?>" name="id_anggota" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="username">Username</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="username" value="<?php echo $anggota['username'];?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="nama">Nama</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="nama" value="<?php echo $anggota['nama'];?>" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-6">
						<input type="submit" class="btn btn-primary" name="edit_anggota" value="Update">
						<input type="submit" class="btn btn-warning" name="reset_pass" value="Reset password">
					</div>
				</div>

				<?php
				if($success != NULL){
					echo "<div class='alert alert-success'>". $success ."</div>";
				}
				?>

			</form>

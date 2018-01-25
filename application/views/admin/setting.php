
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-6">
					<form method="POST" action="<?php echo site_url('admin/setting');?>">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" value="<?php echo $admin['username'];?>" disabled>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" name="password" required>
						</div>
						<div class="form-group">
							<label for="password2">Ulangi password</label>
							<input type="password" class="form-control" name="password2" required>
						</div>	
						<?php
						if($error != NULL){
							echo "<div class='alert alert-danger'>". $error ."</div>";
						} else if($success != NULL){
							echo "<div class='alert alert-success'>". $success ."</div>";
						}
						?>	
						<input type="submit" class="btn btn-primary" name="ubah_pass" value="Simpan">
					</form>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-6"></div>
			</div>

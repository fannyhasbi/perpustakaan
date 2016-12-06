<?php
if(isset($_SESSION['login'])){
?>
<nav class="navbar navbar-fixed-top navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<a href="index.php" class="navbar-brand">PERPUS ONLINE</a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigasi">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="navigasi">
			<?php
			if($_SERVER['PHP_SELF'] == "/perpustakaan/index.php"){
			?>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="buku.php">BUKU</a></li>
				<li><a href='pinjam.php'>PINJAM</a></li>
			</ul>
			<?php
			}
			if($_SERVER['PHP_SELF'] != "/perpustakaan/index.php"){
			?>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown"><a href="#" data-toggle="dropdown"><?php echo $_SESSION['n_depan'];?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="pinjam.php">Pinjam</a></li>
						<li><a href="buku.php">Buku</a></li>
						<li class="divider"></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</li>
			</ul>
			<?php
			}
			?>
		</div>
	</div>
</nav>
<?php
}
?>
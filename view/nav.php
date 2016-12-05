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
			<ul class="nav navbar-nav navbar-right">
				<li><a href="buku.php">BUKU</a></li>
				<li><a href='pinjam.php'>PINJAM</a></li>
				<li><a href='logout.php'>LOGOUT</a></li>
			</ul>
		</div>
	</div>
</nav>
<?php
}
?>
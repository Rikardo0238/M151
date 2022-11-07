<?php
	include("header.php");
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
		<a class="navbar-brand" href="index.php">Rikardo.ch</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-link" href="index.php">Startseite</a>
				<a class="nav-link active" href="sitemap.php">Sitemap</a>
				<a class="nav-link" href="profile.php">Profil</a>
			</div>
			<?php
				if(isset($_SESSION["email"]) && isset($_SESSION["password"])) {
					echo "<a class='btn btn-outline-light' href='cart.php'>Einkaufswagen</a>";
				} else {
					echo "<a class='btn btn-outline-light' href='login.php'>Login</a>";
				}
			?>
		</div>
	</div>
</nav>

<div class="container title text-center">
	<h3>Sitemap</h3>
</div>

<div class="container belowtitle text-center">
	<p>Behalte die Orientierung.</p>
</div>

<div class="container d-flex justify-content-center">
	<ul>
		<li><a href="index.php" class="link-dark">Home</a></li>
		<li><a href="sitemap.php" class="link-dark">Sitemap</a></li>
		<li><a href="cart.php" class="link-dark">Einkaufswagen</a></li>
		<li><a href="profile.php" class="link-dark">Profil</a></li>
		<li><a href="login.php" class="link-dark">Login</a></li>
		<li><a href="signup.php" class="link-dark">Registrieren</a></li>
	</ul>
</div>

<?php
	include("footer.php");
?>
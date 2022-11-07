<?php
    include("header.php");

    if ($_SESSION["email"] == "" || $_SESSION["password"] == "") {
        header("Location: login.php");
    }
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
				<a class="nav-link" href="sitemap.php">Sitemap</a>
				<a class="nav-link active" href="profile.php">Profil</a>
			</div>
			<a class="btn btn-outline-light" href="cart.php">Einkaufswagen</a>
		</div>
	</div>
</nav>

<div class="container title text-center">
    <h3>Profil</h3>
</div>

<div class="container belowtitle text-center">
    <p>Das sind sie.</p>
</div>

<div class="container text-center">
    <p><b>E-Mail Adresse:</b> <?php echo $_SESSION["email"]; ?></p>
    <p><b>Passwort:</b> ********</p>
</div>

<?php
    include("footer.php");
?>
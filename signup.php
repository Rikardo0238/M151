<?php
	include "header.php";

	if (isset($_SESSION["email"]) && isset($_SESSION["password"])) {
        header("Location: profile.php");
		exit;
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
				<a class="nav-link" href="profile.php">Profil</a>
			</div>
			<a class='btn btn-outline-light' href='login.php'>Login</a>
		</div>
	</div>
</nav>

<div class="container title text-center">
    <h3>Registrieren</h3>
</div>

<div class="container belowtitle text-center">
    <p>Erstelle ein Konto.</p>
</div>

<div class="container d-flex justify-content-center">
	<form action="controller/dbsignup.php" method="post">
		<div class="form-group">
			<label for="email">E-Mail</label>
			<input type="email" class="form-control" name="email" placeholder="E-Mail Adresse eingeben" autocomplete="off" required>
			<small class="form-text text-muted">*Pflichtfeld</small>
		</div><br>
		<div class="form-group">
			<label for="password">Passwort</label>
			<input type="password" class="form-control" name="password" placeholder="Passwort eingeben" autocomplete="off" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Mindestens eine Nummer, ein Grossbuchstabe, ein Kleinbuchstabe und insgesamt 8 Zeichen.">
			<small class="form-text text-muted">*Pflichtfeld</small>
		</div><br>
		<div class="text-center">
			<button type="submit" class="btn btn-outline-dark">Registrieren</button>
		</div>
	</form>
</div>

<div class="text-center">
	<a href="login.php" class="link-dark">Besitzt schon ein Konto?</a>
</div>

<div class="text-center">
	<?php
		if(isset($_SESSION["accountexists"])) {
			echo "Ein Konto mit dieser E-Mail existiert bereits, bitte verwenden Sie eine andere.";
		}
	?>
</div>

<?php
	include("footer.php");
?>
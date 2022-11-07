<?php
    include("header.php");

	if (isset($_SESSION["email"]) && isset($_SESSION["password"])) {
        header("Location: profile.php");
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
			<a class='btn btn-light' href='login.php'>Login</a>
		</div>
	</div>
</nav>

<div class="container title text-center">
    <h3>Login</h3>
</div>

<div class="container belowtitle text-center">
    <p>Melde dich an.</p>
</div>

<div class="container d-flex justify-content-center">
	<form action="controller/validatelogin.php" method="post">
		<div class="form-group">
			<label for="email">E-Mail</label>
			<input type="email" class="form-control" name="email" placeholder="E-Mail Adresse eingeben" autocomplete="off" required>
			<small class="form-text text-muted">*Pflichtfeld</small>
		</div><br>
		<div class="form-group">
			<label for="password">Passwort</label>
			<input type="password" class="form-control" name="password" placeholder="Passwort eingeben" autocomplete="off" required>
			<small class="form-text text-muted">*Pflichtfeld</small>
		</div><br>
		<div class="text-center">
			<button type="submit" class="btn btn-outline-dark">Anmelden</button>
		</div>
	</form>
</div>

<div class="text-center">
	<a href="signup.php" class="link-dark">Noch kein Konto?</a>
</div>

<?php
    include("footer.php");
?>
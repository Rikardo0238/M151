<?php
	include("header.php");

	$products = array(
		array("view/bilder/iphone12promax.png", "iPhone 12 Pro Max", 800),
		array("view/bilder/iphone13pro.png", "iPhone 13 Pro", 1000),
		array("view/bilder/samsungs22.png", "Samsung S22", 800),
		array("view/bilder/harpoon.png", "Corsair Harpoon RGB", 40),
		array("view/bilder/voidrgbelite.png", "Corsair VOID RGB Elite", 150),
		array("view/bilder/mm350.png", "Corsair MM350 Premium", 25),
		array("view/bilder/acerk3.png", "Acer K3", 200),
		array("view/bilder/surface.png", "Microsft Surface", 600),
		array("view/bilder/xbox.png", "XBOX Controller", 69),
	);

	if(!isset($_SESSION["cart"])) {
		$_SESSION["cart"] = array();
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
				<a class="nav-link active" href="index.php">Startseite</a>
				<a class="nav-link" href="sitemap.php">Sitemap</a>
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
	<h3>Willkommen zu meinem Online-Shop!</h3>
</div>

<div class="container belowtitle text-center">
	<p>Sieh dich ruhig um.</p>
</div>

<div class="container text-center">
	<div class="row justify-content-center">
		<?php 
			for($row = 0; $row < sizeof($products); $row++) {
				echo "
					<div class='col-auto mb-3'>
						<div class='card'>
							<a href='".$products[$row][0]."' target='_blank'><img class='card-img-top' src='".$products[$row][0]."'alt='Card image'></a>
							<div class='card-body'>
								<h5 class='card-title'>".$products[$row][1]."</h5>
								<p class='card-text'>".$products[$row][2]." Fr.</p>";

				if(isset($_REQUEST["addToCart$row"])) {
					if(isset($_SESSION["email"]) && isset($_SESSION["password"])) {
						array_push($_SESSION["cart"], $products[$row]);
					} else {
						header("Location: login.php");
					}
				}

				echo "
								<form method='post'>
									<input type='submit' name='addToCart$row' class='btn btn-dark' value='Zum Einkaufswagen hinzufügen'/>
								</form>
							</div>
						</div>
					</div>";
			}
		?>
	</div>
</div>

<?php
	include("footer.php");
?>
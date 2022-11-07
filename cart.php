<?php
    include("header.php");

    if($_SESSION["email"] == "" || $_SESSION["password"] == "") {
        header("Location: login.php");
    }

	if(isset($_REQUEST["emptyCart"])) {
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
				<a class="nav-link" href="index.php">Startseite</a>
				<a class="nav-link" href="sitemap.php">Sitemap</a>
				<a class="nav-link" href="profile.php">Profil</a>
			</div>
			<a class='btn btn-light' href='cart.php'>Einkaufswagen</a>
		</div>
	</div>
</nav>

<div class="container title text-center">
    <h3>Einkaufswagen</h3>
</div>

<div class="container belowtitle text-center">
    <p>Sehen sie sich Ihren Einkaufswagen an.</p>
</div>

<div class="container text-center">
	<div class="row justify-content-center">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="produkt">Produkt</th>
					<th class="price">Preis</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$sum = 0;
				for($row = 0; $row < sizeof($_SESSION["cart"]); $row++) {
					$sum = $sum + $_SESSION["cart"][$row][2];
					echo "
						<tr>
							<td>".$_SESSION["cart"][$row][1]."</td>
							<td>".$_SESSION["cart"][$row][2]."</td>
						</tr>";
				}
				echo "
					</tbody>
					<tfoot>
						<tr>
							<th>Summe</th>
							<th>".$sum."</th>
						</tr>
					</tfoot>";
			?>
		</table>
	</div>

	<form method='post'>
		<input type='submit' name='emptyCart' class='btn btn-dark' value='Einkaufswagen leeren'/>
	</form>
</div>

<?php
    include("footer.php");
?>
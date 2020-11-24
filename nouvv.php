<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="accueil_css.css"/>
		<title>Buvettes</title>
	</head>	
	<body>
		<header>
		<h1>
			<img src="img/logo_toutpetit.jpg" class="logo_toutpetit" alt="logo" />
			Buvettes : l'application de gestion des buvettes du festival
		</br></h1>
		
		<nav class="menu">
  			<ul>
  				<li class="nouveautés"><a href="accueil.php"> Nouveautés </a></li>
  				<li><a href="statistiques.php"> Statistiques </a></li>
  				<li><a href="recherchemembres.php"> Recherche membres </a></li>
  				<li><a href="affectations.php"> Affectations </a></li>
  				<li><a href="prive.php"> Administrateur </a></li>
  			</ul>
  		</nav>
  		</header>
  		</br></br></br></br></br></br></br></br></br></br></br></br>
  	<?php
	require_once('Connect.php');
	$dbh = connection();
	?>
	<form method="post" action="insertion.php">
			<h1>Entrer un nouveau volontaire</h1>
			<fieldset>
				<legend class="legend">Entrer le prénom et le nom du nouveau volontaire</legend></br>
				<label>Volontaire: </label><input type="text" name="nomvo" placeholder="Ex: Alex TERIEUR">
			</fieldset>
			</br></br>
			<fieldset>
				<legend class="legend">Entrer l'age du nouveau volontaire</legend></br>
				<label>Age: </label><input type="number" name="agevo" min="0" max="100">
			</fieldset>
			</br></br>
			<input type="submit" value="Valider">
			</br></br>
		</form>
</body>
	<footer>
		</br></br>Pied de page
	</footer>
</html>
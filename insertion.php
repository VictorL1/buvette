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
  	<?php
	require_once('fonctions.php');
	if (!empty($_POST['NomBuv']))  
	{
		$nombu = $_POST['NomBuv'];
		$emp = $_POST['EmpBu'];
		$nomres = $_POST['NomPr'];
		InsertBuvette ($nombu,$emp,$nomres);
	}
	if (!empty($_POST['nomvo']))
	{
		$nomvo = $_POST['nomvo'];
		$voage = $_POST['agevo'];
		InsertVolontaire($nomvo,$voage);
	}
	if (!empty($_POST['dateMa']))
	{
		$date = $_POST['dateMa'];
		$e1 = $_POST['eq1'];
		$e2 = $_POST['eq2'];
		InsertMatchs($date,$e1,$e2);
	}
	if (!empty($_POST['adateMa']))
	{
		$adate = $_POST['adateMa'];
		$nouvD = $_POST['dateMa'];
		$e1 = $_POST['eq1'];
		$e2 = $_POST['eq2'];
		UpdateMatchs($adate,$nouvD,$e1,$e2);
	}
	?>
	</body>
	<footer>
		</br></br>Pied de page
	</footer>
</html>
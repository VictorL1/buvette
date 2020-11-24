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
  		</br></br></br></br></br></br></br></br></br></br></br>
  	<?php
    require_once('Connect.php');
    $dbh = connection();
    ?>
	<h3><U>Choisissez votre formulaire</U></h3></br></br>
		
        <a href="nouvresp.php" target="_blank"> <input type="button" value="Nouveau responsable"> </a></br></br>
	
        <a href="nouvvol.php" target="_blank"> <input type="button" value="Nouveau volontaire à une buvette"> </a></br></br>
	
        <a href="nouvbu.php" target="_blank"> <input type="button" value="Nouvelle buvette ouverte"> </a></br></br>
	  
	</body>
	<footer>
		</br></br>Pied de page
	</footer>
</html>
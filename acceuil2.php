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
				</br>
			</h1>
			
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
	  	</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
	  	
		<FORM>
		<SELECT name="nom" size="1">
			<OPTION value="<?php $nmatchs=1; ?>">Matchs 1
			<OPTION value="<?php $nmatchs=2; ?>">Matchs 2
			<OPTION value="<?php $nmatchs=3; ?>">Matchs 3
			<OPTION value="<?php $nmatchs=4; ?>">Matchs 4
			<OPTION value="<?php $nmatchs=5; ?>">Matchs 5
			<OPTION value="<?php $nmatchs=6; ?>">Matchs 6
			<OPTION value="<?php $nmatchs=7; ?>">Matchs 7
			<OPTION value="<?php $nmatchs=8; ?>">Matchs 8
			<OPTION value="<?php $nmatchs=9; ?>">Matchs 9
			<OPTION value="<?php $nmatchs=10; ?>">Matchs 10
		</SELECT>
		<?php
		require_once('fonctions.php');
		$dbh = connection();
		AfficheMatch();
		?>

		</br></br></br></br></br></br>
		</FORM>
	    
	</body>

	<footer>
		</br></br>Pied de page
	</footer>
</html>
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
  	<h3 align="center">Entrer pour rechercher un membre</h3>

		<form align="center" id="formRecherche" name="formRecherche" method="post" action="resultrecherchemembres.php">
		<p>
				Âge minimum:
				<br/>
				<input type="text" name="agembmin_saisi" id="agembmin_saisi" placeholder =" + de 16" required />
		</p>
			
			<input type=submit value="Valider"/>
		</form>
		
		<form align="center" id="formRecherche" name="formRecherche" method="post" action="resultrecherchemembres.php">
			<p>
				Âge maximum:
				<br/>
				<input type="text" name="agembmax_saisi" id="agembmax_saisi" placeholder =" - de 50" required />
			</p>
			
			<input type=submit value="Valider"/>
		</form>
		<form align="center" id="formRecherche" name="formRecherche" method="post" action="resultrecherchemembres.php">
			<p>
				Nom:
				<br/> 
				<input type="text" name="nommb_saisi" id="nommb_saisi" placeholder ="Belva Lindgren" required />
			</p>
			
			<input type=submit value="Valider"/>
		</form>
		<form align="center" id="formRecherche" name="formRecherche" method="post" action="resultrecherchemembres.php">
			<p>
				Nombre de participations:
				<br/>
				<input type="text" name="nbpart_saisi" id="nbpart_saisi" placeholder ="Minimum 2 fois" required />
			</p>

			<input type=submit value="Valider"/>
		</form></br>
		<label for="responsable">As-t-il été déjà responsable:</label></br>
		<form align="center" id="formRecherche" name="formRecherche" method="post" action="resultrecherchemembres.php">
			<input type=checkbox id="oui" name="oui" value="Oui" action="resultrecherchemembres.php">Oui
			<input type=checkbox id="non" name="non" value="Non" action="resultrecherchemembres.php">Non</br></br>
			<input type=submit value="Valider"/>
		</form>
	</body>
</br></br></br>
	<footer>
		</br></br>Pied de page
	</footer>
</html>
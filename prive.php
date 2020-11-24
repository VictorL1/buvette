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
	<?php
	if (!empty($_POST['pass_saisi']) and $_POST['pass_saisi'] == "mdp123") 
	{
	?>
		<h3>Choisissez votre formulaire</h3></br>

		<a href="nouvb.php" target="_blank"> <input type="button" value="Nouvelle Buvette"> </a></br></br>
	
        <a href="nouvv.php" target="_blank"> <input type="button" value="Nouveau Volontaire"> </a></br></br>
	
        <a href="nouvm.php" target="_blank"> <input type="button" value="Nouveau Match"> </a></br></br>

        <a href="majm.php" target="_blank"> <input type="button" value="Mise à jour d'un Match"> </a></br></br>
	<?php	
	}
	?>
	<?php
	if (empty($_POST['pass_saisi']) or $_POST['pass_saisi'] <> "mdp123") 
	{	
	?>
	<form align="center" id="formAcces" name="formAcces" method="post" action="prive.php">
		<?php
			if(isset($_POST['pass_saisi']) && $_POST['pass_saisi'] <> "mdp123") {
		?>
			<p style="color:red;">Mot de passe incorrect !</p>
		<?php
			}
		?>
		<h3>Entrer le mot de passe pour accéder aux formulaires privés:</h3>
		<br/>
		<input type="password" name="pass_saisi" id="pass_saisi" required />
		<input type=submit value="Valider"/>
	</form>
	<?php
	}
	?>
	</body>
	<footer>
		</br></br>Pied de page
	</footer>
</html>
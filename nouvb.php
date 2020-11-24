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
			<h1>Entrer une nouvelle buvette</h1>
			<fieldset>
				<legend class="legend">Nom de la nouvelle buvette</legend></br>
				<label>Nom à 5 caractère: </label><input type="text" name="NomBuv" placeholder="Ex: cavwv">
			</fieldset>
			</br></br>
			<fieldset>
				<legend class="legend">Emplacement de la buvette</legend></br>
				<select name="EmpBu" id="EmpBu">
		    	<?php 
            	$sql = "SELECT DISTINCT emplacement FROM buvette";
            	$sth = $dbh->query($sql);
            	while ($donnees=$sth->fetch()) 
            	{
        		?>
            		<option value="<?php echo $donnees['emplacement']; ?>"> <?php echo $donnees['emplacement']; ?></option> 
        		<?php  
            	}
        		?> 	
				</select>
			</fieldset>
			</br></br>
			<fieldset>
			<legend class="legend">Nom du nouveau responsable</legend></br>
				<select name="NomPr" id="NomPr">
		    	<?php 
            	$sql = "SELECT * FROM volontaire";
            	$sth = $dbh->query($sql);
            	while ($donnees=$sth->fetch()) 
            	{
        		?>
            		<option value="<?php echo $donnees['idV']; ?>"> <?php echo $donnees['nomV']; ?></option> 
        		<?php  
            	}
        		?> 	
				</select>
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
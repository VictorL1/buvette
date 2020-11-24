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
  		</br></br></br></br></br></br></br></br></br></br></br></br>
  	<?php
        require_once('Connect.php');
        $dbh = connection();
    ?>
  <form align="center" method="post" action="resultstatistiques.php">
    <h3>Statistiques</h3>
    <label><input type="checkbox" name="5Vol" id="5Vol"/> 5 volontaires les plus présents </label></br></br>
    <label><input type="checkbox" name="5Buv" id="5Buv"/> 5 buvettes ayant mobilisé le plus de volontaires </label></br></br>
    <label><input type="checkbox" name="BuOuv" id="BuOuv"/> Les buvettes ouvertes durant le match: </label>
        <select name="BuOuv2" id="BuOuv2">
        <?php 
            $sql = "SELECT * FROM matchs";
            $sth = $dbh->query($sql);
            while ($donnees=$sth->fetch()) 
            {
        ?>
            <option value="<?php echo $donnees['idM']; ?>"> <?php echo $donnees['idM']; ?></option> 
        <?php  
            }
        ?>  
        </select>
        <br><br><br>
    <input type="submit" value="Valider">
    <input type="reset" value="Annuler">
    </form>
	</body>
	<footer>
		</br></br>Pied de page
	</footer>
</html>
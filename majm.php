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
			<h1>Mettre à jour un match</h1>
			<fieldset>
			<legend class="legend">Entrer l'ancienne date du match</legend></br>
				<select name="adateMa">
		    	<?php 
            	$sql = "SELECT * FROM Matchs";
            	$sth = $dbh->query($sql);
            	while ($donnees=$sth->fetch()) 
            	{
        		?>
            		<option value="<?php echo $donnees['dateM']; ?>"> <?php echo $donnees['dateM']; ?></option> 
        		<?php  
            	}
        		?> 	
				</select>
		</fieldset>
        </br></br>
		<fieldset>
				<legend class="legend">Entrer la date du match</legend></br>
				<input type="date" name="dateMa">
		</fieldset>
        </br></br>
		<fieldset>
			<legend class="legend">Entrer la première équipe</legend></br>
				<select name="eq1">
		    	<?php 
            	$sql = "SELECT * FROM Matchs";
            	$sth = $dbh->query($sql);
            	while ($donnees=$sth->fetch()) 
            	{
        		?>
            		<option value="<?php echo $donnees['eqA']; ?>"> <?php echo $donnees['eqA']; ?></option> 
        		<?php  
            	}
        		?> 	
				</select>
		</fieldset>
        </br></br>
		<fieldset>
			<legend class="legend">Entrer la deuxième équipe</legend></br>
				<select name="eq2">
		    	<?php 
            	$sql = "SELECT * FROM Matchs";
            	$sth = $dbh->query($sql);
            	while ($donnees=$sth->fetch()) 
            	{
        		?>
            		<option value="<?php echo $donnees['eqB']; ?>"> <?php echo $donnees['eqB']; ?></option> 
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
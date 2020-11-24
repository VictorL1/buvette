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
	<?php
	if (!empty($_POST['pass_saisi']) and $_POST['pass_saisi'] == "hello") 
	{
	?>
		<h3>Choisissez votre formulaire</h3>

		<select id="monselect">
		  <option value="valeur1">Nouvelle buvette</option> 
		  <option value="valeur2" selected>Nouveau volontaire</option>
		  <option value="valeur3">Nouveau match</option>
		  <option value="valeur4">Mise à jour match</option>
		</select>




		<form method="post" action="insertion.php">
			<label><input type="checkbox" name="NouvBuv">1. Entrer une nouvelle buvette</label></br>
			<fieldset>
				<legend>Nom de la nouvelle buvette</legend>
				<label>Nom à 5 caractère: </label><input type="text" name="NomBuv" placeholder="Ex: cavwv">
			</fieldset>
			<fieldset>
				<legend>Emplacement de la buvette</legend>
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
			<fieldset>
			<legend>Nom du nouveau responsable</legend>
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
		</br><input type="submit" name="Valider"></br>
		</form>
		<form method="post" action="insertion.php">
			<label><input type="checkbox" name="NouvVol">2. Entrer un nouveau volontaire</label></br>
			<fieldset>
				<legend>Entrer le prénom et le nom du nouveau volontaire</legend>
				<label>Volontaire: </label><input type="text" name="nomvo" placeholder="Ex: Inès MGGQUEEN">
			</fieldset>
			<fieldset>
				<legend>Entrer l'age du nouveau volontaire</legend>
				<label>Age: </label><input type="number" name="agevo" min="0" max="100">
			</fieldset>
			</br><input type="submit" name="Valider"></br>
		</form>
		<form method="post" action="insertion.php">
			<label><input type="checkbox" name="NouvMat">3. Entrer un nouveau match</label></br>
			<fieldset>
				<legend>Entrer la date du match</legend>
				</br><input type="date" name="dateMa"></br>
			</fieldset>
			<fieldset>
			<legend>Entrer la première équipe</legend>
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
		<fieldset>
			<legend>Entrer la deuxième équipe</legend>
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
		</br><input type="submit" name="Valider"></br>
		</form>
		<form method="post" action="insertion.php">
			<label><input type="checkbox" name="ModifMat">4. Mettre à jour un match</label></br>
			<fieldset>
			<legend>Entrer l'ancienne date du match</legend>
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
		<fieldset>
				<legend>Entrer la date du match</legend>
				<input type="date" name="dateMa">
		</fieldset>
		<fieldset>
			<legend>Entrer la première équipe</legend>
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
		<fieldset>
			<legend>Entrer la deuxième équipe</legend>
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
		</br><input type="submit" name="Valider"></br>
		</form>
	<?php	
	}
	?>
	<?php
	if (empty($_POST['pass_saisi']) or $_POST['pass_saisi'] <> "hello") 
	{	
	?>
	<form align="center" id="formAcces" name="formAcces" method="post" action="prive2.0.php">
		<?php
			if(isset($_POST['pass_saisi']) && $_POST['pass_saisi'] <> "hello") {
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
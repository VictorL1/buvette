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
    require_once('fonctions.php');
		if (!empty($_POST['NomBu'])) 
		{
			$idbu = $_POST['NomBu'];
			$idres = $_POST['NomPr'];
			$idm = $_POST['Mat'];
			NouvResponsable($idbu,$idres,$idm);
			/*$sql = "UPDATE Buvette SET responsable = $idres WHERE idB = $idbu ";
			$dbh->exec($sql);
			$sql = "INSERT INTO EstOuverte(idB,idM) VALUES ($idbu, $idm)";
			$dbh->exec($sql);
			echo "<h3>Votre demande a été effectuée</h3>";
			echo "<table border = 1px;>";
				echo "<thead>";
					echo "<tr>";
						echo "<td>Identifiant de la buvette</td>";
						echo "<td>Nom de la buvette</td>";
						echo "<td>Emplacemnt de la buvette</td>";
						echo "<td>Identifiant du nouveau responsable</td>";
					echo "</tr>";
				echo "</thead>";
				echo "<tbody>";
					$sql = "SELECT * FROM Buvette WHERE idB = $idbu";
					$sth = $dbh-> query($sql);
					$result = $sth->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row) 
					{
						echo '<tr>';
                		echo '<td align="center">'.$row['idB'].'</td>';
                		echo '<td align="center">'.$row['nomB'].'</td>';
                		echo '<td align="center">'.$row['emplacement'].'</td>';
                		echo '<td align="center">'.$row['responsable'].'</td>';
                		echo '</tr>';
					}
					$dbh = NULL;
				echo "</tbody>";
				echo "</table>";*/
			}
			if (!empty($_POST['NomBuv'])) 
			{
				$idvo = $_POST['NomPr'];
				$idbu = $_POST['NomBuv'];
				$idm = $_POST['Mat'];
				$hd = 0;
				$hf = 0;
				NouvVolontaire($idvo,$idbu,$idm,$hd,$hf);
				/*$sql = "INSERT INTO EstPresent(idV,idB,idM,hdeb,hfin) VALUES ($idvo,$idbu,$idm,$hd,$hf)";
				$dbh->exec($sql);
				echo "<h3>Votre demande a été effectuée</h3>";
				echo "<table border = 1px;>";
					echo "<thead>";
						echo "<tr>";
							echo "<td>Identifiant du volontaire</td>";
							echo "<td>Identifiant de la buvette</td>";
							echo "<td>Identifiant du match</td>";
						echo "</tr>";
					echo "</thead>";
					echo "<tbody>";
						$sql = "SELECT * FROM EstPresent WHERE idV = $idvo AND idB = $idbu";
						$sth = $dbh-> query($sql);
						$result = $sth->fetchAll(PDO::FETCH_ASSOC);
						foreach ($result as $row) 
						{
							echo '<tr>';
                			echo '<td align="center">'.$row['idV'].'</td>';
                			echo '<td align="center">'.$row['idB'].'</td>';
                			echo '<td align="center">'.$row['idM'].'</td>';
                			echo '</tr>';
						}
						$dbh = NULL;
				echo "</tbody>";
				echo "</table>";*/
			}
			if (!empty($_POST['NomBuve'])) 
			{
				$idbu = $_POST['NomBuve'];
				$idm = $_POST['Mat'];
				NouvBuvetteOuv($idbu,$idm);
				/*$sql = "INSERT INTO EstOuverte(idB,idM) VALUES ($idbu,$idm)";
				$dbh->exec($sql);
				echo "<h3>Votre demande a été effectuée</h3>";
				echo "<table border = 1px;>";
					echo "<thead>";
						echo "<tr>";
							echo "<td>Identifiant de la buvette</td>";
							echo "<td>Identifiant du match</td>";
						echo "</tr>";
					echo "</thead>";
					echo "<tbody>";
						$sql = "SELECT * FROM EstPresent WHERE idV = $idvo AND idB = $idbu";
						$sth = $dbh-> query($sql);
						$result = $sth->fetchAll(PDO::FETCH_ASSOC);
						foreach ($result as $row) 
						{
							echo '<tr>';
                			echo '<td align="center">'.$row['idB'].'</td>';
                			echo '<td align="center">'.$row['idM'].'</td>';
                			echo '</tr>';
						}
						$dbh = NULL;
				echo "</tbody>";
				echo "</table>";*/
			}
	?>
	</body>
	<footer>
		</br></br>Pied de page
	</footer>
</html>
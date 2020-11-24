
<?php
	include_once('Connect.php');
	$sql = "SELECT * FROM (SELECT e1.pays as equipeA, e2.pays as equipeB, e1.drapeau as drapeauA, e2.drapeau as drapeauB, mt.eqA, mt.eqB, mt.scoreA as resA, mt.scoreB, mt.idM, mt.scoreB as resB FROM matchs mt INNER JOIN equipe e1 on e1.idE = mt.eqA INNER JOIN equipe e2 on e2.idE = mt.eqB) r1
	LEFT JOIN (SELECT o.idM, COUNT(o.idM) as ouverte FROM estouverte as o GROUP BY o.idM) r2 on r1.idM = r2.idM
	LEFT JOIN (SELECT p.idM, count(p.idV) as present from estpresent p  group by p.idM) r3 on r1.idM = r3.idM";
	$sth = $dbh->query($sql);
	$result = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
    <table border="1px;" align="center">
	<thead>
		<tr>
			<td align="center">DrapeauA</td>
			<td align="center">EquipeA</td>
			<td align="center">Resultat</td>
			<td align="center">EquipeB</td>
			<td align="center">DrapeauB</td>
			<td align="center">BuvetteOuverte</td>
			<td align="center">NBVolontaire</td>
		</tr>
	</thead>
	<tbody>
	<?php
		foreach ($result as $row)
		{
			echo '<tr>';
			echo '<td><img src="'.$row['drapeauA'].'" alt="ImageDrapeau" height="80" width="120" /></td>';
			echo '<td align="center">'.$row['equipeA'].'</td>';
			echo '<td align="center">'.$row['resA'].' - '.$row['resB'].'</td>';
			echo '<td align="center">'.$row['equipeB'].'</td>';
			echo '<td><img src="'.$row['drapeauB'].'" alt="ImageDrapeau" height="80" width="120" /></td>';
			echo '<td align="center">'.$row['ouverte'].'</td>';
			echo '<td align="center">'.$row['present'].'</td>';
			echo '</tr>';
		}
		
		$dbh=NULL;
	?>

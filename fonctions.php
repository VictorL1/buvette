<?php
require_once('Connect.php');

//DEBUT DE LA FONCTION AFFICHEMATCH()

function AfficheMatch() {
    $dbh = connection();
    $sql = "SELECT * FROM (SELECT e1.pays as equipeA, e2.pays as equipeB, e1.drapeau as drapeauA, e2.drapeau as drapeauB, mt.eqA, mt.eqB, mt.scoreA as resA, mt.scoreB, mt.idM, mt.dateM as dateM
        FROM matchs mt INNER JOIN equipe e1 on e1.idE = mt.eqA INNER JOIN equipe e2 on e2.idE = mt.eqB) r1
        LEFT JOIN (SELECT o.idM, COUNT(o.idM) as ouverte FROM estouverte as o GROUP BY o.idM) r2 on r1.idM = r2.idM
        LEFT JOIN (SELECT p.idM, count(p.idV) as present From estpresent p  GROUP BY p.idM) r3 on r1.idM = r3.idM";
    $sth = $dbh->query($sql);
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    if ($result != NULL) {
        echo '<table border="1px" align="center">';
        echo '<thead>';
            echo '<tr>';
                echo '<td align="center">Date</td>';
                echo '<td align="center">Drapeau</td>';
                echo '<td align="center">Equipe A</td>';
                echo '<td align="center">Resultat</td>';
                echo '<td align="center">Equipe B</td>';
                echo '<td align="center">Drapeau</td>';
                echo '<td align="center">Buvettes Ouvertes</td>';
                echo '<td align="center">Nombre de Volontaires</td>';
            echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
            foreach ($result as $row) {
                echo '<tr>';
                echo '<td align="center">'.$row['dateM'].'</td>';
                echo '<td><img src="'.$row['drapeauA'].'" alt="ImageDrapeau" height="80" width="120" /></td>';
                echo '<td align="center">'.$row['equipeA'].'</td>';
                echo '<td align="center">'.$row['resA'].' - '.$row['scoreB'].'</td>';
                echo '<td align="center">'.$row['equipeB'].'</td>';
                echo '<td><img src="'.$row['drapeauB'].'" alt="ImageDrapeau" height="80" width="120" /></td>';
                echo '<td align="center">'.$row['ouverte'].'</td>';
                echo '<td align="center">'.$row['present'].'</td>';
                echo '</tr>';
            }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p align="center">Aucun résultat !</p>';
    }
        $dbh = null;
}

//FIN DE LA FONCTION AFFICHEMATCH() 

//DEBUT DE LA FONCTION AFFICHEMEMBRE()

function AfficheMembre()
{
    
    if (isset($_POST['agembmin_saisi']))
    {
        $agemin = $_POST['agembmin_saisi'];
        require_once('Connect.php');
        $dbh = connection();
        $sql = "SELECT v.idv, v.nomV, v.age, p.nbparticipations, r.nbfoisresponsable FROM volontaire v LEFT JOIN (SELECT e.idv, count(e.idv) AS nbparticipations FROM estpresent e GROUP BY e.idv) p ON v.idv=p.idv LEFT JOIN (SELECT b.responsable, count(b.idb) AS nbfoisresponsable FROM buvette b  GROUP BY b.responsable) r ON v.idv=r.responsable WHERE age >= $agemin";
        $sth = $dbh->query($sql);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    if (isset($_POST['agembmax_saisi'])) 
    {
        $agemax = $_POST['agembmax_saisi'];
        require_once('Connect.php');
        $dbh = connection();
        $sql = "SELECT v.idv, v.nomV, v.age, p.nbparticipations, r.nbfoisresponsable FROM volontaire v LEFT JOIN (SELECT e.idv, count(e.idv) AS nbparticipations FROM estpresent e GROUP BY e.idv) p ON v.idv=p.idv LEFT JOIN (SELECT b.responsable, count(b.idb) AS nbfoisresponsable FROM buvette b  GROUP BY b.responsable) r ON v.idv=r.responsable WHERE age <= $agemax";
        $sth = $dbh->query($sql);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    }
     
    if (isset($_POST['nommb_saisi'])) 
    {
        require_once('Connect.php');
        $dbh = connection();
        $nom = $_POST['nommb_saisi'];
        $sql = "SELECT v.idv, v.nomV, v.age, p.nbparticipations, r.nbfoisresponsable FROM volontaire v LEFT JOIN (SELECT e.idv, count(e.idv) AS nbparticipations FROM estpresent e GROUP BY e.idv) p ON v.idv=p.idv LEFT JOIN (SELECT b.responsable, count(b.idb) AS nbfoisresponsable FROM buvette b  GROUP BY b.responsable) r ON v.idv=r.responsable WHERE v.nomV = '$nom'";
        $sth = $dbh->query($sql);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    }   

    if (isset($_POST['nbpart_saisi'])) 
    {
        require_once('Connect.php');
        $dbh = connection();
        $nbpart = $_POST['nbpart_saisi'];
        $sql = "SELECT v.idv, v.nomV, v.age, p.nbparticipations, r.nbfoisresponsable FROM volontaire v LEFT JOIN (SELECT e.idv, count(e.idv) AS nbparticipations FROM estpresent e GROUP BY e.idv) p ON v.idv=p.idv LEFT JOIN (SELECT b.responsable, count(b.idb) AS nbfoisresponsable FROM buvette b  GROUP BY b.responsable) r ON v.idv=r.responsable WHERE  p.nbparticipations >= $nbpart";
        $sth = $dbh->query($sql);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    if (isset($_POST['oui'])) 
    {
        require_once('Connect.php');
        $dbh = connection();
        $sql = "SELECT v.idv, v.nomV, v.age, p.nbparticipations, r.nbfoisresponsable FROM volontaire v LEFT JOIN (SELECT e.idv, count(e.idv) AS nbparticipations FROM estpresent e GROUP BY e.idv) p ON v.idv=p.idv LEFT JOIN (SELECT b.responsable, count(b.idb) AS nbfoisresponsable FROM buvette b  GROUP BY b.responsable) r ON v.idv=r.responsable WHERE r.nbfoisresponsable IS NOT NULL";
        $sth = $dbh->query($sql);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        }
    
    if (isset($_POST['non'])) 
        {
            require_once('Connect.php');
            $dbh = connection();
            $sql = "SELECT v.idv, v.nomV, v.age, p.nbparticipations, r.nbfoisresponsable FROM volontaire v LEFT JOIN (SELECT e.idv, count(e.idv) AS nbparticipations FROM estpresent e GROUP BY e.idv) p ON v.idv=p.idv LEFT JOIN (SELECT b.responsable, count(b.idb) AS nbfoisresponsable FROM buvette b  GROUP BY b.responsable) r ON v.idv=r.responsable WHERE r.nbfoisresponsable IS NULL";
            $sth = $dbh->query($sql);
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        }
    
    
    if ($result != NULL) 
    {
        echo '<h3 align="center">Votre demande a été effectuée !</h3>';
        echo '<table border="1px;" align="center">';
        echo '<thead>';
            echo '<tr>';
                echo '<td align="center">Nom</td>';
                echo '<td align="center">Age</td>';
                echo '<td align="center">Nombre de participations</td>';
                echo '<td align="center">Nombre de fois responsable</td>';
            echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
            foreach ($result as $row) 
            {
                if(empty($row['nbparticipations']))
                {
                $row['nbparticipations']=0;
                }
                if(empty($row['nbfoisresponsable']))
                {
                $row['nbfoisresponsable']=0;
                }
                echo '<tr>';
                echo '<td align="center">'.$row['nomV'].'</td>';
                echo '<td align="center">'.$row['age'].'</td>';
                echo '<td align="center">'.$row['nbparticipations'].'</td>';
                echo '<td align="center">'.$row['nbfoisresponsable'].'</td>';
                echo '</tr>';
            }
        echo '</tbody>';    
        echo '</table>'; 
    } 
    else 
    {
        echo '<p align="center">Aucun résultat !</p>';
    } 
    $dbh = null;
}


//FIN DE LA FONCTION AFFICHEMEMBRE()

//DEBUT DE LA FONCTION TOPVOLONTAIRES()

function TopVolontaires()
{
    $dbh = connection();
    echo "<h3 align='center'>Top 5 des Volontaires les plus présents et actifs</h3>";
    echo "<table border=1px align='center'>";
    echo "<thead>";
    echo "<tr>";
    echo "<td align=center>Nom</td>";
    echo "<td>Age</td>";
    echo "</tr>";
    echo "</thead>";
    $sql = "SELECT V.idV, count(E.idV) as NombreApp,nomV,age FROM EstPresent E, Volontaire V
    WHERE E.idv = V.idV Group By idv Order By NombreApp DESC LIMIT 5";
    $sth = $dbh->query($sql);
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row)
    {
        echo '<tr>';
        echo '<td align="center">'.$row['nomV'].'</td>';
        echo '<td align="center">'.$row['age'].'</td>';
        echo '</tr>';
    }
    echo'</table>';
    $dbh=NULL;  
}

//FIN DE LA FONCTION TOPVOLONTAIRES()

//DEBUT DE LA FONCTION TOPBUVETTES()

function TopBuvettes()
{
    $dbh = connection();
    echo "<h3 align='center'>Top 5 des Buvettes ayant mobilisés le plus de volontaires</h3>";
    echo "<table border=1px align='center'>";
    echo "<thead>";
    echo "<tr>";
    echo "<td align=center>Nom</td>";
    echo "<td>Emplacement</td>";
    echo "<td>Nb de volontaires</td>";
    echo "</tr>";
    echo "</thead>";
    $sql = "SELECT B.idB,count(E.idB) as OF,nomB,emplacement FROM EstPresent E, Buvette B WHERE E.idB=B.idB Group By idB Order By OF DESC LIMIT 5";
    $sth = $dbh->query($sql);
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row)
    {
        echo '<tr>';
        echo '<td align="center">'.$row['nomB'].'</td>';
        echo '<td align="center">'.$row['emplacement'].'</td>';
        echo '<td align="center">'.$row['OF'].'</td>';
        echo '</tr>';
    }
    echo'</table>';
    $dbh=NULL;  
}

//FIN DE LA FONCTION TOPBUVETTES()

//DEBUT DE LA FONCTION STATMATCH()

function StatMatch($code)
{
    $dbh = connection();
        echo "<h3 align='center'>Buvettes ouvertes lors du match</h3>";
        echo "<table border=1px align='center'>";
        echo "<thead>";
        echo "<tr>";
        echo "<td>Nom Buvette</td>";
        echo "<td>Emplacement</td>";
        echo "<td>IDResponsable</td>";
        echo "<td>Nom Volontaires présents</td>";
        echo "<td>Age</td>";
        echo "<td>Heure Début</td>";
        echo "<td>Heure Fin</td>";
        echo "</tr>";
        echo "</thead>";
        $sql = "SELECT nomB,emplacement,responsable,nomV,age,hdeb,hfin FROM Buvette b,Volontaire v,EstPresent e,EstOuverte o WHERE e.idV=v.idV AND e.idB=b.idB AND b.idB=o.idB AND o.idM=e.idM AND e.idM=$code";
        $sth = $dbh->query($sql);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        $vs = 'vs';
        foreach ($result as $row)
        {
            echo '<tr>';
            echo '<td align="center">'.$row['nomB'].'</td>';
            echo '<td align="center">'.$row['emplacement'].'</td>';
            echo '<td align="center">'.$row['responsable'].'</td>';
            echo '<td align="center">'.$row['nomV'].'</td>';
            echo '<td align="center">'.$row['age'].'</td>';
            echo '<td align="center">'.$row['hdeb'].'</td>';
            echo '<td align="center">'.$row['hfin'].'</td>';
            echo '</tr>';
        }
        echo'</table>';
        $dbh=NULL;
}

//FIN DE LA FONCTION STATMATCH()

//DEBUT DE LA FONCTION NOUVRESPONSABLE()

function NouvResponsable($idbu,$idres,$idm)
{
    $dbh = connection();
    $sql = "UPDATE Buvette SET responsable = $idres WHERE idB = $idbu ";
    $dbh->exec($sql);
    $sql = "INSERT INTO EstOuverte(idB,idM) VALUES ($idbu, $idm)";
    $dbh->exec($sql);
    echo "<h3 align='center'>Votre demande a été effectuée !</h3>";
    echo "<table border = 1px align='center'>";
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
            echo "</table>";
}

//FIN DE LA FONCTION NOUVRESPONSABLE()

//DEBUT DE LA FONCTION NOUVVOLONTAIRE()

function NouvVolontaire($idvo,$idbu,$idm,$hd,$hf)
{
    $dbh = connection();
    $sql = "INSERT INTO EstPresent(idV,idB,idM,hdeb,hfin) VALUES ($idvo,$idbu,$idm,$hd,$hf)";
    $dbh->exec($sql);
    echo "<h3 align='center'>Votre demande a été effectuée !</h3>";
    echo "<table border = 1px align='center'>";
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
    echo "</table>"; 
}

//FIN DE LA FONCTION NOUVVOLONTAIRE()

//DEBUT DE LA FONCTION NOUVBUVETTEOUV()

function NouvBuvetteOuv($idbu,$idm)
{
    $dbh = connection();
    $sql = "INSERT INTO EstOuverte(idB,idM) VALUES ($idbu,$idm)";
    $dbh->exec($sql);
    echo "<h3 align='center'>Votre demande a été effectuée !</h3>";
    echo "<table border = 1px align='center'>";
        echo "<thead>";
            echo "<tr>";
                echo "<td>Identifiant de la buvette</td>";
                echo "<td>Identifiant du match</td>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
            $sql = "SELECT * FROM EstOuverte WHERE idB = $idbu AND idM = $idm";
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
        echo "</table>";
}

//FIN DE LA FONCTION NOUVBUVETTEOUV()

//DEBUT DE LA FONCTION INSERTBUVETTE()

function InsertBuvette ($nombu,$emp,$nomres)
{
    $dbh = connection();
    $sql = "SELECT idB FROM Buvette ORDER BY idB DESC LIMIT 1";
    $sth = $dbh -> query($sql);
    $result = $sth->fetch();
    $idbu = ($result['idB'])+1;
    $sql = "INSERT INTO Buvette(idB,nomB,emplacement,responsable) VALUES ($idbu,'$nombu','$emp',$nomres)";
    $dbh->exec($sql);
    echo "<h3 align='center'>Votre demande a été effectuée !</h3>";
    echo "<table border = 1px align='center'>";
        echo "<thead>";
            echo "<tr>";
                echo "<td>Identifiant de la buvette</td>";
                echo "<td>Nom de la buvette</td>";
                echo "<td>Emplacement de la buvette</td>";
                echo "<td>Identifiant du responsable</td>";
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
        echo "</table>";
}
//FIN DE LA FONCTION INSERTBUVETTE()

//DEBUT DE LA FONCTION INSERTVOLONTAIRE()

function InsertVolontaire ($nomvo,$voage)
{
    $dbh = connection();
    $sql = "SELECT idV FROM Volontaire ORDER BY idV DESC LIMIT 1";
    $sth = $dbh -> query($sql);
    $result = $sth->fetch();
    $idvo = ($result['idV'])+1;
    $sql = "INSERT INTO Volontaire (idV,nomV,age) VALUES ($idvo,'$nomvo',$voage)";
    $dbh->exec($sql);
    echo "<h3 align='center'>Votre demande a été effectuée !</h3>";
    echo "<table border = 1px align='center'>";
        echo "<thead>";
            echo "<tr>";
                echo "<td>Identifiant du volontaire</td>";
                echo "<td>Nom du volontaire</td>";
                echo "<td>Age du volontaire</td>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
            $sql = "SELECT * FROM Volontaire WHERE idV = $idvo";
            $sth = $dbh-> query($sql);
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) 
            {
                echo '<tr>';
                echo '<td align="center">'.$row['idV'].'</td>';
                echo '<td align="center">'.$row['nomV'].'</td>';
                echo '<td align="center">'.$row['age'].'</td>';
                echo '</tr>';
            }
                $dbh = NULL;
        echo "</tbody>";
        echo "</table>";
}
//FIN DE LA FONCTION INSERTVOLONTAIRE()

//DEBUT DE LA FONCTION INSERTMATCHS ()

function InsertMatchs($date,$e1,$e2)
{
    $dbh = connection();
    $sql = "SELECT idM FROM Matchs ORDER BY idM DESC LIMIT 1";
    $sth = $dbh -> query($sql);
    $result = $sth->fetch();
    $idma = ($result['idM'])+1;
    $sql = "INSERT INTO Matchs (idM,dateM,eqA,eqB,scoreA,scoreB) VALUES ($idma,'$date','$e1','$e2',NULL,NULL)";
    $dbh->exec($sql);
    echo "<h3 align='center'>Votre demande a été effectuée !</h3>";
    echo "<table border = 1px align='center'>";
        echo "<thead>";
            echo "<tr>";
                echo "<td>Identifiant du match</td>";
                echo "<td>Date du match</td>";
                echo "<td>EquipeA</td>";
                echo "<td>EquipeB</td>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
            $sql = "SELECT * FROM Matchs WHERE idM = $idma";
            $sth = $dbh-> query($sql);
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) 
            {
                echo '<tr>';
                echo '<td align="center">'.$row['idM'].'</td>';
                echo '<td align="center">'.$row['dateM'].'</td>';
                echo '<td align="center">'.$row['eqA'].'</td>';
                echo '<td align="center">'.$row['eqB'].'</td>';
                echo '</tr>';
            }
                $dbh = NULL;
        echo "</tbody>";
        echo "</table>";
}
//FIN DE LA FONCTION INSERTMATCHS()

//DEBUT DE LA FONCTION UPDATEMATCHS()

function UpdateMatchs($adate,$nouvD,$e1,$e2)
{
    $dbh = connection();
    $sql = "UPDATE Matchs SET dateM = '$nouvD', eqA = '$e1',eqB = '$e2' WHERE dateM = '$adate'";
    $dbh->exec($sql);
    echo "<h3 align='center'>Votre demande a été effectuée !</h3>";
    echo "<table border = 1px align='center'>";
            echo "<thead>";
                echo "<tr>";
                    echo "<td>Identifiant du match</td>";
                    echo "<td>Date du match</td>";
                    echo "<td>EquipeA</td>";
                    echo "<td>EquipeB</td>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
                $sql = "SELECT * FROM Matchs WHERE dateM = '$nouvD'";
                $sth = $dbh-> query($sql);
                $result = $sth->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) 
                {
                    echo '<tr>';
                    echo '<td align="center">'.$row['idM'].'</td>';
                    echo '<td align="center">'.$row['dateM'].'</td>';
                    echo '<td align="center">'.$row['eqA'].'</td>';
                    echo '<td align="center">'.$row['eqB'].'</td>';
                    echo '</tr>';
                }
                $dbh = NULL;
            echo "</tbody>";
            echo "</table>";
}
//FIN DE LA FONCTION UPDATEMATCHS()
?>
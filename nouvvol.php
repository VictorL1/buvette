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
        <h1>Nouveau Volontaire à une Buvette</h1>
        </br></br>
        <form method="post" action="confirmation.php">
            <?php
            require_once('Connect.php');
            $dbh = connection();
            ?>
        <fieldset>
            <legend class="legend">Nom du volontaire</legend></br>
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
        <fieldset>
            <legend class="legend">Nom de la buvette</legend></br>
                <select name="NomBuv" id="NomBuv">    
                <?php 
                $sql = "SELECT * FROM buvette";
                $sth = $dbh->query($sql);
                while ($donnees=$sth->fetch()) 
                {
                ?>
                    <option value="<?php echo $donnees['idB']; ?>"> <?php echo $donnees['nomB']; ?></option> 
                <?php  
                }
                ?>  
                </select>
        </fieldset>
        </br></br>
        <fieldset>
            <legend class="legend">Numéro du match</legend></br>
                <select name="Mat" id="Mat">
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
        </fieldset>
        </br></br></br>
        <input type="submit" value="Valider"> 
        </br></br></br>

    </form>
    </body>
    <footer>
        </br></br>Pied de page
    </footer>
</html>
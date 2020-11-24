<?php
function connection()
{
	$user = 'root';
	$passwd = '';
	$dsn = 'mysql:host=localhost;dbname=buvettes';
	try
		{
			$dbh= new PDO($dsn, $user, $passwd);
			return $dbh;
		}
	catch (PDOException $e)
		{
			print "Erreur !:" .$e->getMessage()."<br/";
			die();
		}
		return NULL;
	}
?>

<?php
include("aside.html"); 
	//szerver oldali ellenőrzés példa

	if(!isset($_POST['nev']) || strlen($_POST['nev']) < 5)
	{
		exit("Hibás név: ".$_POST['nev']);
	}

	$re = '/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';
	if(!isset($_POST['email']) || !preg_match($re,$_POST['email']))
	{
		exit("Hibás email: ".$_POST['email']);
	}

	if(!isset($_POST['szoveg']) || empty($_POST['szoveg']))
	{
		exit("Hibás szöveg: ".$_POST['szoveg']);
	}

	echo "Kapott értékek: ";
	echo "<pre>";
	var_dump($_POST);
	echo "</pre>";
	$sth = $pdo->prepare("INSERT INTO `maltese-charity`.`uzenet` (`id`, `nev`, `email`, `uzenet`, `datum`) VALUES (NULL, ?, ?, ?, CURRENT_TIMESTAMP);");
	$sth->execute(array($_POST['nev'], $_POST['email'],$_POST['szoveg']));
?>
	

<?php
include_once("connect.conf.php");
try {
$pdo = new PDO("mysql:host=$host;dbname=$database", $username, //adatbázis hozzáférés
$password ,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
$pdo->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
$utasitas = "select uzenet, datum, nev from uzenet order by datum desc"; //lekérdezés
$eredm = $pdo->query($utasitas);
}
catch (PDOException $e) {
echo "Hiba: ".$e->getMessage();
}
?>
<!DOCTYPE html>
<html>
 <head>
 <title>Display of messages</title>
 <meta charset="utf-8">
<style>
table, td, tr {
border: 1px solid black;
}
</style>
 </head>
 <body>
<table>
<?php foreach ($eredm as $sor)
print "<tr><td>" . $sor['uzenet'] . "</td>" . " <td>" .$sor['nev'] . "</td>" . "<td>" .$sor['datum'] . "</td></tr>"; //kiírás
?>
</table>
 </body>
</html>
<?php
// Start the session
session_start();
?>


<?php


    if(isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
        try {
            // Kapcsolódás
            
            
            // Felhsználó keresése
            $sqlSelect = "select id, csaladi_nev, uto_nev from felhasznalok where bejelentkezes = :bejelentkezes and jelszo = sha1(:jelszo)";
            $sth = $pdo->prepare($sqlSelect);
            $sth->execute(array(':bejelentkezes' => $_POST['felhasznalo'], ':jelszo' => $_POST['jelszo']));
            $row = $sth->fetch(PDO::FETCH_ASSOC);

            if($row) {
                $_SESSION['csn'] = $row['csaladi_nev']; 
                $_SESSION['un'] = $row['uto_nev']; 
                $_SESSION['login'] = $_POST['jelszo'];
                //echo "<h1> login:".$_SESSION['login']."</h1>";
              } 
        }
        catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        }      
    }
?>

        <?php if(isset($row)) { ?>
            <?php if($row) { ?>
                <h1>You have signed in:</h1>
                Identification: <strong><?= $row['id'] ?></strong><br><br>
                Name: <strong><?= $row['csaladi_nev']." ".$row['uto_nev'] ?></strong>
            <?php } else { ?>
                <h1>Your signing in failed.</h1>
                <a href="example.html" >Try again!</a>
            <?php } ?>
        <?php } ?>
    
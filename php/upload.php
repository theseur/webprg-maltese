<?php
// Start the session
session_start();
?>

<?php
    // Alkalmazás logika:
    include('config.inc.php');
    include("aside.html"); 
    $uzenet = array();  
   // echo "<h1> login:".$_SESSION['login']."</h1>";

    // Űrlap ellenőrzés:
    if(isset($_SESSION['login']))
    {
        if (isset($_POST['kuld'])) 
        {
            //print_r($_FILES);
            foreach($_FILES as $fajl) {
                echo "-".$fajl ["type"];
                if ($fajl['error'] == 4);   // Nem töltött fel fájlt
            
                elseif (!in_array($fajl['type'], $MEDIATIPUSOK))
                
                $uzenet[] = " The type of file is not allowed: " . $fajl['name'];

                
                    
                elseif ($fajl['error'] == 1   // A fájl túllépi a php.ini -ben megadott maximális méretet
                            or $fajl['error'] == 2   // A fájl túllépi a HTML űrlapban megadott maximális méretet
                            or $fajl['size'] > $MAXMERET) 
                    $uzenet[] = " Size of file is too big!: " . $fajl['name'];
                else {
                    $vegsohely = $MAPPA.strtolower($fajl['name']);
                    if (file_exists($vegsohely))
                        $uzenet[] = " File already exist!: " . $fajl['name'];
                    else {
                        move_uploaded_file($fajl['tmp_name'], $vegsohely);
                        $uzenet[] = ' Ok: ' . $fajl['name'];
                    }
                }
            }        
        }

    }
    else
    {
        echo "<h1>You are not logged in!</h1>";
    }
    
    
       

    
    // Megjelenítés logika:
?>
    <h1>Upload to gallery:</h1>
<?php
    if (!empty($uzenet))
    {
        echo '<ul>';
        foreach($uzenet as $u)
            echo "<li>$u</li>";
        echo '</ul>';
    }
?>
    <form action="index.php?page=uploading" method="post"
                enctype="multipart/form-data">
        <label>First:
            <input type="file" name="első" required>
        </label>
        <label>Second:
            <input type="file" name="második">
        </label>
        <label>Third:
            <input type="file" name="harmadik">
        </label>        
        <input type="submit" value="Send" name="kuld">
      </form>    


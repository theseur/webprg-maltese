<?php
include("aside.html"); 
    // Alkalmazás logika:
    include('config.inc.php');
    
    // adatok összegyűjtése:    
    $kepek = array();
    $olvaso = opendir($MAPPA);
    while (($fajl = readdir($olvaso)) !== false)
        if (is_file($MAPPA.$fajl)) {
            $vege = strtolower(substr($fajl, strlen($fajl)-4));
            if (in_array($vege, $TIPUSOK))
                $kepek[$fajl] = filemtime($MAPPA.$fajl);            
        }
    closedir($olvaso);
    
    // Megjelenítés logika:
?>

    <div id="galeria">
    <h1>Gallery</h1>
    <div class="row">
    <?php
    arsort($kepek);
    foreach($kepek as $fajl => $datum)
    {
    ?>
        <div class="col-md-4">
            <a href="<?php echo $MAPPA.$fajl ?>">
                <img src="http://users.atw.hu/maltese-charity/<?php echo $MAPPA.$fajl ?>" style="width:100%; height:80%">
            </a>            
            <p>Name:  <?php echo $fajl; ?></p>
            <p>Date:  <?php echo date($DATUMFORMA, $datum); ?></p>
        </div>
    <?php
    }
    ?>
    </div>
    </div>


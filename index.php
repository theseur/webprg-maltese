<?php
// Start the session
header('Content-Type: text/html; charset=utf-8');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
    
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body>
 <?php include("aside.html"); ?>   
<div class="container">


<?php
include_once("connect.php");
if(!isset($_GET["page"]))
{
    echo 'Main page';
     
}
else
{
    if(($_GET["page"]=="connection"))
    {
        include_once("connection.html");
    }
    else if ($_GET["page"]=="connectsend")
    {
        include_once("php/connect.php");
    }
    else if($_GET["page"]=="messagereading")
    {
        include_once("messagereading.php");

    }
    else if($_GET["page"]=="video")
    {
        include_once("php/videoTest.php");
    }
    else if($_GET["page"]=="galeria")
    {
        include_once("php/gallery.php");

    }
    else if($_GET["page"]=="uploading")
    {
        include_once("php/upload.php");

    }
    else if($_GET["page"]=="map")
    {
        include_once("php/map.php");

    }

    else if($_GET["page"]=="signin" || $_GET["page"]=="regisztr")
    {
        include_once("example.html");

    }
    else if($_GET["page"]=="regisztral")
    {
        include_once("php/regisztracio.php");

    }
    else if($_GET["page"]=="signinforphp")
    {
        include_once("php/signinforphp.php");

    }
    else if($_GET["page"]=="signout")
    {
        include_once("php/signout.php");

    }


}
?>
</div>
</body>
</html>
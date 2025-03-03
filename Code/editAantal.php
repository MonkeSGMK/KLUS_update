<?php
require 'dbconnect.php';
include 'time.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spul inventaris</title>
</head>
<body>
    <!-- EFFE VOOR DE DUIDELIJKHEID, niet op die links klikken het zijn memes die je nooit hoort te zien-->
    <!-- Heel belangrijke tutorials wdym?-->
    <h1>it brokey</h1>
    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">probably a fix idk</a>
    <a href="https://www.youtube.com/watch?v=b85h_ujZ_vg">HowToBasic video on a fix</a>
    <?php
    if(!isset($_GET['type'])){
       header("Location: index.php"); 
    }
    if($_GET['type'] == "materiaal"){
            $stmt = $conn->prepare('UPDATE Materiaal SET aantal = :amount WHERE id = :id');
            $stmt->bindParam(':amount', $_GET['amount']);
            $stmt->bindParam(':id', $_GET['id']);
            $stmt->execute();
        header("Location: index.php");
    } elseif ($_GET['type'] == 'greedschap'){
        $stmt = $conn->prepare('UPDATE greedschap SET aantal = :amount WHERE id = :id');
        $stmt->bindParam(':amount', $_GET['amount']);
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
        header("Location: greedschap.php");
    }
    ?>
</body>
</html>
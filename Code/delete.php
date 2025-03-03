<?php
require 'dbconnect.php';
if($_GET['type'] == 'greedschap'){
    $stmt = $conn->prepare("DELETE FROM greedschap WHERE id = :id");
    $type = 'greedschap';
} elseif ($_GET['type'] == 'materiaal'){
    $stmt = $conn->prepare("DELETE FROM materiaal WHERE id = :id");
    $type = 'materiaal';
}
$stmt->bindParam(':id', $_GET['id']);
$stmt->execute();
header('Location: deleteItems.php?type='.$type.'')
?>
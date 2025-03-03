<?php
require 'dbconnect.php';
$stmt = $conn->prepare('SELECT id, naam, aantal FROM Materiaal');
$stmt->execute();
$result = $stmt->fetchAll();
include 'time.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spul inventaris</title>
</head>
<form method="GET">
    <input type="text" value='materiaal' name='type'>
    <input type="text" name="id" value="1">
    <input type="text" name="amount" value="3">
    <input type="submit" name="" id="">
</form>
<body>
    <main>
        <section>
            <form method="GET">
                <input type="hidden" name='type' value='materiaal'>
            <?php
            foreach ($result as $data) {
                echo '<article class="items">';
                echo "<h1>" . $data['naam'] . "</h1>";
                echo "<img src='". $data['id'] ."' alt='#'>";
                echo '<input type="radio" name="'.$data['id'].'" value="3"';
                if($data['aantal'] == 3) {
                    echo ' checked>';
                }else {
                    echo '>';
                }
                echo ', ';
                echo '<input type="radio" name="'.$data['id'].'" value="2"';
                if($data['aantal'] == 2) {
                    echo ' checked>';
                }else {
                    echo '>';
                }
                echo ', ';
                echo '<input type="radio" name="'.$data['id'].'" value="1"';
                if($data['aantal'] == 1) {
                    echo ' checked>';
                } else {
                    echo '>';
                }
                echo "</article>";
            }
                ?>
                <input type="submit" name="" id="">
                </form>
        </section>
    </main>
</body>

</html>
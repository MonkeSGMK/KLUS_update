<html>
    <?php
    require '../dbconnect.php';
    if(!isset($_POST['userName']) || !isset($_POST['passWord']) || empty($_POST['userName']) || empty($_POST['passWord'])){
        header("Location: accountCreator.php?error=emptyfields");
    } else {
        $stmt = $conn->prepare('INSERT INTO users (naam, wachtwoord) VALUES (:naam, :wachtwoord)');
        $stmt->bindParam(':naam', $_POST['userName']);
        $hashedpass = password_hash($_POST['passWord'], PASSWORD_DEFAULT);
        $stmt->bindParam(':wachtwoord', $hashedpass);
        $stmt->execute();
        header("Location: ../index.php");
    }
    ?>
</html>
<html>
    <?php
    require 'dbconnect.php';
    if(!isset($_POST['username']) || !isset($_POST['password']) || empty($_POST['username']) || empty($_POST['password'])){
        header("Location: login.php?error=emptyfields");
    }
    $stmt = $conn->prepare('SELECT naam, wachtwoord FROM users WHERE naam = :naam');
    $stmt->bindParam(':naam', $_POST['username']);
    $stmt->execute();
    $result = $stmt->fetchAll();
    if(password_verify($_POST['password'], $result[0]['wachtwoord'])){
        session_start();
        $_SESSION['loggedIn'] = true;
        header("Location: editIndex.php");
    } else {
        header("Location: login.php?error=wrongpassword");
    }
    ?>
</html>
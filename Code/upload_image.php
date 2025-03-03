<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"]["name"])) {
    if(!isset($_POST['type'])){
        header('Location: addItems.php');
        exit();
    }
    if($_POST['type'] == 'greedschap'){
        $target_dir = "assets/tools/";
    }
    if($_POST['type'] == 'materialen'){
        $target_dir = "assets/materialen/";
    }
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
        chmod($target_dir, 0777);
    }

    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the file is an actual image or a fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            exit();
        }
    }

    // Check if the file already exists
    if (file_exists($target_file)) {
        echo "Sorry, the file already exists.";
        exit();
    }

    // Check the file size (You can set your own limit, e.g., 2MB here)
    if ($_FILES["image"]["size"] > 2097152) {
        echo "Sorry, the file is too large.";
        exit();
    }

    // Allow only certain file formats (you can customize this list)
    $allowed_formats = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowed_formats)) {
        echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        exit();
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file has been uploaded and saved successfully.";

        // Connect to your MySQL database using PDO
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "spul";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Insert the image path and upload date into the database";
            if($_POST['type'] == 'greedschap'){
                $sql = "INSERT INTO greedschap (naam, aantal, image_path) VALUES (:naam, :aantal, :image_path)";
            }
            if($_POST['type'] == 'materialen'){
                $sql = "INSERT INTO materiaal (naam, aantal, image_path) VALUES (:naam, :aantal, :image_path)";
            }
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':image_path', $target_file);
            $stmt->bindParam(':naam', $_POST['naam']);
            $stmt->bindValue(':aantal', 0);
            $stmt->execute();

            // After successful upload and data insertion, redirect to display_images.php
            header("Location: editIndex.php");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

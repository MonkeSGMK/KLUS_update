<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include_once '../dbconnect.php';
    require 'vendor/autoload.php'; // Adjust the path as needed
    
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $sql = ("SELECT id, naam, aantal FROM Materiaal");

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Create a new Excel object
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Define headers
    $headers = ['id', 'naam', 'voorraad'];

    // Set headers in the first row of the worksheet
    $sheet->fromArray([$headers], NULL, 'A1');

    // Populate the worksheet with data
    $data = array_map(function ($row) {
        if ($row['aantal'] == 1) {
            $row['aantal'] = "Niet op voorraad";
        } elseif ($row['aantal'] == 2) {
            $row['aantal'] = "bijna op";
        } elseif ($row['aantal'] == 3) {
            $row['aantal'] = "op voorraad";
        } elseif($row['aantal'] == 0){
            $row['aantal'] = "Niet Ingevuld!";
        }
        return array_values($row); // Extract values from associative array
    }, $result);

    $sheet->fromArray($data, NULL, 'A2');

    // Save Excel file
    $writer = new Xlsx($spreadsheet);
    $excelFileName = 'week_' . $_GET['week'] . '.xlsx'; // Adjust the file path and name as needed
    $writer->save($excelFileName);

    $stmt = $conn->prepare('SELECT id FROM materiaal');
    $stmt->execute();
    $result = $stmt->fetchAll();
    foreach($result as $data){
        $stmt = $conn->prepare('UPDATE Materiaal SET aantal = 0 WHERE id = :id');
        $stmt->bindParam(':id', $data['id']);
        $stmt->execute();
    }
    header("Location: ../index.php");
    echo "Excel file saved as $excelFileName.";
    ?>
</body>

</html>



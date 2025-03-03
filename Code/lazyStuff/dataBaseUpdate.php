<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Quick side note to any future intern, this page might be useless in the future, since this is only used as a
        database updater so that i can just open this page</h1>

        <a href="../index.php"><h1>back to index</h1></a>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Spul";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        echo "<h1>An error has occured(real):</h1><br>" . $e->getMessage();
        ;
    }

    // stuff for database here

    //creates the main part of the database
    $mainDatbase = 1;

    //creates the order column for the database (used for edit and stuff)
    $databaseOrderer = 0;
    ?>

    <?php
    if ($mainDatbase == 1) {
        $stmt = $conn->prepare('DROP DATABASE IF EXISTS spul');
        $stmt->execute();
        $stmt = $conn->prepare('CREATE DATABASE IF NOT EXISTS spul');
        $stmt->execute();
        $stmt = $conn->prepare('USE spul');
        $stmt->execute();
        $stmt = $conn->prepare("CREATE TABLE greedschap (
            id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            naam VARCHAR(255) DEFAULT NULL,
            aantal INT(11) NOT NULL,
            image_path VARCHAR(255) NOT NULL
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;");
        $stmt->execute();
        $stmt = $conn->prepare("INSERT INTO `greedschap` (`id`, `naam`, `aantal`, `image_path`) VALUES
        (4, 'bahcos', 0, 'assets/tools/bahcos.webp'),
        (5, 'boren van gaten', 1, 'assets/tools/boren_van_gaten.webp'),
        (6, 'decoupeerzaag', 3, 'assets/tools/decoupeerzaag.webp'),
        (7, 'diverse tangen', 2, 'assets/tools/diverse_tangen.webp'),
        (8, 'figuurzagen', 0, 'assets/tools/figuurzagen.webp'),
        (9, 'hamers', 0, 'assets/tools/hamers.webp'),
        (10, 'hoeklinialen', 0, 'assets/tools/hoeklinialen.webp'),
        (11, 'houtklemmen', 0, 'assets/tools/houtklemmen.webp'),
        (12, 'houtschaven', 0, 'assets/tools/houtschaven.webp'),
        (13, 'inbussleutel', 1, 'assets/tools/inbussleutel.webp'),
        (14, 'klemmen', 0, 'assets/tools/klemmen.webp'),
        (15, 'kraspennen', 0, 'assets/tools/kraspennen.webp'),
        (16, 'linialen', 0, 'assets/tools/linialen.webp'),
        (17, 'meetlint', 0, 'assets/tools/meetlint.webp'),
        (18, 'metaalzagen', 0, 'assets/tools/metaalzagen.webp'),
        (19, 'nietpistolen', 0, 'assets/tools/nietpistolen.webp'),
        (20, 'nijptangen', 0, 'assets/tools/nijptangen.webp'),
        (21, 'ratelsleutels', 0, 'assets/tools/ratelsleutels.webp'),
        (22, 'rolmaten', 0, 'assets/tools/rolmaten.webp'),
        (23, 'schrijfhaken', 0, 'assets/tools/schrijfhaken.webp'),
        (24, 'schroefmachines', 0, 'assets/tools/schroefmachines.webp'),
        (25, 'schroevendraaiers', 0, 'assets/tools/schroevendraaiers.webp'),
        (26, 'schuifmaten', 0, 'assets/tools/schuifmaten.webp'),
        (27, 'snijmatten', 0, 'assets/tools/snijmatten.webp'),
        (28, 'spijkers en schroeven', 0, 'assets/tools/spijkers_en_schroeven.webp'),
        (29, 'staalborstels', 0, 'assets/tools/staalborstels.webp'),
        (30, 'stanleymessen', 0, 'assets/tools/stanleymessen.webp'),
        (31, 'steeksleutels', 0, 'assets/tools/steeksleutels.webp'),
        (32, 'stoffer en blik', 0, 'assets/tools/stoffer_en_blik.webp'),
        (33, 'tangen', 0, 'assets/tools/tangen.webp'),
        (34, 'vijlen', 0, 'assets/tools/vijlen.webp'),
        (35, 'waterpas', 0, 'assets/tools/waterpas.webp'),
        (36, 'zagen', 0, 'assets/tools/zagen.webp');");
        $stmt->execute();
        $stmt = $conn->prepare("CREATE TABLE `materiaal` (
            `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `naam` varchar(255) DEFAULT NULL,
            `aantal` int(11) NOT NULL,
            `status` enum('voldoende','bijna op','op') DEFAULT NULL,
            `image_path` varchar(255) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;");
        $stmt->execute();
        $stmt = $conn->prepare("INSERT INTO `materiaal` (`id`, `naam`, `aantal`, `status`, `image_path`) VALUES
          (5, 'Platkop schroevendraaiers', 2, 'voldoende', 'assets/materialen/Platkop_schroevendraaiers.webp'),
          (6, 'Electro schroevendraaier', 3, NULL, 'assets/materialen/Electro_schroevendraaier.webp'),
          (7, 'Kruiskop schroevendraaiers', 1, NULL, 'assets/materialen/Kruiskop_schroevendraaiers.webp'),
          (8, 'Plastic hoesjes', 2, NULL, 'assets/materialen/Plastic_hoesjes.webp'),
          (9, 'Knikkers', 2, NULL, 'assets/materialen/Knikkers.webp'),
          (10, 'Wattenstaafjes', 2, NULL, 'assets/materialen/Wattenstaafjes.webp'),
          (11, 'Houten figuren', 3, NULL, 'assets/materialen/Houten_figuren.webp'),
          (12, 'LEDS', 1, NULL, 'assets/materialen/LEDS.webp'),
          (13, 'Toetsen', 3, NULL, 'assets/materialen/Toetsen.webp'),
          (14, 'Post it', 3, NULL, 'assets/materialen/Post_it.webp'),
          (15, 'Spiegels klein', 2, NULL, 'assets/materialen/Spiegels_klein.webp'),
          (16, 'Garen', 1, NULL, 'assets/materialen/Garen.webp'),
          (17, 'Tangen', 0, NULL, 'assets/materialen/Tangen.webp'),
          (19, 'Satestokjes klein', 0, NULL, 'assets/materialen/Satestokjes_klein.webp'),
          (20, 'Houten knijpers', 3, NULL, 'assets/materialen/Houten_knijpers.webp'),
          (21, 'Houtjes', 3, NULL, 'assets/materialen/Houtjes.webp'),
          (22, 'Klittenband', 3, NULL, 'assets/materialen/Klittenband.webp'),
          (23, 'Kleur krijtjes', 0, NULL, 'assets/materialen/Kleur_krijtjes.webp'),
          (24, 'Kleur waxkrijten', 0, NULL, 'assets/materialen/Kleur_waxkrijten.webp'),
          (25, 'Waxine lichtjes', 0, NULL, 'assets/materialen/Waxine_lichtjes.webp'),
          (26, 'Gluesticks', 0, NULL, 'assets/materialen/Gluesticks.webp'),
          (27, 'Schroevendraaiers', 0, NULL, 'assets/materialen/Schroevendraaiers.webp'),
          (28, 'Doppen', 0, NULL, 'assets/materialen/Doppen.webp'),
          (29, 'Stanleymessen', 3, NULL, 'assets/materialen/Stanleymessen.webp'),
          (30, 'Keramiek', 3, NULL, 'assets/materialen/Keramiek.webp'),
          (31, 'Rietjes', 0, NULL, 'assets/materialen/Rietjes.webp'),
          (32, 'Pingpongballen', 0, NULL, 'assets/materialen/Pingpongballen.webp'),
          (33, 'Cocktailprikkers', 0, NULL, 'assets/materialen/Cocktailprikkers.webp'),
          (34, 'Kurk', 3, NULL, 'assets/materialen/Kurk.webp'),
          (35, 'Buizen', 3, NULL, 'assets/materialen/Buizen.webp'),
          (36, 'Buizen groot', 0, NULL, 'assets/materialen/Buizen_groot.webp'),
          (37, 'Lijmpistolen', 0, NULL, 'assets/materialen/Lijmpistolen.webp'),
          (38, 'Gehoorbescherming', 0, NULL, 'assets/materialen/Gehoorbescherming.webp'),
          (39, 'Spiegels', 2, NULL, 'assets/materialen/Spiegels.webp'),
          (40, 'Satestokjes', 0, NULL, 'assets/materialen/Satestokjes.webp'),
          (41, 'Ijslollystokjes', 0, NULL, 'assets/materialen/Ijslollystokjes.webp'),
          (42, 'Crêpepapier', 0, NULL, 'assets/materialen/Crêpepapier.webp'),
          (43, 'Plastic slangen', 0, NULL, 'assets/materialen/Plastic_slangen.webp'),
          (44, 'Tiewraps', 0, NULL, 'assets/materialen/Tiewraps.webp'),
          (45, 'Föhns', 3, NULL, 'assets/materialen/Föhns.webp'),
          (46, 'Schuurpapier', 3, NULL, 'assets/materialen/Schuurpapier.webp'),
          (47, 'Blik', 0, NULL, 'assets/materialen/Blik.webp'),
          (48, 'Wcrollen', 0, NULL, 'assets/materialen/Wcrollen.webp'),
          (49, 'Plastic', 0, NULL, 'assets/materialen/Plastic.webp'),
          (50, 'Plastic bakken', 0, NULL, 'assets/materialen/Plastic_bakken.webp'),
          (51, 'Kwasten', 0, NULL, 'assets/materialen/Kwasten.webp'),
          (52, 'Houten schijven', 0, NULL, 'assets/materialen/Houten_schijven.webp'),
          (53, 'Vinyl', 0, NULL, 'assets/materialen/Vinyl.webp'),
          (54, 'Ijzeren platen', 0, NULL, 'assets/materialen/Ijzeren_platen.webp'),
          (55, 'Handschoenen', 0, NULL, 'assets/materialen/handschoenen.webp'),
          (56, 'Brandhout', 0, NULL, 'assets/materialen/Brandhout.webp'),
          (57, 'Electrokabels', 3, NULL, 'assets/materialen/Electrokabels.webp'),
          (58, 'Spaken', 0, NULL, 'assets/materialen/Spaken.webp'),
          (59, 'Bekers', 0, NULL, 'assets/materialen/Bekers.webp'),
          (60, 'Gekleurd papier', 0, NULL, 'assets/materialen/Gekleurd_papier.webp'),
          (61, 'Passer', 0, NULL, 'assets/materialen/Passer.webp'),
          (62, 'Puntenslijpers', 0, NULL, 'assets/materialen/Puntenslijpers.webp'),
          (63, 'Zakjes', 0, NULL, 'assets/materialen/Zakjes.webp'),
          (64, 'Elastiekjes groot', 0, NULL, 'assets/materialen/Elastiekjes_groot.webp'),
          (65, 'Elastiekjes', 0, NULL, 'assets/materialen/Elastiekjes.webp'),
          (66, 'Paperclips', 0, NULL, 'assets/materialen/Paperclips.webp'),
          (67, 'Veiligheidsspelden groot', 0, NULL, 'assets/materialen/Veiligheidsspelden_groot.webp'),
          (68, 'Veiligheidsspelden klein', 0, NULL, 'assets/materialen/Veiligheidsspelden_klein.webp'),
          (69, 'Nylon draad', 0, NULL, 'assets/materialen/Nylon_draad.webp'),
          (70, 'Knopen', 0, NULL, 'assets/materialen/Knopen.webp'),
          (71, 'Kralen', 0, NULL, 'assets/materialen/Kralen.webp'),
          (72, 'Spijkers', 0, NULL, 'assets/materialen/Spijkers.webp'),
          (73, 'IJzerwaar', 0, NULL, 'assets/materialen/IJzerwaar.webp'),
          (74, 'AAA batterijen', 0, NULL, 'assets/materialen/AAA_batterijen.webp'),
          (75, 'Haarbandjes', 0, NULL, 'assets/materialen/Haarbandjes.webp'),
          (76, 'Punaises', 0, NULL, 'assets/materialen/Punaises.webp'),
          (77, 'Houtskool', 0, NULL, 'assets/materialen/Houtskool.webp'),
          (78, 'Klei', 0, NULL, 'assets/materialen/Klei.webp'),
          (79, 'Krijt', 3, NULL, 'assets/materialen/Krijt.webp'),
          (80, 'Nietjes', 0, NULL, 'assets/materialen/Nietjes.webp'),
          (81, 'Nietpistool nietjes', 3, NULL, 'assets/materialen/Nietpistool_nietjes.webp'),
          (82, 'Calculators', 0, NULL, 'assets/materialen/Calculators.webp'),
          (83, 'Markeerstiften', 0, NULL, 'assets/materialen/Markeerstiften.webp'),
          (84, 'Sleutels', 0, NULL, 'assets/materialen/Sleutels.webp'),
          (85, 'Gummen', 0, NULL, 'assets/materialen/Gummen.webp'),
          (86, 'Splitpen groot', 0, NULL, 'assets/materialen/Splitpen_groot.webp'),
          (87, 'Splitpennen', 0, NULL, 'assets/materialen/Splitpennen.webp'),
          (88, 'Stempels', 0, NULL, 'assets/materialen/Stempels.webp'),
          (89, 'Zaagsel', 0, NULL, 'assets/materialen/Zaagsel.webp'),
          (90, 'Gordijnhaken', 0, NULL, 'assets/materialen/Gordijnhaken.webp'),
          (91, 'Bouten', 0, NULL, 'assets/materialen/Bouten.webp'),
          (92, 'Moeren', 0, NULL, 'assets/materialen/Moeren.webp'),
          (93, 'Schroeven', 0, NULL, 'assets/materialen/Schroeven.webp'),
          (94, 'Ijzer overige', 0, NULL, 'assets/materialen/Ijzer_overige.webp'),
          (95, 'Lijm', 0, NULL, 'assets/materialen/Lijm.webp'),
          (96, 'Schilderstape', 0, NULL, 'assets/materialen/Schilderstape.webp'),
          (97, 'Plakband', 0, NULL, 'assets/materialen/Plakband.webp'),
          (98, 'Niettang', 0, NULL, 'assets/materialen/Niettang.webp'),
          (99, 'Scharen', 0, NULL, 'assets/materialen/Scharen.webp'),
          (100, 'Kleine scharen', 0, NULL, 'assets/materialen/Kleine_scharen.webp'),
          (101, 'Ijzerdraad', 0, NULL, 'assets/materialen/Ijzerdraad.webp'),
          (102, 'Stiften', 0, NULL, 'assets/materialen/Stiften.webp'),
          (103, 'Kleurpotloden', 0, NULL, 'assets/materialen/Kleurpotloden.webp'),
          (104, 'Potloden grijs', 0, NULL, 'assets/materialen/Potloden_grijs.webp'),
          (105, 'Pennen', 0, NULL, 'assets/materialen/Pennen.webp'),
          (106, 'Houtlijm', 0, NULL, 'assets/materialen/Houtlijm.webp'),
          (107, 'Duct tape', 0, NULL, 'assets/materialen/Duct_tape.webp'),
          (108, 'Dubbelzijdig tape', 0, NULL, 'assets/materialen/Dubbelzijdig_tape.webp'),
          (109, 'Stukjes touw', 0, NULL, 'assets/materialen/Stukjes_touw.webp'),
          (110, 'Katoen', 0, NULL, 'assets/materialen/Katoen.webp'),
          (111, 'Bollen touw', 0, NULL, 'assets/materialen/Bollen_touw.webp'),
          (112, 'Zeilen', 1, NULL, 'assets/materialen/Zeilen.webp'),
          (113, 'Bewaarzakken', 0, NULL, 'assets/materialen/Bewaarzakken.webp'),
          (114, 'Kranten', 0, NULL, 'assets/materialen/Kranten.webp'),
          (115, 'Tijdschriften', 3, NULL, 'assets/materialen/Tijdschriften.webp'),
          (116, 'Papier', 0, NULL, 'assets/materialen/Papier.webp'),
          (117, 'Folie', 0, NULL, 'assets/materialen/Folie.webp'),
          (118, 'Kleurfolie', 0, NULL, 'assets/materialen/Kleurfolie.webp'),
          (119, 'Textiel', 0, NULL, 'assets/materialen/Textiel.webp'),
          (120, 'Binnenbanden', 0, NULL, 'assets/materialen/Binnenbanden.webp'),
          (121, 'Gekleurd papier', 0, NULL, 'assets/materialen/Gekleurd_papier.webp');");
        $stmt->execute();
        $stmt = $conn->prepare("CREATE TABLE `users` (
    `id` int(11) NOT NULL,
    `naam` varchar(255) DEFAULT NULL,
    `wachtwoord` varchar(255) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;");
        $stmt->execute();
        $stmt = $conn->prepare("INSERT INTO `users` (`id`, `naam`, `wachtwoord`) VALUES
  (1, 'test', 'icle'),
  (2, 'admin', '$2y$10$8CcOUXLKalM07jjZf1hp2.E7Vr1IBdyxQJGRXrsrvfKDwc8c7jHbm');");
        $stmt->execute();
    }
    if($databaseOrderer == 1){
        $stmt = $conn->prepare('ALTER TABLE greedschap ADD COLUMN `order` INT NOT NULL AFTER id');
        $stmt->execute();
        $stmt = $conn->prepare('SELECT * FROM greedschap ORDER BY id ASC');
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
            $stmt = $conn->prepare('UPDATE greedschap SET `order` = :order WHERE id = :id');
            $stmt->bindParam(':order', $row['id']);
            $stmt->bindParam(':id', $row['id']);
            $stmt->execute();
        }
        $stmt = $conn->prepare('ALTER TABLE materiaal ADD COLUMN `order` INT NOT NULL AFTER id');
        $stmt->execute();
        $stmt = $conn->prepare('SELECT * FROM materiaal ORDER BY id ASC');
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
            $stmt = $conn->prepare('UPDATE materiaal SET `order` = :order WHERE id = :id');
            $stmt->bindParam(':order', $row['id']);
            $stmt->bindParam(':id', $row['id']);
            $stmt->execute();
        }
    }


    ?>
</body>

</html>
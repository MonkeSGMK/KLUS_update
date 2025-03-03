<?php
require 'dbconnect.php';


if (isset($_POST['voldoende'])) {
    $selectedOption = $_POST['voldoende'];
}

$stmt = $conn->prepare('SELECT id, naam, aantal FROM greedschap');
$stmt->execute();
$result = $stmt->fetchAll();
include 'time.php';
?>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tools</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>

    <header>
        <div class="logo">
            <img src="assets/other/technolab_logo.png" alt="Logo" width="200px">
        </div>
        <div class="header-text">
            <h1>Tools</h1>
        </div>
        <div class="nav-links">
            <a href="index.php">Materiaal</a>
            <a href="login.php"><img src="assets/other/admin.png" width="25px"></a>

        </div>
    </header>

    <div class="top-box">
        <div class="Filter">
            <button onclick="myFunction()" class="dropbutton">Filter<img src="assets/other/drop_down.png"
                    width="15px"></button>
            <div id="filterdropdown" class="dropdown-content">
                <a href="#" onclick="filterCards(0); myFunction()">Niet Ingevuld</a>
                <a href="#" onclick="filterCards(1); myFunction()">Voldoende</a>
                <a href="#" onclick="filterCards(2); myFunction()">Bijna op</a>
                <a href="#" onclick="filterCards(3); myFunction()">Op</a>
                <a href="#" onclick="filterCards('alles')">Alles</a>
            </div>
        </div>

        <!-- Anil maak hiervan een sort functie waarvan je kan kiezen tussen sort op a-z en realiteit -->
        <div class="sort">
            <button onclick="ourFunction()" class="dropbutton">Sort<img src="assets/other/drop_down.png"
                    width="15px"></button>
            <ul id="sortDrowndown" class="dropdown-content">
                <a onclick="sorting('alphabetically'); ourFunction()">alphabetically</a>
                <a onclick="sorting('original'); ourFunction()">original</a>
            </ul>
        </div>
        <div class="print">
            <button onclick="excel()" class="dropbutton">Print excel</button>
        </div>
        <div class="container">
            <form method="POST" action="">
                <div class="search-container">
                    <input type="text" name="search" class="form-control" placeholder="">
                    <img src="assets/other/search.png" alt="Search Icon" onclick="submitForm()">
                </div>
            </form>
        </div>
    </div>

    <div class="container-fluid mt-4">
        <div class="row" id='itemsToSort'>
            <?php

            // Check if the search form was submitted
            if (isset($_POST['search'])) {
                $searchTerm = $_POST['search'];

                $stmt = $conn->prepare('SELECT id, naam, aantal, image_path FROM greedschap WHERE naam LIKE ?');
                $stmt->execute(['%' . $searchTerm . '%']);
                $result = $stmt->fetchAll();
            } else {
                $stmt = $conn->prepare('SELECT id, naam, aantal, image_path FROM greedschap');
                $stmt->execute();
                $result = $stmt->fetchAll();
            }

            $i = 1;
            foreach ($result as $data) {
                // Determine color based on 'aantal' value
                $colorClass = '';

                switch ($data['aantal']) {
                    case 1:
                        $colorClass = 'card-color-1';
                        break;
                    case 2:
                        $colorClass = 'card-color-2';
                        break;
                    case 3:
                        $colorClass = 'card-color-3';
                        break;
                    default:
                        // Default color class when 'aantal' doesn't match any case
                        $colorClass = 'card-color-0';
                }

                echo '<div class="col-2">';
                echo '<input type="hidden" class="name" value="' . $data['naam'] . '">';
                echo '<div class="card ' . $colorClass . '">';
                echo '<img class="card-img-top" src="' . $data['image_path'] . '" alt="" data-toggle="modal" data-target="#myModal' . $i . '">';
                echo '<div class="card-body">';
                echo '<a href="editAantal.php?type=greedschap&id=' . $data['id'] . '&amount=3">';
                echo '<p class="card-text" style="text-decoration: underline;"><img src="assets/other/voldoende.png" width="20" style="margin-right: 20px;">Voldoende</p>';
                echo '</a>';
                echo '<a href="editAantal.php?type=greedschap&id=' . $data['id'] . '&amount=2">';
                echo '<p class="card-text" style="text-decoration: underline;"><img src="assets/other/bijna_op.png" width="20" style="margin-right: 20px;">Bijna op</p>';
                echo '</a>';
                echo '<a href="editAantal.php?type=greedschap&id=' . $data['id'] . '&amount=1">';
                echo '<p class="card-text" style="text-decoration: underline;"><img src="assets/other/op.png" width="20" style="margin-right: 20px;">Op</p>';
                echo '</a>';
                echo '</div></div></div>';
            }
            ?>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // you ask and i deliver jay
        // for any future intern who needs to work in this mess GOOD LUCK
        // random shit for merge sort and reverting it:
        let oldItems, done;
        function sorting(type) {
            let tempItems, oldItemsHTML;
            if (type == 'alphabetically') {
                if (oldItems == undefined) {
                    tempItems = document.getElementById('itemsToSort');
                    oldItemsHTML = tempItems.cloneNode(true);
                    oldItems = oldItemsHTML.innerHTML;
                }
                sortList();
                done = true;
            }
            if (type == 'original') {
                if (done == true) {
                    document.getElementById('itemsToSort').innerhtml = '';
                    document.getElementById('itemsToSort').innerHTML = oldItems;
                }
            }
        }
        function sortList() {
            let items, itemsToSort, i, switching, b, shouldSwitch;
            itemsToSort = document.getElementById('itemsToSort');
            items = Array.from(itemsToSort.children);
            let names = [];
            for (i = 0; i < items.length; i++) {
                let item = items[i].querySelector('.name').value;
                names.push(item);
            }

            let sortedNames = names.slice();
            sortedNames = mergeSort(sortedNames);
            let sortedItemsContainer = document.getElementById('itemsToSort');
            sortedItemsContainer.innerHTML = '';


            for (i = 0; i < sortedNames.length; i++) {
                let originalItem = items.find(item => item.querySelector('.name').value === sortedNames[i]);
                let clonedItem = originalItem.cloneNode(true);
                sortedItemsContainer.appendChild(clonedItem);
            }
        }


        function mergeSort(array) {
            const half = array.length / 2;
            if (array.length < 2) {
                return array;
            }
            const left = array.splice(0, half);
            return merge(mergeSort(left), mergeSort(array));
        }

        function merge(left, right) {
            let arr = [];
            while (left.length && right.length) {
                if (left[0] < right[0]) {
                    arr.push(left.shift());
                } else {
                    arr.push(right.shift());
                }
            }
            return [...arr, ...left, ...right];
        }



        function excel() {
            const now = new Date();
            const dayOfWeek = now.getDay();
            const d = new Date(now);
            d.setHours(0, 0, 0, 0);
            d.setDate(d.getDate() + 3 - (d.getDay() + 6) % 7);
            const week1 = new Date(d.getFullYear(), 0, 4);
            let week = 1 + Math.round(((d - week1) / 86400000 - 3 + (week1.getDay() + 6) % 7) / 7);
            console.log(week)

            window.open(`excelOutput/excel.php?day=${dayOfWeek}&week=${week}`, "_blank");
        }
        // ea
        function myFunction() {
            document.getElementById("filterdropdown").classList.toggle("show");
        }
        function ourFunction() {
            document.getElementById("sortDrowndown").classList.toggle("show");
        }
        function filterCards(aantal) {
            var cards = document.querySelectorAll('.card');
            cards.forEach(function (card) {
                // Show all cards by default
                card.style.display = "block";

                if (aantal !== 'alles') {
                    // If not 'alles', filter cards based on 'aantal'
                    var cardAantal = parseInt(card.className.split(' ').pop().replace('card-color-', ''));
                    if (cardAantal !== aantal) {
                        card.style.display = "none";
                    }
                }
            });

            // Add the 'active-filter' class to the selected filter tab
            var filterTabs = document.querySelectorAll('.dropdown-content a');
            filterTabs.forEach(function (tab) {
                tab.classList.remove('active-filter');
            });

            var selectedTab = document.querySelector(`.dropdown-content a[href="#${aantal}"]`);
            if (selectedTab) {
                selectedTab.classList.add('active-filter');
            }
        }

        function submitForm() {
            document.querySelector('form').submit();
        }

        document.addEventListener('DOMContentLoaded', function () {
            const images = document.querySelectorAll('.card-img-top');
            const modalImages = document.querySelectorAll('.modal-body img');

            images.forEach((image, index) => {
                const imageSource = image.getAttribute('src');
                if (modalImages[index]) {
                    modalImages[index].src = imageSource;
                }
            });

            const cardTextElements = document.querySelectorAll('.card-text');

            cardTextElements.forEach(function (element) {
                element.addEventListener('click', function () {
                    element.classList.add('orange-text');
                    setTimeout(function () {
                        element.classList.remove('orange-text');
                    }, 1000);
                });
            });

            const cards = document.querySelectorAll('.card');
            cards.forEach(function (card) {
                card.addEventListener('click', function () {
                    const selectedAction = card.querySelector('.card-text').textContent.trim();
                    const imageSource = card.querySelector('.card-img-top').getAttribute('src');
                    const imageName = imageSource.substring(imageSource.lastIndexOf('/') + 1).replace(/_/g, ' ').replace(/\.(webp)/, '');

                    $.ajax({
                        type: 'POST',
                        url: 'update_database.php',
                        data: {
                            action: selectedAction,
                            imageName: imageName
                        },
                        success: function (response) {
                            // Handle the response if needed
                        }
                    });
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function (event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function (e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };

    </script>
</body>

</html>
<?php
require 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/editstyle.css">
  <title>Admin</title>
  <script src="
  https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js
  "></script>
</head>

<body>

  <header>
    <div class="logo">
      <img src="assets/other/technolab_logo.png" alt="Logo" width="200px">
    </div>
    <div class="header-text">
      <h1>Admin</h1>
    </div>
    <div class="nav-links">
      <a href="greedschap.php">Tools</a>
      <a href="index.php">Materiaal</a>

    </div>
  </header>

  <main>
    <div class="box" id="add">
      <a id='add'>Toevoegen</a>
      <img src="assets/other/toevoegen.png">
    </div>
    <div class="box">
      <a href="deleteItems.php?type=materialen" id='remove'>Verwijderen</a>
      <img src="assets/other/verwijderen.png">
    </div>
    <div class="box">
      <a href="editIndex.php?type=materialen" id='edit'>Bewerken</a>
      <img src="assets/other/bewerken.png">
    </div>

    <section>
    <select name="type" id="type1" class="styled-select">
    <option value="materialen">Materialen</option>
    <option value="greedschap">Gereedschap</option>
    </select>
    </section>

  <!-- The Modal -->
  <div id="addItemModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <div class="header-content">
          <p> <b> Toevoegen </b> </p>
          <span class="close">&times;</span>
        </div>
      </div>
      <form action="upload_image.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name='type' value='' id='jayIsSTOOPID'>
        <label for="naam">Naam</label>
          <div class="Naam">
            <input type="text" name='naam'><br>
          </div>
        <input type="file" name="image" id="image">
        <br>
        <input type="submit" value="Upload" name="submit">
      </form>
      <select name="type" class="typeSelect">
        <option value="materialen">Materialen</option>
        <option value="greedschap">Gereedschap</option>
      </select>
    </div>
  </div>


  <script>

    document.getElementById('add').addEventListener('click', function () {
      document.getElementById('addItemModal').style.display = 'block';
    });

    var span = document.getElementsByClassName('close')[0];
    span.onclick = function () {
      document.getElementById('addItemModal').style.display = 'none';
    }


    document.querySelectorAll('typeSelect').addEventListener('change', function () {
      console.log('test');
      document.getElementById('jayIsSTOOPID').value = this.value;
      document.getElementById('add').href = 'addItems.php?type=' + this.value;
      document.getElementById('remove').href = 'deleteItems.php?type=' + this.value;
      document.getElementById('edit').href = 'editIndex.php?type=' + this.value;
    });

  </script>

</body>

</html>
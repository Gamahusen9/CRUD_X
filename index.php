<?php
session_start();

if (!isset($_SESSION["masuk"])) {
  header("Location: logsign.php");
  exit;
}

require 'controller.php';
$students = query("SELECT * FROM students");

if (isset($_POST["search"])) {
  $students = cari($_POST["keyword"]);
}

if (isset($_POST["submit"])) {
  header("Location: tambah.php");
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DATA</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <style>
    @font-face {
      font-family: "Nice Sugar", sans-serif;
      src: url('Nice Sugar.ttf');

    }

    .styled-table {
      border-collapse: collapse;
      margin: 25px 0px;
      margin-left: 20px;
      font-size: 0.9em;
      font-family: sans-serif;
      min-width: 400px;

    }

    .styled-table thead tr {
      background-color: #009879;
      color: #ffffff;
      text-align: left;
    }

    .styled-table th,
    .styled-table td {
      padding: 10px 5px;
    }

    .styled-table tbody tr {
      border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
      background-color: #f3f3f3;
    }

    .styled-table tbody tr:last-of-type {
      border-bottom: 2px solid #009879;
    }

    .aksi {
      display: flex;
      padding: 20px;
      margin: 0px 20px;
    }

    h1 {
      font-family: Arial, Helvetica, sans-serif;
      
    }
  </style>


</head>

<body id="relevation">
  <div class="card border border-1 border border-white shadow p-3 mb-5 bg-body-tertiary rounde" style="margin: 150px; padding:25px; width: 30rem;">
    <div class="card-body bg-white text-dark" id="table" style="	background-color: #1f2029;">

      <form class="" action="" method="post">
        <input type="text" name="keyword">
        <button class="btn btn-primary text-white" type="submit" name="search">CARI</button>
      </form>


      <h1 align="center">Data Siswa</h1>
      <a class="btn btn-warning border-1 border border-white ms-2" href="logout.php" role="button">Logout</a>
      <div class="styled-table">
        <table class="mb-3 table  shadow p-3 mb-4 text-dark">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Nis</th>
              <th scope="col">Rombel</th>
              <th scope="col">Rayon</th>
              <th scope="col">Status</th>
              <th scope="col">Gambar</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>

          <tbody class="mb-3">
            <?php $i = 1;  ?>
            <?php foreach ($students as $student) { ?>
              <tr>
                <td> <?= $i ?></td>
                <td> <?= $student["nama"] ?></td>
                <td> <?= $student["nis"] ?></td>
                <td> <?= $student["rombel"] ?></td>
                <td> <?= $student["rayon"] ?></td>
                <td> <?= $student["status"] ?></td>
                <td><img src="img/<?= $student["gambar"] ?>" alt="" class="img-fluid rounded-start" alt="..." width="200px" height="900px" class="ms-3"></td>
                <td>
                  <?php $student["id"] ?>
                  <div class="aksi">
                    <a class="btn btn-danger border-1 border border-white ms-2" href="delete.php?id=<?= $student["id"] ?>" onclick="return confirm('yakin data mau dihapus?')" role="button">HAPUS</a>
                    <a class="btn btn-info border-1 border border-white ms-2" href="update.php?id=<?= $student["id"] ?>" role="button">UBAH</a>
                    <a class="btn btn-warning border-1 border border-white ms-2" href="tampil.php?id=<?= $student["id"] ?>" role="button">LIHAT</a>
                  </div>
                </td>
              </tr>
              <?php $i++ ?>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <div class="mb-3">
        <form action="" method="post">
          <button type="submit" class="btn btn-success" name="submit">Tambah Data</button>

      </div>
      </form>
    </div>
  </div>
  </div>

  </div>
  </div>


</body>

</html>l
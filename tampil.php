<?php
session_start();

if (!isset($_SESSION["masuk"])) {
  header("Location: logsign.php");
  exit;
}
require 'controller.php';
$id = $_GET["id"];

$student = query("SELECT * FROM siswa WHERE id =$id")[0];
if (isset($_POST["submit"]))
    {
        header("Location: index.php");
    }


?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA SELENGKAPNYA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <style>
    </style>
</head>

<body>
    <div class="container">
        <div class="card mb-3 bg-body-tertiary rounded" style="max-width: 500px; margin: 150px 150px 150px 300px; ">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="img/<?=$student["gambar"] ?>" class="img-fluid rounded-start" alt="..."  width="400px" height="900px">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">DATA SELENGKAPNYA </h5>
                        <li>Nama: <?= $student["nama"] ?></li>
                        <li>Nis: <?= $student["nis"] ?></li>
                        <li>Rombel: <?= $student["rombel"] ?></li>
                        <li>Rayon: <?= $student["rayon"] ?></li>
                        <li>Status: <?= $student["status"] ?></li>
                        <li>Hobi: <?= $student["hobi"] ?></li>
                        <li>Alamat: <?= $student["alamat"] ?></li>
                        <li>Merek laptop: <?= $student["merk_laptop"] ?></li>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form  action="" style="margin-left: 800px;" method="post">
    <button type="submit" class="btn btn-primary" name="submit">Kembali</button>
</form>
</body>

</html>
<?php
session_start();

if (!isset($_SESSION["masuk"])) {
  header("Location: logsign.php");
  exit;
}
require 'controller.php';

$id = $_GET["id"];
$student = query("SELECT * FROM students WHERE id =$id")[0];

if (isset($_POST["submit"])) {


        if (ubah($_POST) > 0) {
                echo "<script> alert('data berhasil diupdate')
                       document.location.href = 'index.php'
                       </script>";
        } else {
                echo "<script>
        alert('data tidak berhasil diupdate')
        document.location.href = 'index.php'
        </script>";
        };
};




?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UPDATE DATA</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

</head>

<body>
        <form action="" method="post" enctype="multipart/form-data">
                <div class="container">
                        <div class="card border border-3  shadow p-3 mb-5 bg-body-tertiary rounded" style="margin: 150px; padding:25px; width: 30rem;">
                                <div class="card-body">
                                        <h1 class="mb-3">Update Data</h1>

                                        <label for=""></label>
                                        <input type="hidden" name="id" value="<?= $student["id"] ?>">
                                        <input type="hidden" name="gambarLama" value="<?= $student["gambar"] ?>">
                                        <br>

                                        <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Nama</label>
                                                <input type="TEXT" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama" value="<?= $student["nama"] ?>">
                                        </div>

                                        <div class="mb-3">

                                                <div class="mb-3">
                                                        <label for="exampleInputTEXT1" class="form-label">Nis</label>
                                                        <input type="number" class="form-control" id="exampleInputTEXT1" name="nis" value="<?= $student["nis"] ?>">
                                                </div>

                                                <div class="mb-3">
                                                        <label for="exampleInputTEXT1" class="form-label">Rombel</label>
                                                        <input type="TEXT" class="form-control" id="exampleInputTEXT1" name="rombel" value="<?= $student["rombel"] ?>">
                                                </div>

                                                <div class="mb-3">
                                                        <label for="exampleInputTEXT1" class="form-label">Rayon</label>
                                                        <input type="TEXT" class="form-control" id="exampleInputTEXT1" name="rayon" value="<?= $student["rayon"] ?>">
                                                </div>

                                                <div class="mb-3">
                                                        <label for="exampleInputTEXT1" class="form-label">Status</label>
                                                        <input type="TEXT" class="form-control" id="exampleInputTEXT1" name="status" value="<?= $student["status"] ?>">
                                                </div>
                                                <div class="mb-3">
                                                        <label for="exampleInputTEXT1" class="form-label">hobi</label>
                                                        <input type="TEXT" class="form-control" id="exampleInputTEXT1" name="hobi" value="<?= $student["hobi"] ?>">
                                                </div>
                                                <div class="mb-3">
                                                        <label for="exampleInputTEXT1" class="form-label">alamat</label>
                                                        <input type="TEXT" class="form-control" id="exampleInputTEXT1" name="alamat" value="<?= $student["alamat"] ?>">
                                                </div>
                                                <div class="mb-3">
                                                        <label for="exampleInputTEXT1" class="form-label">merek laptop</label>
                                                        <input type="TEXT" class="form-control" id="exampleInputTEXT1" name="merek" value="<?= $student["merk_laptop"] ?>">
                                                </div>

                                                <div class="mb-3">
                                                        <label for="filegambar" class="form-label">Pilih Gambar</label>
                                                        <input class="form-control mb-3" type="file" id="filegambar" name="gambar">
                                                        <P>File Sebelumnya: </P>
                                                        <img src="img/<?=$student["gambar"]?>" value="<?= $student["gambar"] ?>" alt="" width=100px height="100px">
                                                </div>


                                                <div class="mb-3">
                                                        <button type="submit" class="btn btn-primary" name="submit">Kirim</button>

                                                </div>
                                        </div>
                                </div>
        </form>





</body>

</html>
<?php
session_start();

if (!isset($_SESSION["masuk"])) {
  header("Location: logsign.php");
  exit;
}
require 'controller.php';
$conn = mysqli_connect("localhost", "root", "", "ikan");


if (isset($_POST["submit"])) {


    if (tambah($_POST) > 0) {
        echo "<script> alert('data berhasil dimasukan')
            document.location.href = 'index.php'
                       </script>";
    } else {
        echo "<script>
        alert('data tidak berhasil dimasukan')students
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
    <title>FORM INPUT DATA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

</head>

<body>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="card border border-1 border border-dark shadow p-3 mb-5 bg-body-tertiary rounded bg-primary" style="margin: 150px; padding:25px; width: 30rem;">
                <div class="card-body ">
                    <h1 class="mb-4" align="center">Form Input Data</h1>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                        <input type="TEXT" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama">
                    </div>
                    <div class="mb-3">


                        <div class="mb-3 ">
                            <label for="exampleInputTEXT1" class="form-label">Nis</label>
                            <input type="number" class="form-control" id="exampleInputTEXT1" name="nis">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputTEXT1" class="form-label">Rombel</label>
                            <input type="TEXT" class="form-control" id="exampleInputTEXT1" name="rombel">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputTEXT1" class="form-label">Rayon</label>
                            <input type="TEXT" class="form-control" id="exampleInputTEXT1" name="rayon">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputTEXT1" class="form-label">Status</label>
                            <input type="TEXT" class="form-control" id="exampleInputTEXT1" name="status">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputTEXT1" class="form-label">Hobi</label>
                            <input type="TEXT" class="form-control" id="exampleInputTEXT1" name="hobi">
                        </div>

                        <div class="mb-3">
                            <blabel for="exampleInputTEXT1" class="form-label">alamat</blabel>
                            <input type="TEXT" class="form-control" id="exampleInputTEXT1" name="alamat">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputTEXT1" class="form-label">merek laptop</label>
                            <input type="TEXT" class="form-control" id="exampleInputTEXT1" name="merek">
                        </div>

                        <div class="mb-3">
                            <label for="filegambar" class="form-label">Pilih Gambar</label>
                            <input class="form-control" type="file" id="filegambar" name="gambar">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="submit">Kirim</button>

                        </div>
                    </div>
                </div>
    </form>
</body>

</html>
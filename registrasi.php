<?php

require 'controller.php';


if (isset($_POST['register'])) {
    if (login($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil dimasukan')
        document.location.href= 'login.php';
        </script>
        ";
    } else {
        mysqli_error($conn);
    }
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<body>
    <form action="" method="post">
        <div class="card border border-1 border border-white shadow p-3 mb-5 bg-body-tertiary rounde" style="margin: 150px; padding:25px; width: 30rem;">
            <div class="card-body bg-white text-dark" id="table">
                <h1 class="mb-5">Silahkan Registrasi !</h1>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="username" name="username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control mb-3" id="floatingPassword" placeholder="Password" name="password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control mb-5 border border-10" id="floatingPassword" placeholder="Password" name="confir_pw">
                    <label for="floatingPassword">Konfirmasi Password</label>
                </div>
                <button type="submit" class="btn btn-success" name="register">Kirim</button>
            </div>
        </div>
    </form>
</body>

</html>
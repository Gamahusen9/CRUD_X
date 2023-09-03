<?php
session_start();

if (isset($_SESSION["masuk"])) {
    header("Location: index.php");
}

require 'controller.php';
$conn = mysqli_connect("localhost", "root", "", "ikan");
if (isset($_POST['submit'])) {

    if (sign($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil dimasukan')
        document.location.href= 'logsign.php';
        </script>
        ";
    } else {
        mysqli_error($conn);
    }
};

if (isset($_POST["login"])) {

    if (login($_POST) > 0) {
        echo "<script>
        alert('data berhasil dimasukan')
        document.location.href= 'index.php';
        </script>";
    } else {
        echo "username/password salah !";
    }
}
function login($data)
{
    global $conn;

    $username = $data["username"];
    $password = $data["password"];
    $konfirmasi = $data['confir_pw'];

    if ($password !== $konfirmasi) {
        echo
        "
		<script>
		alert('password tidak sesuai')
		</script>
		";
        return false;
    }

    $result =   mysqli_query($conn, "SELECT * FROM user 
    WHERE
    username = '$username'");

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);
        
        if (password_verify($password, $row["password"])) {

            $_SESSION["masuk"] = true;
            header("Location: index.php");

            exit;
        }
    }

    $error = true;
}
?>


<!doctype html>
<html lang="en">

<head>
    <title>Webleb</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php if (isset($error)) : ?>
        <p>username/password salah</p>
    <?php endif; ?>
    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
                        <label for="reg-log"></label>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <form action="" method="post">
                                                <h4 class="mb-4 pb-3">Log In</h4>
                                                <div class="form-group">
                                                    <input type="text" class="form-style" placeholder="Username" name="username">
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" class="form-style" placeholder="Password" name="password">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" class="form-style" placeholder="Konfirmasi Password" name="confir_pw">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <button type="submit" name="login" class="btn mt-4">Login</button>
                                                <p class="mb-0 mt-4 text-center"><a href="forgot.php" class="link">Forgot your password?</a></p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-back">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-3 pb-3">Sign Up</h4>
                                            <div class="form-group">
                                                <form action="" method="post">
                                                    <input type="text" class="form-style" placeholder="Full Name" name="username">
                                                    <i class="input-icon uil uil-user"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="email" class="form-style" placeholder="Email" name="email">
                                                <i class="input-icon uil uil-at"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" class="form-style" placeholder="Password" name="password">
                                                <i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" class="form-style" placeholder="Konfirmasi Password" name="confir_pw">
                                                <i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <button type="submit" name="submit" class="btn mt-4">Register</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
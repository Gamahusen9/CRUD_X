<?php
session_start();
require 'controller.php';
if (!isset($_SESSION["verify"])) {
    header("location: forgot.php");
}

if ( isset($_POST["submit"])) {
    $verify = $_POST["verify"];
    $duh = $_SESSION["verify"];
    if ($verify == $_SESSION["verify"]) {
       echo "<script>
        alert('KODE VERIFIKASI VALID')
        document.location.href= 'uppw.php';
        </script>";
    } else{
        echo "<script>
        alert('KODE VERIFIKASI INVALID')
        document.location.href= 'verify.php';
        </script>";
    }

};


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
	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Silahkan Masukan Kode Verfikasi dulu!</h4>
											<form action="" method="post">
												<div class="form-group">
													<input type="text" class="form-style" placeholder="Masukan Kode Verifikasi" name="verify">
													<i class="input-icon uil uil-lock-alt"></i>
												</div>
												<button type="submit" class="btn mt-4" name="submit">Enter</button>
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
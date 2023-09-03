<?php
session_start();
require 'controller.php';
if (isset($_POST["fgt"])) {

	if (fgt($_POST) > 0) {

		echo "<script>
		 alert('')
		 document.location.href= 'index.php';
		 </script>";
	};
};

function fgt($data){
	global $conn;

	$username = $data['username'];
	$gmail = $data['email'];

	$result = mysqli_query($conn,"SELECT * FROM user 
    WHERE
    username = '$username'
	");


	 if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
		if ( password_verify($gmail, $row["gmail"])) {
			$_SESSION["verify"] = rand();
			$verify = $_SESSION["verify"];
			echo "<script>
			alert('KODE VERIFIKASI ANDA: $verify')
			document.location.href= 'verify.php';
			</script>";
			exit;
		};
	 }

	 $error=true;

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
											<h4 class="mb-4 pb-3">Masukan Username dan Email</h4>
											<form action="" method="post">
												<div class="form-group">
													<input type="text" class="form-style" placeholder="Username" name="username">
													<i class="input-icon uil uil-user"></i>
												</div>
												<div class="form-group">
													<input type="email" class="form-style" placeholder="Email" name="email">
													<i class="input-icon uil uil-at"></i>
												</div>
												<button type="submit" class="btn mt-4" name="fgt">Enter</button>
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
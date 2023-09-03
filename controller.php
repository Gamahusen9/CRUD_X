<?php

$conn = mysqli_connect("localhost", "root", "", "ikan");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $wadah = [];
    while ($baju = mysqli_fetch_assoc($result)) {
        $wadah[] = $baju;
    }
    return $wadah;
}

function tambah($data)
{
    global $conn;
    // htmlspecialchars untuk blok tag elemen html

    $nama = htmlspecialchars($data["nama"]);
    $nis = htmlspecialchars($data["nis"]);
    $rombel = htmlspecialchars($data["rombel"]);
    $rayon = htmlspecialchars($data["rayon"]);
    $status = htmlspecialchars($data["status"]);
    $hobi = htmlspecialchars($data["hobi"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $merk_laptop = htmlspecialchars($data["merek"]);
    
    $gambar = upload();
	if( !$gambar ) {
		return false;

		
	}
     
    $query = "INSERT INTO siswa
            VALUES
            ('',  '$nama', '$nis','$rombel', '$rayon', '$status', '$hobi', '$alamat', '$merk_laptop', '$gambar')
            ";
              
    
   

    // data yang disimpan di $_post masukan ke database

    mysqli_query($conn, $query);

    // yang akan dikembalikan nilai 1 atau -1 untuk menghasilkan pesan
    return mysqli_affected_rows($conn);
}

function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
                document.location.href= 'tambah.php';
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'gif'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
                document.location.href= 'tambah.php';
			  </script>";
		return false;
	}

	// max 2mb
	if( $ukuranFile > 2000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
                document.location.href= 'tambah.php';
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;
}



function  hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{

    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nis = htmlspecialchars($data["nis"]);
    $rombel = htmlspecialchars($data["rombel"]);
    $rayon = htmlspecialchars($data["rayon"]);
    $status = htmlspecialchars($data["status"]);
    $hobi = htmlspecialchars($data["hobi"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $merek = htmlspecialchars($data["merek"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);
	
	if ($_FILES['gambar']['error'] === 4 ) {
		$gambar= $gambarLama;
	} else{
		$gambar = upload();
	}




    $query = "UPDATE siswa SET
            
            nama = '$nama',
            nis = '$nis',
            rombel = '$rombel',
            rayon = '$rayon',
            status = '$status',
            hobi = '$hobi',
            alamat = '$alamat',
            merk_laptop = '$merek',
            gambar = '$gambar'

                WHERE id = $id
            
            

            
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function updatef() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
                document.location.href= 'update.php';
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'gif'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
                document.location.href= 'index.php';
			  </script>";
		return false;
	}

	// max 2mb
	if( $ukuranFile > 2000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
                document.location.href= 'index.php';
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'update/' . $namaFileBaru);

	return $namaFileBaru;
}
function cari($keyword){
	$query = "SELECT * FROM siswa
	WHERE 

	nama LIKE '%$keyword%' OR
	nis LIKE '%$keyword%' OR
	rombel LIKE '%$keyword%' OR
	rayon LIKE '%$keyword%' OR
	status LIKE '%$keyword%' 

	";

	return query($query);
	
	

}

function sign($data){
	global $conn;

	$username = strtolower(stripslashes($data['username']));
	$gmail = $data['email'];
	$password = $data ['password'];
	$konfirmasi = $data ['confir_pw'];


	if ( $password !== $konfirmasi) {
		echo 
		"
		<script>
		alert('password tidak sesuai')
		</script>
		";
		return false;
	}
	
	$password = password_hash($password, PASSWORD_DEFAULT);
	$gmail = password_hash($gmail, PASSWORD_DEFAULT);


	$query = " INSERT INTO user
	VALUES
	('', '$username','$gmail','$password')
	";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);

}




function verify($data){

	global $conn;

	$verify = $data["verify"];
	$result = mysqli_query($conn,"SELECT * FROM user 
    WHERE
    verify = '$verify'");

	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
		if ( password_verify($verify, $row["verify"])) {
			echo "<script>
			alert('verifikasi berhasil')
			document.location.href= 'index.php';
			</script>";
			exit;
		};
	}
}

function uppw($data){
	global $conn;
	$password = $data["pw"];
	$konfirmasi = $data["confpw"];

	if ( $password !== $konfirmasi) {
		echo 
		"
		<script>
		alert('password tidak sesuai')
		</script>
		";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);


	$query = "UPDATE user SET
            
	password = '$password'
	 ";
mysqli_query($conn, $query);

return mysqli_affected_rows($conn);


}
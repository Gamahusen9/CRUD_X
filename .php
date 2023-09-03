<?php 
require 'controller.php';

require 'controller.php';
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        
        <ul>
            <li>
                <input type="text" name="username" placeholder="Username">
            </li>
            <li>
                <input type="text" name="password" placeholder="Password">
            </li>
        </ul>
        <button type="submit" name="submit"> KIRIM </button>
    </form>
</body>
</html>
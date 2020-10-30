<!-- koneksi database -->
<?php
    $host="localhost";
    $user="root";
    $password="";
    $db="crud_mahasiswa";

    $kon = mysqli_connect($host,$user,$password,$db);
    if(!$kon){
        die("koneksi gagal".mysqli_connect_error());
    }
?>
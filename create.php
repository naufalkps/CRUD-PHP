    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pendaftaran Anggota</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <?php
                // include file koneksi
                include "koneksi.php";

                // mencek inputan karakter
                function input($data){
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                // cek apakah ada kiriman dari form method post
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $username = input($_POST["username"]);
                    $nama = input($_POST["nama"]);
                    $alamat = input($_POST["alamat"]);
                    $email = input($_POST["email"]);
                    $no_hp = input($_POST["no_hp"]);

                    // Query menginputkan data
                    $sql = "insert into mahasiswa (username,nama,alamat,email,no_hp) values
                    ('$username','$nama','$alamat','$email','$no_hp')";

                    // mengeksekisi Query
                    $hasil = mysqli_query($kon,$sql);

                    // cek kondisi apakah berhasil atau tidak
                    if ($hasil){
                        header("Location:index.php");
                    }else{
                        echo "<div class='alert alert-danger'>Data Gagal Disimpan.</div>";
                    }
                }
            ?>

            <h2>Input Data</h2>

            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>"method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukan username" require/>
            </div>

            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>"method="post">
            <div class="form-group">
                <label>nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukan nama" require/>
            </div>

            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>"method="post">
            <div class="form-group">
                <label>alamat</label>
                <textarea name="alamat" class="form-control" placeholder="Masukan alamat" require/></textarea>
            </div>

            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>"method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukan email" require/>
            </div>

            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>"method="post">
            <div class="form-group">
                <label>no</label>
                <input type="text" name="no_hp" class="form-control" placeholder="Masukan No Hp" require/>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
    </html>
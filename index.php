<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>CRUD</title>
</head>
<body>
    <div class="container">
        <br>
        <h4>CRUD MAHASISWA</h4>

        <?php
            include "koneksi.php";

            // method hapus data
            // cek apakah ada nilai dari method GET dengan nama id_mahasiswa
            if (isset($_GET['id_mahasiswa'])){
                $id_mahasiswa = htmlspecialchars($_GET["id_mahasiswa"]);

                $sql = "delete from mahasiswa where id_mahasiswa ='$id_mahasiswa'";
                $hasil = mysqli_query($kon,$sql);

                // cek kondisi apakah berhasil atau tidak
                if ($hasil){
                    header("Location:index.php");
                }else{
                    echo "<div class='alert alert-danger'>Data Gagal Dihapus</div>";
                }
            }
        ?>

        <table class="table table-bordered table-hover">
            <br>
            <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>No Hp</th>
                <th colspan='2'>Aksi</th>
            </tr>
            </thead>

            <?php
                include "koneksi.php";

                $sql="SELECT * FROM mahasiswa order by id_mahasiswa";

                $hasil = mysqli_query($kon,$sql);
                $no=0;
                while ($data = mysqli_fetch_array ($hasil)){
                    $no++;
                    ?>

                    <tbody>
                        <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data["username"]; ?></td>
                        <td><?php echo $data["nama"]; ?></td>
                        <td><?php echo $data["alamat"]; ?></td>
                        <td><?php echo $data["email"] ?></td>
                        <td><?php echo $data["no_hp"] ?></td>
                        <td>
                            <!-- menu update and delete -->
                            <a href="update.php?id_mahasiswa=<?php echo htmlspecialchars($data['id_mahasiswa']) ?>" class="btn btn-warning" role="button" >Update</a>
                            <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id_mahasiswa=<?php echo $data ['id_mahasiswa'];?>"class ="btn btn-danger" role="button" >Deleta</a>
                        </td>
                        </tr>
                    </tbody>
                    <?php
                }
            ?>
        </table>
        <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
    </div>
</body>
</html>
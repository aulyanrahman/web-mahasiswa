<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Input Data Mahasiswa</title>
<link rel="stylesheet" href="css/bootstrap.css">
<script src="js/bootstrap.js"></script>
</head>
<body>
    <div class="container col-md-15">
        <div class="card">
            <div class="card-header bg-primary text-white">
                List Data Mahasiswa
            </div>
            <div class="card-body">
                <a href="index.php" class="btn btn-primary">Tambah Data</a>
                
                <form action="data_mahasiswa.php" method="get">
                    <label>Cari :</label>
                    <input type="text" name="cari">
                    <input type="submit" value="Cari">
                </form>
                
                <?php 
                    if(isset($_GET['cari'])){
                    $cari = $_GET['cari'];
                    echo "<b>Hasil pencarian : ".$cari."</b>";
                    }
                ?>

                <table class="table table-bordered">
                    <tr>
                        <th>ID MAHASISWA</th>
                        <th>NPM MAHASISWA</th>
                        <th>NAMA MAHASISWA</th>
                        <th>TEMPAT LAHIR</th>
                        <th>TANGGAL LAHIR</th>
                        <th>JENIS KELAMIN</th>
                        <th>ALAMAT</th>
                        <th>KODE POS</th>
                        <th>AKSI</th>
                    </tr>
                    <?php
                        include "koneksi.php";
                        if(isset($_GET['cari'])){
                        $cari = $_GET['cari'];
                        $tampil = mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE nama like '%".$cari."%'");    
                        }else{
                        $tampil = mysqli_query($koneksi,"SELECT * FROM mahasiswa");  
                        }
                        $no = 1;
                        while($data=mysqli_fetch_array($tampil))
                        {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['npm']; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['tempat_lahir']; ?></td>
                        <td><?php echo $data['tanggal_lahir']; ?></td>
                        <td><?php echo $data['jenis_kelamin']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>
                        <td><?php echo $data['kode_pos']; ?></td>
                        <td>
                            <a href="edit_mahasiswa.php?idmhs=<?php echo $data['idmhs']; ?>" class="btn btn-sm btn-warning">EDIT</a>
                            <a href="delete.php?idmhs=<?php echo $data['idmhs']; ?>" class="btn-sm btn-danger">HAPUS</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
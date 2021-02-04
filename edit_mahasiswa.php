<?php
    include "koneksi.php";
    $id = $_GET['idmhs'];
    $ambilData = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE idmhs=$id");

    $data = mysqli_fetch_array($ambilData)
?>

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
    <div class="container col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Edit Data Mahasiswa
            </div>
            <div class="card-body">
                <form action="" method="POST" class="form-item">
                    <div class="form-group">
                        <label for="npm">NPM Mahasiswa</label>
                        <input type="number" value="<?php echo $data['npm']; ?>" name="npm" class="form-control col-md-9" placeholder="Masukkan NPM">
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Mahasiswa</label>
                        <input type="text" value="<?php echo $data['nama']; ?>" name="nama" class="form-control col-md-9" placeholder="Masukkan Nama Mahasiswa">
                    </div>

                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" value="<?php echo $data['tempat_lahir']; ?>" name="tempat_lahir" class="form-control col-md-9" placeholder="Masukkan Tempat Lahir">
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" value="<?php echo $data['tanggal_lahir']; ?>" name="tanggal_lahir" class="form-control col-md-9" placeholder="Masukkan Tanggal Lahir">
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <input type="text" value="<?php echo $data['jenis_kelamin']; ?>" name="jenis_kelamin" class="form-control col-md-9" placeholder="Masukkan Jenis Kelamin">
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" value="<?php echo $data['alamat']; ?>" name="alamat" class="form-control col-md-9" placeholder="Masukkan Alamat">
                    </div>

                    <div class="form-group">
                        <label for="kode_pos">Kode Pos</label>
                        <input type="number" value="<?php echo $data['kode_pos']; ?>" name="kode_pos" class="form-control col-md-9" placeholder="Masukkan Kode Pos">
                    </div>

                    <button type="submit" class="btn btn-primary" name="simpan">SIMPAN</button>
                    <button type="reset" class="btn btn-danger">BATAL</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    if(isset($_POST['simpan']))
    {
        $npm            = $_POST['npm'];
        $nama           = $_POST['nama'];
        $tempat_lahir   = $_POST['tempat_lahir'];
        $tanggal_lahir  = $_POST['tanggal_lahir'];
        $jenis_kelamin  = $_POST['jenis_kelamin'];
        $alamat         = $_POST['alamat'];
        $kode_pos       = $_POST['kode_pos'];

        $insert = mysqli_query($koneksi, "UPDATE mahasiswa
        SET npm='$npm', nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir',
        jenis_kelamin='$jenis_kelamin', alamat='$alamat', kode_pos='$kode_pos'
        WHERE idmhs='$id'") or die(mysqli_error($koneksi));

        echo "<div align='center'><h5>Silahkan Tunggu, Data Sedang Di-update...</h5></div>";
        echo "<meta http-equiv='refresh' content='1;url=http://localhost/web-mahasiswa/data_mahasiswa.php'>";
    }
?>
<?php
    include "koneksi.php";
    $id = $_GET['idmhs'];
    $ambilData = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE idmhs=$id");

    echo "<meta http-equiv='refresh' content='1;url=http://localhost/web-mahasiswa/data_mahasiswa.php'>";
?>
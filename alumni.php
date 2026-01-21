<?php
$koneksi = mysqli_connect("localhost", "root", "", "perguruan_tinggi");
$aksi = $_POST["aksi"];
if($aksi != "tampil") {
    $nim = $_POST["nim"];
    if($aksi != "hapus") {
        $nm_alumni = $_POST["nm_alumni"];
        $prodi = $_POST["prodi"];
        $tmpt_lahir = $_POST["tmpt_lahir"];
        $tgl_lahir = $_POST["tgl_lahir"];
        $alamat = $_POST["alamat"];
        $no_hp = $_POST["no_hp"];
        $thn_lulus = $_POST["thn_lulus"];
        $foto = $_POST["foto"];
    }
}

switch($aksi) {
    case "tampil":
        $sql = "select * from alumni order by nm_alumni";
        $result = mysqli_query($koneksi, $sql);
        $data = [];
        while($row = mysqli_fetch_assoc($result)) $data[] = $row;
        echo json_encode($data);
        break;
    case "simpan":
        $sql = "insert into alumni values
                ('$nim', '$nm_alumni', '$prodi', '$tmpt_lahir', '$tgl_lahir', '$alamat', '$no_hp', '$thn_lulus')";
        $result = mysqli_query($koneksi, $sql);
    if($result) {
        file_put_contents("foto/$nim.jpeg", base64_decode($foto));
        echo "berhasil";
    } else echo "gagal";
    break;
}
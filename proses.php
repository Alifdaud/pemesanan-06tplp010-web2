<?php
include('koneksi.php');

$nama       = "";
$alamat     = "";
$pemesanan  = "";
$ukuran     = "";
$pesanan    = "";
$noHp       = "";
$email      = "";
$jumlah     = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id         = $_GET['id'];
    $sql1       = "delete from tbl_pesanan_06tplp010_alifdaudf where id = '$id'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "select * from tbl_pesanan_06tplp010_alifdaudf where id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $nama       = $r1['nama_alif'];
    $alamat     = $r1['alamat_alif'];
    $pesanan    = $r1['pesanan_alif'];
    $email      = $r1['email_alif'];
    $jumlah     = $r1['jumlah_alif'];
    $ukuran     = $r1['ukuran_alif'];
    $noHp       = $r1['no_hp_alif'];


    if ($nama == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $nama       =  $_POST['nama_alif'];
    $alamat     =  $_POST['alamat_alif'];
    $pesanan    =  $_POST['pesanan_alif'];
    $email      =  $_POST['email_alif'];
    $jumlah     =  $_POST['jumlah_alif'];
    $ukuran     =  $_POST['ukuran_alif'];
    $noHp       =  $_POST['no_hp_alif'];

    if ( $nama && $alamat && $noHp && $email && $pesanan && $ukuran && $jumlah ) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update tbl_pesanan_06tplp010_alifdaudf set nama_alif='$nama',alamat_alif = '$alamat',no_hp_alif='$noHp',email_alif='$email',pesanan_alif='$pesanan',ukuran_alif='$ukuran',jumlah_alif='$jumlah' where id = '$id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "INSERT into  tbl_pesanan_06tplp010_alifdaudf(nama_alif,alamat_alif,no_hp_alif,email_alif,pesanan_alif,ukuran_alif,jumlah_alif) VALUES ('$nama','$alamat','$noHp','$email','$pesanan','$ukuran','$jumlah')";

            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>
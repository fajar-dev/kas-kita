<?php
//panggil file koneksi.php yang sudah anda buat
include "../koneksi.php";

$id=$_GET['id'];   //ambil parameter GET id  dan buat variabel
//gunakan parameter get untuk menghapus data berdasarkan id produk
$hapus = mysqli_query($koneksi, "DELETE FROM kas where id='$id'");
if($hapus){ //jika berhasil
    echo "<script>alert('Data Berhasil Di Hapus');document.location='dana_masuk.php'</script>";
}else{  //jika gagal
    echo "<script>alert('Data Gagal Di Hapus, Coba ulangi lagi');document.location='dana_masuk.php'</script>";
}
?>
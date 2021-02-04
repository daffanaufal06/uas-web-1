<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil Data yang Dikirim dari Form
$npm = $_POST['npm'];
$nama = $_POST['nama'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$kode_pos = $_POST['alamat'];
$alamat = $_POST['kode_pos'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
	
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;

// Set path folder tempat menyimpan fotonya
$path = "images/".$fotobaru;

// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
	// Proses simpan ke Database
	$sql = $pdo->prepare("INSERT INTO siswa(npm, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, kode_pos, foto) VALUES(:npm, :nama, :tempat_lahir, :tanggal_lahir, :jenis_kelamin,:alamat,:kode_pos,:foto)");
	$sql->bindParam(':npm', $npm);
	$sql->bindParam(':nama', $nama);
	$sql->bindParam(':tempat_lahir', $tempat_lahir);
	$sql->bindParam(':tanggal_lahir', $tanggal_lahir);
	$sql->bindParam(':jenis_kelamin', $jenis_kelamin);
	$sql->bindParam(':alamat', $alamat);
	$sql->bindParam(':kode_pos', $kode_pos);
	$sql->bindParam(':foto', $fotobaru);
	$sql->execute(); 
	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		header("location: index.php"); // Redirect ke halaman index.php
	}else{
		// Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
	}
}else{
	// Jika gambar gagal diupload, Lakukan :
	echo "Maaf, Gambar gagal untuk diupload.";
	echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
}
?>

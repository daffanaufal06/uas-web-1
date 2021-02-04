<html>
<head>
	<title>Data Mahasiswa</title>
</head>
<body>
	<h1>Data Mahasiswa</h1>
	
	<?php
	// Load file koneksi.php
	include "koneksi.php";
	
	// Ambil data NIS yang dikirim oleh index.php melalui URL
	$npm = $_GET['npm'];
	
	// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
	$query = "SELECT * FROM siswa WHERE npm='".$npm."'";
	$sql = mysqli_query($connect, $query);  // Eksekusi/Jalankan query dari variabel $query
	$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
	?>
	
	<form method="post" action="proses_ubah.php?npm=<?php echo $npm; ?>" enctype="multipart/form-data">
	<table cellpadding="8">
	<tr>
		<td>Nama</td>
		<td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
	</tr>
	<tr>
		<td>Tempat Lahir</td>
		<td><input type="text" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>"></td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td>
		<td><input type="text" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>"></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>
		<?php
		if($data['jenis_kelamin'] == "Laki-laki"){
			echo "<input type='radio' name='jenis_kelamin' value='laki-laki' checked='checked'> Laki-laki";
			echo "<input type='radio' name='jenis_kelamin' value='perempuan'> Perempuan";
		}else{
			echo "<input type='radio' name='jenis_kelamin' value='laki-laki'> Laki-laki";
			echo "<input type='radio' name='jenis_kelamin' value='perempuan' checked='checked'> Perempuan";
		}
		?>
		</td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td><textarea name="alamat"><?php echo $data['alamat']; ?></textarea></td>
	</tr>
	<tr>
		<td>Kode Pos</td>
		<td><input type="text" name="kode_pos" value="<?php echo $data['kode_pos']; ?>"></td>
	</tr>
	<tr>
		<td>Foto</td>
		<td>
			<input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
			<input type="file" name="foto">
		</td>
	</tr>
	</table>
	
	<hr>
	<input type="submit" value="Ubah">
	<a href="index.php"><input type="button" value="Batal"></a>
	</form>
</body>
</html>

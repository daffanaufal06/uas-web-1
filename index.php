<html>
<head>
	<title>Data Mahasiswa</title>
</head>
<body>
	<h1>Data Mahasiswa</h1>
	<a href="form_simpan.php">Tambah Data</a><br><br>
	<table border="1" width="100%">
	<tr>
		<th>Foto</th>
		<th>NPM</th>
		<th>Nama</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Jenis Kelamin</th>
		<th>Alamat</th>
		<th>Kode Pos</th>
		<th colspan="2">Aksi</th>
	</tr>
	<?php
	// Load file koneksi.php
	include "koneksi.php";
	
	$query = "SELECT * FROM siswa"; // Query untuk menampilkan semua data siswa
	$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
	
	while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
		echo "<tr>";
		echo "<td><img src='images/".$data['foto']."' width='100' height='100'></td>";
		echo "<td>".$data['npm']."</td>";
		echo "<td>".$data['nama']."</td>";
		echo "<td>".$data['tempat_lahir']."</td>";
		echo "<td>".$data['tanggal_lahir']."</td>";
		echo "<td>".$data['jenis_kelamin']."</td>";
		echo "<td>".$data['alamat']."</td>";
		echo "<td>".$data['kode_pos']."</td>";
		echo "<td><a href='form_ubah.php?npm=".$data['npm']."'>Ubah</a></td>";
		echo "<td><a href='proses_hapus.php?npm=".$data['npm']."'>Hapus</a></td>";
		echo "</tr>";
	}
	?>
	</table>
</body>
</html>

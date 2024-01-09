<?php
    $Nama_Pengguna = $_POST['Nama_Pengguna'];
    $Email_Pengguna = $_POST['Email_Pengguna'];
    $Pw_Pengguna = $_POST['Pw_Pengguna'];
	
	// Mengenkripsi data password pengguna pada database
	$Pw_Pengguna = password_hash($Pw_Pengguna, PASSWORD_DEFAULT);

    // Connect ke database
    $conn = new mysqli('localhost','user','','angkotify');

    if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO pengguna(Nama_Pengguna, Email_Pengguna, Pw_Pengguna) values(?, ?, ?)");
		$stmt->bind_param("sss", $Nama_Pengguna, $Email_Pengguna, $Pw_Pengguna);
		$stmt->execute();
		echo "Pendaftaran Berhasil Dilakukan...";
		$stmt->close();
		$conn->close();

		// Menambahkan delay 1 detik
		sleep(1);

		// Setelah pendaftaran berhasil, arahkan pengguna ke halaman login-pengguna.html
		header("Location: login-pengguna.html");
		exit(); // Pastikan untuk keluar dari skrip setelah melakukan redirect
    }
?>
<?php
    $Nama_Supir = $_POST['Nama_Supir'];
    $NoKTP_Supir = $_POST['NoKTP_Supir'];
    $Tgl_Lahir = $_POST['Tgl_Lahir'];
    $No_SIM = $_POST['No_SIM'];
    $Plat_Nomor = $_POST['Plat_Nomor'];
    $NoHP_Supir = $_POST['NoHP_Supir'];
    $Pw_Supir = $_POST['Pw_Supir'];
    
    // Mengenkripsi data password supir pada database
    $Pw_Supir = password_hash($Pw_Supir, PASSWORD_DEFAULT);

    // Connect ke database
    $conn = new mysqli('localhost', 'user', '', 'angkotify');

    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO supir(Nama_Supir, No_KTP, Tgl_Lahir, No_Sim, Plat_Nomor, NoHP_Supir, Pw_Supir) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $Nama_Supir, $NoKTP_Supir, $Tgl_Lahir, $No_SIM, $Plat_Nomor, $NoHP_Supir, $Pw_Supir);
        $stmt->execute();
        echo "Pendaftaran Berhasil Dilakukan...";
        $stmt->close();
        $conn->close();

        // Menambahkan delay 1 detik
        sleep(1);

        // Setelah pendaftaran berhasil, arahkan pengguna ke halaman login-supir.html
        header("Location: login-supir.html");
        exit(); // Pastikan untuk keluar dari skrip setelah melakukan redirect
    }
?>

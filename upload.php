<?php 

$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "angkotify";

// Membuat koneksi
$conn = new mysqli('localhost','root','','angkotify');

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

if (isset($_POST['proses'])) {
    $direktori = "berkas/";
    $file_name = $_FILES['NamaFile']['name'];
    move_uploaded_file($_FILES['NamaFile']['tmp_name'], $direktori . $file_name);

    $query = "INSERT INTO dokumen SET file = '$file_name'";
    if (mysqli_query($conn, $query)) {
        $response = array("status" => "success", "message" => "File berhasil diupload");
        
    } else {
        $response = array("status" => "error", "message" => "Gagal mengunggah file");
        
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
  
</head>
<body>
  <!-- Navbar -->
<header>
      <div class="jumbotron">
        <a href="#"
          ><img src="img/logoAngkotify.png" alt="Angkotify" class="headlogo"
        /></a>
      </div>
      <nav>
        <ul>
          <li><a href="landing-page.html">Home</a></li>
          <li><a href="lokasi-angkot.html">Pesan Sekarang</a></li>
          <li><a href="profile.html">Profil</a></li>
          <li><a href="payment-history.php">Riwayat</a></li>
          <li><a href="help-page.html">Help</a></li>
        </ul>
      </nav>
    </header>

<main>
      <div class="card">
      <!-- upload -->
      <h3>Upload Dokumen</h3>
      <p>Upload file bukti pembayaran Anda</p>
        <form action=" " method="POST" enctype="multipart/form-data"> 
          <input type = "file" name = "NamaFile">
          <input type="submit" name = "proses" value="Upload">
        </form>
      </div>
</main>

</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    <?php
    if (isset($_POST['proses'])) {
        echo "showNotification();";
    }
    ?>
});

function showNotification() {
    var notification = document.createElement("div");
    notification.className = "notification";
    notification.innerHTML = "File berhasil diupload";
    document.body.appendChild(notification);

    // Menambahkan kelas "show" untuk mengubah properti display
    notification.classList.add("show");

    setTimeout(function () {
        // Menghapus notifikasi dari DOM setelah 3 detik
        notification.remove();
    }, 3000);
}

</script>
</html>
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
  $file_name=$_FILES['NamaFile']['name'];
  move_uploaded_file($_FILES['NamaFile']['tmp_name'],$direktori.$file_name);

  mysqli_query($conn, "insert into dokumen set file= '$file_name'");

  echo "<b>File berhasil diupload";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css" />
  
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
          <li><a href="lokasi-angkot.html">Lokasi</a></li>
          <li><a href="profile.html">Profil</a></li>
          <li><a href="help-page.html">Help</a></li>
        </ul>
      </nav>
    </header>


  <div class="card" style="text-align: center;">
  <!-- upload -->
  <h3>Upload Dokumen</h3>
    <form action=" " method="POST" enctype="multipart/form-data"> 
      <b>File Upload</b> <input type = "file" name = "NamaFile">
      <input type="submit" name = "proses" value="Upload">
    </form>
  </div>
</body>
</html>
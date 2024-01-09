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
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pembayaran | Angkotify</title>
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    date_default_timezone_set('Asia/Jakarta');
  </head>
  <body>
    <header>
      <div class="jumbotron">
        <a href="landing-page.html"
          ><img src="img/logoAngkotify.png" alt="Angkotify" class="headlogo"
        /></a>
      </div>
      <nav>
        <ul>
          <li><a href="landing-page.html">Home</a></li>
          <li><a href="lokasi-angkot.html">Lokasi</a></li>
          <li><a href="profile.html">Profile</a></li>
          <li><a href="help-page.html">Help</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <div class="card">

        <table style="font-size: medium;">
            <thead>
                <tr>
                    <th>Aksi</th>
                    <th>No.</th>	
                    <th>Nama</th>
                    <th>Bukti Pembayaran</th>
                </tr>
            </thead>

            <?php 
  function History($data, $imageName) {
    global $conn;
    
    // Ambil data dari tiap elemen dalam form
    $nomor_transaksi = htmlspecialchars($data["nomor_transaksi"]);
    $nama = htmlspecialchars($data["nama"]);
    $bukti_pembayaran = $imageName; // Menggunakan nama file gambar yang diunggah sebagai bukti pembayaran
    $aksi = htmlspecialchars($data["aksi"]);

    // Query insert data
    $query = "INSERT INTO history (nomor_transaksi, Nama_Pengguna, bukti_pembayaran, aksi, waktu) VALUES ('$nomor_transaksi', '$nama', '$bukti_pembayaran', '$aksi', NOW())";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  } 
?>

        </table>
        
      </div>
    </main>

    <footer>
      <p>Copyright &copy; Angkotify</p>
    </footer>
  </body>
</html>
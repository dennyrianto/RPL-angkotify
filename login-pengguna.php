

<?php 
session_start();

$servername = "localhost";
$username = "root";
$password = ""; // Sesuaikan dengan password MySQL Anda
$dbname = "angkotify";

// Membuat koneksi
$conn = new mysqli('localhost','root','','angkotify');

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Lakukan validasi data login jika diperlukan

  // Periksa kecocokan username dan password dalam database
  $stmt = $conn->prepare("SELECT * FROM pengguna WHERE Email_Pengguna=? AND Pw_Pengguna=?");
  
  $stmt = $conn -> prepare($sql);  
  $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

  if ($result->num_rows == 1) {
      // Login berhasil, set session dan alihkan pengguna ke halaman lain sesuai kebutuhan
      $_SESSION['login'] = true;
      header("Location: landing-page.html"); 
      exit();
  } else {
      $error = "Email atau password salah.";
      header("location: login-pengguna.php?error=1");
      exit; 
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Angkotify - Login Pengguna</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
  </head>
  <body style="background-color: #eeeeee">
    <section class="vh-100 gradient-custom">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div
              class="card bg-body"
              style="border-radius: 1rem; box-shadow: 5px 10px 18px #dddddd"
            >
              <div class="card-body p-5 text-center">
                <div class="mb-md5 mt-md-4 pb-5">
                  <img
                    src="img/logoAngkotify.png"
                    style="margin-bottom: 50px"
                  />

                  <!-- Form buat input data dari pengguna -->
                  <form action="landing-page.html" method="post" onsubmit="return validateLogin()">
                    <div class="form-outline form-white mb-4">
                      <input
                        type="email"
                        id="Email_Pengguna"
                        class="form-control form-control-lg"
                        placeholder="Email"
                        required
                      />
                    </div>

                    <div class="form-outline form-white mb-4">
                      <input
                        type="password"
                        id="typePasswordX"
                        class="form-control form-control-lg"
                        placeholder="Password"
                        required
                      />
                    </div>

                    <button
                      class="btn btn-outline-light btn-lg px-5"
                      type="submit"
                      style="background-color: #418e02"
                      name="login"
                    >
                      Login
                    </button>
                  </form>
                </div>

                <div>
                  <p class="mb-0">Belum punya akun?</p>
                  <button
                    class="btn px-5"
                    style="margin-top: 10px; background-color: #418e02"
                  >
                    <a class="text-white" href="daftar-pengguna.html">Daftar</a>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>

    <?php
    // Menampilkan pesan error jika parameter error=1 pada URL
    if(isset($_GET['error']) && $_GET['error'] == 1) { ?>
      <p class="error-message">Username atau password salah. Silakan coba lagi.</p>
    <?php } ?>


    <!-- <script>
      function validateLogin() {
        var email = document.getElementById('Email_Pengguna').value;
        var password = document.getElementById('typePasswordX').value;

        // Contoh validasi, Anda dapat menggantinya dengan validasi sesuai kebutuhan
        if (email.trim() === '' || password.trim() === '') {
          alert('Email dan password harus diisi.');
          return false; // Mencegah formulir dikirim
        }

        // Jika validasi berhasil, formulir dikirim
        return true;
      }
    </script> -->
 

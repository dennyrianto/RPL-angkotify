function editProfile() {
  // Mengaktifkan mode edit
  document.getElementById("name").removeAttribute("readonly");
  document.getElementById("phone").removeAttribute("readonly");
  document.getElementById("email").removeAttribute("readonly");
  document.getElementById("location").removeAttribute("readonly");
}

function saveProfile() {
  // Menyimpan perubahan dan menonaktifkan mode edit
  document.getElementById("name").setAttribute("readonly", true);
  document.getElementById("phone").setAttribute("readonly", true);
  document.getElementById("email").setAttribute("readonly", true);
  document.getElementById("location").setAttribute("readonly", true);

  // Menampilkan notifikasi
  showNotification("Profil berhasil disimpan!");
}

function showNotification(message) {
  // Membuat elemen notifikasi
  var notification = document.createElement("div");
  notification.className = "notification";
  notification.innerHTML = message;

  // Menambahkan notifikasi ke dalam body
  document.body.appendChild(notification);

  // Menghilangkan notifikasi setelah 3 detik
  setTimeout(function () {
    notification.style.display = "none";
  }, 3000);
}

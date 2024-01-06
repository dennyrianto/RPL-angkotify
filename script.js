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

  // Tambahan: Anda dapat mengirim data profil ke server di sini
  alert("Profil disimpan!");
}

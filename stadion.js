// Cek apakah pengguna sudah login
const isLoggedIn = localStorage.getItem("isLoggedIn");

if (!isLoggedIn || isLoggedIn !== "true") {
  alert("Anda harus login terlebih dahulu.");
  window.location.href = "login.html"; // Redirect ke halaman login
}
const panels = document.querySelectorAll(".panel");

panels.forEach((panel) => {
  panel.addEventListener("click", () => {
    removeActiveClasses();
    panel.classList.add("active");
  });
});

function removeActiveClasses() {
  panels.forEach((panel) => {
    panel.classList.remove("active");
  });
}
document.getElementById("logoutBtn").addEventListener("click", function () {
  localStorage.removeItem("isLoggedIn"); // Hapus status login
  alert("Anda telah logout.");
  window.location.href = "login.html"; // Redirect ke halaman login
});
// Get the button and the section to scroll to
const scrollButton = document.getElementById("scrollButton");
const aboutStadiumSection = document.getElementById("aboutStadium");

// Add event listener for button click
scrollButton.addEventListener("click", function () {
  aboutStadiumSection.scrollIntoView({
    behavior: "smooth", // Smooth scroll to the section
  });
});

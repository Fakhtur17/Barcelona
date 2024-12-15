<?php

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="shop.css" />
  </head>
  <body>
    <header>
      <div class="navbar">
        <img src="img/barca2.png" alt=" logo.png" />
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="pemain.html">Pemain</a></li>
          <li><a href="stadion.html">Stadion</a></li>
          <li><a href="shop.php">Shop</a></li>
        </ul>
        <button id="logoutBtn">Logout</button>
      </div>
    </header>
    <!-- tulisan Pemain -->
    <div class="content">
      <h1>Merchandise</h1>
      <div>
        <a href="index.php"></a>
        <button type="button" id="shopButton">Shop</button>
      </div>
    </div>
    <!-- Background -->
    <div class="background"></div> 
  </body>
  <script>
    // Cek apakah pengguna sudah login
    const isLoggedIn = localStorage.getItem("isLoggedIn");

    if (!isLoggedIn || isLoggedIn !== "true") {
      alert("Anda harus login terlebih dahulu.");
      window.location.href = "login.html"; // Redirect ke halaman login
    }
    document
      .getElementById("shopButton")
      .addEventListener("click", function () {
        // Pindah ke halaman shop.php
        window.location.href = "index.php";
      });
      document.getElementById("logoutBtn").addEventListener("click", function () {
        localStorage.removeItem("isLoggedIn"); // Hapus status login
        alert("Anda telah logout.");
        window.location.href = "login.html"; // Redirect ke halaman login
      });

  </script>
</html>

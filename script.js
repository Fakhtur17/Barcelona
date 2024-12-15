// Cek apakah pengguna sudah login
const isLoggedIn = localStorage.getItem("isLoggedIn");

if (!isLoggedIn || isLoggedIn !== "true") {
  alert("Anda harus login terlebih dahulu.");
  window.location.href = "login.html"; // Redirect ke halaman login
}

const slider = document.querySelector(".slider");
const list = document.querySelector(".list");
const thumbnail = document.querySelector(".thumbnail");
const next = document.querySelector("#next");
const prev = document.querySelector("#prev");

next.addEventListener("click", () => {
  initSlider("next");
});

prev.addEventListener("click", () => {
  initSlider("prev");
});

const initSlider = (type) => {
  const sliderItems = list.querySelectorAll(".item");
  const thumbnailItems = thumbnail.querySelectorAll(".item");

  if (type === "next") {
    list.appendChild(sliderItems[0]);
    thumbnail.appendChild(thumbnailItems[0]);
    slider.classList.add("next");
  } else {
    const lastItemPosition = sliderItems.length - 1;
    list.prepend(sliderItems[lastItemPosition]);
    thumbnail.prepend(thumbnailItems[lastItemPosition]);
    slider.classList.add("prev");
  }

  setTimeout(() => {
    slider.classList.remove("next");
    slider.classList.remove("prev");
  }, 2000);
};

document.addEventListener("DOMContentLoaded", () => {
  const section = document.querySelector("#more-details-section");
  const button = document.querySelector(".more"); // Tombol untuk scroll

  button.addEventListener("click", (event) => {
    event.preventDefault();
    section.classList.add("visible"); // Tambahkan kelas visible
    section.scrollIntoView({
      behavior: "smooth", // Scroll dengan animasi halus
    });
  });
});
new Swiper(".card-wrapper", {
  slidesPerView: 3, // Menampilkan 3 gambar per baris
  loop: true,
  spaceBetween: 30,

  // Pagination bullets
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    dynamicBullets: true,
  },

  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  brakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});
document.getElementById("logoutBtn").addEventListener("click", function () {
  localStorage.removeItem("isLoggedIn"); // Hapus status login
  alert("Anda telah logout.");
  window.location.href = "login.html"; // Redirect ke halaman login
});

const burgerButton = document.getElementById("burger");
const sidebar = document.querySelector(".sidebar");
if (burgerButton) {
  burgerButton.addEventListener("click", () => {
    sidebar.classList.toggle("slide");
    sidebar.style.display = "block";
  });
}
const hapusButton = document.getElementById("hapus_button");
const hapusModal = document.querySelector(".hapusModal");
if (hapusButton) {
  hapusButton.addEventListener("click", () => {
    hapusModal.style.display = "block";
  });
}

const buttonWraper = document.querySelector(".button-wrapper");
const tambahButton = document.getElementById("tambah_button");
const tambahModal = document.querySelector(".tambahModal");
if (tambahButton) {
  tambahButton.addEventListener("click", () => {
    tambahModal.style.display = "block";
  });
}

const seedButton = document.getElementById("modalSeedButton");

const seedModal = document.querySelector(".modal.new-seed");
if (seedButton) {
  seedButton.addEventListener("click", () => {
    seedModal.style.display = "flex";
  });
}

const cancelButton = document.getElementById("cancelButton");
if (cancelButton) {
  cancelButton.addEventListener("click", () => {
    buttonWraper.parentNode.style.display = "none";
  });
}
const closeButton = document.getElementById("close_check");
const flash = document.querySelector(".flasher");
if (closeButton) {
  closeButton.addEventListener("click", () => {
    flash.style.display = "none";
  });
}

const intensitasCahaya = document.getElementById("intensitas_cahaya");
const setLight = document.getElementById("setLight");
if (setLight) {
  setLight.addEventListener("click", () => {
    console.log(intensitasCahaya.value);
  });
}

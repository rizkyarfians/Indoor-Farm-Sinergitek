import { db } from "./firebaseInit.js";
import {
  set,
  update,
  ref,
} from "https://www.gstatic.com/firebasejs/9.6.7/firebase-database.js";

var formSample = document.getElementById("jumlah_sample");
const submitSample = document.getElementById("submit_sample");
const tambahModal = document.querySelector(".tambahModal");
const jenisIkan = document.getElementById("jenis_ikan");
const formJumlah = document.getElementById("jumlah_ikan");

submitSample.addEventListener("click", () => {
  for (let i = 0; i < formSample.value; i++) {
    var textfieldInput = document.createElement("input");
    textfieldInput.type = "text";
    textfieldInput.placeholder = "gr";
    textfieldInput.id = `bobot_input_${i}`;
    tambahModal.appendChild(textfieldInput);
  }
  var submitVal = document.createElement("button");
  submitVal.id = "submitBobot";
  submitVal.innerText = "Submit";
  submitVal.type = "button";
  submitVal.onclick = valueEachForm;
  tambahModal.appendChild(submitVal);
});

var jumlah = [];
function valueEachForm() {
  for (let i = 0; i < formSample.value; i++) {
    let beratValue = document.getElementById("bobot_input_" + i).value;
    if (beratValue.match(/^\d*[.]\d+$/) || beratValue.match(/^\d+$/)) {
      jumlah.push(parseFloat(beratValue));
    }
  }
  let sum = jumlah.reduce((partialSum, a) => partialSum + a, 0);
  let val = parseFloat((sum / formSample.value).toFixed(2));
  updateToDB(jenisIkan.value, formJumlah.value, formSample.value, val);
}

function updateToDB(jenis, jumlah, sampel, rerata) {
  const updates = {};
  updates["formInputs/ikanInfo/date/"] = getMonth();
  updates["formInputs/ikanInfo/jenisIkan/"] = jenis;
  updates[`formInputs/ikanInfo/jumlahIkan/${getWeek()}/`] = parseFloat(jumlah);
  updates["formInputs/ikanInfo/jumlahSampel/"] = sampel;
  updates[`formInputs/ikanInfo/rerataBobot/${getWeek()}/`] = rerata;
  update(ref(db), updates);
}
function getWeek() {
  const date = new Date();
  let week = Math.floor(date.getDate() / 7);
  return week;
}

function getMonth() {
  const months = [
    "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember",
  ];
  const date = new Date();
  let month = months[date.getMonth()];
  const fullDate = `${date.getDate()} - ${month} - ${date.getFullYear()}`;
  return fullDate;
}

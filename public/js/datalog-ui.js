import { db } from "./firebaseInit.js";
import {
  ref,
  onValue,
} from "https://www.gstatic.com/firebasejs/9.6.7/firebase-database.js";

const labelDate = document.getElementById("labelDate");
const labelJenis = document.getElementById("labelJenis");

const dataInput = ref(db, "formInputs/ikanInfo");
onValue(dataInput, (snapshot) => {
  const row = snapshot.val();
  const date = row["date"];
  let jenis = row["jenisIkan"];
  labelDate.innerHTML = date;
  labelJenis.innerHTML = capitalizeString(jenis);
  labelDate.style.fontWeight = "bold";
  labelJenis.style.fontWeight = "bold";
});

function capitalizeString(str) {
  let cap = str[0].toUpperCase();
  str = cap + str.slice(1);
  return str;
}

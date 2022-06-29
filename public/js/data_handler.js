import { db } from "./firebaseInit.js";
import {
  ref,
  onValue,
  set,
  update,
} from "https://www.gstatic.com/firebasejs/9.6.7/firebase-database.js";

const sampleButton = document.getElementById("sampleButton");
var card = document.querySelector(".wrapper_card_control li:nth-child(2)");
var parentBobot = document.getElementById("parent_bobot");
var parentSample = document.getElementById("parent_sample");
var sampelLabel = document.getElementById("sampel_label");
const dataSensorKolam = ref(db, "sensor_kolam_ikan/");
const dataInput = ref(db, "input/");

function updateUIAllData() {
  const suhuAir = document.getElementById("param_temp");
  const phAir = document.getElementById("param_ph");
  const waterLevel = document.getElementById("param_waterlevel");
  const bobotIkan = document.getElementById("bobot_ikan");
  onValue(dataSensorKolam, (snapshot) => {
    const dataSensor = snapshot.val();
    suhuAir.innerHTML = dataSensor.realtime_suhu_air + " ° C";
    phAir.innerHTML = dataSensor.realtime_ph_air;
  });
  onValue(dataInput, (snapshot) => {
    const input = snapshot.val();
    bobotIkan.innerHTML = input.bobot_ikan.rerata_bobot_mingguan + " gr  ";
    rerata = input.bobot_ikan.rerata_bobot_mingguan;
  });
}
updateUIAllData();

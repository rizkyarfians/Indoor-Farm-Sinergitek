import { db } from "./firebaseInit.js";
import {
  ref,
  onValue,
} from "https://www.gstatic.com/firebasejs/9.6.7/firebase-database.js";
const dataInput = ref(db, "formInputs/ikanInfo");
onValue(dataInput, (snapshot) => {
  const row = snapshot.val();
  const rerata = row["rerataBobot"];
  const jumlahIkan = row["jumlahIkan"];
  grafikIkan(rerata, jumlahIkan);
});

// console.log(getWeek());
function grafikIkan(rerata, jumlahIkan) {
  const ctx = document.getElementById("myChart").getContext("2d");
  new Chart(ctx, {
    type: "line",
    data: {
      datasets: [
        {
          type: "line",
          label: "Rerata Berat Ikan",
          data: rerata,
          backgroundColor: "rgba(123, 221, 249, 0.9)",
          borderColor: "rgba(91, 188, 216, 0.9)",
        },
        {
          type: "line",
          label: "Jumlah Ikan",
          data: jumlahIkan,
          backgroundColor: "rgba(138, 156, 150, 0.9)",
          borderColor: "rgba(99, 108, 105, 0.9)",
        },
      ],
      labels: [
        "Bulan - 1",
        "Bulan - 2",
        "Bulan - 3",
        "Bulan - 4",
        "Bulan - 5",
        "Bulan - 6",
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
}

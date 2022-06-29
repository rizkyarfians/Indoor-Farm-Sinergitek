import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.7/firebase-app.js";
import { getDatabase } from "https://www.gstatic.com/firebasejs/9.6.7/firebase-database.js";
// TODO: Add SDKs for Firebase products that you want to use

const firebaseConfig = {
  apiKey: "AIzaSyA6wy_x7wDGF5R-H2u2OTgqf0jcSlvFgCI",
  authDomain: "aquaponik-c32b0.firebaseapp.com",
  databaseURL:
    "https://aquaponik-c32b0-default-rtdb.asia-southeast1.firebasedatabase.app",
  projectId: "aquaponik-c32b0",
  storageBucket: "aquaponik-c32b0.appspot.com",
  messagingSenderId: "144953172182",
  appId: "1:144953172182:web:014a58d96821eaa489a977",
  measurementId: "G-5E07LTLYQH",
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
export const db = getDatabase();

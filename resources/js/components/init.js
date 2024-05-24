// Import the functions you need from the SDKs you need

import { initializeApp } from "firebase/app";
import { getFirestore } from "firebase/firestore";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries


// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyDT4e-ILr1rH7d7NVIfVor96oIl0r7H0Lg",
  authDomain: "imageprocessing-1d1a3.firebaseapp.com",
  projectId: "imageprocessing-1d1a3",
  storageBucket: "imageprocessing-1d1a3.appspot.com",
  messagingSenderId: "314119331729",
  appId: "1:314119331729:web:9036e19c4e1152ba8fc430"
};

// Initialize Firebase
initializeApp(firebaseConfig);

const db = getFirestore();
export default db;

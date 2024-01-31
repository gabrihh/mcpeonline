// meuScript.js

const { initializeApp, getAnalytics } = require("firebase/app");
const { getFirestore, collection, addDoc } = require("firebase/firestore");

const firebaseConfig = {
  apiKey: "AIzaSyCjWBGFYv2Jwsc28F92RyDoNs2mMEqCZAQ",
  authDomain: "mcpe-online.firebaseapp.com",
  projectId: "mcpe-online",
  storageBucket: "mcpe-online.appspot.com",
  messagingSenderId: "769352372552",
  appId: "1:769352372552:web:997d528ef502a7d51ba37d",
  measurementId: "G-EFXG29LZ8W"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app); // Adicionando a inicialização do Analytics

const db = getFirestore(app);

async function adicionarServidor(nome, porta, versao) {
  const docRef = await addDoc(collection(db, "servidores"), {
    nome: nome,
    porta: porta,
    versao: versao,
  });

  console.log("Servidor adicionado com ID: ", docRef.id);
}ID: ", docRef.id);
}
importScripts('https://www.gstatic.com/firebasejs/3.9.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/3.9.0/firebase-messaging.js');


// Initialize Firebase
var config = {
    apiKey: "YOUR-API-KEY",
    authDomain: "YOUR-DOMAIN",
    databaseURL: "YOUR-DATABASE-URL",
    projectId: "YOUR-PROJECT-ID",
    storageBucket: "YOUR-STORAGE-BUCKET",
    messagingSenderId: "YOUR-MESSAGING-SENDER",
    appId: "YOUR-APP-ID",
    measurementId: "YOUR-MEASURE-ID"
};

firebase.initializeApp(config);
const messaging = firebase.messaging();

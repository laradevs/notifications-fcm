<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://www.gstatic.com/firebasejs/4.6.2/firebase.js"></script>
    <script>
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
        messaging.requestPermission().then(function () {
            return messaging.getToken();
        }).then(function (token) {
            console.log(token);
        }).catch(function (err) {
                console.log('Permission denied', err);
            });
        messaging.onMessage(function (payload) {
            console.log('onMessage: ', payload);
        });
    </script>
</head>
<body>
My firebase app
</body>
</html>

<p align="center"><img src="https://avatars2.githubusercontent.com/u/51764637?s=200&v=4" height="240"></p>

<p ><h1 align="center">Notifications FCM</h1></p>

this package is forked from <a href="https://github.com/kawankoding/laravel-fcm">kawnkoding/laravel-fcm</a> and adjustments and unit tests have been done for your work with queues and additional parameters

### Installation

You can pull the package via composer :

```bash
$ composer require laradevs/notifications-fcm
```

Next, You must register the service provider :

```php
// config/app.php

'Providers' => [
   // ...
   LaraDevs\Fcm\FcmServiceProvider::class,
]
```

If you want to make use of the facade you must install it as well :

```php
// config/app.php

'aliases' => [
    // ...
    'Fcm' => LaraDevs\Fcm\FcmFacade::class,
];
```

Next, You must publish the config file to define your FCM server key :

```bash
php artisan vendor:publish --provider="LaraDevs\Fcm\FcmServiceProvider"
```

This is the contents of the published file :

```php
return [

    /**
     * Set your FCM Server Key
     * Change to yours
     */

    'server_key' => env('FCM_SERVER_KEY', ''),
    'server_endpoint' => env('FCM_SERVER_ENDPOINT', 'https://fcm.googleapis.com/fcm/send'),
    'server_icon_app'=> env('FCM_ICON_APP')

];
```

```javascript
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

```


Set your FCM Server Key in `.env` file :

```
APP_NAME="Laravel"
# ...
FCM_SERVER_KEY=putYourKeyHere
FCM_SERVER_ENDPOINT=putServerEndpointHere
FCM_ICON_APP=putIconNotification
```

### Usage with JOBS

If you want to use FCM in a simple way, do it through the following JOB
```php
FcmSendJob::dispatch('Hello World',['RECIPIENTS_IDs']);
```

If you want to use FCM with queues, please do as follows
```php
FcmSendJob::dispatch('Hello World',['RECIPIENTS_IDs'])->onqueue('NAME_QUEUE');
```

### Usage without JOBS

If You want to send a FCM with just notification parameter, this is an example of usage sending a FCM with only data parameter :

```php
fcm()
    ->to($recipients) // $recipients must an array
    ->priority('high')
    ->timeToLive(0)
    ->data([
        'title' => 'LaradevTest',
        'body' => 'This tests laraDevs',
    ])
    ->send();
```

If You want to send a FCM to topic, use method toTopic(\$topic) instead to() :

```php
fcm()
    ->toTopic($topic) // $topic must an string (topic name)
    ->priority('normal')
    ->timeToLive(0)
    ->notification([
        'title' => 'LaradevTest',
        'body' => 'This tests laraDevs',
    ])
    ->send();
```

If You want to send a FCM with just notification parameter, this is an example of usage sending a FCM with only notification parameter :

```php
fcm()
    ->to($recipients) // $recipients must an array
    ->priority('high')
    ->timeToLive(0)
    ->notification([
        'title' => 'LaradevTest',
        'body' => 'This tests laraDevs',
    ])
    ->send();
```

If You want to send a FCM with both data & notification parameter, this is an example of usage sending a FCM with both data & notification parameter :

```php
fcm()
    ->to($recipients) // $recipients must an array
    ->priority('normal')
    ->timeToLive(0)
    ->data([
        'title' => 'LaradevTest',
        'body' => 'This tests laraDevs',
    ])
    ->notification([
        'title' => 'LaradevTest',
        'body' => 'This tests laraDevs',
    ])
    ->send();
```

Customize the icon and action, doing the following :

```php
fcm()
    ->to($recipients) // $recipients must an array
    ->priority('normal')
    ->timeToLive(0)
    ->data([
        'title' => 'LaradevTest',
        'body' => 'This tests laraDevs',
        'icon' => 'Your URL public to icon',
        'click_action'=>'action click'
    ])
    ->send();
```
           

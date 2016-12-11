<?php

//Your firebase url 
const DEFAULT_URL = 'https://findmypets-145918.firebaseio.com';

//Checking post request 
if($_SERVER['REQUEST_METHOD']=='POST'){


    //Importing firebase libraries
    require_once 'resources/firebase/src/firebaseInterface.php';
    require_once 'resources/firebase/src/firebaseLib.php';
    require_once 'resources/firebase/src/firebaseStub.php';

    //Geting email and message from the request
    $pkusuario = $_POST['pkusuario'];
    $msg = $_POST['message'];

    $uniqueid = $pkusuario;

    //creating a firebase variable
    $firebase = new \Firebase\FirebaseLib(DEFAULT_URL,'');

    //changing the msg of the selected person on firebase with the message we want to send
    $firebase->set($uniqueid.'/msg', $msg);

    //redirecting back to the sendnotification page
    header('Location: sendPushNotification.php?success');
}else{
    header('Location: sendPushNotification.php');
}
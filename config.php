<?php
//madatory to have for session security
ini_set('session.use_only_cookies',1);
ini_set('sesion.use_strict_mode',1); // makes more complicated session id in cookie

session_set_cookie_params([
    'lifetime' =>1800, //30min and destroy the  cookie
    'domain' => 'localhost', //only works on that domain
    'path' => '/', //work in any path in the website
    'secure' => true, //only work on https webiste not http
    'httponly' => true //restrict any strange access from the client's side
]);

session_start();

if (!isset($_SESSION['last_regeneration'])){
    session_regenerate_id(true); //making the session id stronger by  regenerate a new id for the current session
    $_SESSION['last_regenerate']= time(); //check time passed since the last regeneration of id
}else{
    $interval = 60 * 30; //every 30minute
    if (time()-$_SESSION['last_regeneration'] >= $interval){ //if the time of the session is same or more than 30minute
        session_regenerate_id(true);
        $_SESSION['last_regeneration'] =time();
    }
}


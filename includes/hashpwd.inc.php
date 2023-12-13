<?php
/* $sensativeData = "Krossing";
$salt = bin2hex(random_bytes(16)); // generate a random 16 byte data with hexadecial
$pepper = "ASecretePepperString"; //a string that I pick to fuse together  to make out hash more secure

$dataToHash = $sensativeData . $salt . $pepper;
$hash = hash("sha256", $dataToHash);  //sha256 is one of hashing algorithms


//dehashing, usually get it from DB but for practice purpose//
//hashing a new data in order to see if it is the same with the data that got hashed as saved in the DB
$sensativeData = "Krossing";
$storedSalt = $salt;
$storedHash = $hash;
$pepper = "ASecretePepperString";

$dataToHash = $dataToHash = $sensativeData . $salt . $pepper;
$verificationToHash=hash("sha256", $dataToHash);

if( $storedHash === $verificationToHash){
    echo "The data are the same";
}
else{
    echo  "The data are not the same";
}
*/

//now easier way... above is good and it can be used for other sesative data. BUT there's built in hash function for password in php.
$pwdSignUp= 'Krossing';  //usually retireved from DB but for pratice purpose
$options=[
    'cost' =>  12  //make the hacker stuggle more with decoding the pwd hash. cost factore is recommended to be set 10~12
];
$hashedPwd = password_hash($pwdSignUp, PASSWORD_BCRYPT, $options); //PASSWORD_BCRYPT PASSWORD_DEFAULT are hashing algorithm for passwords

//now user loging in

$pwdLogIn = 'Krossing';
if (password_verify($pwdLogIn, $hashedPwd)){ //password_verify() return true or false
 echo "they are the same";
}else{
    echo "they are not the same";
}
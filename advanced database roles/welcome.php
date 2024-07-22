<?php 
$flagIsAdmin = false;
session_start();
if(intval($_SESSION['role']) == 2){
    echo "welcome  user" .($_SESSION["fullName"]);
    echo "<br>";
    echo "welcome  user" .($_SESSION["email"]);
}else{
    echo "welcome  admin" .($_SESSION["fullName"]);
    echo "<br>";
    echo "welcome  admin" .($_SESSION["email"]);
    $flagIsAdmin = true;
}
// echo "welcome " . (intval($_SESSION['role']) == 2 ? " user ".($_SESSION["fullName"]) : "no " )."<br>  your email is " . $_SESSION['email'] ;
if($flagIsAdmin){
    
}
?>


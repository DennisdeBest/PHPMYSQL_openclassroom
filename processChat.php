<?php
session_start();
//initialize session variables
$_SESSION['pseudo']="";
$_SESSION['error']="";

//check postdata use of html entities to prevent xss
if(!empty($_POST['pseudo'])){
    $pseudo=htmlentities($_POST['pseudo']);
    $_SESSION['pseudo']=$pseudo;
}
else {
    $_SESSION['error'].="No username set<br/>";
}
if(!empty($_POST['message'])){
    $message=htmlentities($_POST['message']);
}
else {
    $_SESSION['error'].="No message entered<br/>";
}
 //Set default timezone
date_default_timezone_set('Europe/Amsterdam');

//format date and time
$date = date('j/m/y H:i:s');
//get posters ip (usefull for adding anti spam in the future
$ip = $_SERVER['REMOTE_ADDR'];

//get MySQL credentials for database connection
require_once ("mysqlCreds.php");

// Create connection
$conn = mysqli_connect($host, $username, $password, $db);


if (!$conn) {
    $_SESSION['error'].= mysqli_connect_error();
}
//the sql statement to add the information to the table
$sql = "INSERT INTO `$table` (`datetime`, `username`, `message`, `ip`)
VALUES ('$date', '$pseudo', '$message', '$ip')";

//if no errors run the query
if (empty($_SESSION['error'])) {
    if ($conn->query($sql) === TRUE)
        header('Location:'.$_SESSION['referrer'].'');
}
//if errors in the log return the error log
else{
    $_SESSION['error'].="Couldn't add message<br/>";
    header('Location:'.$_SESSION['referrer'].'');
}

$conn->close();
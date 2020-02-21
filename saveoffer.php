<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';

$description = $_POST["description"];
$bookid = $_GET['bookid'];
$type = $_GET['type'];
$userid = $_SESSION['id'];

echo("INSERT INTO donateoffers (bookid, userid, success, description) VALUES($bookid, $userid, 0, '$description')");

if($type == 'donate') {
    if($mysqli->query("INSERT INTO donateoffers (bookid, userid, success, description) VALUES($bookid, $userid, 0, '$description')")){
        header ("location:requests.php");
    }
}
else if($type == 'share') {
    if($mysqli->query("INSERT INTO shareoffers (bookid, userid, success, description) VALUES($bookid, $userid, 0, '$description')")){
        header ("location:requests.php");
    }
}

// header ("location:login.php");

?>

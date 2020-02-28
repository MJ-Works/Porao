
<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';

$bookid = $_GET['bookid'];
$userid = $_SESSION['id'];
$type = $_GET['type'];



if($type === "share" ) {
        $mysqli->query("DELETE FROM shareoffers where bookid = $bookid");
        if($mysqli->query("DELETE FROM sharebooks where id = $bookid and userid = $userid")){
            header ("location:yourbooks.php");
        }
}
        
else if($type === "donate" ){
    $mysqli->query("DELETE FROM donateoffers where bookid = $bookid");
    
    if($mysqli->query("DELETE FROM donatebooks where id = $bookid and userid = $userid")){
        header ("location:yourbooks.php");
    }
}



?>

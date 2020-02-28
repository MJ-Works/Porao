
<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';

$offerid = $_GET['id'];
$bookid = $_GET['bookid'];
$type = $_GET['type'];
$userid = $_SESSION['id'];
$quantity = $_GET['qty'];

if($type === "share" ) {
    $mysqli->query("UPDATE shareoffers SET success = 1 WHERE id = $offerid");
    $mysqli->query("UPDATE shareoffers SET success = 2 WHERE bookid = $bookid and id != $offerid");
    if($quantity == 0) {
        echo("UPDATE sharebooks SET isSold = 1 and qty = $quantity WHERE id = $bookid");
        $mysqli->query("UPDATE sharebooks SET isSold = 1, qty = $quantity WHERE id = $bookid");
    }
    else $mysqli->query("UPDATE sharebooks SET qty = $quantity WHERE id = $bookid");
    header ("location:yourbooks.php");
}
        
else if($type === "donate" ){
    $mysqli->query("UPDATE donateoffers SET success = 1 WHERE id = $offerid");
    $mysqli->query("UPDATE donateoffers SET success = 2 WHERE bookid = $bookid  and id != $offerid");
    $mysqli->query("UPDATE donatebooks SET isSold = 1 WHERE id = $bookid");
    header ("location:yourbooks.php");

}



?>

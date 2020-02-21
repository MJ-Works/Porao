
<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';

$title= isset($_POST["book_title"]) ? $_POST["book_title"] : '';
$author = isset($_POST["author"]) ? $_POST["author"] : '';
$edition = isset($_POST["edition"]) ? $_POST["edition"] : '';
$category= isset($_POST["category"]) ? $_POST["category"] : '';
$description = isset($_POST["description"]) ? $_POST["description"] : '';
$qty = isset($_POST["qty"]) ? $_POST["qty"] : '';
$bookcondition = isset($_POST["bookcondition"]) ? $_POST["bookcondition"] : '';
$price = isset($_POST["price"]) ? $_POST["price"] : '';
$photo = isset($_POST["photo"]) ? $_POST["photo"] : '';
$pickup = isset($_POST["pickup"]) ? $_POST["pickup"] : '';
$type = isset($_POST["type"]) ? $_POST["type"] : '';
$userid = $_SESSION['id'];

if($type === "share" ) {
        if($mysqli->query("INSERT INTO  sharebooks (userid, title, author, edition, bookcondition, price, qty, category, image, description, pickupplace) VALUES('$userid', '$title', '$author', '$edition' ,'$bookcondition','$price',$qty, '$category', '$photo', '$description' , '$pickup')")){
            header ("location:yourbooks.php");
        }
}
        
else if($type === "donate" ){
    
    if($mysqli->query("INSERT INTO  donatebooks (userid, title, author, edition, category, image, description, pickupplace) VALUES('$userid', '$title', '$author', '$edition' ,'$category', '$photo', '$description' , '$pickup')")){
        header ("location:yourbooks.php");
    }

    // $mysqli->query("INSERT INTO  books( title,author,edition, category,qty, image, description) VALUES('$title', '$author', $edition ,'$category',qty, '$photo', '$description')");

    // echo 'Data inserted';
    // echo $_SESSION["type"];
    // echo '<br/>';
    
    //      header ("location:add.php");

}



?>

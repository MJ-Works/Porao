<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';


 


// header("location:cart.php");
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register || Online book Sharing Platform "Porao"</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

  <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">Online book Sharing Platform "Porao"</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <?php
          if(isset($_SESSION['username'])){
            echo '<li><a href="index.php">Home</a></li>';
            echo '<li><a href="books.php">Books</a></li>';
            echo '<li><a href="ShareBookAdd.php">Share Book</a></li>';
            echo '<li><a href="DonateBookAdd.php">Donate Book</a></li>';
            echo '<li><a href="requests.php">Your Requests</a></li>';
            echo '<li ><a href="yourbooks.php">Your Books</a></li>';
            echo '<li><a href="about.php">About</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
            
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>



    <div class="col-md-6">
		<table class="table table-bordered table-condensed" style = "margin:20px">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Description</th>
            <th>Accept</th>
        </tr>
        <?php
          $i=0;
          $product_id = array();
          $product_quantity = array();
          $userid = $_SESSION['id'];
          $bookid = $_GET['bookid'];
          $type = $_GET['type'];

          if($type === "share" ) {
            $result = $mysqli->query("SELECT o.id, o.bookid, b.qty, o.description, u.address, u.fname, u.lname, u.email FROM `shareoffers` o
                                      inner join users u
                                      on u.id = o.userid
                                      inner join sharebooks b
                                      on b.id = $bookid
                                      where b.isSold = 0 and
                                      o.success = 0");
          }
          else {
            $result = $mysqli->query("SELECT o.id, o.bookid, o.description, u.address, u.fname, u.lname, u.email FROM `donateoffers` o
                                      inner join users u
                                      on u.id = o.userid
                                      inner join donatebooks b
                                      on b.id = $bookid
                                      where b.isSold = 0 and
                                      o.success = 0");
          }

          if($result === FALSE){
            die(mysql_error());
          }

          if($result){

            while($obj = $result->fetch_object()) {
                $quantity = isset($obj->qty) ? $obj->qty : 0;
                if($quantity > 0) $quantity = $quantity - 1;
                echo '<tr>';
                echo '<td>'.$obj->fname.'</td>';
                echo '<td>'.$obj->email.'</td>';
                echo '<td>'.$obj->address.'</td>';
                echo '<td>'.$obj->description.'</td>';
                echo '<td><p><a href="submit_accept_offer.php?qty='.$quantity.'&id='.$obj->id.'&bookid='.$obj->bookid.'&type='.$type.'"><input type="submit" value="Accept" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p><td>';
                echo '</tr>';
              $i++;
            }

          }

          $_SESSION['product_id'] = $product_id;


          echo '</div>';
          echo '</div>';
          ?>
        </table>

        <div class="row" style="margin-top:10px;">
          <div class="small-12">
        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;color: #000000">&copy; Book Rentals pvt ltd.</p>
        </footer>

      </div>
    </div>





    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>

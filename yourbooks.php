<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';

$userid = $_SESSION['id'];

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
    <style>
          body {
         background-image: url("images/books.jpg");
         background-repeat: no-repeat;
         background-attachment: fixed;
         background-position: top; 
         background-size: 1920px 1080px;
      }
      </style>
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
            echo '<li ><a href="requests.php">Your Requests</a></li>';
            echo '<li  class="active" ><a href="yourbooks.php">Your Books</a></li>';
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

    <div class="row" style="margin-top:20px;">
      <div class="small-12">
        <?php
          $i=0;
          $product_id = array();
          $product_quantity = array();

          $result = $mysqli->query("SELECT *, 'donate' as type FROM donatebooks where userid = $userid and isSold = 0 union SELECT *, 'share' as type from sharebooks where userid =  $userid  and isSold = 0");
          if($result === FALSE){
            die(mysql_error());
          }

          if($result){

            while($obj = $result->fetch_object()) {
              echo '<div style="background-color:#CCDADA; margin-top:30px;" class="columns">';
              echo '<p ><h3 style="color: #000000;text-align:center;"><b>'.$obj->title.'</h3></b></p>';
              echo '<img src="images/products/'.$obj->image.'". width=250px height=250px align="left" hspace="20" />';
              if(isset($obj->price))
                  echo '<p style="color: #000000;margin-top:10px;"> <strong>Type</strong>: Sell/Exchange</p>';
              else echo '<p style="color: #000000;margin-top:10px;"> <strong>Type</strong>: Donation</p>';
              echo '<p style="color: #000000;margin-top:10px;"> <strong>Author</strong>: '.$obj->author.'</p>';
              echo '<p style="color: #000000;margin-top:10px;"> <strong>Description</strong>: <br />'.$obj->description.'</p>';
              if(isset($obj->price)) echo '<p style="color: #000000"><strong>Asking Price</strong> : '.$obj->price.'</p>';
              if(isset($obj->price)) echo '<p style="color: #000000"><strong>Available Units</strong> : '.$obj->qty.'</p>';
              echo '<p style="color: #000000"><strong>Category</strong> : '.$obj->category.'</p>';

              // <form>
              //    <input type="text" id="number" value="0"/>
              //    <input type="button" onclick="incrementValue()" value="Increment Value" />
              // </form>

              if(isset($_SESSION['username'])) {
                  echo '<p><a href="accept_offer.php?bookid='.$obj->id.'&type='.$obj->type.'"><input type="submit" value="See Requests" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
                  echo '<p><a href="deletebook.php?bookid='.$obj->id.'&type='.$obj->type.'"><input type="submit" value="Delete Book" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              }
              // else {
              //   echo '<p style="color: #000000;"><pre>                                                      <b>OUT OF STOCK!</b> </pre></p>';
              // }
              echo '<p> <br/><br/><br/></p>';
              echo '</div> ';

              $i++;
            }

          }

          $_SESSION['product_id'] = $product_id;


          echo '</div>';
          echo '</div>';
          ?>

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

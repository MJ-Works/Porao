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
        <li><a href="about.php">About</a></li>
          <li><a href="products.php">Books</a></li>
          echo '<li  class="active"><a href="requests.php">Your Requests</a></li>';
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="admin.php">Home</a></li>';
            echo '<li><a href="ShareBookAdd.php">Share Book</a></li>';
            echo '<li><a href="DonateBookAdd.php">Donate Book</a></li>';
            echo '<li ><a href="yourbooks.php">Your Books</a></li>';
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
            <th>Title</th>
            <th>Author</th>
            <th>Edition</th>
            <th>Category</th>
            <th>Description</th>
            <th>Pick Up Place</th>
            <th>Status</th>
        </tr>
        <?php
          $i=0;
          $product_id = array();
          $product_quantity = array();
          $userid = $_SESSION['id'];
          $result = $mysqli->query("SELECT b.*, o.description, o.success FROM shareoffers o inner join sharebooks b on o.bookid = b.id  where o.userid = '$userid'
                                    UNION
                                    SELECT d.*, o.description, o.success FROM donateoffers o
                                    inner join donatebooks d on o.bookid = d.id where o.userid = '$userid'");
          if($result === FALSE){
            die(mysql_error());
          }

          if($result){

            while($obj = $result->fetch_object()) {
                echo '<tr>';
                echo '<td>'.$obj->title.'</td>';
                echo '<td>'.$obj->author.'</td>';
                echo '<td>'.$obj->edition.'</td>';
                echo '<td>'.$obj->category.'</td>';
                echo '<td>'.$obj->description.'</td>';
                echo '<td>'.$obj->pickupplace.'</td>';
                if($obj->success == 0)
                    echo '<td><b>Pending</b></td>';
                else if($obj->success == 1)
                    echo '<td><b>Accepted</b></td>';
                else echo '<td><b>Rejected</b></td>';
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

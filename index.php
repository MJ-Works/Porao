<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

// if($_SESSION["type"]!="admin") {
//   header("location:index.php");
// }

include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book Rental Store</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      body {
         background-image: url("images/book-shelf-landscape.jpg");
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
            echo '<li class="active"><a href="index.php">Home</a></li>';
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


  <div id='search-box1'>
    <form method="POST" action='products_search.php' id='search-form' >
      <input id='search-text'  name ="search" placeholder='Search...' type='text'/>
        <button id='search-button' type='submit'>                     
          <span><i class="fa fa-search"></i></span>
        </button>
      </form>
    </div>


    <div class="row" style="margin-top:10px;">
      <div class="small-12">

        <footer style="margin-top:300px;">
           <p style="text-align:center; font-size:0.8em;color: #FFFFFF">&copy; Book Rental Store. All Rights Reserved.</p>
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



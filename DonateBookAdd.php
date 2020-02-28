<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
    header("location:index.php");
}



include 'config.php';
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
            echo '<li  class="active"><a href="DonateBookAdd.php">Donate Book</a></li>';
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
    <form method="POST" action="insert_books.php" style="margin-top:30px;">
      <div class="row">
        <div class="small-8">
          <input type="hidden" value ="donate" id="right-label"  name="type">
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Book Title</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" name="book_title" >
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Author</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" name="author">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Edition</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label"  name="edition">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Category</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label"  name="category">
            </div>
          </div>

          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Pickup Location</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label"  name="pickup">
            </div>
            
          </div>

           <div class="row">
           <div class="form-group col-md-6">
            <label for="photo">Product Photo:</label>
            <input class="form-control" type="file" name="photo" id="photo">
          </div>
            <div class="row">
                <div class="form-group col-md-6">
                  <label for="description">Description</label>
                  <textarea class="form-control" name="description" id="description" rows="6"></textarea>
              </div>
          </div>
              <div class="small-8 columns">
                  <input type="submit" id="right-label" value="Add Books" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
                  <input type="reset" id="right-label" value="Reset" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
            </div>
          </div>
        </div>
      </div>
    </form>


    <div class="row" style="margin-top:10px;">
      <div class="small-12">

        <footer>
           <p style="text-align:center; font-size:0.8em;">&copy; Online book Sharing Platform "Porao". All Rights Reserved.</p>
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

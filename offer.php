<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$bookid = $_GET['id'];
$type = $_GET['type'];

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
          <li><a href="books.php">Books</a></li>
          echo '<li><a href="requests.php">Your Requests</a></li>';
          <?php

          if(isset($_SESSION['username'])){
            
            echo '<li><a href="home.php">Home</a></li>';
echo '<li><a href="ShareBookAdd.php">Share Book</a></li>';
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

    <form method="POST" action="saveoffer.php?bookid=<?php echo $bookid;?>&type=<?php echo $type;?>" style="margin-top:30px;">
      <div class="row">
        <div class="small-8">

          <div class="row">
        
            <div class="row">
                    <div class="form-group col-md-6">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" rows="6"></textarea>
            </div>
            
          </div>
             <div class="small-8 columns">
              <input type="submit" id="right-label" value="Place Request" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
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

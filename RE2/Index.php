<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body><!--grey header-->
<div class="container-fluid bg-dark header-top d-none d-md-block">
  <div class="container">
    <div class="row text-light pt-2 pb-2">
      <div class="col-md-5"><i class="fa fa-envelope-o" aria-hidden="true"></i>abc@gmail.com</div>
      <div class="col-md-3">

      </div>
      <?php 
      session_start();
      if(isset($_SESSION['id'])) { 
        ?>
      <div class="col-md-2"> <i class="fa fa-user-o" aria-hidden="true"></i><a href="profile.php" class="blue"> Account</a> </div>
          <div class="col-md-2"> <i class="fa fa-user-o" aria-hidden="true"></i><a href="logout.php" class="blue"> Logout</a> </div>
      <div class="col-md-2"> <i class="fa fa-cart-plus" aria-hidden="true"></i><a href="cart.php" class="blue"> My Cart</a></div>
      <?php } else { ?>
        <div>
        <a href="login.php" class="blue">LOGIN</a>|<a href="register.php" class="blue active">SIGNUP</a>
      </div>
      <?php }?>
    </div>
  </div>
</div>
<!--grey header end-->
<!--navbar-->
<div class="container-fluid bg-black">
  <nav class="container navbar navbar-expand-lg navbar-dark bg-black">
  <a class="navbar-brand" href="#"><img src="logo-oag.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" dataSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="Index.php">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Art
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="painting.php">Painting</a>
          <a class="dropdown-item" href="sculpt.php">Sculpture</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="artist.php">Artist</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="exhibition.php">Exhibition</a>
      </li>
    </ul>
   
  </div>
</nav>
</div>
<!--navbar end-->
<!--jumbotron-->
<main id="main" role="main">
        <div class="jumbotron my-5 btn-color">
            <div class="container">
                <h1 class="display-3 text-light">Origin Art Gallery</h1>
                <p class="text-light">
                	Experience Art Like Never  Before.
                </p>
                <p>
                    <a class="btn btn-color2 btn-lg" href="painting.php" role="button" >OUR ART</a>
                </p>
            </div>
        </div>

        <div class="container" id="belowjum">
            <div class="row text-center py-5">
                <div class="col-md-6">
                    <h2>Artists</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
                        condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis
                        euismod. Donec sed odio dui. </p>
                    <p>
                        <a class="btn btn-color" href="artist.php" role="button">View details &raquo;</a>
                    </p>
                </div>
                <div class="col-md-6">
                    <h2>Exhibitions</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
                        condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis
                        euismod. Donec sed odio dui. </p>
                    <p>
                        <a class="btn btn-color" href="exhibition.php" role="button">View details &raquo;</a>
                    </p>
                </div>

            </div>

            <hr>

        </div>
    </main>
<!--jumbotron end-->
<!--footer-->
<footer id="footer bg-dark">
        <p class="copyright">
            <span id="currentYear"></span> All Rights Reserved.
        </p>
        <div class="social">
            <a  href="#" title="facebook">
                <i class="fa fa-facebook"></i>
            </a>
            <a  href=#" title="twitter">
                <i class="fa fa-twitter"></i>
            </a>
            <a  href="http#" title="Google+">
                <i class="fa fa-google-plus"></i>
            </a>
            <a  href#" title="github">
                <i class="fa fa-github"></i>
            </a>
            <a  href="htt#" title="Behance">
                <i class="fa fa-behance"></i>
            </a>
            <a  href="#" title="Dribbble">
                <i class="fa fa-dribbble"></i>
            </a>
            <a  href="https://www.pinterest.com/orbitThemes/" title="Pinterest">
                <i class="fa fa-pinterest"></i>
            </a>
            <a  href="https:/#" title="Reddit">
                <i class="fa fa-reddit"></i>
            </a>
            <a blog/" title="RSS">
                <i class="fa fa-rss"></i>
            </a>
        </div>
    </footer>
<!--footer end-->
<!-- JS SCRIPTS-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

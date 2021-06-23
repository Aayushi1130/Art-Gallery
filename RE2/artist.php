<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Artist</title>
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
      <?php if(isset($_SESSION['id'])) { 
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
      <li class="nav-item">
        <a class="nav-link" href="Index.php">Home </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Art
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="painting.php">Painting</a>
          <a class="dropdown-item" href="sculpt.php">Sculpture</a>
      </li>
      <li class="nav-item active">
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
<!--pagination-->
<nav>
  <ul class="pagination">
    <li class="page-item disabled">
      <span class="page-link">Previous</span>
    </li>
    <li class="page-item"><a class="page-link" href="#">
      A
    </a></li>
      <li class="page-item active"><a class="page-link" href="#">B</a></li>
    <li class="page-item"><a class="page-link" href="#">C</a></li>
    <li class="page-item"><a class="page-link" href="#">D</a></li>
    <li class="page-item"><a class="page-link" href="#">E</a></li>
    <li class="page-item"><a class="page-link" href="#">F</a></li>
    <li class="page-item"><a class="page-link" href="#">G</a></li>
    <li class="page-item"><a class="page-link" href="#">H</a></li>
    <li class="page-item"><a class="page-link" href="#">I</a></li>
    <li class="page-item"><a class="page-link" href="#">J</a></li>
    <li class="page-item"><a class="page-link" href="#">K</a></li>
    <li class="page-item"><a class="page-link" href="#">L</a></li>
    <li class="page-item"><a class="page-link" href="#">M</a></li>
    <li class="page-item"><a class="page-link" href="#">N</a></li>
    <li class="page-item"><a class="page-link" href="#">O</a></li>
    <li class="page-item"><a class="page-link" href="#">P</a></li>
    <li class="page-item"><a class="page-link" href="#">Q</a></li>
    <li class="page-item"><a class="page-link" href="#">R</a></li>
    <li class="page-item"><a class="page-link" href="#">S</a></li>
    <li class="page-item"><a class="page-link" href="#">T</a></li>
    <li class="page-item"><a class="page-link" href="#">U</a></li>
    <li class="page-item"><a class="page-link" href="#">V</a></li>
    <li class="page-item"><a class="page-link" href="#">W</a></li>
    <li class="page-item"><a class="page-link" href="#">X</a></li>
    <li class="page-item"><a class="page-link" href="#">Y</a></li>
    <li class="page-item"><a class="page-link" href="#">Z</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>
<!--pagination end-->
<!--cards for display-->
<div class="container-fluid bg-light-gray p-0">

<div class="container pt-5">

  <div class="row">
    <h3>ARTIST</h3>
  </div>
    <div class="row">
    <div class="underline"></div>
  </div>
</div>


<!--row1-->
<div class="container mt-5">
  <div class="row">
    <div class="col-md-3">
      <div class="card">
        <img src="pic3.jpeg" alt="card-1" class="card-img-top">
        <div class="card-body">
          <h5>ARTIST1</h5>
          <h6>DOB</h6>
          <button class="btn btn-color"><i class="fa fa-info-circle" aria-hidden="true"></i>Learn More</button>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <img src="pic4.jpeg" alt="card-1" class="card-img-top">
        <div class="card-body">
          <h5>ARTIST2</h5>
          <h6>DOB</h6>
          <button class="btn btn-color"><i class="fa fa-info-circle" aria-hidden="true"></i>Learn More</button>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <img src="pic5.jpeg" alt="card-1" class="card-img-top">
        <div class="card-body">
          <h5>ARTIST3</h5>
          <h6>DOB</h6>
          <h6></h6>
          <button class="btn btn-color"><i class="fa fa-info-circle" aria-hidden="true"></i>Learn More</button>
        </div>
      </div>
    </div>



    <div class="col-md-3">
      <div class="card">
        <img src="pic6.jpeg" alt="card-1" class="card-img-top">
        <div class="card-body">
          <h5>ARTIST4</h5>
          <h6>DOB</h6>
          <h6></h6>
          <button class="btn btn-color"><i class="fa fa-info-circle" aria-hidden="true"></i>Learn More</button>
        </div>
      </div>
    </div>
  </div>
  <br>
<!--row2-->
<div class="container mt-5 pb-5">
  <div class="row">
    <div class="col-md-3">
      <div class="card">
        <img src="pic10.jpeg" alt="card-1" class="card-img-top">
        <div class="card-body">
          <h5>ARTIST5</h5>
          <h6>DOB</h6>
          <h6></h6>
          <button class="btn btn-color2"><i class="fa fa-info-circle" aria-hidden="true"></i>Learn More</button>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <img src="pic9.jpeg" alt="card-1" class="card-img-top">
        <div class="card-body">
          <h5>ARTIST6</h5>
          <h6>DOB</h6>
          <h6></h6>
          <button class="btn btn-color2"><i class="fa fa-info-circle" aria-hidden="true"></i>Learn More</button>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <img src="pic3.jpeg" alt="card-1" class="card-img-top">
        <div class="card-body">
          <h5>ARTIST7</h5>
          <h6>DOB</h6>
          <h6></h6>
          <button class="btn btn-color2"><i class="fa fa-info-circle" aria-hidden="true"></i>Learn More</button>
        </div>
      </div>
    </div>



    <div class="col-md-3">
      <div class="card">
        <img src="pic5.jpeg" alt="card-1" class="card-img-top">
        <div class="card-body">
          <h5>ARTIST8</h5>
          <h6>DOB</h6>
          <button class="btn btn-color2"><i class="fa fa-info-circle" aria-hidden="true"></i>Learn More</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!--card end-->
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

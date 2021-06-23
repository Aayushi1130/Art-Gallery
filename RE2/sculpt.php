<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "art_gallery";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["apply"])){

  $max=$_POST["max"];
  $min=$_POST["min"];
  $sql = "SELECT * from art where price BETWEEN $min AND $max ORDER BY price";

 $result = $conn->query($sql);
 
   if ($result->num_rows > 0) {
   echo  "<h1 style='margin-top:250px;margin-left:100px'>ORDER DETAILS</h1>

                        <table>
                        <tr>
                            <th>Sculp_Id</th>
                            <th>Price</th>
                            <th>Weight</th>
                            <th>Material Used</th>

                        </tr>";
                        while($row= $result->fetch_assoc()){

                          $sql2 = "SELECT * from sculptures where sculp_id=$row[art_id]";
                $result2 = $conn->query($sql2);
                $r=$result2->fetch_assoc();



                          $sql3 = "SELECT * from art where art_id=$row[art_id]";
                $result3 = $conn->query($sql2);
                $r2=$result3->fetch_assoc();

                      echo "<td>".$r["sculp_id"]."</td>
                            <td>".$r2["price"]."</td>
                            
                            <td>".$r["weight"]."</td>
                            <td>".$r["material_used"]."</td>";



                      echo "
                              <form action='cart.php' method='POST'>
                              <button type='submit' name='add' value=$row[art_id] class='btn btn-color'><i class='fa fa-cart-plus' aria-hidden='true'></i> Add To Cart</button>
                              </form>
                              ";



                }
                    echo "</table>";
                    }
                     else {
                    echo "0 results";
                    }


}



else{
	 $sql = "SELECT * from art WHERE type='S'";
                $result = $conn->query($sql);
	 if ($result->num_rows > 0) {
	 echo  "<h1 style='margin-top:250px;margin-left:100px'>ORDER DETAILS</h1>

                        <table>
                        <tr>
                            <th>Sculp_Id</th>
                            <th>Price</th>
                            <th>Weight</th>
                            <th>Material Used</th>

                        </tr>";
                        while($row= $result->fetch_assoc()){

                          $sql2 = "SELECT * from sculptures where sculp_id=$row[art_id]";
                $result2 = $conn->query($sql2);
                $r=$result2->fetch_assoc();


                          $sql3 = "SELECT * from art where art_id=$row[art_id]";
                $result3 = $conn->query($sql2);
                $r2=$result3->fetch_assoc();

                      echo "<td>".$r['sculp_id']."</td>
                            <td>".$row['price']."</td>
                            <td>".$r["weight"]."</td>
                            <td>".$r["material_used"]."</td>";



                      echo "
                              <form action='cart.php' method='POST'>
                              <button type='submit' name='add' value=$row[art_id] class='btn btn-color'><i class='fa fa-cart-plus' aria-hidden='true'></i> Add To Cart</button>
                              </form>
                              ";



                }
                    echo "</table>";
                    }
                     else {
                    echo "0 results";
                    }
}

 ?>




<html>
<head>
  <meta charset="utf-8">
  <title>Sculpture</title>
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
  <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="Index.php">Home </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
<!--slider
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="gal7.JPG" alt="img1">
       <div class="carousel-caption d-none d-md-block">
        <h1>BEST WINTER COLLECTION</h1>
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
         <button class="btn btn-info btn-lg">Shop Now</button>
       </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/pexels-photo-573271.jpeg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h1>BEST WINTER COLLECTION</h1>
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
         <button class="btn btn-info btn-lg">Shop Now</button>
       </div>
    </div>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

slider end-->
<!--side bar-->

  <aside class="col-sm-3 float-left pr-5 py-5">

<div class="card card-filter">

  <article class="card-group-item">
    <header class="card-header">
      <a href="#" data-toggle="collapse" data-target="#collapse33">
        <i class="icon-action fa fa-chevron-down blue"></i>
        <h6 class="title blue">By Price  </h6>
      </a>
    </header>
    <div class="filter-content collapse show" id="collapse33">
      <div class="card-body">
        <div class="form-row">
        <div class="form-group col-md-6">
          <label>Min</label>
          <input class="form-control" placeholder="$0" type="number">
        </div>
        <div class="form-group text-right col-md-6">
          <label>Max</label>
          <input class="form-control" placeholder="$1,0000" type="number">
        </div>
        </div> <!-- form-row.// -->
        <button class="btn btn-block btn-color2">Apply</button>
      </div> <!-- card-body.// -->
    </div> <!-- collapse .// -->
  </article> <!-- card-group-item.// -->
  <article class="card-group-item">
    <header class="card-header">
      <a href="#" data-toggle="collapse" data-target="#collapse44">
        <i class="icon-action fa fa-chevron-down blue"></i>
        <h6 class="title blue">By Detail </h6>
      </a>
    </header>
    <div class="filter-content collapse show" id="collapse44">
      <div class="card-body">
      <form>
        <label class="form-check">
          <input class="form-check-input" value="" type="checkbox">
          <span class="form-check-label">
            <span class="float-right badge badge-light round"></span>
            Name
          </span>
        </label>  <!-- form-check.// -->
        <label class="form-check">
          <input class="form-check-input" value="" type="checkbox">
          <span class="form-check-label">
            <span class="float-right badge badge-light round"></span>
            Artist
          </span>
        </label> <!-- form-check.// -->
        <label class="form-check">
          <input class="form-check-input" value="" type="checkbox">
          <span class="form-check-label">
            <span class="float-right badge badge-light round"></span>
            Art ID
          </span>
        </label>  <!-- form-check.// -->
        <label class="form-check">
          <input class="form-check-input" value="" type="checkbox">
          <span class="form-check-label">
            <span class="float-right badge badge-light round"></span>
            Year
          </span>
        </label>  <!-- form-check.// -->
      </form>
      </div> <!-- card-body.// -->
    </div> <!-- collapse .// -->
  </article> <!-- card-group-item.// -->
</div> <!-- card.// -->


  </aside> <!-- col.// -->
<!--sidebar ends-->
<!--artworks-->

<div class="container-fluid bg-light-gray p-0">

<div class="container pt-5">

  <div class="row">
    <h3>SCULPTURE</h3>
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
          <h5>Scp1</h5>
          <h6>$3400.00</h6>
          <h6>ARTIST</h6>
          <h6>YEAR</h6>
          <button class="btn btn-color"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</button>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <img src="pic4.jpeg" alt="card-1" class="card-img-top">
        <div class="card-body">
          <h5>Scp2</h5>
          <h6>$25000.00</h6>
           <h6>ARTIST</h6>
          <h6>YEAR</h6>
          <button class="btn btn-color"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</button>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <img src="pic5.jpeg" alt="card-1" class="card-img-top">
        <div class="card-body">
          <h5>Scp3</h5>
          <h6>$5000.00</h6>
           <h6>ARTIST</h6>
          <h6>YEAR</h6>
          <button class="btn btn-color"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</button>
        </div>
      </div>
    </div>



    <div class="col-md-3">
      <div class="card">
        <img src="pic6.jpeg" alt="card-1" class="card-img-top">
        <div class="card-body">
          <h5>Scp4</h5>
          <h6>$8000.00</h6>
           <h6>ARTIST</h6>
          <h6>YEAR</h6>
          <button class="btn btn-color"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</button>
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
          <h5>Scpt5</h5>
          <h6>$800.00</h6>
           <h6>ARTIST</h6>
          <h6>YEAR</h6>
          <button class="btn btn-color"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</button>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <img src="pic9.jpeg" alt="card-1" class="card-img-top">
        <div class="card-body">
          <h5>Scp6</h5>
          <h6>$9000.00</h6>
           <h6>ARTIST</h6>
          <h6>YEAR</h6>
          <button class="btn btn-color"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</button>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <img src="pic3.jpeg" alt="card-1" class="card-img-top">
        <div class="card-body">
          <h5>Scp7</h5>
          <h6>$5578</h6>
           <h6>ARTIST</h6>
          <h6>YEAR</h6>
          <button class="btn btn-color"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</button>
        </div>
      </div>
    </div>



    <div class="col-md-3">
      <div class="card">
        <img src="pic5.jpeg" alt="card-1" class="card-img-top">
        <div class="card-body">
          <h5>Scp8</h5>
          <h6>$3500.00</h6>
           <h6>ARTIST</h6>
          <h6>YEAR</h6>
          <button class="btn btn-color"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</button>
        </div>
      </div>
    </div>
  </div>
</div>


</div>




</div>

<!--artworks end-->
<!--footer-->

<footer id="footer bg-dark zin2">
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
            <a title="RSS">
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

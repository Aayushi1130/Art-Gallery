<?php


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

if(isset($_POST["submit"])){
           $fname=mysqli_real_escape_string($conn,$_POST["fname"]);
            $lname=mysqli_real_escape_string($conn,$_POST["lname"]);
            $email=mysqli_real_escape_string($conn,$_POST["email"]);
            $mob=mysqli_real_escape_string($conn,$_POST["phone"]);
            $pass=mysqli_real_escape_string($conn,$_POST["password"]);
            //$pass=MD5($pass);
            $cpass=mysqli_real_escape_string($conn,$_POST["cpassword"]);
            #$cpass=MD5($cpass);
            $dob=mysqli_real_escape_string($conn,$_POST["date"]);
            $Address=mysqli_real_escape_string($conn,$_POST["address"]);
           $sq="SELECT email FROM person where email='".$email."'";
           $res=mysqli_query($conn,$sq);
            if($res)
              $row = mysqli_num_rows($res);
      if($row>=1)
      {

          $message="Registration unsuccessful,an account with same username exists.Please Register Again";
              echo "<script type='text/javascript'>alert('$message');</script>";
              echo "<script>location.href='register.php'</script>";
      }
      else{
            if($pass==$cpass){
              
               $sq22="SELECT pid FROM person ORDER BY pid DESC LIMIT 1";
           $res=$conn->query($sq22);
           $pid2= $res->fetch_assoc();
           $pid=$pid2["pid"]+1;
           #$pid=$pid+1;
           #$pid=mysqli_fetch_object($res);
     $sql1="INSERT into person(pid,fname,lname,dob,password,email,phone) values('".$pid."','".$fname."','".$lname."','".$dob."','".$pass."','".$email."','".$mob."')";
            if(mysqli_query($conn,$sql1)){
              echo "Signup Successful!!";
             }
            else{
              echo "error:".mysqli_error($conn);
            }
            session_start();
            $_SESSION['id']=mysqli_insert_id($conn);
           }
         }
      }

if(isset($_POST["login"])){
  $email=mysqli_real_escape_string($conn,$_POST["email"]);
  $pass=mysqli_real_escape_string($conn,$_POST["password"]);
  //$pass=MD5($pass);
  $sq1="SELECT * FROM person where email='".$email."' AND password ='".$pass."'";
            if($resu=mysqli_query($conn,$sq1))
            {}
      $rows = mysqli_num_rows($resu);
      $r=$resu->fetch_assoc();
      if($rows==1)
      {


          $message="Login Successful";
              echo "<script type='text/javascript'>alert('$message');</script>";
              session_start();
              $_SESSION['id']=mysqli_insert_id($conn);
              if($r['admin']=='Y')
              {
                echo "<script> location.href='admin.php';</script>";
              }
      }
      else{
        $message="Login Unsuccessful";
              echo "<script type='text/javascript'>alert('$message');</script>";
              echo "<script> location.href='login.php'; </script>";
      }

 }


if(isset($_POST["login"]) || isset($_POST["submit"]))
{

}
else{


session_start();
}
if(isset($_SESSION['id']))
{


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["add"])){
		$id=$_POST["add"];

    $id2=$_SESSION['id'];
		$s = "INSERT into booking values('".$id2."' ,'".$id."')";
		$r=$conn->query($s);
	}

if(isset($_POST["remove"])){
	 $art_id=$_POST["remove"];
	 $s = "DELETE from booking where cust_id = $_SESSION[id] and art_id = $art_id";
	 $conn->query($s);

}

	 $sql = "SELECT * from booking WHERE cust_id=$_SESSION[id]";
                $result = $conn->query($sql);
	 if ($result->num_rows > 0) {
	 echo  "<h1 style='margin-top:250px;margin-left:100px'>ORDER DETAILS</h1>

                        <table>
                        <tr>
                            <th>Booking Id</th>
                            <th>Art Id</th>


                        </tr>";
                        while($row= $result->fetch_assoc()){


                      echo "<td>".$row["b_id"]."</td>
                            <td>".$row["art_id"]."</td>";

                      echo "   
                      <form method='POST' action='cart.php'>
                      <button class='btn btn-color my-2 my-sm-0' 
                        type='submit' name='remove'
                        values=$row[art_id]>
                        Remove
                        </button>
                        </form>";
                }
                    echo "</table>";
                    }
                     else {
                    
                    }

										}
else {
	echo "<script>location.href='login.php'</script>";
}


 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My cart</title>
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
<!--list-->
<section class="section-content bg pt-5 border-top">
<div class="container-fluid px-0"  id="sectionmain">

<div class="row w-75 mr-0 ml-3 mb-3">
  <main class="col-sm-9">

<div class="card">
<table class="table table-hover shopping-cart-wrap">
<thead class="text-muted">
<tr>
  <th scope="col">Product</th>
  <th scope="col" width="120">Quantity</th>
  <th scope="col" width="120">Price</th>
  <th scope="col" class="text-right" width="200">Action</th>
</tr>
</thead>
<tbody>
<tr>
  <td>
<figure class="media">
  <div class="img-wrap"><img src="images/items/1.jpg" class="img-thumbnail img-sm"></div>
  <figcaption class="media-body">
    <h6 class="title text-truncate">Hermit</h6>
  </figcaption>
</figure>
  </td>
  <td>
    <select class="form-control">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
    </select>
  </td>
  <td>
    <div class="price-wrap">
      <var class="price">USD 145</var>

    </div> <!-- price-wrap .// -->
  </td>
  <td class="text-right">

  <a href="" class="btn btn-outline-danger"> × Remove</a>
  </td>
</tr>
<tr>
  <td>
<figure class="media">
  <div class="img-wrap"><img src="images/items/2.jpg" class="img-thumbnail img-sm"></div>
  <figcaption class="media-body">
    <h6 class="title text-truncate">Scream </h6>
  </figcaption>
</figure>
  </td>
  <td>
    <select class="form-control">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
    </select>
  </td>
  <td>
    <div class="price-wrap">
      <var class="price">USD 35</var>

    </div> <!-- price-wrap .// -->
  </td>
  <td class="text-right">

  <a href="" class="btn btn-outline-danger btn-round"> × Remove</a>
  </td>
</tr>
<tr>
  <td>
<figure class="media">
  <div class="img-wrap"><img src="images/items/3.jpg" class="img-thumbnail img-sm"></div>
  <figcaption class="media-body">
    <h6 class="title text-truncate">Egyptian cat </h6>
  </figcaption>
</figure>
  </td>
  <td>
    <select class="form-control">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
    </select>
  </td>
  <td>
    <div class="price-wrap">
      <var class="price">USD 45</var>
    </div> <!-- price-wrap .// -->
  </td>
  <td class="text-right">

    <a href="" class="btn btn-outline-danger btn-round"> × Remove</a>
  </td>
</tr>
</tbody>
</table>
</div> <!-- card.// -->

  </main> <!-- col.// -->

</div>


<!--list end-->
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

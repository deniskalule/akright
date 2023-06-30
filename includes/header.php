<?php
session_start();
include("./includes/connection.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Akright</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/akrightlogo.png" rel="icon">
  <link href="assets/img/akrightlogo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

  <style>
    .end-section
    {
      margin: 0;
      display: flex;
    }
    .brand-img
      {
        width: 50px;
      }

    @media screen and (max-width: 700px)
    {
      .end-section
      {
        justify-content: space-between;
        margin-left: -150px;
        background: #aee615;
        padding: 10px;
        margin-bottom: -30px;
        margin-right: -15px;
      }

      .brand-img
      {
        width: 50px;
      }

      .navbar-brand
      {
        font-size: 20px;
      }
    }
  </style>
</head>

<body>

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Search Properties</h3>
    </div>
    <span class="close-box-collapse right-boxed bi bi-x"></span>
    <div class="box-collapse-wrap form">
      <form class="form-a">
        <div class="row">
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label class="pb-2" for="Type">Keyword</label>
              <input type="text" class="form-control form-control-lg form-control-a" placeholder="Keyword">
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="Type">Type</label>
              <select class="form-control form-select form-control-a" id="Type">
                <option>All Type</option>
                <option>For Rent</option>
                <option>For Sale</option>
              </select>
            </div>
          </div>
          
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="bedrooms">Bedrooms</label>
              <select class="form-control form-select form-control-a" id="bedrooms">
                <option>Any</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="garages">Garages</label>
              <select class="form-control form-select form-control-a" id="garages">
                <option>Any</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="bathrooms">Bathrooms</label>
              <select class="form-control form-select form-control-a" id="bathrooms">
                <option>Any</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="price">Min Price</label>
              <select class="form-control form-select form-control-a" id="price">
                <option>Unlimite</option>
                <option>$50,000</option>
                <option>$100,000</option>
                <option>$150,000</option>
                <option>$200,000</option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-b"><a href="property-grid.html">Search Product</a></button>
          </div>
        </div>
      </form>
    </div>
  </div><!-- End Property Search Section -->

  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <img src="./assets/img/akrightlogo.png" class="brand-img" alt="" srcset="" class="logo">
      <a class="navbar-brand text-brand" href="index.html">Akright<span class="color-b">Estate</span>
        <pan style="font-size: large;">ug</pan>
      </a>

      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="about.php">About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="property-grid.php">Properties</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="rent.php">Rent</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="buy.php">Buy</a>
          </li>

          
        </ul>
      <div class="end-section">
           <!-- client profile -->
      <?php 
      
      if(isset($_SESSION['client']))
      {
        $id = $_SESSION['client'];
        $select=$conn->query("select * from client_table where id='$id'");
        $row = $select->fetch_assoc();
        ?>
            <div class="dropdown open" style="margin-left: 150px;">
              <button class="profile-btn dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false" style="border:none; background: #fff;">
                   
                    <img src="./uploads/<?php echo $row['image_url'];?>" alt=""  width="25" height="25" class="rounded shadow mr-3">
                      
                  </button>
              <div class="dropdown-menu" aria-labelledby="triggerId">
                <h6 class="dropdown-item text-center">
                  <?= $row['fname'].' '. $row['lname'] ?>
                </h6>
                <a class="dropdown-item text-danger ml-3 text-center" href="logout.php"><i class="fas fa-power-off    "></i> Logout</a>
                <center><a href="#edit-profile<?= $id ?>" class=" btn btn-outline-success" data-toggle="modal">Edit Profile</a></center>
              </div>
            </div>
            
        <?php
      }
      else
      {
        ?>
          <!-- login/register button -->
          <div class="login mr-3" style="margin-right: 10px;">
              <a class="btn btn-b-n " href="login.php">login | register</a>
        </div>

        <?php
      }
      
      ?>
     
        
        


      <button type="button" style="margin-left: 40px;" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse " data-bs-toggle="collapse"
        data-bs-target="#navbarTogglerDemo01">
        <i class="bi bi-search"></i>
      </button>
      </div>
      </div>
     
      

    </div>
    
    
    
  </nav><!-- End Header/Navbar -->
  <!-- Modal -->
  <div class="modal fade" id="edit-profile<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #aee615; cursor: pointer;">
            <h5 class="modal-title text-white text-center">Edit Profile</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
          <form action="./backend/clientRegister.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <input type="hidden" name="id" value="<?= $id ?>" class="form-control" required>
                <div class="form-group col-6">
                    <label for="">First Name: </label>
                    <input type="text" name="fname" value="<?= $row['fname'] ?>" class="form-control" required>
                </div>
                <div class="form-group col-6">
                    <label for="">Last Name: </label>
                    <input type="text" name="lname" value="<?= $row['lname'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label for="">Email: </label>
                <input type="email" name="email" value="<?= $row['email'] ?>" class="form-control">
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="">Contact: </label>
                    <input type="text" name="contact" value="<?= $row['contact'] ?>" class="form-control" required>
                </div>
                <div class="form-group col-6">
                    <label for="">Address: </label>
                    <input type="text" name="address" value="<?= $row['address'] ?>" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label for="">Profile picture:</label><br>
                <input type="file" name="profile_pic" id="">
            </div>
            

            
            <div class="form-group pt-2">
                <button type="submit" name="edit" style="background-color: #aee615; cursor: pointer;" class="btn btn-b-n text-white">Edit</button>
               

            </div>
            
        </form>
          </div>
         
        </div>
      </div>
    </div>
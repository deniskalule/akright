
<?php include("./includes/header.php"); ?>


  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Our Amazing Properties</h1>
              <span class="color-text-a">For buy</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Properties</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Buy
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->
    <?php
        if(isset($_SESSION['success']))
        {
            echo '<div class="alert alert-success " role="alert">
                    '.$_SESSION["success"].'
                </div>';
                unset($_SESSION['success']);
        }

        else if(isset($_SESSION['error']))
        {
            echo '<div class="alert alert-danger " role="alert">
                '.$_SESSION["error"].'
                </div>';
                unset($_SESSION['error']);
        }
        ?>

    <section class="property-grid grid">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
          </div>
          <?php
            $property = $conn->query("select * from property_table where type = 'sale'");
            while($row = $property->fetch_assoc())
            {
              ?>
                  <div class="col-md-4">
                      <div class="card-box-a card-shadow">
                        <div class="img-box-a">
                          <img src="admin/uploads/<?= $row['image_url']?>" alt="" class="img-a img-fluid">
                        </div>
                        <div class="card-overlay">
                          <div class="card-overlay-a-content">
                            <div class="card-header-a">
                              <h2 class="card-title-a text-center">
                                
                                  <?= $row['name'] ?>
                              </h2>
                            </div>
                            <div class="card-body-a">
                              <div class="price-box d-flex">
                                <!-- <span class="price-a">Checkout Properties</span> -->
                              </div>
                            

                              </a>
                            </div>
                            <div class="card-footer-a p-0" style="height: 100px;">
                              <form action="">
                              <ul class="card-info d-flex justify-content-around">
                                <li>
                                  <h4 class="card-info-title text-center text-white">UGX: <?= $row['price'] ?></h4>
                                  <center>
                                  <button class="btn btn-sm btn-outline-light buy" id="<?= $row['id'] ?>"><a href="" class="">Buy now</a></button>
                                  </center>
                                </li>
                              
                              </ul>
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
              <?php
            }
            
            ?>
        </div>
      </div>
    </section>
    <section id="property_display">
      
    </section>
  


    

  </main><!-- End #main -->

  
  <?php include("./includes/footer.php"); ?>
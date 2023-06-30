
<?php include("./includes/header.php"); ?>


  <main id="main">

    <?php
        if(isset($_SESSION['success']))
        {
            $property_id = $_SESSION['success'];
            echo '<div class="alert alert-success " role="alert">
                    You have successfully booked this property
                </div>';
                // unset($_SESSION['success']);
        }
        ?>

<section class="receipt mt-5">
    <?php
    $client_id = $_SESSION['client'];
    $sql = $conn->query("select * from booking where property_id = $property_id");
    $sql2 = $conn->query("select * from property_table where id = $property_id");
    $select = $conn->query("select * from client_table where id = $client_id");
    $client = $select->fetch_assoc();
    $booking = $sql->fetch_assoc();
    $property = $sql2->fetch_assoc();
    ?>
    <div class="container" style="margin-top: 100px;">
        <button onclick="printReceipt()" class="btn btn-sm btn-success pull-right mb-3" style="margin-left: 70%;">Print receipt</button>
        <div class="row">
            
            <div class="col-md-2"></div>
            <div class="col-md-8 shadow rounded print-section">
                <div class="header d-flex" style="display:flex; align-items: center; justify-content: space-between; border-bottom: 2px solid #7da806;">
                    <div class="akright-logo">
                        <img src="./assets/img/akrightlogo.png" width="80" alt="">
                        <a class="navbar-brand text-brand" href="index.html">Akright<span class="color-b">Estate</span>
                            <span style="font-size: large;">ug</span>
                        </a>
                    </div>
                    <img src="./uploads/<?= $client['image_url'] ?>" width="100" alt="">
                </div>
                <div class="receipt p-2 mt-3 text-center">
                    <b><u>BOOKING RECEIPT</u></b>
                </div>

                <div class="customer-details" style="margin: 20px;">
                    <div class="row">
                        <div class="col-6 d-flex" style="border-right: 1px solid #00000022">
                            <p><span><b>Client Name: </b></span><?= $client['fname'] . ' ' . $client['lname'] ?></p>
                        </div>
                        <div class="col-6 d-flex">
                            <p><span><b>Client contact: </b></span><?= $client['contact'] ?></p>
                        </div>
                        <hr />
                    </div>
                    <div class="row">
                        <div class="col-6 d-flex" style="border-right: 1px solid #00000022">
                            <p><span><b>Property Name: </b></span><?= $property['name'] ?></p>
                        </div>
                        <div class="col-6 d-flex">
                            <p><span><b>Property address: </b></span><?= $property['address'] ?></p>
                        </div>
                        <hr />
                    </div>
                    <div class="row">
                        <div class="col-6 d-flex" style="border-right: 1px solid #00000022">
                            <p><span><b>Booking fee: </b></span>UGX. <?= $booking['booking_fee'] ?></p>
                        </div>
                        <div class="col-6 d-flex">
                            <p><span><b>Balance: </b></span>UGX. <?= $booking['balance'] ?></p>
                        </div>
                        <hr />
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <p><b>Signature: </b></p>
                            <a class="navbar-brand text-brand p-3" style="font-size: 13px; border: 1px solid; margin-left: 10px;">Akright<span class="color-b">Estate</span>
                                <span style="font-size: 13px;">ug</span>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</section>

<style>
    @media print {
        body * {
            visibility: hidden;
        }
        .print-section,
        .print-section * {
            visibility: visible;
        }
        .print-section {
            position: absolute;
            left: 10;
            top: 10;
            width: 100%;
        }
    }
</style>

<script>
    function printReceipt() {
        window.print();
    }
</script>

  


    

  </main><!-- End #main -->

  
  <?php include("./includes/footer.php"); ?>
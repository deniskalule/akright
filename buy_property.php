<?php
session_start();
include("./includes/connection.php");
if(isset($_POST['id']))
{
    $id = $_POST['id'];

    $select = $conn->query("select * from property_table where id = $id");

    $property = $select->fetch_assoc();
    ?>
        <div class="container">
            <div class="row ">
                <div class="col-md-6">
                    <div class="property-details">
                        <img src="admin/uploads/<?= $property['image_url']?>" alt="" style="width: 90%; height: 400px;" class="img-thumbnail">
                        
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <p class="text-uppercase" style="font-size: 2em; font-weight: bold;"><?= $property['name'] ?></p>
                    <p><span><b>Description: </b></span><?= $property['description'] ?></p>
                    
                    <div class="row">
                        <div class="col-6">
                            <p><span><b>Number of Rooms: </b></span><?= $property['no_of_rooms'] ?></p>
                        </div>
                        <div class="col-6">
                            <p><span><b>Number of Garages: </b></span><?= $property['no_of_garages'] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p><span><b>Address: </b></span><?= $property['address'] ?></p>
                        </div>
                        <div class="col-6">
                            <p><span><b>Price: </b>UGX </span><?= $property['price'] ?></p>
                        </div>
                    </div>
                    
                    <form action="backend/book.php" class="mt-3" method="post">
                        <h5 class="text-left">Book this Property</h4>
                        <input type="hidden" name="client_id" value="<?= $_SESSION['client'] ?>" >
                        <input type="hidden" name="property_id" value="<?= $property['id'] ?>" >
                        <input type="hidden" name="type" value="<?= $property['type'] ?>" >
                        <input type="hidden" name="price" value="<?= $property['price'] ?>" >
                        <div class="form-group">
                          <label for="">Amount to Pay (>= 1/2 price): </label>
                          <input type="text" name="amount_paid" id="" class="form-control" required>
                        </div>
                        <button class="btn btn-sm btn-success mt-2" name="book_buy">Book now</button>
                    </form>
                </div>
            </div>
        </div>
    <?php
}

?>
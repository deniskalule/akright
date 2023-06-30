<?php

include('includes/session.php');
include('includes/header.php');


?>

<main class="main">
    <!-- sidebar -->
    <?php
        include('includes/sidebar.php');
    ?>

    <!-- main content -->
    <div class="content">
        <!-- navbar -->
        <?php  include('includes/navbar.php');?>
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

        <div class="inner-content m-3">
            <div class="header">
                <h6>Property table </h6>
                <a href="" class="btn btn-sm text-white add-category" style="background-color:  #2a3801;" data-toggle="modal">Add property</a>
                <!-- <hr> -->
            </div>
            <div class="table m-3 col-lg-11">
                <table class="table" id="table" border="1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Description</th>
                            <th>Rooms</th>
                            <th>Garages</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $property = $conn->query("select * from property_table");
                        
                        while($row = $property->fetch_assoc())
                        {
                            ?>
                                <tr>
                                    <td scope="row"><?= $row['id'] ?></td>
                                    <td scope="row"><img src="./uploads/<?= $row['image_url']?>" alt="photo" width="45" /></td>
                                    <td><?= $row['name']?></td>
                                    <td><?= $row['address'] ?></td>
                                    <td><?= $row['description'] ?></td>
                                    <td><?= $row['no_of_rooms'] ?></td>
                                    <td><?= $row['no_of_garages'] ?></td>
                                    <td><?= $row['type'] ?></td>
                                    <td><?= $row['price'] ?></td>
                                    <td>
                                        <a href="#view-client<?= $row['id'] ?>" class="btn btn-sm text-white" data-toggle="modal" style="background-color:  #2a3801;">View</a>
                                    </td>
                                </tr>
                                <!-- viewing client -->
                                <div class="modal fade" id="view-client<?= $row['id'] ?>"  tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Client Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php
                                                $id = $row['id'];
                                                $select = $conn->query("select * from client_table where id =$id ");
                                                $clientDetails = $select->fetch_assoc();
                                                ?>

                                                <ul class="client-details" style="list-style-type: none;">
                                                    <li class="mb-3"><p><b>Name: </b><span><?=' '. $clientDetails['fname'].' '.$clientDetails['lname'] ?></span></p></li>
                                                    <li class="mb-3"><p><b>Email: </b><span><?=' '. $clientDetails['email'] ?></span></p></li>
                                                    <li class="mb-3"><p><b>Phone Number: </b><span><?=' '. $clientDetails['contact'] ?></span></p></li>
                                                    <li class="mb-3"><p><b>Address: </b><span><?=' '. $clientDetails['address'] ?></span></p></li>
                                                </ul>

                                                <div class="row">
                                                    
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

           
            <div class="m-3 p-3 col-lg-8" id="addcategory">
                <form class="form" action="./backend/addProperty.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="">Property Name: </label>
                            <input type="text" name="property_name" class="form-control" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Property Category: </label>
                            <select name="category_id" id="" class="form-control">
                                <option value="">Select category</option>
                                <?php
                                $cat = $conn->query("select * from category");
                                while($row = $cat->fetch_assoc())
                                {
                                    ?>
                                            <option value="<?= $row['id'] ?>"><?= $row['cat_name'] ?></option>
                                    <?php
                                }
                                
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="">Property Image:</label><br>
                        <input type="file" name="property_img" id="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Address: </label>
                        <input type="text" name="address" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="">Number of Rooms: </label>
                            <input type="number" name="no_of_rooms" class="form-control" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Number of Garages: </label>
                            <input type="number" name="no_of_garages" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">More description of the property: </label>
                        <textarea name="description" id="" rows="" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Type:</label>
                        <select name="type" id="" class="form-control">
                            <option value="" selected>Select type</option>
                            <option value="rent">For Rent</option>
                            <option value="sale">For Sale</option>
                        </select>
                    </div>
                    <div class="form-group">
                            <label for="">Pricing: </label>
                            <input type="number" name="price" class="form-control" required>
                        </div>
                    <div class="form-group">
                        <button type="submit" name="add-property" class="btn btn-success">Add Property</button>
                    </div>
                </form>
            </div>
            
        </div>  
    </div>
</main>







<?php  include('includes/footer.php');?>
<script>
    $("#addcategory").hide();
    $(document).ready( function () {
        $('#table').dataTable();
    } );

    $(document).ready(function (){
        $(".add-category").click(function (e){
            e.preventDefault();

            $(".table").hide();
            $("#addcategory").show();
        })
    });
</script>




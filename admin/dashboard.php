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


        <div class="inner-content">
            <div class="row m-4">
                <div class="col-lg-3">
                    <div class="card text-center bg-white shadow">
                        <center><i class="fas fa-users    icon mt-2" style = "font-size: 1.5em;"></i></center>
                        <div class="card-body">
                            <h5 class="card-title">
                                <span style="font-size: 20px;">
                                <?php
                                $client = $conn->query("select id from client_table");
                                echo $client->num_rows;
                                ?>
                                </span>
                            CLIENTS</h5>
                        </div>
                        <a href="clients.php" class="card-footer doc">More info <i class="fas fa-arrow-circle-right    "></i></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card text-center bg-white shadow">
                        <center><i class="fas fa-users    icon mt-2" style = "font-size: 1.5em;"></i></center>
                        <div class="card-body">
                            <h5 class="card-title">
                                <span style="font-size: 20px;">
                                <?php
                                $bought = $conn->query("select booking.id from booking join property_table on booking.property_id = property_table.id where property_table.type = 'sale'");
                                echo $bought->num_rows;
                                ?>
                                </span>
                            BOUGHT</h5>
                        </div>
                        <a href="bought.php" class="card-footer doc">More info <i class="fas fa-arrow-circle-right    "></i></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card text-center bg-white shadow">
                        <center><i class="fas fa-users    icon mt-2" style = "font-size: 1.5em;"></i></center>
                        <div class="card-body">
                            <h5 class="card-title">
                                <span style="font-size: 20px;">
                                <?php
                                $rented = $conn->query("select booking.id from booking join property_table on booking.property_id = property_table.id where property_table.type = 'rent'");
                                echo $rented->num_rows;
                                ?>
                                </span>
                            RENTED</h5>
                        </div>
                        <a href="rented.php" class="card-footer doc">More info <i class="fas fa-arrow-circle-right    "></i></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card text-center bg-white shadow">
                        <center><i class="fas fa-users    icon mt-2" style = "font-size: 1.5em;"></i></center>
                        <div class="card-body">
                            <h5 class="card-title">
                                <span style="font-size: 20px;">
                                <?php
                                $all = $conn->query("select * from property_table");
                                echo $all->num_rows - ($bought->num_rows + $rented->num_rows);
                                ?>
                                </span>
                            AVAILABLE</h5>
                        </div>
                        <a href="property.php" class="card-footer doc">More info <i class="fas fa-arrow-circle-right    "></i></a>
                    </div>
                </div>
            </div>

            <!-- graphs and transactions -->
           <div class="row">
                <div class="col-lg-9">
                    
                    <!-- graphs -->
                    <div class="row m-3 shadow p-2 rounded">
                        <div class="col-lg-12">
                        <h5 class="text-center">Statistics</h5>
                        </div>
                        <div class="col-lg-4">
                            <canvas id="mychart" class=""></canvas>
                        </div>
                        <div class="col-lg-8">
                            <canvas id="my1" class=""></canvas>
                        </div>
                    </div>
                        <!-- recent clents -->
                    <div class="row m-3 shadow p-2 rounded">
                        <div class="col-lg-12">
                            <h5 class="text-center">Recently registed clients</h5>
                        </div>
                        <!-- clients table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                $client = $conn->query("select * from client_table order by id DESC limit 4");

                                while($row = $client->fetch_assoc())
                                {
                                    ?>
                                        <tr>
                                            <td scope="row"><?=$row['id']?></td>
                                            <td><?=$row['lname'].' '.$row['fname']?></td>
                                            <td><?=$row['email']?></td>
                                            <td><?=$row['contact']?></td>
                                            <td><?=$row['address']?></td>
                                        </tr>
                                    <?php
                                }
                                
                                ?>
                                <tr>
                                    <td scope="row"></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="shadow rounded mr-3 p-2">
                        <h6 class="text-center">Recent Transactions</h6>
                        <?php
                                
                        $select = $conn->query("select * from booking order by id DESC limit 4");
                        
                            if($select->num_rows > 0)
                            {
                                while($row = $select->fetch_assoc())
                                {
                                    $sql = $conn->query("select * from property_table where id='".$row['property_id']."'");
                                    $property = $sql->fetch_assoc();
                                    ?>
                                        <div style="display:flex; height: 83px;" class="bg-white rounded shadow p-2 mt-2">
                                            <img src="./uploads/<?= $property['image_url'] ?>" width="50" height="50" class="mr-3" alt="">
                                            <div>
                                                <h6 style="font-size: 13px; font-weight: 900;" class="text-uppercase">
                                                    <?= $property['name'] ?>
                                                </h6> 
                                                
                                                <p style="font-size: 9px; margin-top: -5px;" class="text-uppercase"><?= $property['type'].' Transaction' ?></p>
                                            </div>
                                        </div>
                                    <?php
                                    
                                }

                            }

                            else
                            {
                                echo "<p style='font-size: 12px;' class='alert alert-warning'>No recent found items</p>";
                            }
                        
                        ?>
                    </div>

                </div>
           </div>
           
       


        </div>
    </div>
</main>







<?php  include('includes/footer.php');?>

<script>
  const labels = ['rented','bought'];

  const data = {
    labels: labels,
    datasets: [{
      label: '',
      backgroundColor: ['#dcd807','#233100','#aee615'],
      data: [30,10,20],
      
      },
    ]
  };

  const label = ['rented','bought','available'];

  const data1 = {
    labels: label,
    datasets: [{
      label: '',
      backgroundColor: '#233100',
      borderColor: '#aee615',
      data: [30,40,20],
    },
    ]
  };

  const config = {
    type: 'doughnut',
    data: data,
    options: {}
  };

  const config1 = {
    type: 'line',
    data: data1,
    options: {}
  };

  const myChart = new Chart(
    document.getElementById('mychart'),
    config
  );
  const my1 = new Chart(
    document.getElementById('my1'),
    config1
  );
</script>



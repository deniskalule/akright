<?php
session_start();
include("../includes/connection.php");
if(isset($_POST['book_rent']))
{
    $client_id = $_POST['client_id'];
    $property_id = $_POST['property_id'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $amount_paid = $_POST['amount_paid'];
    $balance = $price - $amount_paid;

    $select = $conn->query("select id from booking where client_id = $client_id or property_id = $property_id");
    if($select->num_rows > 0)
    {
        $_SESSION['error'] = "This property has already been booked";
        header("location:../rent.php");
    }
    else
    {
        if($amount_paid < 0.5*$price)
        {
            $_SESSION['error'] = "Amount should be greater than half of the selling price";
            header("location:../rent.php");
        }
        else
        {
            $insert = $conn->query("insert into booking (property_id, client_id, booking_fee,balance ) 
            values($property_id,$client_id,$amount_paid,$balance)");
            if($insert)
            {
                $_SESSION['success'] = $property_id;
                header("location:../receipt.php");
            }
            else
            {
                $_SESSION['error'] = "Error";
                header("location:../rent.php");
            }
        }
    }

    
}
if(isset($_POST['book_buy']))
{
    
    echo $client_id = $_POST['client_id'];
    echo $property_id = $_POST['property_id'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $amount_paid = $_POST['amount_paid'];
    $balance = $price - $amount_paid;

    $select = $conn->query("select id from booking where client_id = $client_id and property_id = $property_id");
    if($select->num_rows > 0)
    {
        echo "success";
        $_SESSION['error'] = "This property has already been booked";
        header("location:../buy.php");
    }
    else
    {
        if($amount_paid < 0.5*$price)
        {
            $_SESSION['error'] = "Amount should be greater than half of the selling price";
            header("location:../buy.php");
        }
        else
        {
            $insert = $conn->query("insert into booking (property_id, client_id, booking_fee,balance ) 
            values($property_id,$client_id,$amount_paid,$balance)");
            if($insert)
            {
                $_SESSION['success'] = $property_id;
                header("location:../receipt.php");
            }
            else
            {
                $_SESSION['error'] = "Error";
                header("location:../buy.php");
            }
        }
    }
}
?>
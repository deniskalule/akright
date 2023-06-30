<?php

session_start();
include("../includes/connection.php");
// add category
if(isset($_POST['add']))
{
    $category = $_POST['category'];

    $sql = $conn->query("select id from category where cat_name = '$category'");
    if($sql->num_rows >0)
    {
        $_SESSION['error'] = "Category alreday exists";
    }

    else{
        $insert = $conn->query("insert into category (cat_name) values('$category')");

        if($insert)
        {
            $_SESSION['success']="Category added";
        }
        else{
            $_SESSION['error'] ="Error";
        }
    }

    header("location: ../category.php");
}

// edit category
if(isset($_POST['edit']))
{
    $id = $_POST['cat_id'];
    $category = $_POST['category'];

    $update = $conn->query("update category set cat_name = '$category' where id = $id");
    if($update)
    {
        echo "sucess";
        $_SESSION['success']="Category edited";
    }
    else
    {
        echo "failed";
        $_SESSION['error'] ="Error";
    }
    header("location: ../category.php");
}

// delete category
if(isset($_POST['delete']))
{
    $id = $_POST['cat_id'];

    $delete = $conn->query("delete from category where id = $id");
    if($delete)
    {
        echo "sucess";
        $_SESSION['success']="Category deleted";
    }
    else
    {
        echo "failed";
        $_SESSION['error'] ="Error";
    }
    header("location: ../category.php");
}

?>
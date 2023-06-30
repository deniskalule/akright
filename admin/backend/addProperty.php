<?php
session_start();
include("../includes/connection.php");

if(isset($_POST['add-property']))
{
    // collect all form data
    $property_name = $_POST['property_name'];
    $cat_id = $_POST['category_id'];
    $address = $_POST['address'];
    $rooms = $_POST['no_of_rooms'];
    $garages = $_POST['no_of_garages'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $price = $_POST['price'];

    
    // image details
    $imgName = $_FILES['property_img']['name'];
    $imgSize = $_FILES['property_img']['size'];
    $tmpName = $_FILES['property_img']['tmp_name'];
    echo $error = $_FILES['property_img']['error'];

    $select = $conn->query("select id from property_table where name = '$property_name' and type = '$type'");
    if($select->num_rows > 0)
    {
        $_SESSION['error'] =  "Property already exists";
        
    }

    else
    {
        if($error === 0)
        {
            if($imgSize > 5000000)
            {
                $_SESSION['error'] = "Sorry, your file is too large";
                
            }
            else
            {
                $imgext = pathinfo($imgName, PATHINFO_EXTENSION);
                $imgExt = strtolower($imgext);
                
                $allowedExt = array('jpg','jpeg','png');
    
                if(in_array($imgExt, $allowedExt))
                {
                    $newImageName = uniqid("IMG-",true).'.'.$imgExt;
                    $imageUploadPath = '../uploads/'.$newImageName;
                    move_uploaded_file($tmpName, $imageUploadPath);

                    $insert = $conn->query("insert into property_table (name, category_id, image_url, address, no_of_rooms, no_of_garages,description,type,price) 
                    values('$property_name','$cat_id','$newImageName','$address','$rooms','$garages','$description','$type','$price')");
    
                    if($insert)
                    {
                        // echo "success";
                        $_SESSION['success'] =  "Property added";
                        // header("location: ../login.php");
                    }
                    else
                    {
                        $_SESSION['error'] = "Error";
                    }
                }
    
                else 
                {
                    $_SESSION['error'] =  "You cannot upload this type of file";
                        // header("location: ../login.php");
                }
            }
        }
       
    }

    header("location: ../property.php");
}



   

?>
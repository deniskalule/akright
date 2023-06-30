<?php
session_start();
include("../includes/connection.php");

if(isset($_POST['add-client']))
{
    // collect all form data
    echo $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $pass = "123456";

    
    // image details
    $imgName = $_FILES['profile_pic']['name'];
    $imgSize = $_FILES['profile_pic']['size'];
    $tmpName = $_FILES['profile_pic']['tmp_name'];
    echo $error = $_FILES['profile_pic']['error'];

    $select = $conn->query("select id from client_table where email = '$email'");
    if($select->num_rows > 0)
    {
        $_SESSION['error'] =  "Client with that email already exists";
        
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
                    $imageUploadPath = 'uploads/'.$newImageName;
                    move_uploaded_file($tmpName, $imageUploadPath);

                    $insert = $conn->query("insert into client_table (fname, lname, email, contact, address, password,image_url) 
                    values('$fname','$lname','$email','$contact','$address','$pass','$newImageName')");
    
                    if($insert)
                    {
                        // echo "success";
                        $_SESSION['success'] =  "Client registered";
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

    header("location: ../clients.php");
}



   

?>
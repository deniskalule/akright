<?php
session_start();
include("../includes/connection.php");

if(isset($_POST['register']))
{
    // collect all form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];

    $compare_password = strcasecmp($pass,$cpass);
    
    // image details
    $imgName = $_FILES['profile_pic']['name'];
    $imgSize = $_FILES['profile_pic']['size'];
    $tmpName = $_FILES['profile_pic']['tmp_name'];
    echo $error = $_FILES['profile_pic']['error'];

    $select = $conn->query("select id from client_table where email = '$email'");
    if($select->num_rows > 0)
    {
        $_SESSION['error'] =  "Client with that email already exists";
        header("location: ../login.php");
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

                    if($compare_password == 0)
                    {
                        $insert = $conn->query("insert into client_table (fname, lname, email, contact, address, password,image_url) 
                        values('$fname','$lname','$email','$contact','$address','$pass','$newImageName')");
        
                        if($insert)
                        {
                            // echo "success";
                            $_SESSION['success'] =  "Client registered";
                            // header("location: ../login.php");
                        }
                    }
                    else
                    {
                        $_SESSION['error'] =  "The passwords do not match";
                        // header("location: ../login.php");
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

    header("location: ../index.php");
}

if(isset($_POST['edit']))
{
    $id = $_POST['id'];
    // collect all form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    
    // image details
    $imgName = $_FILES['profile_pic']['name'];
    $imgSize = $_FILES['profile_pic']['size'];
    $tmpName = $_FILES['profile_pic']['tmp_name'];
    $error = $_FILES['profile_pic']['error'];

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


                $update = $conn->query("update client_table set fname = '$fname', lname = '$lname', email = '$email', contact = '$contact',
                    address = '$address',image_url = '$newImageName' where id=$id");

                if($update)
                {
                    $_SESSION['success'] =  "Client information edited";
                }
                
            }

            else 
            {
                $_SESSION['error'] =  "You cannot upload this type of file";
            }
        }
    }
    else
    {
        echo "success";
        $update = $conn->query("update client_table set fname = '$fname', lname = '$lname', email = '$email', contact = '$contact',
            address = '$address' where id = $id");

        if($update)
        {
            $_SESSION['success'] =  "Client information edited";
        }
    }

    header("location: ../home.php");
}
?>
<?php

if(isset($_POST['id']))
{
    
    ?>
    <h5>Create an account</h5>
    <p>Fill in the registration form below</p>
    <form action="./backend/clientRegister.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="form-group col-6">
                <label for="">First Name: </label>
                <input type="text" name="fname" class="form-control" required>
            </div>
            <div class="form-group col-6">
                <label for="">Last Name: </label>
                <input type="text" name="lname" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label for="">Email: </label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="row">
            <div class="form-group col-6">
                <label for="">Contact: </label>
                <input type="text" name="contact" class="form-control" required>
            </div>
            <div class="form-group col-6">
                <label for="">Address: </label>
                <input type="text" name="address" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <label for="">Profile picture:</label><br>
            <input type="file" name="profile_pic" id="">
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="">Create Password: </label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group col-6">
                <label for="">Confirm Password: </label>
                <input type="password" name="cpassword" class="form-control" required>
            </div>
        </div>

        
        <div class="form-group pt-2">
            <button type="submit" name="register" style="background-color: #aee615; cursor: pointer;" class="btn btn-b-n text-white">Register</button>
            <p class="">Have an Account? <a href="" class="signin-btn" style="color: #aee615; cursor: pointer;"><b>Login</b></a></p>

        </div>
        
    </form>

    <?php
}


?>
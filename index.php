<?php
if (isset($_POST["register"])){

    if(empty($_POST['email'])||
    empty($_POST['password'])||
    empty($_POST['confirm'])){
        echo('please fill the required fields!'); 
    }
}
    else if($_POST['password'] !== $_POST['confirm']){
        echo('password and confirm password should match!');
    }

    else{
    //   // uploading
    //   $msg = "";
    //   // If upload button is clicked ...
    // if (isset($_POST['register'])){
    //     $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    //     $password = mysqli_real_escape_string($conn, $_REQUEST['password']);
    //     $identity = mysqli_real_escape_string($conn, $_REQUEST['identity']);
    //     $city = mysqli_real_escape_string($conn, $_REQUEST['city']);
    //     $gender = mysqli_real_escape_string($conn, $_REQUEST['gender']);
    //     $filename = $_FILES["image"]["name"];
    //     $tempname = $_FILES["image"]["tmp_name"];    
    //         $folder = "user/".$filename;
              
    //         include('config/db_connect.php');
      
    //         // Get all the submitted data from the form
    //         $sql = "INSERT INTO `user`(`id`, `email`, `password`, `identity`, `city`, `gender`, `image`) VALUES 
    //         ('$email','$password','$identity','$city','$gender','$filename')";
            
            
    //         // Execute query
    //         mysqli_query($db, $sql);
              
    //         // Now let's move the uploaded image into the folder: user
    //         if (move_uploaded_file($tempname, $folder))  {
    //             $msg = "Image uploaded successfully";
    //         }else{
    //             $msg = "Failed to upload image";
    //       }
    // }
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link href = "styles.css" rel = "stylesheet">
</head>
<body>
    <div class="formValidation">
    <form action=" " method="post" enctype="multipart/form-data" >
        <label for="mail">Email</label><br>
        <input  class="input box" type="email" id="mail" name="email"><br>

        <label for="pw">Password</label><br>
        <input class="input box" type="password" id="pw" name ="password"><br>

        <label for="confirm">Confirm Password</label><br>
        <input class="input box" type="Password" id="confirm" name ="confirm"><br>

        <label for="identity1">choose identity</label><br>
        <input class="input" type="checkbox" id="Identity" name="identity[]" value="Aadhar">
        <label for="Identity"> Aadhar card</label><br>
        <input class="input" type="checkbox" id="Identity" name="identity[]" value="Pan">
        <label for="Identity"> Pan card</label><br>


        <label for="city">Choose a city:</label>
        <select class="input" id="city" name="city">
        <option value="siliguri">Siliguri</option>
        <option value="darjeeling">Darjeeling</option>
        <option value="kalimpong">Kalimpong</option>
        </select><br>
        <label>Choose gender</label><br>
        <input class="input" type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>
        <input class="input" type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br>
        <input class="input" type="radio" id="other" name="gender" value="other">
        <label for="other">Other</label><br>

        <input class="input" type="file" id="file" name="image" accept="image/png , image/jpeg" onchange="uploaded(event)" name="image" style="display: none;">
        <label for="file" style="cursor: pointer;">Upload image here</label><br>
        <img id="display" width="200"/>

        <input class="button" type="submit" name = "register" value="Register"/>
    </form>
    </div>
    <script>
        function uploaded(e){
        var image = document.getElementById("display");
        image.src = URL.createObjectURL(e.target.files[0]);
        return(image)   
    };
    </script>
    
</body>
</html>
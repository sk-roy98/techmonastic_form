<?php
if (isset($_POST["register"])){
$error_msg = "";
    if(($_POST['email'] == "")||
    ($_POST['password'] == "")||
    ($_POST['confirm'] == "")){
        $error_msg['required'] = "please fill the required fields!"; 
    }

    else if($_POST['password'] !== $_POST['confirm']){
        $error_msg['confirm'] = "password and confirm password should match!";
    }
    //connecting to database and not connected error
    $conn = mysqli_connect('localhost' , 'root' , '' , 'fromdata');
    
    if(! $conn){
        $error = mysqli_connect_error();
        
    }
    if(!$error_msg){
    // uploading
        $email = $_POST['email'];
        $password = $_POST['password'];
        $identity = implode(",", $_POST['identity']);
        $city = $_POST['city'];
        $gender = $_POST['gender'];
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "images/".$filename;
            // Now let's move the uploaded image into the folder: user
            if (move_uploaded_file($tempname, $folder))  {
                $msg = "Image uploaded successfully";
            }else{
                $msg = "Failed to upload image";
          }
     
    // Get all the submitted data from the form
            $sql = "INSERT INTO users (email, password, identity, city, gender, image) VALUES 
                ('$email','$password','$identity','$city','$gender','$filename')";
      
    // Execute query
            if(mysqli_query($conn,$sql)){
                $succ = "successfully inserted";
            }
            else{
                $fail = "failed to insert in table";
            }

        }
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
        <?php 
            if(isset($error_msg['required'])){
                echo "<div class='error'>" . $error_msg['required']. "</div>";
            }
        ?></br>

        <label for="pw">Password</label><br>
        <input class="input box" type="password" id="pw" name ="password"><br>
        <?php 
            if(isset($error_msg['required'])){
                echo "<div class='error'>" . $error_msg['required']. "</div>";
            }
            if(isset($error_msg['confirm'])){
                echo "<div class='error'>" . $error_msg['confirm']. "</div>";
            }
        ?></br>

        <label for="confirm">Confirm Password</label><br>
        <input class="input box" type="Password" id="confirm" name ="confirm"><br>
        <?php 
            if(isset($error_msg['required'])){
                echo "<div class='error'>" . $error_msg['required']. "</div>";
            }
            if(isset($error_msg['confirm'])){
                echo "<div class='error'>" . $error_msg['confirm']. "</div>";
            }
        ?></br>

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

        <label for="file" style="cursor: pointer;">Upload image here</label><br>
        <input class="input" type="file" id="file" name="image" accept="image/png , image/jpeg" onchange="uploaded(event)" name="image"">
        <img id="display" width="200"/>

        <input class="button" type="submit" name = "register" value="Register"/>
    <?php
        if(isset($succ)){
            die ($succ);
        }
        if(isset($fail)){
            die ($fail);
        }
        if(isset($error)){
            die ("failed to conn");
        }
    ?>
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
<?php
  //  include('config/db_connect.php');


    if(empty($_POST['email'])||
    empty($_POST['password'])||
    empty($_POST['confirm'])){
    die('please fill the required fields!'); 
    }
    else if($_POST['password'] !== $_POST['confirm']){
        die('password and confirm password should match!');
    }
    else{
      // uploading
      $msg = "";
  
      // If upload button is clicked ...
      if (isset($_POST['register'])) {
      
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];    
            $folder = "user/".$filename;
              
            include('config/db_connect.php');
      
            // Get all the submitted data from the form
            $sql = "INSERT INTO user VALUES ('')";
            $sql = "INSERT INTO user (filename) VALUES ('$filename')";
            
            // Execute query
            mysqli_query($db, $sql);
              
            // Now let's move the uploaded image into the folder: user
            if (move_uploaded_file($tempname, $folder))  {
                $msg = "Image uploaded successfully";
            }else{
                $msg = "Failed to upload image";
          }
      }
      $result = mysqli_query($db, "SELECT * FROM user");
       echo($result) 
    }
    
?>

<!-- uploading -->
<?php
// error_reporting(0);
?>

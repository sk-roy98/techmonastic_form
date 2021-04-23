<?php
    $conn = mysqli_connect('localhost' , 'souvik' , 'souvik1234' , 'formData');
    
    if(! $conn){
        die('connection error' . mysqli_connect_error());
    }
?>
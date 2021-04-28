<?php
    $conn = mysqli_connect('localhost' , 'root' , '' , 'fromdata');
    
    if(! $conn){
        echo mysqli_connect_error();
    }
?>
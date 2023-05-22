<?php
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'Webdemo';

    $conn = new mysqli($server, $user, $pass, $database);

    if($conn){
        mysqli_query($conn, " SETNAME 'utf8' ");
        echo "Đã kết nối database <br />";
        
    }
    else{
        echo "Kết nối không thành công";
    }

?>
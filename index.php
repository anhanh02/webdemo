
<?php 

    include "connect.php";
    session_start();
    
    if (isset($_SESSION['alert'])) {
        echo "<script>alert('" . $_SESSION['alert'] . "')</script>";
        unset($_SESSION['alert']);
    }

    if(!isset($_SESSION['mySession'])){
        header('location:login.php');
    }

    
    
    // echo '<script>alert("Đăng nhập thành công!");</script>';
?>

<h1>Đăng nhập thành công!</h1>

<a href="logout.php">
    <button type = "submit" name="logout"> Đăng Xuất</button>
</a>
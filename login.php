


<?php
    session_start();
    include "connect.php";
    // $host = '172.16.21.204';
    
    if(isset($_SESSION['mySession'])){
        header('location:index.php');
    }

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $sql = "SELECT * from thanhvien WHERE email='$email' and password='$password'";
        $sql1 = "SELECT * from thanhvien WHERE email='$email'";

        $result = mysqli_query($conn, $sql);   
        $result1 = mysqli_query($conn, $sql1);

        $row = mysqli_fetch_assoc($result);

        if($result == false){
            echo "Lỗi: ".mysqli_error($conn);
        }
        else if(mysqli_num_rows($result) == 1 ){

            // Lấy địa chỉ IP và User-Agent của phiên bản trình duyệt hiện tại
            $ip = $_SERVER['REMOTE_ADDR'];
            $user_agent = $_SERVER['HTTP_USER_AGENT'];

            if($_SERVER['HTTP_USER_AGENT'] != $row['UserAgent']){
                header('location:login.php');
                
                echo '<div class="alert">'."Cảnh báo: Tài khoản của bạn đã được truy cập từ một phiên bản trình duyệt khác.".'</div>';
                $_SESSION['alert'] = "Cảnh báo: Bạn đã đăng nhập từ một thiết bị khác";
            }

            if($ip !== $row['IP']){
                header('location:login.php');
                echo "Cảnh báo: Tài khoản của bạn đã được truy cập từ một địa chỉ IP khác.";
                $_SESSION['alert'] = "Cảnh báo: Bạn đã đăng nhập từ một thiết bị khác";
            }

            // Cập nhật cột ip và user_agent trong bảng thanhvien
            // $update_query = "UPDATE thanhvien SET IP='$ip', UserAgent='$user_agent' WHERE email='$email'";
            // mysqli_query($conn, $update_query);

            

            $_SESSION['mySession'] = $email;
            header("location:index.php");
        }
        else{ if(mysqli_num_rows($result1)==1){
            header("location:admin.php");
        }
        
        else{
            echo "Tài khoản hoặc mật khẩu sai";
        }
        }  

        // Kiểm tra giá trị user_agent trong bảng thanhvien với giá trị User-Agent của phiên bản trình duyệt hiện tại
        // $email = $_SESSION['mySession'];
        // $sql = "SELECT * from thanhvien WHERE email='$email'";
        // $result = mysqli_query($conn, $sql);
        

        // Nếu giá trị User-Agent của phiên bản trình duyệt hiện tại khác với giá trị user_agent trong bảng thanhvien, hiển thị một cảnh báo
        
       

        // Kiểm tra xem giá trị IP hiện tại có khớp với giá trị last_login_ip trong bảng thanhvien hay không
        
    }
?>

<!-- <form action="login.php" method="post">
    <label > Email </label>
    <input type="text" name="email" id="email" >
    <label> Password </label>
    <input type="password" name="password" id="pass">
    <button type="submit" name="login"> Đăng nhập</button>

</form> -->
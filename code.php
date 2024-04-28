<?php
include('admin/includes/function.php');

if(isset($_POST['login'])){

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if($email !='' && $password !=''){
         
        $query = mysqli_query($con, "SELECT * FROM admins WHERE email='$email' AND password='$password' LIMIT 1");
        if($query){
            if(mysqli_num_rows($query) == 1){
                $row = mysqli_fetch_assoc($query);

                if($row['active'] == 1){
                     $_SESSION['loggedIn'] = true;
                     $_SESSION['loggedInUser'] = [
                        'id' => $row['id'],
                        'name' => $row['name'],
                        'email' => $row['email'],
                        'phone' => $row['phone']
                     ];
                     echo "<script>window.open('admin','_self')</script>";
                }else{
                    echo "<script>window.open('index.php','_self')</script>";
                    redirect('index.php','Your account has been unactive. Contact your Admin');
                }
            }else{
                echo "<script>window.open('index.php','_self')</script>";
                redirect('index.php','Email AND Password does not match.');
            }
        }else{
            echo "<script>window.open('index.php','_self')</script>";
            redirect('index.php','Something Went Wrong.');
        }
    }else{
        echo "<script>window.open('index.php','_self')</script>";
        redirect('index.php','Customer Added Successfully.');
    }
}else{
    echo "<script>window.open('index.php','_self')</script>";
    redirect('index.php','Customer Added Successfully.');
}
?>
<?php

include("admin/includes/function.php");

    //unset($_SESSION['LoggedIn']);
    //unset($_SESSION['LoggedInUser']);
    session_destroy();
    echo "<script>window.open('index.php','_self')</script>";
    redirect('index.php','You have Logged Out.');
?>
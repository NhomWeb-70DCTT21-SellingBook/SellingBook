<?php session_start(); 
 
if (isset($_SESSION['email'])){
    unset($_SESSION['email']); // xóa session login
    unset($_SESSION['id']); // xóa session login
}
header('Location: home.html')
?>
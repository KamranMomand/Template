<?php
session_start();

if(isset($_POST['btnUpdate']))
{
    foreach($_POST['indexes'] as $key)
    {
        $_SESSION['qty'][$key] = $_POST["qty".$key];
    }
    header('location:view_cart.php');
}


?>
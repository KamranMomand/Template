<?php
session_start();
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $index=array_search($id,$_SESSION['cart']);
    unset($_SESSION['cart'][$index]);
    unset($_SESSION['qty'][$index]);
    $_SESSION['cart']=array_values($_SESSION['cart']);
    $_SESSION['qty']=array_values($_SESSION['qty']);
    header('location:view_cart.php');

}else{
    header('location:view_cart.php');
}
?>
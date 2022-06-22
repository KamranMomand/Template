<?php
define('host','localhost');
define('username','root');
define('password','');
define('dbname','ecommerce');

$conn=mysqli_connect(host,username,password,dbname);
if(!$conn)
{
    echo "Connection not created";
}

?>
<?php
//insert.php
$connect = mysqli_connect('localhost','root','12345','testlaravel'	);
$sql = "INSERT INTO users (firstname) VALUES ('".$_POST["tweet"]."')";
mysqli_query($connect, $sql);
?>
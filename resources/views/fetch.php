<?php
//fetch.php

$connect = mysqli_connect('localhost','root','12345','testlaravel');

$sql = "SELECT * FROM users ORDER BY id DESC";
$res = mysqli_query($connect, $sql);
if(mysqli_num_rows($res) > 0)
{
	while ($row = mysqli_fetch_array() )
	{
		echo '<p>'.$row["firstname"].'</p>';
	}
}
?>
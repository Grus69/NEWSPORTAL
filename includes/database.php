<?php
$con = mysqli_connect("localhost","root","","newssite");
if (mysqli_connect_errno())
{
	echo "fail to connect sql";
	mysqli_connect_errno();
}
global $con;

?>
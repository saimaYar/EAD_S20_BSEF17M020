<?php
$servername="localhost";
$username="root";
$password="";
$dbname="personinfo";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn){
	die("connection failed:" . mysqli_connect_error());
}
echo("connection successfully");
?>
<html>
<head>
</head>
<body>
<?php
if(isset($_REQUEST["btnSubmit"])==true)
{
$name="saima";
$password="***";
$email="saima@gmail.com";
$sql="insert into student (name , email) values('$name' , '$email')";
if(mysqli_query($conn,$sql)==true){
	$last_id=mysqli_insert_id($conn);
	echo("new id is:".$last_id);
}
else{
	echo("error:".mysqli_error($error));
}
}

?>
</body>
</html>
<?php
$conn->close();
?>

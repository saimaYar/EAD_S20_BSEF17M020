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
<style>
.tableStyle{
	color:black;
	border:solid black;
	float:left;
	margin:6px;
	padding:5px;
	width:150px;

}
</head>
<body>
<div>
<?php
if(isset($_REQUEST["btnSubmit"])==true)
$sql="selct id,name,email from student";
$result=mysqli_query($conn,$sql);
$recordsFound=mysqli_num_rows($result);
if($recordsFound >0){
	echo $recordsFound."records are found! <br>";
	while($rows=mysqli_fetch_assoc($result))
	{
		$id=$row["id"];
		$name=$row["name"];
		$email=$row["email"];
		echo("<div class='tableStyle'>");
		echo("id:$id<br>");
		echo("name:<a href='welcome.php?id=$id'>$name</a><br>");
		echo("email:$email<br>");
		echo("</div>");
	}
}
else{
	echo("0 results");
}
}
?>
</div>
</body>
</html>
<?php
$conn->close();
?>

<html>
<head>
<?php
include('3B.php');
?>
<?php
session_start();
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script src="jquery-3.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#btnSignup").click(function(){
		var usr=$("#usrName").val();
		var pas=$("#Passwrd").val();
		var eml=$("#eName").val();
		var data={"action": "signup","name":usr,"email":eml};
		var settings={
			type:"post",
			dataType:"json",
			url:"api.php",
			data:data,
			success:function(response){
				alert(response)},
				error:function(err,type,httpStatus){
					alert("error occured");
				}

		var flag=true;
		if(usr==""){
			flag=false;
			alert("user name not entered");
		};
		$.ajax(settings);
		console.log('request sent');
		return false;
		});
		if(pas==""){
			flag=false;
			alert("password not entered");
		}
		return flag;
		});
});

</script>
</head>
<body>
<?php
$error="";
$uName="";
if(isset($_REQUEST["btnSignup"])==true)
{
$uName=$_REQUEST["usrName"];
$pass=$_REQUEST["Paswrd"];
$city=$_REQUEST["city"];
$sql="insert into users(uName,pass,city,id)
VALUES('$uName','$pass','$city')";
if(mysqli_query($conn,$sql)==true){
	$last_id=mysqli_insert_id($conn);
	$msg="you are registered successfully.";
}
else{
	$msg="error:".sql."<br>".mysqli_error($conn);
	$msg="some problem has occurred";
}

}

else {
    $_session{"user"}=null;
	$error="invalid user name and password";
}

?>
<h1 style="color:yellow; align:center>signup page</h1> 
<form action="welcome.php" method="post">
<table style="color:green ; border:solid red">
<tr><td>
USER NAME:</td><td><input type="text" name="userName" id="userId" />
<?php if(isset($_REQUEST["btnSignup"]) && $usrName=""){
	echo ("<span>user name is empty!</span>");
}
?>
<br></td>
</tr>
<tr><td>
EMAIL:</td><td><input type="email"  name="eName" id="emailId" /><br>
</td></tr>
<tr><td>
PASSWORD:</td><td><input type="password" name="paswrd" /><br>
</td></tr>
<tr><td>country:</td><td><select name="country">
<option value="">--select--</option>
<?php
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
		echo("<option value='$id'>$name</option>");
		echo("email:$email<br>");
	
	}
	?>
</td></tr>
</select>
</table>
<input type="submit" name="btnSubmit" value="signup" />
</form>
<?php
if($error!=""){ ?> 
<?php ("<span> echo $error  </span>")?>;
   <?php } ?>
</body>
</html>

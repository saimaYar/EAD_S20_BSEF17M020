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
	$("#btnSubmit").click(function(){
		var usr=$("#userName").val();
		var pas=$("#passwrd").val();
		var flag=true;
		if(usr==""){
			flag=false;
			alert("user name not entered");
		}
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
if(isset($_REQUEST["btnSubmit"])==true)
{
$uName=$_REQUEST("userName");
$pass=$_REQUEST("paswrd");

}
if($uName!="" && $pass!="admin")
{
    $_session{"user"}=$userName;
	header('loaction:welcome.php');
}
else {
    $_session{"user"}=null;
	$error="invalid user name and password";
}

?>
<h1 style="color:cyan; align:center>login page</h1> 
<form action="welcome.php" method="post">
<table>
<tr><td>
USER NAME:</td><td><input type="text" name="userName" />
<?php if(isset($_REQUEST["btnSubmit"]) && $uName=""){
	echo ("<span>user name is empty!</span>");
}
?>
<br></td>
</tr>
<tr><td>
EMAIL:</td><td><input type="email"  name="eName" /><br>
</td></tr>
<tr><td>
PASSWORD:</td><td><input type="password" name="paswrd" /><br>
</td></tr>
</table>
<input type="submit" name="btnSubmit" value="login" />
</form>
<?php
if($error!=""){ ?> 
<?php ("<span> echo $error  </span>")?>;
   <?php } ?>
</body>
</html>
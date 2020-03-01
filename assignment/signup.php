<html>
<head>
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
$uName=$_REQUEST("usrName");
$pass=$_REQUEST("Paswrd");

}
if($uName!="" && $pass!="admin")
{
    $_session{"user"}=$usrName;
	header('loaction:welcome.php');
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
</table>
<input type="submit" name="btnSubmit" value="signup" />
</form>
<?php
if($error!=""){ ?> 
<?php ("<span> echo $error  </span>")?>;
   <?php } ?>
</body>
</html>

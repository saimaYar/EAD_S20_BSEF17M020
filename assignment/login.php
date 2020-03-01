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
	var data={"action":"login"};
	var settings={
		type:"post",
		dataType:"json",
		url:"api.php",
		data:data,
		success:function(response){
			for(var count=0; count<response.data.length; count++)
			{
				var row=response.data[count];
				var $div=$("<div class='box'>");
				$div.append("id:"+row.id+"<br>");
				$div.append("name:<a href='welcome.php?id="+row.id+"'>"+row.name);
				$div.append("email:"+row.email+"<br>");
				$(".container").append($div);
				console.log(row);
			}
		},
		error:function(err,type,httpStatus){
			alert('error occured');
		}
	};
	$.ajax(settings);
	console.log('request sent');
	return false;
	
	});

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

</script>
</head>
<body>
<?php
$error="";
$uName="";
if(isset($_REQUEST["btnSubmit"])==true)
{
$uName=$_REQUEST("uName");
$pass=$_REQUEST("uPaswrd");

}
if($uName!="" && $pass!="admin")
{
    $_session{"user"}=$uName;
	header('loaction:welcome.php');
}
else {
    $_session{"user"}=null;
	$error="invalid user name and password";
}

?>
<h1 style="color:cyan; align:center;border:solid" >login page</h1> 
<form action="welcome.php" method="post">
<table>
<tr><td>
USER NAME:</td><td><input type="text" name="uName" id="userId" />
<?php if(isset($_REQUEST["btnSubmit"]) && $uName=""){
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
<input type="submit" name="btnSubmit" value="login" />
</form>
<?php
if($error!=""){ ?> 
<?php ("<span> echo $error  </span>")?>;
   <?php } ?>
</body>
</html>

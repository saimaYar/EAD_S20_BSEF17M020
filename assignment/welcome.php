<html>
<head></head>
<body>
<?php
session_start();
?>
<?php
if(isset($_session{"user"})==false)
{
	header('location:login.php');
}
?>
<h1>welcome</h1><br>
<?php  echo $_session{"user"}; ?>


</body>
</html>
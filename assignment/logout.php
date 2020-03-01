<?php
session_start();
?>
<html>
<head>
<title>logout page</title>
</head>
<body>
<?php
$_SESSION["user"]=null;
?>
<h1>user is log out!</h1>
<a href="login.php">click here to login!</a>


</body>
</html>

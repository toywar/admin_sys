<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru-RU" xml:lang="ru-RU">
<head>
        <title>admin_sys</title>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="static/css/bootstrap.min.css" type="text/css">
            <script type="text/javascript" src="static/js/jquery.min.js"></script>
            <script type="text/javascript" src="static/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="static/js/application.js"></script>
</head>

<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">   
    <span class="brand" href="#">admin_sys</span>
        <ul class="nav">
            <li><a href="index.php">Главная</a></li>
            <li><a href="login.php">Авторизация</a></li>
            <li class="active"><a href="">Админка</a></li>
        </ul>
            </div>
        </div>
    </div>
    
    <br/><br/><br/>
   
    <?php

session_start();
include ('static/db_connect.php');

if (isset($_SESSION['user_id']))
{
	$query = "SELECT `login`
                    FROM `users`
                    LIMIT 1
                    ";
	$sql = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_assoc($sql);
	$welcome = $row['login'];
	print '
	<p>Welcome, <b> ' . $welcome . '</b>!<br/>
	date(): ' ?>
	<?php print date("dS F Y, H:i:s");
		$query_list = "	SELECT *
					FROM `users`
					";
$sql_list = mysql_query($query_list) or die(mysql_error());
print ("<table border=1 align=center><tr align=center><td>#ID</td><td>Login</td><td>���</td><td>E-mail</td><td>���������</td><td>Password</td></tr>");
while($row=mysql_fetch_array($sql_list))
{
	print ("<tr align=center><td>" . $row['id'] . "</td><td>" . $row['login'] . "</td><td>" . $row['fio'] . "</td><td>" . $row['email'] . "</td><td>" . $row['function'] . "</td><td>" . $row['password']. "</td></tr>");
}
	print ("</table>");

}
else
{
	die('<h2 align=center>Error Database</h2><br/><p align=center><a href="login.php"><img src="static/img/error.jpg"></a></p>');
}
?>

   
</body>
</html>
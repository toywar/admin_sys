<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- �������� ������ ������������� � �������� -->
<html>
	<head>
		<title>(admin_sys)-������ ������������� �������</title></head>
	<body>
<?php

session_start();
include ('db_connect.php');

if (isset($_SESSION['user_id']))
{
	$query = "	SELECT `login`
					FROM `users`
					LIMIT 1
					";
	$sql = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_assoc($sql);
	$welcome = $row['login'];
	// ���������� ���������� �� ������ ������	
	print '
	<h1><img src="logo.png">������� �������� ������������ ��������� ��������������� "toywar" </h1>
	<p>����� ����������, <b> ' . $welcome . '</b>!<br/>
	�������: ' ?>
	<?php print date("dS F Y, H:i:s");
	print '
	</p>
	<hr/>
	<table border=0 align=left>
		<tr align=center>
			<td colspan=3><b>�����������������:</b></td>
		</tr>
		<tr align=center>
			<td colspan=3><a href="list_users.php">������ ���������������</a><br/>	
			<a href="register.php">�������� ��������������</a><br/></td>
		</tr>
		<tr align=center>
			<td colspan=3><b>���������:</b></td>
		</tr>
		<tr align=center>
			<td colspan=3><a href="list_income.php">������ ������</a><br/>
			<a href="new_income.php">����� ������</a><br/>
			<a href="add_complete.php">��� ����������� �����</a><br/>
			<a href="">�������</a><br/>
			<a href="add_outcome.php">������ �� �����</a></td>
		</tr>
		<tr align=center>
			<td colspan=3><b>������:</b></td>
		</tr>
		<tr align=center>
			<td colspan=3><a href="">����� �� �������</a><br/>
			<a href="">����� � ���������� �������</a></td>
		</tr>
		<tr align=center>
			<td colspan=3><b>�����:</b></td>
		</tr>
		<tr align=center>
			<td colspan=3>
				<form action="search.php" method="post">
				<input type="text" name="search" />
				<input type="submit" value="Go!" /></form>
			</td>
		</tr>
		<tr align=center>
		<td align=center><b>��������� �� �������:</b>
		</td></tr>
		<tr align=center>
		<td><a href="index_closed.php">������� �� ������� �������</a><br/>
		<a href="index.php">������� �� �������� ��������</a><br/>
		<a href="login.php?logout">�����</a></td>
		</tr>
	</table>
	<table border=0 align=center>
	<td><p size=18 align=center><b>���c�� ��������������� ������:</b></p></td></table>';
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
	print '<p align=center><form align=center action="del_user.php" method="post">������� ������������ � ID: <input type=text size=5 name=del> �� ����!<input type=submit value="���������"></form></p>';
	
	print '
	<table border=0 width=1400>
		<tr>
			<td><p align=right>� ����� ������, 2011. All right reserved.<br/>
			<a href="mailto:root@toywar.ru">root@toywar.ru</a>
		</p></td>
		</tr>
	</table>
	';
}
else
{
	die('<h2 align=center>������ ������! ����������, �������������!</h2><br/><p align=center><a href="login.php">��������������</a></p>');
}
?>
	</body>
</html>

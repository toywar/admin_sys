<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- ���������� ������������ -->
<html>
	<head>
		<title>(admin_sys)-���������� ������������</title></head>
	<body>
<?php

session_start();
include ('db_connect.php');

/*
������� ��� ��������� ����, ������������� � ����������� ������
��������� 3 ��������� �������
*/

function GenerateSalt($n=3)
{
	$key = '';
	$pattern = '1234567890abcdefghijklmnopqrstuvwxyz.,*_-=+';
	$counter = strlen($pattern)-1;
	for($i=0; $i<$n; $i++)
	{
		$key .= $pattern{rand(0,$counter)};
	}
	return $key;
}

if (empty($_POST))
{
	?>
	
	<?php 
	$query = "	SELECT `login`
					FROM `users`
					LIMIT 1
					";
	$sql = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_assoc($sql);
	$welcome = $row['login'];
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
		<tr>
			<td><p size=18 align=center><b>����������� ������ ������������:</b></p></td>
		</tr>
		<tr>
			<td><p align=center><form action="register.php" method="post">
		<table align=center>
			<tr align=center>
				<td>�����:</td>
				<td align=center><input type="text" name="login" /></td>
			</tr>
			<tr align=center>
				<td>������:</td>
				<td align=center><input type="password" name="password" /></td>
			</tr>
			<tr align=center>
				<td>���:</td>
				<td align=center><input size=40 type="text" name="fio" /></td>
			</tr>
			<tr align=center>
				<td>E-mail:</td>
				<td align=center><input size=40 type="text" name="email" /></td>
			</tr>
			<tr align=center>
				<td>���������:</td>
				<td align=center><input size=40 type="text" name="function" /></td>
			</tr>
			<tr align=center>
				<td></td>
				<td align=center><input type="submit" value="����������������" /></td>
			</tr>
		</table>
	</form></p></td>
		</tr>
	</table>
	<table border=0 width=1400>
		<tr>
			<td><p align=right>� ����� ������, 2011. All right reserved.<br/>
			<a href="mailto:root@toywar.ru">root@toywar.ru</a>
		</p></td>
		</tr>
	</table>
	';
	?>
<?php
}
else
{
	// ������������ ��������� ������ �������� mysql_real_escape_string ����� �������� � ������� ��
	
	$login = (isset($_POST['login'])) ? mysql_real_escape_string($_POST['login']) : '';
	$password = (isset($_POST['password'])) ? mysql_real_escape_string($_POST['password']) : '';
	$fio = (isset($_POST['fio'])) ? mysql_real_escape_string($_POST['fio']) : '';
	$email = (isset($_POST['email'])) ? mysql_real_escape_string($_POST['email']) : '';
	$function = (isset($_POST['function'])) ? mysql_real_escape_string($_POST['function']) : '';
	
	
	// ��������� �� ������� ������ (��������, ����� ������ � ������)
	
	$error = false;
	$errort = '';
	
	if (strlen($login) < 2)
	{
		$error = true;
		$errort .= '����� ������ ������ ���� �� ����� 2� ��������.<br />';
	}
	if (strlen($password) < 6)
	{
		$error = true;
		$errort .= '����� ������ ������ ���� �� ����� 6 ��������.<br />';
	}
	
	// ���������, ���� ���� � ������� � ����� �� �������
	$query = "SELECT `id`
				FROM `users`
				WHERE `login`='{$login}'
				LIMIT 1";
	$sql = mysql_query($query) or die(mysql_error());
	if (mysql_num_rows($sql)==1)
	{
		$error = true;
		$errort .= '������������ � ����� ������� ��� ���������� � ���� ������, ������� ������.<br />';
	}
	
	
	// ���� ������ ���, �� ��������� ����� � �������
	
	if (!$error)
	{
		// ���������� ���� � ������
		
		$salt = GenerateSalt();
		$hashed_password = md5(md5($password) . $salt);
		
		$query = "INSERT
					INTO `users`
					SET
						`login`='{$login}',
						`password`='{$hashed_password}',
						`fio`='{$fio}',
						`email`='{$email}',
						`function`='{$function}',
						`salt`='{$salt}'";
		$sql = mysql_query($query) or die(mysql_error());
		
		
		print '<h4>�����������, ������������ ������� ���������������!</h4><a href="register.php">���������</a>';
	}
	else
	{
		print '<h4>�������� ��������� ������</h4>' . $errort;
	}
}

?>

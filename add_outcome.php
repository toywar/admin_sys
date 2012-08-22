<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- Заявка на склад -->
<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>(admin_sys)-Заявка на склад</title>
		</head>
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
	print '
	<h1><img src="logo.png">Система контроля деятельности системных администраторов "toywar" </h1>
	<p>Добро пожаловать, <b> ' . $welcome . '</b>!<br/>
	Сегодня: ' ?>
	<?php print date("dS F Y, H:i:s");
	print '
	</p>
	<hr/>
	<table border=0 align=left>
		<tr align=center>
			<td colspan=3><b>Администрирование:</b></td>
		</tr>
		<tr align=center>
			<td colspan=3><a href="list_users.php">Список администраторов</a><br/>	
			<a href="register.php">Добавить администратора</a><br/></td>
		</tr>
		<tr align=center>
			<td colspan=3><b>Документы:</b></td>
		</tr>
		<tr align=center>
			<td colspan=3><a href="list_income.php">Список заявок</a><br/>
			<a href="new_income.php">Новая заявка</a><br/>
			<a href="add_complete.php">Акт выполненных работ</a><br/>
			<a href="">Договор</a><br/>
			<a href="add_outcome.php">Заявка на склад</a></td>
		</tr>
		<tr align=center>
			<td colspan=3><b>Отчеты:</b></td>
		</tr>
		<tr align=center>
			<td colspan=3><a href="">Отчет по заявкам</a><br/>
			<a href="">Отчет о выполенных работах</a></td>
		</tr>
		<tr align=center>
			<td colspan=3><b>Поиск:</b></td>
		</tr>
		<tr align=center>
			<td colspan=3>
				<form action="search.php" method="post">
				<input type="text" name="search" />
				<input type="submit" value="Go!" /></form>
			</td>
		</tr>
		<tr align=center>
		<td align=center><b>Навигация по системе:</b>
		</td></tr>
		<tr align=center>
		<td><a href="index_closed.php">Перейти на главную станицу</a><br/>
		<a href="index.php">Перейти на домашнюю страницу</a><br/>
		<a href="login.php?logout">Выход</a></td>
		</tr>
	</table>
		<table border=0 align=center>
		<tr>
			<td><p size=18 align=center><b>Оформление заявки на склад:</b></p></td>
		</tr>
<table align=center><form action="doc_outcome.php" method="post">
			<!--<tr align=center>
				<td>Основание заявки:</td>
				<td align=left><input size=40 type="text" name="info" /></td>
			</tr> -->
			<tr align=center>
				<td>#ID заявки от пользователя:</td>
				<td align=left><input size=10 type="text" name="num" /></td>
			</tr>
			<!--<tr align=center>
				<td>Наименование позиции:</td>
				<td align=left><input size=40 type="text" name="position" /></td>
			</tr>
			<tr align=center>
				<td>Количество:</td>
				<td align=left><input size=10 type="text" name="kolvo" /></td>
			</tr> -->
			<tr align=center>
				<td align=center><input type="submit" value="Сформировать" /></td>
			</tr>
</form>
		</table>
	<table border=0 width=1400>
		<tr>
			<td><p align=right>© Роман Екимов, 2011. All right reserved.<br/>
			<a href="mailto:root@toywar.ru">root@toywar.ru</a>
		</p></td>
		</tr>
	</table>
	';
}
else
{
	die('<h2 align=center>Доступ закрыт! Пожалуйста, авторизуйтесь!</h2><br/><p align=center><a href="login.php">Авторизоваться</a><br/><a href="index.php">Вернуться на домашнюю страницу</a></p>');
}
?>
	</body>
</html>

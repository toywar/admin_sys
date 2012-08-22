<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- Добавление пользователя -->
<html>
	<head>
		<title>(admin_sys)-Добавление пользователя</title></head>
	<body>
<?php

session_start();
include ('db_connect.php');

/*
Функция для генерации соли, используемоей в хешировании пароля
возращает 3 случайных символа
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
			<td><p size=18 align=center><b>Регистрация нового пользователя:</b></p></td>
		</tr>
		<tr>
			<td><p align=center><form action="register.php" method="post">
		<table align=center>
			<tr align=center>
				<td>Логин:</td>
				<td align=center><input type="text" name="login" /></td>
			</tr>
			<tr align=center>
				<td>Пароль:</td>
				<td align=center><input type="password" name="password" /></td>
			</tr>
			<tr align=center>
				<td>ФИО:</td>
				<td align=center><input size=40 type="text" name="fio" /></td>
			</tr>
			<tr align=center>
				<td>E-mail:</td>
				<td align=center><input size=40 type="text" name="email" /></td>
			</tr>
			<tr align=center>
				<td>Должность:</td>
				<td align=center><input size=40 type="text" name="function" /></td>
			</tr>
			<tr align=center>
				<td></td>
				<td align=center><input type="submit" value="Зарегистрировать" /></td>
			</tr>
		</table>
	</form></p></td>
		</tr>
	</table>
	<table border=0 width=1400>
		<tr>
			<td><p align=right>© Роман Екимов, 2011. All right reserved.<br/>
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
	// обрабатываем пришедшие данные функцией mysql_real_escape_string перед вставкой в таблицу БД
	
	$login = (isset($_POST['login'])) ? mysql_real_escape_string($_POST['login']) : '';
	$password = (isset($_POST['password'])) ? mysql_real_escape_string($_POST['password']) : '';
	$fio = (isset($_POST['fio'])) ? mysql_real_escape_string($_POST['fio']) : '';
	$email = (isset($_POST['email'])) ? mysql_real_escape_string($_POST['email']) : '';
	$function = (isset($_POST['function'])) ? mysql_real_escape_string($_POST['function']) : '';
	
	
	// проверяем на наличие ошибок (например, длина логина и пароля)
	
	$error = false;
	$errort = '';
	
	if (strlen($login) < 2)
	{
		$error = true;
		$errort .= 'Длина логина должна быть не менее 2х символов.<br />';
	}
	if (strlen($password) < 6)
	{
		$error = true;
		$errort .= 'Длина пароля должна быть не менее 6 символов.<br />';
	}
	
	// проверяем, если юзер в таблице с таким же логином
	$query = "SELECT `id`
				FROM `users`
				WHERE `login`='{$login}'
				LIMIT 1";
	$sql = mysql_query($query) or die(mysql_error());
	if (mysql_num_rows($sql)==1)
	{
		$error = true;
		$errort .= 'Пользователь с таким логином уже существует в базе данных, введите другой.<br />';
	}
	
	
	// если ошибок нет, то добавляем юзаре в таблицу
	
	if (!$error)
	{
		// генерируем соль и пароль
		
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
		
		
		print '<h4>Поздравляем, пользователь успешно зарегистрирован!</h4><a href="register.php">Вернуться</a>';
	}
	else
	{
		print '<h4>Возникли следующие ошибки</h4>' . $errort;
	}
}

?>

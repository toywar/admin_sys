<!-- Файл обработки удаления заявки по ID -->
<?php
include ('db_connect.php');
	$num_del = intval ($_POST['del_income']);
	$query = "SELECT `num`
				FROM `income`
				WHERE num=$num_del
				";
	$sql = mysql_query($query) or die(mysql_error());
	if (mysql_num_rows($sql)== 0)
	{
		$error = true;
		print '<h4>Нет заявки с таким ID!</h4><a href="list_income.php">Вернуться</a><br/>';
	}
	if (strlen($num_del) == 0)
	{
		$error = true;
		print '<h4>Поле ID не может быть пустым!</h4><a href="list_income.php">Вернуться</a><br/>';
	}
	if (!$error){
	$query_to_del = "	DELETE FROM `income`
					WHERE num=$num_del
					";
	$sql_d = mysql_query($query_to_del) or die(mysql_error());
	print '<h4>Поздравляем, заявка успешно удалена!</h4><a href="list_income.php">Вернуться</a><br/>';
	}
?>	

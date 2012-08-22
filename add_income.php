<?php
include ('db_connect.php');
$query_income_add = "INSERT
					INTO `income`
					VALUES (' ', '$_POST[name]', NOW(), '$_POST[valid_time]', '$_POST[description]', '$_POST[by_admin]', '$_POST[status]', '$_POST[any_info]' )
			";
		$sql_in = mysql_query($query_income_add) or die(mysql_error());
		print '<h4>Поздравляем, заявка успешно зарегистрированна!</h4><a href="new_income.php">Вернуться</a>';
?>	


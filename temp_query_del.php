<?php
include ('db_connect.php');
$id_del = intval ($_POST['del']);
	$query_to_del = "	DELETE FROM `users`
					WHERE id=$id_del
					";
	$sql_d = mysql_query($query_to_del) or die(mysql_error());
	print '<h4>Поздравляем, пользователь успешно удален!</h4><a href="temp_query.php">Вернуться</a>';
?>	
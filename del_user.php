<!-- ���� ��������� �������� ������������ �� ID -->
<?php
include ('db_connect.php');
	$id_del = intval ($_POST['del']);
	$query = "SELECT `id`
				FROM `users`
				WHERE id=$id_del
				";
	$sql = mysql_query($query) or die(mysql_error());
	if (mysql_num_rows($sql)== 0)
	{
		$error = true;
		print '<h4>��� ������������ � ����� ID!</h4><a href="list_users.php">���������</a><br/>';
	}
	if (strlen($id_del) == 0)
	{
		$error = true;
		print '<h4>���� ID �� ����� ���� ������!</h4><a href="list_users.php">���������</a><br/>';
	}
	if (!$error){
	$query_to_del = "	DELETE FROM `users`
					WHERE id=$id_del
					";
	$sql_d = mysql_query($query_to_del) or die(mysql_error());
	print '<h4>�����������, ������������ ������� ������!</h4><a href="list_users.php">���������</a><br/>';
	}
?>	
<?php
	include ('db_connect.php');
	$del = intval ($_POST['del']);
	$query_to_del = "DELETE FROM `users`
						WHERE id=$del
					";
	$sql = mysql_query($query_to_del) or die(mysql_error());
	print ("OK!");
?>
<?php
	include ('db_connect.php');
	$query= "	SELECT * FROM `income`
					";
	$sql = mysql_query($query) or die(mysql_error());
print ("<table border=1 align=center><tr align=center><td>Num</td><td>Name</td><td>date</td><td>valid_time</td><td>description</td><td>by_admin</td><td>status</td><td>any_info</td></tr>");
while($row=mysql_fetch_array($sql))
{
	print ("<tr align=center><td>" . $row['num'] . "</td><td>" . $row['name'] . "</td><td>" . $row['data'] . "</td><td>" . $row['valid_time'] . "</td><td>" . $row['description'] . "</td><td>" . $row['by_admin']. "</td><td>" . $row['status']. "</td><td>" . $row['any_info']. "</td></tr>");
}
?>	

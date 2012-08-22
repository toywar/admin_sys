<?php
include "config.php";
$post = mysql_query("SELECT * FROM smf_topics");	
		while ($news = mysql_fetch_array($post)) {
			$news['id_topic']=$mid;
			$news['id_board']=$bid;
			$sql = mysql_query("UPDATE `smf_messages` SET `id_board` = '".$bid."' WHERE id_topic='".$mid."'");
			$sql_1 = "SELECT `id_board`, `id_topic`  FROM `smf_messages` ";
			$sql_list = mysql_query($sql_1) or die(mysql_error());
			$row = mysql_fetch_assoc($sql_1);
				while ($row = mysql_fetch_array($sql_list)) {
					print ("<table border=0><tr><td>" . $row['id_board'] . "</td><td>" . $row['id_topic'] . "</td></tr></table>");
				}
			}
		print 'Done!';
?>			
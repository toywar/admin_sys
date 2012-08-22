<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- Файл формирования акта выполнения заявки по ее #ID -->
<?php
include ('db_connect.php');
	$query_insert = "INSERT INTO `outcome`
		 	 VALUES (' ', NOW(), '$_POST[info]', '$_POST[position]', '$_POST[kolvo]')
		  ";
$sql_insert = mysql_query($query_insert) or die(mysql_error());
	$query = "SELECT `numout`,
			 `data`,
			 `info`,
			 `position`,
			 `kolvo`
		  FROM `outcome`
";
$num = intval ($_POST['num']);
$sql = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($sql);
	$query_income = "
		  SELECT `by_admin`,
			 `name`
		  FROM `income`
		  WHERE num=$num
";
$sql_income = mysql_query($query_income) or die(mysql_error());
$row_in = mysql_fetch_array($sql_income);
print ("<html><head><title>Заявка на склад # " . $row['numout'] . "</title></head>");
print ("<body><p align=center><b>ЗАЯВКА НА СКЛАД № AAA/2011-" . $row['numout'] . "</b></p>");
print ("<p>Администратор: <b>" . $row_in['by_admin']. "</b></p>");
print ("<p>Дата: </b>" . $row['data'] . "</b></p>");
print ("<hr/>");
print ("<p>Основание: " . $row['info'] . "</p>");
print ("<p>Заказчик: <b>" . $row_in['name'] . "</b></p>");
print ("<p><table border=1><tr><td>Наименование</td><td>Количество</td><td>S/N- или ИНВ-номер </td></tr>");
print ("<tr><td>" . $row['position'] . "</td><td>" . $row['kolvo'] . "</td><td>#</td></tr></table></p>");
print ("<hr/>");
print ("<p><table><tr><td width=500>Зав. складом:__________ /Иванов И.И./</td><td width=500>Отпустил:__________ /__________/</td></tr>");
print ("</table></p></body></html>");
print ("<br/><br/><br/><br/><br/>");
print ("<p align=center><input type=submit value='Печать' onclick='print()'></p>");
?>

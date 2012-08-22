<!-- Файл формирования акта выполнения заявки по ее #ID -->
<?php
include ('db_connect.php');
	$num = intval ($_POST['num']);
	$query = "SELECT `num`,
			 `name`,
			 `data`,
			 `valid_time`,
			 `description`,
			 `by_admin`
		FROM `income`
		WHERE num=$num
		  ";
$sql = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($sql);
if (mysql_num_rows($sql)== 0)
	{
		$error = true;
		print '<h4>Нет заявки с таким ID!</h4><a href="add_complete.php">Вернуться</a><br/>';
	}
if (strlen($num) == 0)
	{
		$error = true;
		print '<h4>Поле ID не может быть пустым!</h4><a href="add_complete.php">Вернуться</a><br/>';
	}
if (!$error){
print ("<html><head><title>Акт выполненных работ по заявке # " . $row['num'] . "</title></head>");
print ("<body><p align=center><b>АКТ № AAA/2011-" . $row['num'] . "</b><br/>от " . $row['data'] . "<br/>о выполнении работ (услуг)</p>");
print ("<p>Мы, нижеподписавшиеся, <b>" . $row['name'] . "</b> (ЗАКАЗЧИК) с одной стороны, <b>" . $row['by_admin'] . "</b> с другой стороны (ИСПОЛНИТЕЛЬ), ");
print ("составили настояший акт в том, что ИСПОЛНИТЕЛЬ выполнил, а ЗАКАЗЧИК принял следующие работы:</p><br/>");
print ("<p><table border=1 align=center><tr><td align=center width=1000>Наименование</td><td align=center width=300>Срок исполнения</td></tr>");
print ("<tr><td width=1000>" . $row['description'] . "</td><td width=300>" . $row['valid_time'] . " </td></tr></table></p><br/>");
print ("<p>Работы выполнены в полном объеме, в установленные сроки, в надлежащем качестве. Стороны притензий друг к другу не имеют.</p><br/>");
print ("<p><table align=center><tr><td width=500>ИСПОЛНИТЕЛЬ</td><td width=500>ЗАКАЗЧИК</td></tr>");
print ("<tr><td width=500>_______________ /" . $row['by_admin'] . "/</td><td width=500>_______________ /" . $row['name'] . "/</td></tr>");
print ("<tr><td width=500>");
print date("dS F Y, H:i:s");
print ("</td><td width=500>");
print date("dS F Y, H:i:s");
print ("</td></tr>");
print ("</table></p></body></html>");
print ("<br/><br/><br/><br/><br/>");
print ("<p align=center><input type=submit value='Печать' onclick='print()'></p>");
}
?>

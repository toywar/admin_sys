<?php
include ('static/db_connect.php');
/*
$action = $_POST['action'];

if ($action == 'enter')
{
    $login = $_POST['login'];
    $password = $_POST['password'];
  
    $query = "SELECT *
                     FROM `users`
                     WHERE `login` = '{$login}'
                           `password` = '{$password}'
                     LIMIT 1
             ";
     $sql = mysql_query($query) or die(mysql_error());
     header('Location: index_closed.php');
}
else
{
    die('<h3 align=center>Error!</h3>');
}

$action = $_POST['action']; 

if (!empty($_POST))
{
	$login = (isset($_POST['login'])) ? mysql_real_escape_string($_POST['login']) : '';
	
	$query = "SELECT `salt`
				FROM `users`
				WHERE `login`='{$login}'
				LIMIT 1";
	$sql = mysql_query($query) or die(mysql_error());
        
	if (mysql_num_rows($sql) == 1)
	{
		$row = mysql_fetch_assoc($sql);
		
		
		$salt = $row['salt'];
		
		
		$password = md5(md5($_POST['password']) . $salt);
		
		
		$query = "SELECT `id`
					FROM `users`
					WHERE `login`='{$login}' AND `password`='{$password}'
					LIMIT 1";
		$sql = mysql_query($query) or die(mysql_error());

		
		if (mysql_num_rows($sql) == 1)
		{
		
			$row = mysql_fetch_assoc($sql);
			$_SESSION['user_id'] = $row['id'];
			
			
		
			$time = 86400;
			
			if (isset($_POST['remember']))
			{
				setcookie('login', $login, time()+$time, "/");
				setcookie('password', $password, time()+$time, "/");
			}
			
		
			header('Location: index_closed.php');
			exit;

		
		}
		else
		{
			echo 'Error1!';
		}
	} 
	else
	{
		echo 'Error2!';
	}
}        
 */
if (isset($_POST['login']) && isset($_POST['password']))
{
    $login = mysql_real_escape_string($_POST['login']);
    $password = md5($_POST['password']);

    // делаем запрос к БД
    // и ищем юзера с таким логином и паролем

    $query = "SELECT `id`
            FROM `users`
            WHERE `login`='{$login}' AND `password`='{$password}'
            LIMIT 1";
    $sql = mysql_query($query) or die(mysql_error());

    // если такой пользователь нашелся
    if (mysql_num_rows($sql) == 1) {
        // то мы ставим об этом метку в сессии (допустим мы будем ставить ID пользователя)

        $row = mysql_fetch_assoc($sql);
        $_SESSION['user_id'] = $row['id'];
        header('Location: index_closed.php');
    }
    else {
        die('Error! Not user ID found in database!<br /><a href="login.php">Back</a>');
    }
}
?>
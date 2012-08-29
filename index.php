<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<!--<html xmlns="http://www.w3.org/1999/xhtml" lang="en-EN" xml:lang="en-EN"> -->
<?php
header('Content-Type: text/html; charset=utf-8');

session_start();

include('static/db_connect.php');

if (!isset($_SESSION['id']))
{
        if(isset($_COOKIE['login']) && isset($_COOKIE['password']))
        {
            $login = mysql_escape_string($_COOKIE['login']);
            $password = mysql_escape_string($_COOKIE['password']);
            
            $query = "SELECT `id` FROM `users` WHERE `login` = '{$login}'
                        AND `password` = '{$password}' LIMIT 1";
                        $sql = mysql_query($query) or die(mysql_error());
                        
                        if (mysql_num_rows($sql) == 1)
                        {
                            $row = mysql_fetch_assoc($sql);
                            $_SESSION['user_id'] = $row['id'];
                        }
        }
}

if (isset($_SESSION['user_id']))
{
    $query = "SELECT `login` FROM `users` WHERE `id` = '{$_SESSION['user_id']}'
                LIMIT 1";
    $sql = mysql_query($query) or die(mysql_error());
    
    if (mysql_num_rows($sql) != 1)
    {
        header('Location: login.php?logout');
        exit;
    }
    
    $row = mysql_fetch_array($sql);
    $welcome = $row['login'];
    print'Добро пожаловать, ' . $welcome . '!';
    
}


print($welcome);
print'

';
if (!isset($_SESSION['user_id']))
{
    print '
<html>
<head>
        <title>admin_sys</title>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="static/css/bootstrap.min.css" type="text/css">
            <script type="text/javascript" src="static/js/jquery.min.js"></script>
            <script type="text/javascript" src="static/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="static/js/application.js"></script>
</head>

<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">   
    <span class="brand" href="#">admin_sys</span>
        <ul class="nav">
            <li class="active"><a href="">Главная</a></li>
            <li><a href="login.php">Авторизация</a></li>
        </ul>
            </div>
        </div>
    </div>
    
    <br/><br/><br/>
    
    <div class="span9 offset7">
            <img src="static/img/logo.png" />
    </div>
        
        <div class="container" style="margin-top: 60px;">
                <div class="row" style="margin-bottom: 10px;">
                    <div class="span9 offset3">
                        <h3>Добро пожаловать в панель администрирования</h3>
                    </div>
                </div>
                
                <div class="row"style="margin-top: 50px;">
                    <div class="span6 offset3">

                            <div class="alert alert-error">
                            <button class="close" data-dismiss="alert">×</button>
                            <strong>Вы не авторизованны!</strong>
                        </div>


                        <div class="alert alert-warning">
                            <button class="close" data-dismiss="alert">×</button>
                            <strong>Для доступа в систему нажмите на кнопку "Авторизация" на панели сверху!</strong>
                        </div>
                        
                        <div class="alert alert-warning">
                            <button class="close" data-dismiss="alert">×</button>
                            Система находится в стадии разработки!
                        </div>
                    </div>
                </div>
        </div>
</body>
</html>
';
}
else
{
    print'

<html>
<head>
        <title>admin_sys</title>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="static/css/bootstrap.min.css" type="text/css">
            <script type="text/javascript" src="static/js/jquery.min.js"></script>
            <script type="text/javascript" src="static/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="static/js/application.js"></script>
</head>

<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">   
    <span class="brand" href="#">admin_sys</span>
        <ul class="nav">
            <li class="active"><a href="">Главная</a></li>
           <!-- <li><a href="login.php">Авторизация</a></li> -->
            <li><a href="login.php">Админка</a></li>
        </ul>
            </div>
        </div>
    </div>
    
    <br/><br/><br/>
    
    <div class="span9 offset7">
            <img src="static/img/logo.png" />
    </div>
        
        <div class="container" style="margin-top: 60px;">
                <div class="row" style="margin-bottom: 10px;">
                    <div class="span9 offset3">
                        <h3>Добро пожаловать в панель администрирования</h3>
                    </div>
                </div>
                
                <div class="row"style="margin-top: 50px;">
                    <div class="span6 offset3">


                        <div class="alert alert-warning">
                            <button class="close" data-dismiss="alert">×</button>
                            <strong>Для доступа в систему нажмите на кнопку "Авторизация" на панели сверху!</strong>
                        </div>
                        
                        <div class="alert alert-warning">
                            <button class="close" data-dismiss="alert">×</button>
                            Система находится в стадии разработки!
                        </div>
                    </div>
                </div>
        </div>
</body>
</html>

';
}
?>

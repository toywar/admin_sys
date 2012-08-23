<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<!-- <html xmlns="http://www.w3.org/1999/xhtml" lang="ru-RU" xml:lang="ru-RU"> -->
<?php
    header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
        <title>login_page</title>
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
            <li><a href="index.php">Главная</a></li>
            <li  class="active"><a href="login.php">Авторизация</a></li>
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
            
            <div class="span5 offset3">
                    <form class="well form-inline" action="process.php" method="POST">
                        <input type="text" class="input-small" placeholder="Логин" name="login">
                        <input type="password" class="input-small" placeholder="Пароль" name="password">
                        <button type="submit" class="btn">Войти</button>
                    </form>      
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
<?php
/*
//This file is 0644 permission!

function DBQuery ($SQLStatement, $outputRequired)
{
    $hostname = "localhost";
    $database = "admin_sys";
    $username = "root";
    $password = "xiephuew";
    
    $connection = mysql_connect($hostname, $username, $password);
    
    mysql_select_db($database, $connection);
    $result = mysql_query($SQLStatement, $connection);
    
    if ($outputRequired)
    {
        $temp = array();
        
        while ($row = mysql_fetch_array($result))
        {
            $temp[] = $row;
        }
        
        $result = $temp;
    }
        else
        {
            $result = mysql_insert_id();
        }
        
        mysql_close($connection);
        return $result;        

  }
 */


    mysql_connect("localhost", "sys", "letmein") or die (mysql_error());
    mysql_select_db("admin_sys") or die (mysql_error());

    mysql_query("set character_set_client       ='utf8_bin' ");
    mysql_query("set character_set_results	='utf8_bin' ");
    mysql_query("set collation_connection	='utf8_bin' ");
	
    function slashes(&$el)
	{
		if (is_array($el))
			foreach($el as $k=>$v)
				slashes($el[$k]);
		else $el = stripslashes($el); 
    }
	
	if (ini_get('magic_quotes_gpc'))
	{
	    slashes($_GET);
	    slashes($_POST);    
	    slashes($_COOKIE);
	}
?>

<?php


/**
* Библиотека функций для работы с БД MySQL
* @author IT studio IRBIS-team
* @copyright © 2011 IRBIS-team
*/
/////////////////////////////////////////////////////////
/**
* Генерация страницы ошибки при доступе вне системы
*/
    if(!defined('IRB_KEY'))
    {
       header("HTTP/1.1 404 Not Found");      
       exit(file_get_contents('../404.html'));
    }        

    
/**  
* Функция обработки литеральных констант для SQL 
*/   
    function escapeString($data)   
    {
       
        if(is_array($data))
            $data = array_map("escapeString", $data);
        else              
            $data = mysql_real_escape_string($data);
        
        return $data;
    }    

/**  
* Функция для запроса к БД MySQL. 
*/ 
    function mysqlQuery($sql, $print = false) 
    {
    
        $result = mysql_query($sql, IRB_CONNECT); 
        
        if($result === false || $print) 
        { 
            $error =  mysql_error(); 
            $trace =  debug_backtrace(); 
            
            $head = $error ?'<b style="color:red">MySQL error: </b><br> 
            <b style="color:green">'. $error .'</b><br><br>':NULL;     
             
            $error_log = date("Y-m-d h:i:s") .' '. $head .' 
            <b>Query: </b><br> 
            <pre><span style="color:#CC0000">'. $trace[0]['args'][0] .'</pre></span><br><br>
            <b>File: </b><b style="color:#660099">'. $trace[0]['file'] .'</b><br> 
            <b>Line: </b><b style="color:#660099">'. $trace[0]['line'] .'</b>'; 
             
/** 
* @TODO To clean in release 
*/ 
//----------------------------- 
           die($error_log); 
//----------------------------- 

            file_put_contents(IRB_ROOT .'log/mysql.log', strip_tags($error_log) ."\n\n", FILE_APPEND); 
            header("HTTP/1.1 404 Not Found"); 
            die(file_get_contents(IRB_ROOT .'/404.html')); 
        } 
        else 
            return $result; 
    }    
       
/**   
* Подключение и установка кодировки соединения  
*/     
    $db_irbis = mysql_connect(IRB_DBSERVER, IRB_DBUSER, IRB_DBPASSWORD) or die('No connect');  

    define('IRB_CONNECT', $db_irbis);  
  
    mysql_select_db(IRB_DATABASE, IRB_CONNECT) or die('No database selected');  
      
    mysql_query('SET NAMES utf8');    
    
    
    
    
    
    
    
    
   
    
    
    
    
    
    
    
    

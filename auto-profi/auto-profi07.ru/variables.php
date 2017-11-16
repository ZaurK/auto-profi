<?php


/**
* The block of initialization and processing of entering variables
* Блок инициализации и обработки входящих переменных
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
       exit(file_get_contents('./404.html'));
    }
    
/**
* Инициализация переменной
*/
    $page = !empty($_GET['route']) ? $_GET['route'] : '';

    
    $GET = array( 
                  'page'   => 'main',
                  'mod'    => 'read',
                  'parent' => 0,
                  'id'     => 0, 
                  'num'    => 0,                             
                );     
    
/** 
* Инициализация переменных из GET-параметров 
*/                    
    if(IRB_REWRITE === 'on' && !empty($_GET['route'])) 
    { 
        $param = explode('/', trim($_GET['route'], '/')); 
        $i = 0; 
                 
        foreach($GET as $var => $val)
        {
            if(!empty($param[$i])) 
               $GET[$var] = $param[$i];
           
            $i++;
        }
    } 
    elseif(!empty($_GET)) 
    { 
        foreach($GET as $var => $val) 
            if(!empty($_GET[$var])) 
               $GET[$var] = $_GET[$var];     
    }

/**     
* Кнопки   
*/    
    $ok     = !empty($_POST['ok']);
    $edit   = !empty($_POST['edit']);    
    $delete = !empty($_POST['delete']); 
 /**   
 * Инициализация переменных POST  
*/   
    $POST = array(  
                    'value1'  =>  '',  
                    'value2'  =>  '',
                    'value3'  =>  '',
                    'value4'  =>  '',
                    'value5'  =>  '',  
                    'value6'  =>  '',
                    'value7'  =>  '',
                    'value8'  =>  '',
                    'value9'  =>  '',
                    'value10' =>  '',    
                    'array1'  => array(),
                    'array2'  => array()
                   );  

    if(!empty($_POST['form']))
        $POST = array_merge($POST, $_POST['form']);   
    
/**    
* Другие переменные   
*/  
   $info  = array();
 

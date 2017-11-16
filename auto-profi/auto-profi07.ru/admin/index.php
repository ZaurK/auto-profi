<?php    

/**  
* АДМИН-ПАНЕЛЬ
* Главный маршрутизатор (роутер)  
* @copyright © 2012 ZaurK 
* Основа © 2011 IRBIS-team
*/ 
///////////////////////////////////////////////////////// 

/** 
* Устанавливаем кодировку и уровень ошибок 
*/ 
    header("Content-Type: text/html; charset=utf-8"); 
    error_reporting(E_ALL); 

    session_start();
    ob_start(); 
    

/**  
* Debug  
* Дебаггер 
* @TODO To clean in release 
*/ 
    define('IRB_TRACE', true);    
    include '../debug.php';     
           
/** 
* Устанавливаем ключи-константы 
*/    
    define('IRB_KEY', true);
    define('IRB_ADMIN', true);    
/** 
* Подключаем файлы ядра 
*/     
    include '../config.php';
    include IRB_ROOT .'/variables.php'; 
    include IRB_ROOT .'/language/ru.php';
    include IRB_ROOT .'/libs/mysql.php';    
    include IRB_ROOT .'/libs/default.php';    
    include IRB_ROOT .'/libs/view.php';     


/** 
* Переключатель страниц 
*/ 
    if(isset($_SESSION['admin']) && file_exists(IRB_ROOT .'/admin/'. $GET['page'] .'_controller.php'))
        include IRB_ROOT .'/admin/'. $GET['page'] .'_controller.php';    
    else
        include IRB_ROOT .'/admin/enter_controller.php';
    

// Заканчиваем буферизацию и помещаем вывод в переменную $content
   $content = ob_get_clean(); 
/** 
* Подключаем главный шаблон 
*/     
    include IRB_ROOT .'/skins/tpl/admin/index.tpl';
    
 
   

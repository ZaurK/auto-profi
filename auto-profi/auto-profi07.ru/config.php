<?php

/**
* Configuration file
* Конфигурационный файл
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



///////////////////////////////////////////////////////////////
//                THE GENERAL OPTIONS
//                  ОбЩИЕ НАСТРОЙКИ
///////////////////////////////////////////////////////////////


    $admins = array( 
                      'profi07user'   => 'profi0814pravka' // Изменить в релизе 
                    ); 
                    
/**        
* E-mail техподдержки   
*/  
   define('IRB_SUPPORT_EMAIL', 'no-replay@irbis-team.com');
/**        
* Активация аккаунта   
*/  
   define('IRB_REGISTRATION_ACTIVATE', 'on');  

/** 
* Включает модуль перенаправления  
*/ 
    define('IRB_REWRITE', 'on');    
    
/** 
* Количество слов в анонсе 
*/ 
    define('IRB_CONFIG_NUM_WORDS', 1000);
    
/** 
* Количество рядов в постраничном режиме  
*/ 
    define('IRB_CONFIG_NUM_ROWS', 50);

							
///////////////////////////////////////////////////////////////
//                OPTIONS OF CONNECTION WITH A DB
//                  НАСТРОЙКИ СОЕДИНЕНИЯ С БД
///////////////////////////////////////////////////////////////    
    
/**
* Префикс таблиц БД.
* Сервер БД. 
* Пользователь БД
* Пароль БД
* Название базы
*/   
   define('IRB_DBPREFIX', 'profi_'); 
   define('IRB_DBSERVER', 'db01.hostline.ru'); 
   define('IRB_DBUSER', 'vh96427_profi');     
   define('IRB_DBPASSWORD', 'kvidak');
   define('IRB_DATABASE', 'vh96427_profi');     
    
///////////////////////////////////////////////////////////////
//                  СИСТЕМНЫЕ НАСТРОЙКИ
///////////////////////////////////////////////////////////////

/** 
* Устанавливает физический путь до корневой директории скрипта 
*/  
    define('IRB_ROOT', str_replace('\\', '/', dirname(__FILE__)));

/** 
* Устанавливает путь до корневой директории скрипта 
* по протоколу HTTP  
*/  
    define('IRB_HOST', 'http://'. $_SERVER['HTTP_HOST'] .'/'); 
    
/** 
* Соль пароля
*/   
   define('IRB_CONFIG_SALT', 'bou5s@l#mea2d');    


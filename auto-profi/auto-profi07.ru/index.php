<?php
///////////////////////////////////////////////////////// 

/** 
* Устанавливаем кодировку и уровень ошибок 
*/ 
    header("Content-Type: text/html; charset=utf-8"); 
    error_reporting(E_ALL);
// Стартуем сессию
    session_start();
// Включаем буферизацию
    ob_start(); 
/**  
* Debug  
* Дебаггер 
* @TODO To clean in release 
*/ 
    define('IRB_TRACE', true);    
    include './debug.php';     
    
/** 
* Устанавливаем ключ-константу 
*/    
    define('IRB_KEY', true);
    
/** 
* Подключаем файлы ядра 
*/     
    include './config.php';
    include IRB_ROOT .'/variables.php'; 
    include IRB_ROOT .'/language/ru.php';
    include IRB_ROOT .'/libs/mysql.php';    
    include IRB_ROOT .'/libs/default.php';    
    include IRB_ROOT .'/libs/view.php';     
 
    
/** 
* Переключатель страниц 
*/    
    switch($GET['page'])
    {
        case '' :
            include IRB_ROOT .'/controllers/main_controller.php';        
        break;
		
        case 'about' :
            include IRB_ROOT .'/controllers/about_controller.php';        
        break;

        case 'news' :
            include IRB_ROOT .'/controllers/news_controller.php';        
        break;

        case 'team' :
            include IRB_ROOT .'/controllers/team_controller.php';        
        break;

        case 'person' :
            include IRB_ROOT .'/controllers/person_controller.php';        
        break;

        case 'auto' :
            include IRB_ROOT .'/controllers/auto_controller.php';        
        break;
		
        case 'prices' :
            include IRB_ROOT .'/controllers/prices_controller.php';        
        break;

        case 'training' :
            include IRB_ROOT .'/controllers/training_controller.php';        
        break;

        case 'indtraining' :
            include IRB_ROOT .'/controllers/indtraining_controller.php';        
        break;

        case 'restoration' :
            include IRB_ROOT .'/controllers/restoration_controller.php';        
        break;

        case 'howwrite' :
            include IRB_ROOT .'/controllers/howwrite_controller.php';        
        break;

        case 'exams' :
            include IRB_ROOT .'/controllers/exams_controller.php';        
        break;
		
        case 'route' :
            include IRB_ROOT .'/controllers/route_controller.php';        
        break;

        case 'guestbook' :
            include IRB_ROOT .'/controllers/guestbook_controller.php';        
        break;

        case 'goguestbook' :
            include IRB_ROOT .'/controllers/goguestbook_controller.php';        
        break;

        case 'shedule' :
            include IRB_ROOT .'/controllers/shedule_controller.php';        
        break;

        case 'contacts' :
            include IRB_ROOT .'/controllers/contacts_controller.php';        
        break;

       case 'documents' :
            include IRB_ROOT .'/controllers/documents_controller.php';        
        break;



        default :
            include IRB_ROOT .'/controllers/main_controller.php';         
        break;
    }

/** 
* Метатеги
*/    

   $title       = getMeta('title', $GET['page']);  
   $keywords    = getMeta('keywords', $GET['page']);
   $description = getMeta('description', $GET['page']);

// Заканчиваем буферизацию и помещаем вывод в переменную $content
   $content = ob_get_clean(); 
  

/** 
* Переключатель шаблонов
*/    
    switch($GET['page'])
    {
		
        default :
            include IRB_ROOT .'/skins/tpl/index.tpl';
        break;

    }	 

   
	
<?php

/**
* View
* Функции представления
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
* Функция формирования массива для мета-тегов  
*/ 
    function createDinamicMeta($title = '', $keywords = '', $description = '')  
    {
        global $META;
        
        if(!empty($title) || !empty($keywords) || !empty($description))
        {
            $META = array( 
                            'title'       => $title,
                            'keywords'    => $keywords,    
                            'description' => $description,    
                         );
        }
        else
            $META = NULL; 
    }     
/**    
* Функция формирования мета-тегов  
*/  
    function getMeta($tag = '', $page = '')  
    {
        global $META;
        static $meta; 
        
        if(!empty($META))
        {
            return $META[$tag];
        }
        elseif(empty($meta) && file_exists(IRB_ROOT .'/setup/meta.txt'))
            $meta = unserialize(file_get_contents (IRB_ROOT .'/setup/meta.txt'));
      
        if(empty($tag))
            return !empty($meta) ? $meta : array();
            
        if(!empty($meta[$page][$tag]))
            return htmlspecialchars($meta[$page][$tag]);
        else
            return NULL;
     
    }    
	
/**   
* Функция чтения шаблонов  
*/    
    function getTpl($tpl)  
    {  
        if(file_exists(IRB_ROOT .'/skins/tpl/'. $tpl .'.tpl'))  
            return file_get_contents(IRB_ROOT .'/skins/tpl/'. $tpl .'.tpl');  
        else  
            die('The template <b>'. $tpl .'.tpl</b> is absent in the specification');  
    }         

/**   
* Функция разбора шаблона  
*/       
    function parseTpl($cont, $data = '')  
    {  
        if(is_array($data))  
        {                  
         
            extract($data, EXTR_PREFIX_ALL, 'tpl');  
         
            ob_start();  
                eval('?>'. $cont .'<?php ');  
                $cont = ob_get_contents();    
            ob_end_clean();    
        }  
       return $cont;  
    }   


/** 
* Функция обработки переменных для вывода в поток  
*/                                                     
    function htmlChars($data)    
    {    
        if(is_array($data))             
            $data = array_map("htmlChars", $data);  
        else               
            $data = htmlspecialchars($data);    
                                 
        return $data; 
    }    


<?php

/**
* Модель
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

    
   
    
class Admin_Guestbook_Model extends Guestbook_Model
{


    
/**
* Метод представления для редактирования.
* @return array 
*/      
    public function createEdit($id)
    {
        $this->createFull($id);
        $row = mysql_fetch_assoc($this->res);
        return htmlChars($row);   
    }
 
/**
* Метод редактирования.
* @param string $title
* @param string $text
* @return mixed 
*/      
    public function editPost($title, $text)
    {
        if(empty($title))
            return IRB_LANG_NO_HEADER;
        
        if(empty($text))
            return IRB_LANG_NO_TEXT;
     
        mysqlQuery("UPDATE `". IRB_DBPREFIX . $this->table ."`
                     SET `date`   = NOW(),
                         `title`  = '". escapeString($title) ."',
                         `text`   = '". escapeString($text) ."' 
                    WHERE `id` = ". (int)$this->id
                     ); 
     
        if(mysql_affected_rows() > 0)
            return NULL;
        else
            return IRB_LANG_FATAL_ERROR;   
     
    } 
    
/**
* Метод публикации.
* @return mixed 
*/      
    public function publicPost()
    {
     
        mysqlQuery("UPDATE `". IRB_DBPREFIX . $this->table ."`
                     SET  `public` = 1 
                    WHERE `id` = ". (int)$this->id
                     ); 
     
        if(mysql_affected_rows() > 0)
            return NULL;
        else
            return IRB_LANG_FATAL_ERROR;   
     
    }     

/**
* Метод удаления.
* @return mixed 
*/      
    public function deletePost()
    {
     
        mysqlQuery("DELETE FROM `". IRB_DBPREFIX . $this->table ."`
                    WHERE `id` = ". (int)$this->id
                     ); 
     
        if(mysql_affected_rows() > 0)
            return NULL;
        else
            return IRB_LANG_FATAL_ERROR;   
     
    }       
}    
    
    
    
    
    
    
    
    
    
    

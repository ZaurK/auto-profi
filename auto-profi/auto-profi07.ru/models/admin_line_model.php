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

    
   
    
class Admin_Line_Model extends Line_Model
{
    public $img;

/**
* Метод загрузки изображения
* @param string $img
* @return mixed
*/
    public function addNewsImg($lang_file_error)
    {
        if($_FILES['file']['error'] === 0)
        {
            $upload = new IRB_Upload_Img($lang_file_error);
            
            if($error = $upload -> uploadFile('file', 'photo/news/'))
               return $error;
         
            $this->img = $upload -> new_name;


        }
        else
            return NULL;
    }

/**
* Метод записи.
* @param string $title
* @param string $text
* @return mixed 
*/      
    public function addNews($title, $text,  $photo = '')
    {
        if(empty($title))
            return IRB_LANG_NO_HEADER;
        
        if(empty($text))
            return IRB_LANG_NO_TEXT;
			
        if(!empty($photo))
            $photo = ", `photo` = '". escapeString($photo) ."'";
		
       
        mysqlQuery("INSERT INTO `". IRB_DBPREFIX . $this->table ."`
                     SET `date`   = NOW(),
                         `title`  = '". escapeString($title) ."',
                         `text`   = '". escapeString($text) ."',
						 `m_title`  = '". escapeString($title) ."',
                         `m_description`  = '". escapeString($title) ."',
                         `m_keywords`  = '". escapeString($title) ."',

                         `public` = 0 
						  ". $photo

                     ); 
     
        if(mysql_affected_rows() > 0)
        {
            $this->id = mysql_insert_id();
            return NULL;    
        }
        else
            return IRB_LANG_FATAL_ERROR;   
     
    }    
    
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
    public function editLine($title, $text)
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
    public function publicLine()
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
    public function deleteLine()
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
    
    
    
    
    
    
    
    
    
    

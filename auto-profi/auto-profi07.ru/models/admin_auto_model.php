<?php

/**
* Модель персон админ панели
* @copyright © 2012 ZaurK 
* Основа © 2011 IRBIS-team
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

    
   
    
class Admin_Auto_Model extends Auto_Model
{
    public $img;

/**
* Метод загрузки изображения
* @param string $img
* @return mixed
*/
    public function addAutoImg($lang_file_error)
    {
        if($_FILES['file']['error'] === 0)
        {
            $upload = new IRB_Upload_Img($lang_file_error);
            
            if($error = $upload -> uploadFile('file', 'photo/auto/'))
               return $error;
         
            $this->img = $upload -> new_name;


        }
        else
            return NULL;
    }

/**
* Метод записи в базу
* @param string $title
* @param string $text
* @return mixed 
*/      
    public function addAuto($name, $text,  $photo = '')
    {
        if(empty($name))
            return IRB_LANG_NO_HEADER;
        
        if(empty($text))
            return IRB_LANG_NO_TEXT;
			
        if(!empty($photo))
            $photo = ", `photo` = '". escapeString($photo) ."'";
		
        
        mysqlQuery("INSERT INTO `". IRB_DBPREFIX . $this->table ."`
                     SET 
                         `name`  = '". escapeString($name) ."',
                         `text`   = '". escapeString($text) ."',
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
    public function editAuto($name, $text)
    {
        if(empty($name))
            return IRB_LANG_NO_HEADER;
        
        if(empty($text))
            return IRB_LANG_NO_TEXT;
     
        mysqlQuery("UPDATE `". IRB_DBPREFIX . $this->table ."`
                     SET 
                         `name`  = '". escapeString($name) ."',
                         `text`   = '". escapeString($text) ."' 
                    WHERE `id` = ". (int)$this->id
                     ); 
     
        if(mysql_affected_rows() > 0)
            return NULL;
         
     
    } 
    
/**
* Метод публикации.
* @return mixed 
*/      
    public function publicAuto()
    {
     
        mysqlQuery("UPDATE `". IRB_DBPREFIX . $this->table ."`
                     SET  `public` = 1 
                    WHERE `id` = ". (int)$this->id
                     ); 
     
        if(mysql_affected_rows() > 0)
            return NULL;
            
    }     

/**
* Метод удаления.
* @return mixed 
*/      
    public function deleteAuto()
    {
     
        mysqlQuery("DELETE FROM `". IRB_DBPREFIX . $this->table ."`
                    WHERE `id` = ". (int)$this->id
                     ); 
     
        if(mysql_affected_rows() > 0)
            return NULL;
        else
            return IRB_LANG_FATAL_ERROR;   
     
    }  
	
/**
* Метод представления персон на странице персон в админке.
* @param string $template
* @param string $mod
* @param string $link
* @return string 
*/      
    public function createRows($template, $mod, $link)
    {
        $rows  = '';    
        $tpl   = getTpl($template);    
        $bb = new IRB_BBdecoder();
       
        while($row = mysql_fetch_assoc($this->res))
        {
		    $row['photo'] = !empty($row['photo']) ? '<img src="'. IRB_HOST .'libs/preview_small.php?src='. $row['photo'] .'" id="imgstyle"/></a><br />' : '';
			

            $row['name'] = htmlChars($row['name']);
            
            if($this->clear)
                $row['text'] = $bb -> stripBBtags($row['text']);
            else
                $row['text'] = $bb -> createBBtags($row['text']);
                
            $row['link']  = $link;
            $row['url']   = href('mod='. $mod, 'parent='. $row['id']);          
            $rows .= parseTpl($tpl, $row);   
        }
        
        return $rows;    
    }
	     
}    
    
    
    
    
    
    
    
    
    
    

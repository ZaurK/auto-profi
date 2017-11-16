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

    
   
    
class Guestbook_Model
{
    
    public $id, $table, $menu, $where, $and;
    public $clear = false;
    
    private $num;
    
    protected $res; 

/**
* Конструктор
* @param string $table
* @param int $num
* @param boolean $public
*/
    public function __construct($table, $num = 1, $public = true)
    {
        $this->table = $table;
        $this->num   = $num;
        $this->where = $public ? ' WHERE `public` = 1 ' : '';
        $this->and   = $public ? ' AND   `public` = 1 ' : '';        
    }

/**
* Метод генерации ленты анонсов
* @param int $num_rows
* @param int $num_words
* @param bolean $list
* @return void
*/
    public function createPreview($num_rows, $num_words, $list = true)
    {
        $pag = new IRB_Paginator($this->num, $num_rows);
        
        $this->res = $pag -> countQuery("SELECT `id`,  `name`, `public`, 
                                                DATE_FORMAT(`date`,'%d-%m-%Y') AS `date`,
                                            SUBSTRING_INDEX(`text`,' ', ". $num_words .") AS `text`
                                              FROM `". IRB_DBPREFIX . $this->table ."`
                                              WHERE `public` = 1  
                                              ORDER BY `id` DESC "
                                        );
        
        if($list)
            $this->menu = $pag -> createMenu();
    }  

/**
* Метод генерации полного текста по идентификатору.
* @param int $id
* @return void
*/  
    public function createFull($id)
    {
        $this->res = mysqlQuery("SELECT `id`,  `name`, `public`, `text`, 
                                        DATE_FORMAT(`date`,'%d-%m-%Y') AS `date`
                                    FROM `". IRB_DBPREFIX . $this->table ."`
                                      WHERE `id`     = ". (int)$id ."
                                      ". $this->and ."  
                                    ORDER BY `id` DESC "
                                );
        
    }

/**
* Метод генерации ленты анонсов
* @param int $num_rows
* @param int $num_words
* @param bolean $list
* @return void
*/
    public function createPreviewAdmin($num_rows, $num_words, $list = true)
    {
        $pag = new IRB_Paginator($this->num, $num_rows);
        
        $this->res = $pag -> countQuery("SELECT `id`,  `name`, `public`, 
                                                DATE_FORMAT(`date`,'%d-%m-%Y') AS `date`,
                                            SUBSTRING_INDEX(`text`,' ', ". $num_words .") AS `text`
                                              FROM `". IRB_DBPREFIX . $this->table ."`
                                              ORDER BY `id` DESC "
                                        );
        
        if($list)
            $this->menu = $pag -> createMenu();
    }  


/**
* Метод представления.
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

            $row['name'] = htmlChars($row['name']);
            
            if($this->clear)
                $row['text'] = $bb -> stripBBtags($row['text']);
            else
                $row['text'] = $bb -> createBBtags($row['text']);
                
            $row['link']  = $link;
            $row['url']   = href('mod='. $mod, 'parent='. $row['id'], 'num='. $this->num);          
            $rows .= parseTpl($tpl, $row);   
        }
        
        return $rows;    
    }


/**
* Метод записи.
* @param string $title
* @param string $text
* @return mixed 
*/      
    public function addPost($name, $text)
    {
        if(empty($name))
            return IRB_LANG_NO_NAME;

        if($name=="Представьтесь, пожалуйста")
            return IRB_LANG_NO_NAME;
        
        if(empty($text))
            return IRB_LANG_NO_TEXT;
			
 if($text=="Оставьте свой отзыв...")
            return IRB_LANG_NO_TEXT;
     
        mysqlQuery("INSERT INTO `". IRB_DBPREFIX . $this->table ."`
                     SET `date`   = NOW(),
                         `name`  = '". escapeString($name) ."',
                         `text`   = '". escapeString($text) ."',
                         `public` = 0 
						  "

                     ); 
     
        if(mysql_affected_rows() > 0)
        {
            $this->id = mysql_insert_id();
            return NULL;    
        }
        else
            return IRB_LANG_FATAL_ERROR;   
     
    }    
   
}
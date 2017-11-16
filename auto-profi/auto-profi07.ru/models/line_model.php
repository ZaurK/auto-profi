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

    
   
    
class Line_Model
{
    
    public $id, $table, $menu, $where, $and, $img;
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
        
        $this->res = $pag -> countQuery("SELECT `id`,  `title`, `public`, `photo`,
                                                DATE_FORMAT(`date`,'%d-%m-%Y') AS `date`,
                                            SUBSTRING_INDEX(`text`,' ', ". $num_words .") AS `text`
                                              FROM `". IRB_DBPREFIX . $this->table ."`
                                              ". $this->where ." 
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
        $this->res = mysqlQuery("SELECT `id`,  `title`, `public`, `text`, `photo`,
                                        DATE_FORMAT(`date`,'%d-%m-%Y') AS `date`
                                    FROM `". IRB_DBPREFIX . $this->table ."`
                                      WHERE `id`     = ". (int)$id ."
                                      ". $this->and ."  
                                    ORDER BY `id` DESC "
                                );
        
    }

    
/**
* Метод представления новостей на странице новостей.
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
		    $row['photo'] = !empty($row['photo']) ? '<div><img src="'. IRB_HOST .'libs/preview_smaller.php?src='. $row['photo'] .'" id="imgstyle"/></div><br />' : '';

            $row['title'] = htmlChars($row['title']);
            
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
* Метод представления полной новости.
* @param string $template
* @param string $mod
* @param string $link
* @return string 
*/      
    public function createRowsFull($template, $mod, $link)
    {
        $rows  = '';    
        $tpl   = getTpl($template);    
        $bb = new IRB_BBdecoder();
       
        while($row = mysql_fetch_assoc($this->res))
        {
		    $row['photo'] = !empty($row['photo']) ? '<div ><img src="'. IRB_HOST .'libs/preview.php?src='. $row['photo'] .'" / id="imgstyle"><br /></div>' : '';

            $row['title'] = htmlChars($row['title']);
            
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

}    
    
    
    
    
    
    
    
    
    
    
    
    
    

<?php

/**
* Модель персон
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

    
   
    
class Person_Model
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
* Метод генерации ленты персон
* @param int $num_rows
* @param int $num_words
* @param bolean $list
* @return void
*/
    public function createPreview($num_rows, $num_words, $list = true)
    {
        $pag = new IRB_Paginator($this->num, $num_rows);
        
        $this->res = $pag -> countQuery("SELECT `id`,  `name`, `public`, `photo`,
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
        $this->res = mysqlQuery("SELECT `id`,  `name`, `public`, `text`, `photo`
                                    FROM `". IRB_DBPREFIX . $this->table ."`
                                      WHERE `id`     = ". (int)$id ."
                                      ". $this->and ."  
                                    ORDER BY `id` DESC "
                                );
        
    }

    
/**
* Метод представления персон на странице персон.
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
		    $row['photo'] = !empty($row['photo']) ? '<a rel="example_group" href="'.$row['photo'].'"><img src="'. IRB_HOST .'libs/preview_small.php?src='. $row['photo'] .'" title="Нажмите, чтобы увеличить" id="imgstyle"/></a><br />' : '';
			

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
* Метод представления персон полный вариант.
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
		    $row['photo'] = !empty($row['photo']) ? '<div  id="newsphoto"><img src="'. IRB_HOST .'libs/preview.php?src='. $row['photo'] .'" /><br /></div>' : '';

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

}    
    
    
    
    
    
    
    
    
    
    
    
    
    

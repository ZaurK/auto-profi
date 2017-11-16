<?php

/**
 * IRB_Upload_Img - Класс загрузки изображений
 * NOTE: Requires PHP version 5 or later 
 * @package IRB_Upload_Img
 * @author IT studio IRBIS-team (www.irbis-team.com)
 * @copyright © 2012 IRBIS-team
  * @version 0.1
 * @license http://www.opensource.org/licenses/rpl1.5.txt
 */

class IRB_Upload_Img
{
// Новая переменная $name для имени файла 
     public $error, $name, $new_name, $big;
    public $width =120;
    public $height = 100;    
    
    public function __construct($error)
    {
        $this->error = $error;
    }
	

/*
* Метод загрузки файла на сервер
* @param string $file
* @param string $dir
* @return mixed
*/
  
    public function uploadFile($file, $dir = 'photo/')
    {
     
        if(!empty($this->error[$_FILES[$file]['error']])) 
            return $this->error[$_FILES[$file]['error']]; 
        elseif(($extension = $this->checkFile($file)) === false)    
            return $this->error['UPLOAD_ERR_EXTENTION']; 
            
        $img = getimagesize($_FILES[$file]['tmp_name']);
            
        if($img[2] < 1 || $img[2] > 3)
            return $this->error['UPLOAD_ERR_EXTENTION'];
        else
        {
            $this->name = $this->generateFilename($file);
            $this->name .=  '.'. $extension;            
            $this->new_name  = IRB_HOST . $dir . $this->name;
            $upload_name = IRB_ROOT .'/'. $dir . $this->name; 

// Копируем файл из каталога для временного хранения файлов:
if (!copy($_FILES['file']['tmp_name'], $upload_name))
{
 die ("Ошибка! Не удалось загрузить файл на сервер! Вероятно файл превышает 2 МБт");
}
  
        }

    }    


    
/*
* Метод проверки типа файла
* @param string
* @return string
*/
    public function checkFile($file)
    { 
        $extension = pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION);  
        $valid_extensions = array('jpg', 'jpeg', 'gif', 'png');         
         return in_array($extension, $valid_extensions) ? $extension : false;
        
    }
    
/*
* Метод генерации уникального имени
* @return string
*/
    public function generateFilename($file)
    {
        return time() . strtolower(substr($_FILES[$file]['tmp_name'], -8, 4)); 
    }
	

}    
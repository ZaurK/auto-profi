<?php
 

/**
* Language file (Russian)
* Языковой файл (русский)
* @author IT studio IRBIS-team
* @copyright © 2009 IRBIS-team
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
    
    define('IRB_LANG_FATAL_ERROR',   'Сбой системы');
    
    define('IRB_LANG_FULL',   '<br>Читать дальше');
    define('IRB_LANG_BACK',   '<br>Вернуться');
    define('IRB_LANG_EDIT',   '<br><br>Редактировать');
    
    define('IRB_LANG_NO_NAME',          'Нет имени');
    define('IRB_LANG_NO_HEADER',        'Нет заголовка');
    define('IRB_LANG_NO_TEXT',          'Нет текста'); 
    define('IRB_LANG_NO_PRICE',         'Нет цены');     
    define('IRB_LANG_INVALID_LINK',     'Только латиница и цифры');    
    define('IRB_LANG_NO_TITLE',         'Новый модуль'); 
    define('IRB_LANG_NO_KEYWORDS',      'Ключевые слова не прописаны'); 
    define('IRB_LANG_NO_DESCRIPTION',   'Описания страницы нет'); 
    define('IRB_LANG_META_ADMIN',       'Панель администрирования');     
    define('IRB_LANG_NO_SELECT',        'Не выбрано');  
    
 
    $lang_file_error = array( 
                            UPLOAD_ERR_INI_SIZE   => 'Размер файла больше разрешенного', 
                            UPLOAD_ERR_FORM_SIZE  => 'Размер файла превышает указанное значение в MAX_FILE_SIZE', 
                            UPLOAD_ERR_PARTIAL    => 'Файл был загружен только частично', 
                            UPLOAD_ERR_NO_FILE    => 'Не был выбран файл для загрузки', 
                            UPLOAD_ERR_NO_TMP_DIR => 'Не найдена папка для временных файлов', 
                            UPLOAD_ERR_CANT_WRITE => 'Ошибка записи файла на диск',
                           'UPLOAD_ERR_EXTENTION' => 'Файл имеет недопустимое расширение',
                           'UPLOAD_ERR_WIDTH'     => 'Ширина изображения имеет недопустимый размер',
                           'UPLOAD_ERR_HEIGHT'    => 'Высота изображения имеет недопустимый размер',
                           'UPLOAD_ERR_UPLOAD'    => 'Не удалось загрузить файл'
                        ); 

    define('IRB_LANG_ERROR_USERDATA',     'Ошибка ввода данных');   
    define('IRB_LANG_EMPTY_LOGIN',        'Введите логин');
    define('IRB_LANG_INVALID_LOGIN',      'Длина логина не должна быть меньше 3 или больше 15 символов');
    define('IRB_LANG_NO_UNIQUE_LOGIN',    'Такой логин зарегистрирован в системе');          
    define('IRB_LANG_EMPTY_PASSWORD',     'Введите пароль');            
    define('IRB_LANG_SHORT_PASSWORD',     'Пароль ненадежен. Минимум 6 символов' ); 
    define('IRB_LANG_INVALID_PASSWORD',   'Проли не совпадают' );    
    define('IRB_LANG_EMPTY_CODE',         'Введите код активации' );
    define('IRB_LANG_INVALID_CODE',       'Код активации введен неверно' );    
    define('IRB_LANG_EMPTY_EMAIL',        'Введите E-mail' );    
    define('IRB_LANG_INVALID_EMAIL',      'E-mail некорректен' );    
    define('IRB_LANG_REST_RESTORATION',   'Восстановление пароля');
    define('IRB_LANG_REST_RESTORAT_FOR',  'С Вашего электронного почтового адреса поступила заявка на '.
                                          'восстановление доступа на сайт <b>www.'
                                          . str_replace('www.', '', $_SERVER['HTTP_HOST']) ."</b><br>\n".     
                                          'Для доступа в аккаунт пройдите по '); 
    define('IRB_LANG_REST_LINK',          'этой ссылке');                                                  
    define('IRB_LANG_REST_ACTIVATE_END',  'или введите в поле активации этот код: <b>');
    define('IRB_LANG_MAIL_INFO',          'На Ваш почтовый адрес отправлен код активации');    
    define('IRB_LANG_NO_EMAIL',           'Такой E-mail не числится в нашей базе данных');    
    define('IRB_LANG_CHANGE_ACCAUNT',     'Учетная запись успешно изменена.'); 
    define('IRB_LANG_ACTIVATION',         'Активация аккаунта');    
    define('IRB_LANG_ACTIVATION_FOR',     'С Вашего электронного почтового адреса поступила заявка на '.
                                          'активацию аккаунта на сайте <b>www.'
                                          . str_replace('www.', '', $_SERVER['HTTP_HOST']) ."</b><br>\n".     
                                          'Для активации пройдите по ');    
    
    
    
    
    
    
    
    
    


<?php


   $meta = array(
  
   'main'     =>  array(                 'title'       => 'Автошкола Профессионал - Нальчик, Кабардино-Балкарская республика',
                                         'keywords'    => 'Автошкола Профессионал - Нальчик, Кабардино-Балкарская республика',
                                         'description' => 'Автошкола Профессионал - Нальчик, Кабардино-Балкарская республика'
                        ),
   'about'    =>  array(                 'title'       => 'О школе',
                                         'keywords'    => 'О школе',
                                         'description' => 'О школе'
                        ),
   'team'     =>  array(                 'title'       => 'Наша команда',
                                         'keywords'    => 'Наша команда',
                                         'description' => 'Наша команда'
                        ),
   'prices'   =>  array(                 'title'       => 'Услуги и цены',
                                         'keywords'    => 'Услуги и цены',
                                         'description' => 'Услуги и цены'
                        ),
   'howwrite'   =>  array(               'title'       => 'Как записаться',
                                         'keywords'    => 'Как записаться',
                                         'description' => 'Как записаться'
                        ),
   'exams'   =>  array(                  'title'       => 'Экзамены',
                                         'keywords'    => 'Экзамены',
                                         'description' => 'Экзамены'
                        ),
   'guestbook'   =>  array(              'title'       => 'Гостевая',
                                         'keywords'    => 'Гостевая',
                                         'description' => 'Гостевая'
                        ),
   'auto' => array(                 'title'       => 'Наши автомобили',
                                         'keywords'    => 'Наши автомобили',
                                         'description' => 'Наши автомобили'
                        ),
   'training' => array(             'title'       => 'Обучение',
                                         'keywords'    => 'Обучение',
                                         'description' => 'Обучение'
                        ),

   'indtraining' => array(             'title'       => 'Индивидуальное обучение',
                                         'keywords'    => 'Индивидуальное обучение',
                                         'description' => 'Индивидуальное обучение'
                        ),
   'restoration'       => array(                 'title'       => 'Восстановление навыков вождения',
                                         'keywords'    => 'Восстановление навыков вождения',
                                         'description' => 'Восстановление навыков вождения'
                        ),

   'med'       => array(                 'title'       => 'Медицинская комиссия',
                                         'keywords'    => 'медицинская комиссия',
                                         'description' => 'медицинская комиссия'
                        ),
	   'route' => array(             'title'       => 'Учебные маршруты',
                                         'keywords'    => 'Учебные маршруты',
                                         'description' => 'Учебные маршруты'
                        ),
					
									
   'contacts'   => array(                'title'       => 'Контакты',
                                         'keywords'    => 'Контакты',
                                         'description' => 'Контакты'
                        )
           ); 
               
    if(file_put_contents('./setup/meta.txt', serialize($meta)))
        echo 'Ищем файл в папке setup';

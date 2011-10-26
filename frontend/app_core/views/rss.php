<?php header('Content-Type: text/xml');
     echo '<?xml version="1.0" encoding="iso-8859-1" ?>';
     echo '<rss version="2.0">
    <channel>
     <title>Universidad Creativa: Últimas Noticias y Eventos</title>
     <link>http://www.ucreativa.com/</link>
     <description>Últimas noticias expuestas en Ucreativa.com</description>
     <language>es-ES</language>';
    // creamos documento si existen noticias nuevas
     require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreasite/global.php");
     require_once(__CTR_PATH . "ctr_new.php");
     $new_core=new ctr_New();
     $row=$new_core->get_lastnews(10);
     $link="";


     foreach($row as $value){

         $link='http://www.ucreativa.com/?s='.$array_sections[3].'&idn='.$value[0];

         echo '<item>
                  <title>Noticia: ' . utf8_decode($value[1]) . '</title>
                  <description>' . htmlspecialchars(substr($value[4],0,120)) . '...</description>
                  <link>'.utf8_decode(htmlspecialchars($link)).'</link>
               </item>';
     }

     require_once(__CTR_PATH . "ctr_event.php");
     $event_core=new ctr_Event();
     $row=$event_core->get_lastevents(10);

     foreach($row as $value){

        $link=$value[3];

         echo '<item>
                  <title>Evento: ' . utf8_decode($value[1]) . '</title>
                  <description>' . htmlspecialchars(substr($value[2],0,120)) . '...</description>
                  <link>'.utf8_decode(htmlspecialchars($link)).'</link>
               </item>';
     }

    echo '</channel></rss>';
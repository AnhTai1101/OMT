<?php
   $count = 4;
   $pages = $count/5;
   // neu khong thuoc integer thi
   if(!is_integer($pages)){
       $pages = (int)$pages + 1;
   }
   echo $pages;
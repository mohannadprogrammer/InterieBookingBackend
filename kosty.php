<?php 
    $url ="http://ip2c.org/".$_GET["ip"];
    $location = file_get_contents($url);
    $internetName = file_get_contents("http://codesoft.sd:10022/time?q=".$location[2].$location[3]);
    echo $internetName;
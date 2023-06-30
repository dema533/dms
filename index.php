<?php
$url="";
if (isset($_GET['url'])) {
   $url=$_GET['url'];
}

if ($url=="") {
    require 'home.php';
}elseif($url=="find_parish/"){
    require 'find_paroisse.php';
}elseif($url=="find_query/"){
    require 'liste_demande.php';
}

?>
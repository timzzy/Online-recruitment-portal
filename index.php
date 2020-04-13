<?php

//INITIAL CHECK AND LOAD DEFAULTS
include("admin/config.php");
require_once("myassets/functions/da_function.php");
require_once("myassets/functions/da_sql.inc.php");
require_once("myassets/functions/timzzy_function.php");


@$typ = $_GET['rdr'];
//@$typ1 = $_GET['typ1'];
//=====================================================
if ($typ =="index") {
    $typ="home";
}

//## Getting the pages
if(isset($typ)){
        //$mytitle = "WELCOME |&nbsp;";
        if(!file_exists($typ.'.php')){
            include('404.php');
           /// display_error('ERROR 404, PAGE NOT FOUND');
            exit;            
        }
        else{
        include($typ.'.php');
        exit;
        }
}
//=====================================================
//## DEFAULT PAGE
@include_once('home.php');

?>
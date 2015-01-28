<?php

error_reporting(0);
ini_set('max_execution_time', 0);


require_once("db-connection.php");
require_once("functions.php");

$NoOfPages = 3;     //How much pages do want to scrap
$url = 'http://olx.com.pk/faisalabad/mobile-phones/';
UrlExtractor($url);


function UrlExtractor($url){
    
    global $con;
    $html = doCURL($url);

    $dom = new DOMDocument();

    @$dom->loadHTML($html);
    $links = $dom->getElementById('offers_table')->getElementsByTagName('a');

    foreach ($links as $link) {
       
        //Extract and show the "href" attribute. 
        if($link->getAttribute('href') != "#" && $link->getAttribute('href') != 'javascript:void(0)'){
            $urls[] = $link->getAttribute('href');
        } 
    }
    
    $urls = array_unique($urls);
    
    foreach($urls as $key=>$val){
        try{
            $sql = "INSERT INTO `url_log` SET `url`='".$val."', `created_at` = '".date('Y-m-d')."'";
            $qry = mysqli_query($con, $sql);
        }
        catch(Exception $ex)
        {
            //
        }
    }
    
    
}

die;

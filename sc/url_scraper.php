<?php

error_reporting(0);
ini_set('max_execution_time', 0);


require_once("db-connection.php");
require_once("functions.php");

$NoOfPages = 3;     //How much pages do want to scrap
$url = 'http://olx.com.pk/faisalabad/mobile-phones/';
UrlExtractor($url);
die;
for($i = 2; $i <= $NoOfPages ; $i++){
    
    $url = 'http://olx.com.pk/faisalabad/mobile-phones/?page='.$i;
    UrlExtractor($url);
    
}


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
    
//    echo '<pre>';
//    print_r(array_unique($urls));
//    echo '</pre>';
    
}






/*
  $oDOMDoc->loadHTML($html);
  print_r( $oDOMNodes = $oDOMDoc->getElementById('body-container') );
  //$oDOMNodes = $oDOMDoc->getElementById('body-container')->getElementsByTagName('a');
  echo "<pre>";
  print_r($oDOMNodes );
  echo "</pre>";

  $arr = array();

  $arr[] = "http://olx.com.pk/item/iphone-4s-32-gb-updated-software-IDSzPWw.html#79873cbc8b";

 *

function get_content($urlArray) {

    for ($i = 0; $i < sizeof($urlArray); $i++) {
        $html = doCURL($urlArray[$i]);

        $dom = new DOMDocument();
        @$dom->loadHTML($html);

        // grab all the on the page
        $xpath = new DOMXPath($dom);

        $ptitle = $xpath->query('//*[@id="offer_active"]/div[2]/div[1]/div[1]/div[1]/h1');
        $pdate = $xpath->query('//*[@id="offer_active"]/div[2]/div[1]/div[1]/div[1]/p/small/span');
        $pdetail = $xpath->query('//*[@id="offerdescription"]/div[2]');
        $pnumber = $xpath->query('//*[@id="contact_methods"]/li[3]/div[2]/strong');
        $pubname = $xpath->query('//*[@id="offeractions"]/div/div[1]/div[2]/div/p/span[1]');

        foreach ($ptitle as $pt) {
            $title = secure($pt->nodeValue);
        }

        // Get date

        foreach ($pdate as $pt) {
            $date = secure($pt->nodeValue);
        }

        // Get Number

        foreach ($pnumber as $pt) {
            $number = secure($pt->nodeValue);
        }

        // Get Publisher name Number

        foreach ($pubname as $pt) {
            $name = secure($pt->nodeValue);
        }

        // Get Post Detail

        foreach ($pdetail as $pt) {
            $detail = secure($pt->nodeValue);
        }
    }
}

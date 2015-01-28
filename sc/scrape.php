<?php

// namespace abeautifulsite;
// use Exception;

ini_set('max_execution_time', 300);

//require_once("db-connection.php");
require_once("functions.php");


require 'abeautifulsite/SimpleImage.php';
require 'simple_html_dom.php';

$raw_image_store = 'raw/';
if (!is_dir($raw_image_store)) {
	mkdir($raw_image_store);
}

// $sql = "SELECT * FROM url_log WHERE scrap_status = '0' order by rand() LIMIT 1";
// $qry = mysqli_query($con, $sql);
// $r = mysqli_fetch_object($qry);
// var_dump(mysqli_num_rows($qry));
// echo '<pre>';
// print_r( $r );
// echo $url = $r->url;

try {
	$url = "http://codecree.com/";
     //$url = "http://olx.com.pk/item/i-phone-5-f-u-white-silver-or-exchange-possible-IDSAEX5.html#818a4d5496";
     $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n"));
	 $context = stream_context_create($opts);
     echo $html = file_get_html($url, FALSE, $context);
     //echo $html = doCurl($url);
    

} catch (Exception $ex) {
    echo $ex->getMessage();
}

die("Ithay e maryaaa");

$title = '';
$city = '';
$price = '';
$price = '';
$contact_name = '';
$phone = '';
$brand = '';
$content = '';

$title = secure($html->find('.offerheadinner h1', 0)->plaintext);
$city = secure($html->find('.show-map-link strong', 0)->plaintext);
$price = secure($html->find('.pricelabel strong', 0)->plaintext);
$price = preg_replace('/[^0-9]/', '', $price) . '000000';
$contact_name = secure($html->find('.userdetails .xx-large', 0)->plaintext);
$phone = secure($html->find('.contactitem .xx-large', 0)->plaintext);
$brand = secure($html->find('.details .pding5_10 .block a', 0)->plaintext);
$content = secure("<p class='brand'>" . $brand . "</p>" . $html->find('#textContent', 0)->innertext);

$cat_id = 15;

echo $sql = "INSERT INTO `oc_t_item` set
    `fk_i_category_id` = $cat_id,
    `dt_pub_date` = '" . date('y-m-d') . "' ,
    `i_price` = '$price',
    `fk_c_currency_code` ='PKR' ,
    `s_contact_name` = '$contact_name',
    `b_enabled` = 1 ,
    `b_active` = 1 ,
    `b_show_email` = 1 ,
    `dt_expiration` = '9999-12-31 23:59:59'";

$qry = mysqli_query($con, $sql) or die(mysqli_error($con));
echo $ad_id = mysqli_insert_id($con);

if ($ad_id) {
    echo '<hr>';
    echo $sql = "INSERT INTO `oc_t_item_description` set `fk_i_item_id` = $ad_id,
    `fk_c_locale_code` = 'en_US',
    `s_title` = '$title',
    `s_description` = '$content'";
    mysqli_query($con, $sql) or die(mysqli_error($con));
    echo '<hr>';
    echo $sql = "INSERT INTO `oc_t_item_meta` set `fk_i_item_id` = $ad_id, `fk_i_field_id` = 3 , `s_value` = '$phone'";
    mysqli_query($con, $sql) or die(mysqli_error($con));
    echo '<hr>';
    echo $sql = "INSERT INTO `oc_t_item_location` set `fk_i_item_id` = $ad_id, `fk_c_country_code` = 'PK', `s_country` = 'Pakistan', `s_address` = '$city', `fk_i_city_id` = '356392' , `s_city` = '$city' ";
    mysqli_query($con, $sql) or die(mysqli_error($con));
    echo '<hr>';

    echo '<hr>';

    echo '<pre>';
    echo "title   : " . $title . ' <hr>';
    echo "city   : " . $city . ' <hr>';
    echo "price   : " . $price . ' <hr>';
    echo "userna   : " . $username . ' <hr>';
    echo "phone   : " . $phone . ' <hr>';
    echo "brand   : " . $brand . ' <hr>';
    echo "conten   : " . $content . ' <hr>';
    $images = array();
    $directory = $raw_image_store . $ad_id . '/';
    mkdir($directory);
    $croped = "../oc-content/uploads/$ad_id/";
    $croped_i = "oc-content/uploads/$ad_id/";
    mkdir( $croped );
    foreach ($html->find('#bigGallery a') as $e) {
        $inUrl = $e->href;
        $fileName = basename( $e->href );
        $outFile = $fileName;

        //save_from_url($e->href, $directory . $outFile);
        try{
            $img_content = file_get_contents( $e->href );
            //Store in the filesystem.
            $fp = fopen( $directory . $outFile , "w");
            fwrite($fp, $img_content);
            fclose($fp); 
        }catch(Exception  $ex ){}

        $ext = pathinfo($directory . $outFile, PATHINFO_EXTENSION);
        echo $sql = "INSERT INTO `oc_t_item_resource` set `fk_i_item_id` = $ad_id, `s_name` = '$outFile', `s_extension` ='$ext', `s_content_type` = 'image/jpeg', `s_path` = '$croped_i'";
        mysqli_query($con, $sql) or die(mysqli_error($con));

        $image_id = mysqli_insert_id($con);
        $img = new SimpleImage();
        $img->load($directory . $outFile);
        if ($img->get_width() > $img->get_height()) {
            $img->crop(100, 0, $img->get_width(), $img->get_height())->save($croped . $image_id . '.' . $ext );
        } else {
            $img->crop(0, 100, $img->get_width(), $img->get_height())->save($croped . $image_id. '.' . $ext );
        }
        $img->thumbnail(200, 200)->save($croped . $image_id. '_thumbnail.' . $ext );
        $img->fit_to_width(400)->save($croped . $image_id. '_preview.' . $ext );
        

    }
    statusUpdate( $ad_id );
    print_r($images);
}

function save_from_url($src, $outPath) { //Download images from remote server
    
    // $in = fopen($inPath, "rb");
    // $out = fopen($outPath, "wb");
    // while ($chunk = fread($in, 8192)) {
    //     fwrite($out, $chunk, 8192);
    // }
    // fclose($in);
    // fclose($out);
    // return true;
}

function statusUpdate($id){
    global $con;
    mysqli_query($con,"UPDATE `url_log` SET `scrap_status` = '1' WHERE `id` = '".$id."'");
}

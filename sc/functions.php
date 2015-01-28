<?php

// Include this after db connection

/* * ************ Functions ***************** */

function secure($data) {
    global $con;
    $data = str_replace('�', '', $data);
    $data = preg_replace('/\s+/', ' ', trim($data));
    return mysqli_real_escape_string($con, addslashes($data));
}

function doCURL($url) {
    //$filename = md5($url).".html";
//	if(!is_file("cache/".$filename))
//	{
    $ch = curl_init($url);
    @curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    @curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
    curl_setopt_array($ch, array(
        CURLOPT_RETURNTRANSFER => TRUE
    ));
    // Send the request
    $response = curl_exec($ch);
    /*
      $fp = fopen("cache/".$filename,"w");
      fwrite($fp, $response);
      fclose($fp);
     */
    curl_close($ch);
//	}
//	else
//	{
//		$response = file_get_contents("cache/".$filename);
//	}
    return $response;
}


/******************************************/

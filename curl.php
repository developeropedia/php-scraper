<?php

function curl($url=false) {
    if ($url == false){
        return false;
    }
    $user_agent = @$_SERVER['HTTP_USER_AGENT'];
    $ch = curl_init();
    // curl_setopt($ch, CURLOPT_PROXY, "http://scraperapi:586394fc5eb0637b930502fb60048550@proxy-server.scraperapi.com:8001");
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,10);
    curl_setopt($ch, CURLOPT_TIMEOUT, 25);
    curl_setopt($ch, CURLOPT_ENCODING, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if(curl_errno($ch)==28){
        return "Request timeout!";
    }
    curl_close($ch);
    if ($httpcode >= 200 && $httpcode < 300) {
        return $data;
    } else {
        return "Error!";
    }
}
    

?>
<?php

// IP or URL to Xtream-Codes
define('IP','http://avatariptv.com:80');

function apixtream($url_api){	
$ch = curl_init();	
$timeout = 10;	
curl_setopt ($ch, CURLOPT_URL, $url_api);	
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);	
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);	
$return = curl_exec($ch);	
curl_close($ch);	
return $return;
}

/* USING THE SIMPLES SIMPLE API XTREAM
 * The methods are accessed via GET or POST by sending some parameters.
 *
 * User login & password = Required on all requests
 *
 * Call Login: 
 * api.php?op=login&username=username&password=password
 *
 * Call categorys of channels:
 * api.php?op=category_channels&username=username&password=password
 *
 * Call all os channels:
 * api.php?op=channels&username=username&password=password
 *
 * Call channels by category:
 * api.php?op=channels&category=ID&username=username&password=password
 *
 * Call categorys of Vods (Films):
 * api.php?op=category_vods&username=username&password=password
 *
 * Call All of Vods (Films):
 * api.php?op=vods&category=ID&username=username&password=password
 *
 * Call Vods by category:
 * api.php?op=vods&category=ID&username=username&password=password
 *
 * Call Categorys Series:
 * api.php?op=category_series&username=username&password=password
 *
 * Call All as Series:
 * api.php?op=series&username=username&password=passwor
 *
 * Call Series by category:
 * api.php?op=series&category=ID&username=username&password=password
 *
 * Call Information of Vod (Film):
 * api.php?op=vod&id=ID&username=username&password=password
 *
 * Call Information of Series
 * api.php?op=serie&id=ID&username=username&password=password
 *
 * Layer EPG Summarized By Channel
 * api.php?op=epg_simples&id=ID&username=username&password=password
 *
 * Layer EPG Complete By Channel
 * api.php?op=epg&id=ID&username=username&password=password
 *
 * Layer Todo EPG Full
 * api.php?op=epgfull&username=username&password=password
 *
 * Call to convert the M3U list to JSON
 * api.php?op=lists&username=username&password=password
 *
 * Make the calls through your browser by the URL you use there 
 * Example: www.mydomain.com/api.php?op=epgfull&username=username&password=password
 *
 * Version 1.0 
 * Need to Treat and Adapt Arrys and Values
 * 
*/


if($_REQUEST['op'] == 'login') {
	
	$user = $_REQUEST['username'];
	$pwd = $_REQUEST['password'];
	
	$url = IP."/player_api.php?username=$user&password=$pwd";
	$answer = apixtream($url);
	$output = json_decode($answer,true);
	echo $answer;
}

if($_REQUEST['op'] == 'category_channels') {
	
	$user = $_REQUEST['username'];
	$pwd = $_REQUEST['password'];
	
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_live_categories";
	$answer = apixtream($url);
	$output = json_decode($answer,true);
	echo $answer;
}

if($_REQUEST['op'] == 'channels') {
	
	$user = $_REQUEST['username'];
	$pwd = $_REQUEST['password'];
	$category = $_REQUEST['category'];
	
	if($category > 0) {
		$url = IP."/player_api.php?username=$user&password=$pwd&action=get_live_streams&category_id=$category";
	} else {
		$url = IP."/player_api.php?username=$user&password=$pwd&action=get_live_streams";
	}
	
	$answer = apixtream($url);
	$output = json_decode($answer,true);
	echo $answer;
}


if($_REQUEST['op'] == 'category_vods') {
	
	$user = $_REQUEST['username'];
	$pwd = $_REQUEST['password'];
	
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_vod_categories";
	$answer = apixtream($url);
	$output = json_decode($answer,true);
	echo $answer;
}

if($_REQUEST['op'] == 'vods') {
	
	$user = $_REQUEST['username'];
	$pwd = $_REQUEST['password'];
	$category = $_REQUEST['category'];
	
	if($category > 0) {
		$url = IP."/player_api.php?username=$user&password=$pwd&action=get_vod_streams&category_id=$category";
	} else {
		$url = IP."/player_api.php?username=$user&password=$pwd&action=get_vod_streams";
	}
	
	$answer = apixtream($url);
	$output = json_decode($answer,true);
	echo $answer;
}


if($_REQUEST['op'] == 'category_series') {
	
	$user = $_REQUEST['username'];
	$pwd = $_REQUEST['password'];
	
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_series_categories";
	$answer = apixtream($url);
	$output = json_decode($answer,true);
	echo $answer;
}
 
if($_REQUEST['op'] == 'series') {
	
	$user = $_REQUEST['username'];
	$pwd = $_REQUEST['password'];
	$category = $_REQUEST['category'];
	
	if($category > 0) {
		$url = IP."/player_api.php?username=$user&password=$pwd&action=get_series&category_id=$category";
	} else {
		$url = IP."/player_api.php?username=$user&password=$pwd&action=get_series";
	}
	
	$answer = apixtream($url);
	$output = json_decode($answer,true);
	echo $answer;
}

if($_REQUEST['op'] == 'serie') {
	
	$user = $_REQUEST['username'];
	$pwd = $_REQUEST['password'];
	$id = $_REQUEST['id'];
	
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_series_info&series_id=$id";
	
	$answer = apixtream($url);
	$output = json_decode($answer,true);
	echo $answer;
}

if($_REQUEST['op'] == 'vod') {
	
	$user = $_REQUEST['username'];
	$pwd = $_REQUEST['password'];
	$id = $_REQUEST['id'];
	
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_vod_info&vod_id=$id";
	
	$answer = apixtream($url);
	$output = json_decode($answer,true);
	echo $answer;
}

if($_REQUEST['op'] == 'epg_simples') {
	
	$user = $_REQUEST['username'];
	$pwd = $_REQUEST['password'];
	$id = $_REQUEST['id'];
	
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_short_epg&stream_id=$id";
	
	$answer = apixtream($url);
	$output = json_decode($answer,true);
	echo $answer;
}

if($_REQUEST['op'] == 'epg') {
	
	$user = $_REQUEST['username'];
	$pwd = $_REQUEST['password'];
	$id = $_REQUEST['id'];
	
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_simple_data_table&stream_id=$id";
	
	$answer = apixtream($url);
	$output = json_decode($answer,true);
	echo $answer;
}

if($_REQUEST['op'] == 'epgfull') {
	
	$user = $_REQUEST['username'];
	$pwd = $_REQUEST['password'];
	$id = $_REQUEST['id'];
	
	$url = IP."/xmltv.php?username=$user&password=$pwd";
	
	$answer = apixtream($url);
	$output = json_decode($answer,true);
	echo $answer;
}

if($_REQUEST['op'] == 'lists') {
	
	$user = $_REQUEST['username'];
	$pwd = $_REQUEST['password'];
	
	$url = IP."/get.php?username=$user&password=$pwd&type=m3u_plus&output=m3u8";
	
	$answer = apixtream($url);
	
	preg_match_all('/(?P<tag>#EXTINF:-1)|(?:(?P<prop_key>[-a-z]+)=\"(?P<prop_val>[^"]+)")|(?<something>,[^\r\n]+)|(?<url>http[^\s]+)/', $answer, $match );

	$count = count( $match[0] );

	$resultados = [];
	$index = -1;

	for( $i =0; $i < $count; $i++ ){
	    $item = $match[0][$i];

	    if( !empty($match['tag'][$i])){

	    ++$index;
	    }elseif( !empty($match['prop_key'][$i])){

	    $resultados[$index][$match['prop_key'][$i]] = $match['prop_val'][$i];
	    }elseif( !empty($match['something'][$i])){

	    $resultados[$index]['something'] = $item;
	    }elseif( !empty($match['url'][$i])){
	    
	    $resultados[$index]['url'] = $item ;
	    }
	}

	echo json_encode($resultados);
	
}


if($_REQUEST['op'] == '') {
	
	echo 'API Xtream PHP 1.0';
	
}
?>

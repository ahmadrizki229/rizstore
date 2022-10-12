<?php

function random_str()
    {
        $data = '1234567890';
        $string = '';
        for($i = 0; $i <4; $i++) {
              $string .= $data[rand(0, strlen($data)-1)];  
            
        }
    
return $string;
        }


function save($filename, $email)
{
    $save = fopen($filename, "a");
    fputs($save, "$email");
    fclose($save);
}

function getfol($url, $email, $password, $file) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	$data = curl_exec($ch);
	curl_close($ch); 
	if (strpos($data, "www.spotify.com")) {
		$a = "Berhasil verif email --> $email|$password\n";
		echo "$a";
		save($file, $a); 


	} else {
		$b = "Gagal verif email ->  $email|$password\n";
		echo "$b";
		save($file,$b);
	}
}

function get($url, $headers, $put = null) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	if($put):
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	endif;
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	if($headers):
    curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	endif;
	curl_setopt($ch, CURLOPT_ENCODING, "GZIP");
	return curl_exec($ch);
}

function request($url, $data, $headers, $put = null) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	if($put):
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	endif;
	if($data):
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
	curl_setopt($ch, CURLOPT_TIMEOUT, 120);
	endif;
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	if($headers):
    curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	endif;
	curl_setopt($ch, CURLOPT_ENCODING, "GZIP");
	return curl_exec($ch);
}
function createmail($email, $cfd){
$url = "https://api.internal.temp-mail.io/api/v3/email/new";
$data = '{"name":"'.$email.'","domain":"yopmail.com"}';
$headers = array();
$headers [] = "Host: api.internal.temp-mail.io";
$headers [] = "Connection: close";
$headers [] = "Accept: application/json, text/plain, */*";
$headers [] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36";
$headers [] = "Content-Type: application/json;charset=UTF-8";
$headers [] = "Origin: https://temp-mail.io";
$headers [] = "Sec-Fetch-Site: same-site";
$headers [] = "Sec-Fetch-Mode: cors";
$headers [] = "Sec-Fetch-Dest: empty";
$headers [] = "Referer: https://temp-mail.io/en";
$headers [] = "Accept-Encoding: gzip, deflate";
$headers [] = "Accept-Language: en-US,en;q=0.9";
$headers [] = "Referer: https://m.tokopedia.com/register?ld=";
$headers [] = "Accept-Encoding: gzip, deflate";
$headers [] = "Accept-Language: en-US,en;q=0.9";
$headers [] = "Cookie: __cfduid=$cfd; _ga=GA1.2.287212906.1596410065; _gid=GA1.2.636514500.1596410065; __gads=ID=6f45820db820d9b3:T=1596410071:S=ALNI_MbBL4g5DAYgDq9cPJdLEGIt0tTr1A";


$getotp = request($url, $data, $headers);
$json = json_decode($getotp, true);

//var_dump($json);

if (strpos($getotp, "$email")) {
		echo "Berhasil membuat email --> $email@yopmail.com\n";	
	} else {
		echo "gagal bikin email\n";
	}
}


function regis($email, $password, $nama){
$url = "https://spclient.wg.spotify.com/signup/public/v1/account/";
$data = 'birth_year=2004&name='.$nama.'&password='.$password.'&email='.$email.'&creation_point=client_mobile&gender=female&key=142b583129b2df829de3656f9eb484e6&platform=Android-ARM&iagree=true&birth_month=6&birth_day=4&password_repeat='.$password.'';
$headers = array();
$headers [] = "Accept-Language: en-US";
$headers [] = "Connection: close";
$headers [] = "User-Agent: Spotify/8.5.60 Android/23 (Custom)";
$headers [] = "Spotify-App-Version: 8.5.60";
$headers [] = "X-Client-Id: 9a8d2f0ce77a4e248bb71fefcb557637";
$headers [] = "App-Platform: Android";
$headers [] = "Content-Type: application/x-www-form-urlencoded";
$headers [] = "Host: spclient.wg.spotify.com";
$headers [] = "Connection: close";
$headers [] = "Accept-Encoding: gzip, deflate";

$getotp = request($url, $data, $headers);
$json = json_decode($getotp, true);
//var_dump($json);
$a = $json['username'];
echo "Berhasil daftar spotify --> $a\n";
}

function regis2($email, $password, $nama){
$url = "https://spclient.wg.spotify.com/signup/public/v1/account/";
$data = 'birth_year=2004&name='.$nama.'&password='.$password.'&email='.$email.'&creation_point=client_mobile&gender=female&key=142b583129b2df829de3656f9eb484e6&platform=Android-ARM&iagree=true&birth_month=6&birth_day=4&password_repeat='.$password.'';
$headers = array();
$headers [] = "Accept-Language: en-US";
$headers [] = "Connection: close";
$headers [] = "User-Agent: Spotify/8.5.60 Android/23 (Custom)";
$headers [] = "Spotify-App-Version: 8.5.60";
$headers [] = "X-Client-Id: 9a8d2f0ce77a4e248bb71fefcb557637";
$headers [] = "App-Platform: Android";
$headers [] = "Content-Type: application/x-www-form-urlencoded";
$headers [] = "Host: spclient.wg.spotify.com";
$headers [] = "Connection: close";
$headers [] = "Accept-Encoding: gzip, deflate";

$getotp = request($url, $data, $headers);
$json = json_decode($getotp, true);
//var_dump($json);
$a = $json['username'];
if ($a == null) {
	return false;
} else {
	return true;
}
}

function verivemail($email, $password, $file) {
$url = "https://api.internal.temp-mail.io/api/v3/email/$email/messages";
$headers = array();
$headers [] = "Host: api.internal.temp-mail.io";
$headers [] = "Connection: close";
//$headers [] = "Content-Length: 399";
$headers [] = "Accept: application/json, text/plain, */*";
$headers [] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36";
$headers [] = "Origin: https://temp-mail.io";
$headers [] = "Sec-Fetch-Site: same-site";
$headers [] = "Sec-Fetch-Mode: cors";
$headers [] = "Sec-Fetch-Dest: empty";
$headers [] = "Referer: https://temp-mail.io/en";
$headers [] = "Accept-Encoding: gzip, deflate";
$headers [] = "Accept-Language: en-US,en;q=0.9";


$getotp = get($url, $headers);
$json = json_decode($getotp);
$cari = strpos($getotp, "no-reply@spotify.com");
$sub_kal = substr($getotp, $cari);
$cari2 = strpos($sub_kal, 'https://wl.spotify.com/ls/click?upn=');
//$bner = $cari2 - 213 - 35;
$output = substr($sub_kal, $cari2, 1000);
$cari3 = strpos($output, ' )\n\n#');
$output2 = substr($sub_kal, $cari2, $cari3);

//echo "$output2\n";
sleep(2);
getfol($output2, $email, $password, $file);

}

$url = "https://temp-mail.io/en"; 
   
// Initialize cURL object 
$curlObj = curl_init(); 
   
/* setting values to required cURL parameters. 
CURLOPT_URL is used to set the URL to fetch  
CURLOPT_RETURNTRANSFER is enabled curl 
response to be saved in a variable  
CURLOPT_HEADER enables curl to include 
protocol header CURLOPT_SSL_VERIFYPEER 
enables to fetch SSL encrypted HTTPS request.*/
curl_setopt($curlObj,  CURLOPT_URL,  $url); 
curl_setopt($curlObj,  CURLOPT_RETURNTRANSFER,  1); 
curl_setopt($curlObj,  CURLOPT_HEADER,  1); 
curl_setopt($curlObj,  CURLOPT_SSL_VERIFYPEER,  false); 
$result = curl_exec($curlObj); 
   
// Matching the response to extract cookie value 
preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', 
          $result,  $match_found); 
   
$cookies = array(); 
foreach($match_found[1] as $item) { 
    parse_str($item,  $cookie); 
    $cookies = array_merge($cookies,  $cookie); 
}


echo "=========================\n";
echo "Spotify account creator\n";
echo "Created by Ahmad Rizki";
echo "=========================\n";
$favcolor = "2";
$password = "rizjay2425";
$file = "1.txt";
$jmlh = "100000";

$fgcnama=file_get_contents("bahannama.txt");
$hslnama = explode("\n", str_replace("\r", "", $fgcnama));
$count = count($hslnama);

switch ($favcolor) {
  case "1":
	for ($i=0; $i <$jmlh; $i++) { 
	$b = random_str(); 
	$anama = $hslnama[rand(0,$count)];
	$bnama = $hslnama[rand(0,$count)];
	$cnama = $hslnama[rand(0,$count)]; 
	$fullnama = "$anama $bnama $cnama";
	$hsl2 = str_replace(" ", "", $fullnama);
	$sub = substr($hsl2, 0, 15);
	$kcl  = strtolower($sub);
	$kcl2 = "$kcl$b";
	$mail2 = "$kcl2@yopmail.com";

	echo "Nama --> $fullnama\n";
	createmail($kcl2, $cfd);
	regis($mail2, $password, $fullnama);
	sleep(7);
	verivemail($mail2, $password, $file); 
	echo "===========================\n";
}    break;
  case "2":
    for ($i=0; $i <$jmlh; $i++) {
    $b = random_str(); 
	$anama = $hslnama[rand(0,$count)];
	$bnama = $hslnama[rand(0,$count)];
	$cnama = $hslnama[rand(0,$count)]; 
	$fullnama = "$anama $bnama $cnama";
	$hsl2 = str_replace(" ", "", $fullnama);
	$sub = substr($hsl2, 0, 15);
	$kcl  = strtolower($sub);
	$mail2 = "$kcl$b@yopmail.com";
	$a = regis2($mail2, $password, $fullnama);
	if ($a == false) {
		echo "Gagal regis\n";
	} else {
		echo "Sukses daftar --> ($mail2|$password)\n";
		$sukses = "$mail2|$password\n";
		save($file, $sukses); 

	}
    } 
    break;
}


echo "Done";

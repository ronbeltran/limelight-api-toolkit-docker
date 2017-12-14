<?php

define('STRICT_ERROR_REPORTING', true);
ini_set('display_errors',1);
error_reporting(E_ALL|E_STRICT);
set_time_limit(0);

function _sendRequest($url, $data)
{
   echo "url== $url<BR>";
   echo "<PRE>Data to send=>";
   print_r($data);
   echo "</pre>";
   $output = array();

   // Open the cURL session
   $curlSession = curl_init();
   curl_setopt($curlSession, CURLOPT_URL, $url);
   curl_setopt($curlSession, CURLOPT_HEADER, 0);
   curl_setopt($curlSession, CURLOPT_POST, 1);
   curl_setopt($curlSession, CURLOPT_POSTFIELDS, http_build_query($data));
   curl_setopt($curlSession, CURLOPT_RETURNTRANSFER,1);
   curl_setopt($curlSession, CURLOPT_TIMEOUT,5000);
   curl_setopt($curlSession, CURLOPT_SSL_VERIFYPEER, FALSE);
   curl_setopt($curlSession, CURLOPT_SSL_VERIFYHOST, 1);

   foreach ($data as $k=>$v) {
      echo "$k=$v&";
   }
   echo "<br/>";
   echo "API TESTER - " .__LINE__ . " CURL called with data =  <PRE>";
   print_r($data);
   echo "</PRE> <BR>";

   $rawresponse = curl_exec($curlSession);

   // Check that a connection was made
   if (curl_error($curlSession)){
      // If it wasn't...
      $output['Status'] = "FAIL";
      $output['StatusDetail'] = curl_error($curlSession);
   }
   // Close the cURL session
   curl_close ($curlSession);
   return $rawresponse;
}

$url = $_POST['site'].'membership.php';
unset($_POST['site']);
$data = $_POST;
$rsp = _sendRequest($url,$data);

if(is_object(json_decode($rsp)))
{
   $rsp = json_decode($rsp);

   echo '<pre>';
   print_r($rsp);
   echo '</pre>';
}
else
{
   var_dump($rsp);
}
?>


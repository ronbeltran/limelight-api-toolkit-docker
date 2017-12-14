<?php
   set_time_limit(0);

   $output = array();
   $url = $_REQUEST['site'].'transact.php';
   $data = $_REQUEST;
   $curlSession = curl_init();
   curl_setopt($curlSession, CURLOPT_URL, $url);
   curl_setopt($curlSession, CURLOPT_HEADER, 0);
   curl_setopt($curlSession, CURLOPT_POST, 1);
   curl_setopt($curlSession, CURLOPT_POSTFIELDS, http_build_query($data));
   curl_setopt($curlSession, CURLOPT_RETURNTRANSFER,1);
   curl_setopt($curlSession, CURLOPT_TIMEOUT,5000);
   curl_setopt($curlSession, CURLOPT_SSL_VERIFYPEER, FALSE);
   curl_setopt($curlSession, CURLOPT_SSL_VERIFYHOST, 1);
   curl_setopt($curlSession, CURLOPT_FOLLOWLOCATION, true);
   echo "API TESTER - " .__LINE__ . " CURL called with data =  <PRE>";
   print_r($data);
   echo "</PRE> <BR>";
   $rawresponse = curl_exec($curlSession);
   echo "rawrsp = ...$rawresponse... <BR>";
   echo "<BR>API TESTER - LINE:" .__LINE__ . " CURL RESPONSE =  <PRE>";

   if (strpos($rawresponse, '&'))
   {
      $response = explode('&', $rawresponse);
      $output = array();
      $count = count($response);
      for ($i=0; $i < $count; $i++)
      {
         $splitAt = strpos($response[$i], "=");
         $output[trim(substr($response[$i], 0, $splitAt))] = trim(substr(urldecode($response[$i]), ($splitAt+1)));
      }
   }
   else
   {
      $output = $rawresponse;
   }
   print_r($output);
   echo "</PRE> <BR>";
   curl_close ($curlSession);
?>



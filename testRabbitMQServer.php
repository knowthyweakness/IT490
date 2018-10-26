#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('login.php.inc');
function doErrorLogger($errorMsg)
{
        echo $errorMsg;
        $txt = date("[Y-m-d H:i:s] ")."Error $errorMsg \n";
        file_put_contents('errorlog.txt', $txt . "\n", FILE_APPEND);
}

function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);

  if(!isset($request['type']))
  {
    $txt = date("[Y-m-d H:i:s] ")."Error: unsupported message type \n";
    file_put_contents('errorlog.txt', $txt . "\n", FILE_APPEND);

    //return "ERROR: unsupported message type";
  }

  switch ($request['type'])
  {
    case "login":
      return doLogin($request['username'],$request['password']);
    case "validate_session":
      return doValidate($request['sessionId']);
    case "register":
      return doRegister($request['username'],$request['password'],$request['email']);
    case "foodLookup":
      return doFoodLookup($request['search']);
    case "error":
      return doError($request['errorString'],$request['errorFile'],$request['errorLine']);
    case "errorLogger":
      return doErrorLogger($request['errorMsg']);

  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","errorServer");
$server->process_requests('requestProcessor');
exit();
?>


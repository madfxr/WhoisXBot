<?php
    define('BOT_TOKEN', '<authorization_token>');
    define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

    $content = file_get_contents("php://input");
    $update = json_decode($content, true);
    $chatID = $update["message"]["chat"]["id"];
    $text = $update['message']['text'];
    $file = "$chatID/$chatID.txt";

    if ($text == "")
    die();

    if (!file_exists($chatID)):
      mkdir($chatID, 0700, true);
      fopen($file, 'w');
    endif;

    if ($text == "/start") {
      file_put_contents($file);
      $msg = "Welcome to WhoisXBot - WHOIS Lookup Utility: for TLD, gTLD, ccTLD and mTLD with Telegram Bot (https://github.com/xnxmx/whoisxbot";
    }
    
    else {
      $msgs = explode(" ", $text);
      switch ($msgs[0]) {
        case '/whois':
        $msg = $usrId . '';
        if (count($msgs) >= 2) {
          $command = $usrId;
          foreach ($msgs as $k => $v) {
            if ($k >= 1) {
              $command .= ' ' . $v;
            }
          }
          $url = str_replace("'", "", $msgs[1]);
          $msg = shell_exec('whois ' . "'" . $url . "'");
        }
        break;
      }
    }

    $sendto =API_URL."sendmessage?chat_id=".$chatID."&text=".urlencode($msg);
    file_get_contents($sendto);
?>

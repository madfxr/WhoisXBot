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
      $msg = "Welcome to WhoisXBot - WHOIS Lookup Utility: for TLD, gTLD, ccTLD and mTLD with Telegram Bot (https://github.com/xnxmx/whoisxbot)";
    }

    elseif ($text == "/whois") {
      file_put_contents($file);
      $msg = "To see the WHOIS results, please type: /whois domain, domain.tld or ip address";
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
          $msg = shell_exec('whois -h whois.iana.org ' . "'" . $url . "'" . '| grep -E "% Information related to|domain:|Whois Error: No Match for|organisation:|contact:|name:|nserver:|ds-rdata:|whois:|created:|changed:|inetnum:|netname:|descr:|country:|admin-c:|tech-c:|remarks:|mnt-by:|mnt-routes:|mnt-irt:|status:|last-modified:|source:|irt:|address:|e-mail:|abuse-mailbox:|auth:|person:|phone:|fax-no:|nic-hdl:|route:|origin:|is available for registration|can temporarily not be answered|ERROR: domain not found|NO MATCH:|Invalid query or domain name not known|NOT FOUND|No match for|No match for domain|The queried object does not exist:|No Data Found|DOMAIN NOT FOUND|Registration Service Provided By|Domain Name:|Registry Domain ID:|Registrar WHOIS Server:|Registrar URL:|Updated Date:|Creation Date:|Registry Expiry Date:|Registrar Registration Expiration Date:|Registrar:|Registrar IANA ID:|Registrar Abuse Contact Email:|Registrar Abuse Contact Phone:|Reseller:|Domain Status:|Registrant Organization:|Registrant State/Province:|Registrant Country:|Name Server:|DNSSEC:|DNSSEC DS Data:|Domain ID:|Created On:|Last Updated On:|Expiration Date:|Status:|Sponsoring Registrar Organization:|Sponsoring Registrar City:|Sponsoring Registrar Postal Code:|Sponsoring Registrar|Country:|Sponsoring Registrar Phone:|Sponsoring Registrar Contact Email:|Billing Email:Billing Phone:|Billing Country:|Billing Postal Code:|Billing State/Province:|Billing City:|Billing Street:|Billing Organization:|Billing Name:|Registry Billing ID:|Registry WHOIS Server:|Registry Registrant ID:|Registrant Name:|Registrant Organization:|Registrant Street:|Registrant City:|Registrant State/Province:|Registrant Postal Code:|Registrant Country:|Registrant Phone:|Registrant Email:|Registry Admin ID:|Admin Name:|Admin Organization:|Admin Street:|Admin City:|Admin State/Province:|Admin Postal Code:|Admin Country:|Admin Phone:|Admin Email:|Registry Tech ID:|Tech Name:|Tech Organization:|Tech Street:|Tech City:|Tech State/Province:|Tech Postal Code:|Tech Country:|Tech Phone:|Tech Email:|Registry Billing ID:|Billing Name:|Billing Organization:|Billing Street:|Billing City:|Billing State/Province:|Billing Postal Code:|Billing Country:|Billing Phone:|Billing Email:"');
        }
        break;
      }
    }

    $sendto =API_URL."sendmessage?chat_id=".$chatID."&text=".urlencode($msg);
    file_get_contents($sendto);
?>

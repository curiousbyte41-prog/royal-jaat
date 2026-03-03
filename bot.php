<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$token = getenv('bot_token');
if (!$token) { echo "NO_TOKEN"; exit; }

$update = json_decode(file_get_contents("php://input"), true);

if (!isset($update["message"])) {
    http_response_code(200);
    exit;
}

$chat_id = $update["message"]["chat"]["id"];

file_get_contents("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&text=Bot is working!");

echo "OK";
      
                                //==Webhook Link==//

//https://api.telegram.org/bot8706155925:AAHjpKlqQotuhCBPY0a_Urbdmfo-pQ4YeFo/setwebhook?url=https:///bot.php

$botToken = "8706155925:AAHjpKlqQotuhCBPY0a_Urbdmfo-pQ4YeFo";
$website = "https://api.telegram.org/bot".$botToken;
$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);
$chatId = $update["message"]["chat"]["id"];
$gId = $update["message"]["from"]["id"];
$userId = $update["message"]["from"]["id"];
$lastname = $update["message"]["from"]["last_name"];
$firstname = $update["message"]["from"]["first_name"];
$username = $update["message"]["from"]["username"];
$r_id = $update["message"]["reply_to_message"];
$r_userId = $update["message"]["reply_to_message"]["from"]["id"];  
$r_firstname = $update["message"]["reply_to_message"]["from"]["first_name"];  
$r_username = $update["message"]["reply_to_message"]["from"]["username"]; 
$r_msg_id = $update["message"]["reply_to_message"]["message_id"]; 
$r_msg = $update["message"]["reply_to_message"]["text"]; 
$message = $update["message"]["text"];
$message_id = $update["message"]["message_id"];
$premium = $update["message"]["from"]["is_premium"];
$p1 = (boolval($premium) ? '𝙿𝚛𝚎𝚖𝚒𝚞𝚖 ✅' : '𝙵𝚛𝚎𝚎 ❌');
$ownerid = '6185091342';

function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);  
return $str[0];
};

function string_between_two_string($str, $starting_word, $ending_word){ 
$subtring_start = strpos($str, $starting_word); 
$subtring_start += strlen($starting_word);   
$size = strpos($str, $ending_word, $subtring_start) - $subtring_start;   
return substr($str, $subtring_start, $size);
}

if(!empty($r_id)){
$r_msg = $update["message"]["reply_to_message"]["text"]; 
$message = $update["message"]["text"]; 
$message = $message ." ".$r_msg;
}

include 'admin.php';

                        //==[REGISTER COMMAND]=========//

if ((strpos($message, "!register") === 0)||(strpos($message, "/register") === 0)||(strpos($message, ".register") === 0)||(strpos($message, ",register") === 0)){
sendChatAction($chatId, "type");
$user = file_get_contents('Database/users.txt', 1);
$members = explode("\n", $user);
        if (!in_array($gId, $members)) {
            $add_user = file_get_contents('Database/users.txt', 1);
            $add_user .= $gId . "\n";
            file_put_contents('Database/users.txt', $add_user);
sendMessage($chatId, "•<b> USER <b><a href='tg://user?id=$userId'>$userId</a></b> AHORA ESTAS REGISTRADO</b>", $message_id);
}
else { sendMessage($chatId, "•<b> USER <b><a href='tg://user?id=$userId'>$userId</a></b> YA ESTAS REGISTRADO </b>%0A• <b>DALE CLICK 👉 /cmds </b>", $message_id);
}}
  /////////////////////////////////////END///////////////////////////////////////////

                            //==[START COMMAND]=========//

if ((strpos($message, "/start") === 0) || (strpos($message, "!start") === 0) || (strpos($message, ".start") === 0)) {
    sendChatAction($chatId, "type");
    $photoUrl = ''; // URL de la foto
    $videoUrl = 'https://imgur.io/NAEpK31.gif'; // URL del video
    $apiUrl = "https://api.telegram.org/bot{$botToken}";
  
$buttons = [
   [
   ['text' => '𝑶𝒇𝒇𝒊𝒄𝒊𝒂𝒍 𝑮𝒓𝒐𝒖𝒑','url' => "https://t.me/SWCDL"],
  ['text' => '𝑺𝒄𝒓𝒂𝒑𝒑𝒆𝒓 𝑭𝒓𝒆𝒆','url' => "https://t.me/SWCDL"],
           ]];
  $buttonsMarkup = ['inline_keyboard' => $buttons];
  $buttonsJson = json_encode($buttonsMarkup);
  
    $text = "
•<b> BIENVENIDO SOY <b><a href='tg://user?id=6258363248'> 𝑺𝒉𝒖𝒅𝒐 𝑻𝒐𝒅𝒐𝒓𝒐𝒌𝒊 </a></b> </b>
• <b>REGISTRATE 👉 /register </b>
• <b>MIRA LOS COMANDOS /cmds 
• <b>MI DIOS <a href='tg://user?id=$ownerid'>FARES</a></b> </b>";

  
  
    if (!empty($photoUrl)) {
        $photoData = [
            'chat_id' => $chatId,
            'photo' => $photoUrl,
            'caption' => $text,
            'parse_mode' => 'HTML',
            'reply_markup' => $buttonsJson
        ];
        file_get_contents($apiUrl . "/sendPhoto?" . http_build_query($photoData));
    }

    // Enviar video con los botones flotantes
    if (!empty($videoUrl)) {
        $videoData = [
            'chat_id' => $chatId,
            'video' => $videoUrl,
            'caption' => $text,
            'parse_mode' => 'HTML',
            'reply_markup' => $buttonsJson
        ];
        file_get_contents($apiUrl . "/sendVideo?" . http_build_query($videoData));
      
    }
  }



  /////////////////////////////////////END///////////////////////////////////////////

                                //==[CMDS CMD]==//
elseif ((strpos($message, "!cmds") === 0)||(strpos($message, "/cmds") === 0)||(strpos($message, ".cmds") === 0)||(strpos($message, ",cmds") === 0)||(strpos($message, "?cmds") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
sendMessage($chatId, "<b>━━━━━━━━━━━━━━━━━━━━━━━%0A𝚂𝚝𝚛𝚒𝚙𝚎 𝙶𝚊𝚝𝚎𝚜 [𝙿𝚛𝚎𝚖𝚒𝚞𝚖]%0A━━━━━━━━━━━━━━━━━━━━━━━%0A/str Stripe 0.30 $ - [ON] ✅%0A/chk Stripe 8$ - [OFF] ❌%0A/stp Stripe 10$ - [OFF] ❌%0A━━━━━━━━━━━━━━━━━━━━━━━%0A𝚂𝚑𝚘𝚙𝚒𝚏𝚢 𝙶𝚊𝚝𝚎𝚜 [𝙿𝚛𝚎𝚖𝚒𝚞𝚖]%0A━━━━━━━━━━━━━━━━━━━━━━━%0A/sfp Shopify+Payeezy 9$  - [ON] ✅%0A/sfh Shopify+BlackBaud 10$ - [ON] ✅%0A/sfo Shopify+Braintree 11.72$  - [OFF]❌%0A/sfz Shopify+Payeezy 14$ - [ON] ✅%0A/sfb Shopify+Braintree 15$ - [OFF]❌%0A/sfa Shopify+Authorize 29$ - [ON] ✅%0A/sfv Shopify+Braintree 8.50$ - [ON] ✅%0A━━━━━━━━━━━━━━━━━━━━━━━%0A𝙱𝚛𝚊𝚒𝚗𝚝𝚛𝚎𝚎 𝙶𝚊𝚝𝚎𝚜 [𝙿𝚛𝚎𝚖𝚒𝚞𝚖]%0A━━━━━━━━━━━━━━━━━━━━━━━%0A/br Braintree 18$ - [ON] ✅%0A━━━━━━━━━━━━━━━━━━━━━━━%0A𝙰𝚞𝚝𝚑 𝙶𝚊𝚝𝚎 [𝙿𝚛𝚎𝚖𝚒𝚞𝚖]%0A━━━━━━━━━━━━━━━━━━━━━━━%0A/au Stripe Auth - [ON] ✅</b>", $message_id);
}


elseif ((strpos($message, "!tools") === 0)||(strpos($message, "/tools") === 0)||(strpos($message, ".tools") === 0)||(strpos($message, ",tools") === 0)||(strpos($message, "?tools") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
sendMessage($chatId, "<b>━━━━━━━━━━━━━━━━━━━━━━━%0A✅  𝑻𝒐𝒐𝒍𝒔%0A━━━━━━━━━━━━━━━━━━━━━━━%0A/sk 𝚂𝚔 𝚌𝚑𝚎𝚌𝚔𝚎𝚛 %0A/bin 𝙱𝚒𝚗 𝚎𝚡𝚊𝚖𝚙𝚕𝚎 [ 400022 ]%0A/spotify 𝚂𝚙𝚘𝚝𝚒𝚏𝚢 𝙶𝚎𝚗 [OFF]❌%0A/info 𝚅𝚒𝚎𝚠 𝚢𝚘𝚞𝚛 𝚒𝚗𝚏𝚘𝚛𝚖𝚊𝚝𝚒𝚘𝚗%0A/rand 𝚁𝚊𝚗𝚍𝚘𝚖 𝚄𝚜𝚎𝚛%0A/gen 𝙲𝚌 𝙶𝚎𝚗𝚎𝚛𝚊𝚝𝚘𝚛</b>", $message_id);
}
  
                            //==[Info Command]==//

if ((strpos($message, "/info") === 0) || (strpos($message, ".id") === 0) || (strpos($message, ".me") === 0) || (strpos($message, "/id") === 0) || (strpos($message, "/me") === 0)) {
    sendChatAction($chatId, "type");
    $photoUrl= "";
    $videoUrl = 'https://imgur.com/Axzxj4p.gif'; // URL del video
    $apiUrl = "https://api.telegram.org/bot{$botToken}";
  
    $text = "<b>━━━━━━━━━━━━━━━━━━━━━━━
✅ 𝒀𝒐𝒖𝒓 𝑰𝒏𝒇𝒐𝒓𝒎𝒂𝒄𝒊𝒐𝒏
━━━━━━━━━━━━━━━━━━━━━━━
𝚄𝚜𝚎𝚛: $firstname $lastname
𝚄𝚜𝚎𝚛 𝚒𝚍: <code>$userId</code>
𝚄𝚜𝚎𝚛𝚗𝚊𝚖𝚎: @$username
𝚄𝚜𝚎𝚛: $p1
𝙼𝚒 𝙳𝚒𝚘𝚜: <b><a href='tg://user?id=$userId'>$firstname</a></b></b>";

    if (!empty($photoUrl)) {
        $photoData = [
            'chat_id' => $chatId,
            'photo' => $photoUrl,
            'caption' => $text,
            'parse_mode' => 'HTML',
            'reply_markup' => $buttonsJson
        ];
        file_get_contents($apiUrl . "/sendPhoto?" . http_build_query($photoData));
    }

    // Enviar video con los botones flotantes
    if (!empty($videoUrl)) {
        $videoData = [
            'chat_id' => $chatId,
            'video' => $videoUrl,
            'caption' => $text,
            'parse_mode' => 'HTML',
            'reply_markup' => $buttonsJson
        ];
        file_get_contents($apiUrl . "/sendVideo?" . http_build_query($videoData));
      
}
}


/////////////////////////////////////END///////////////////////////////////////////

                            //==[Bin Command]==//

elseif ((strpos($message, "!bin") === 0)||(strpos($message, "/bin") === 0)||(strpos($message, ".bin") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
$bin = substr($message, 5);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.apilayer.com/bincheck/'.$bin.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'apikey: Li2j5eIvc0nMoCCOpJeDv4QhQuo3WvQy',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36'));
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
//curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$curl1 = curl_exec($ch);
echo ($curl1);
$bank = trim(strip_tags(getStr($curl1,'bank_name": "','",')));
$country = trim(strip_tags(getStr($curl1,'country": "','",')));
$type = trim(strip_tags(getStr($curl1,'type": "','"')));
$brand = trim(strip_tags(getStr($curl1,'scheme": "','",')));
$binn = trim(strip_tags(getStr($curl1,'bin": "','"')));
curl_close($ch);

if (strpos($curl1, 'No such BIN')){
sendMessage($chatId, '<b>❌Your Provided Bin Is Invalid Bin%0ATry Again - /bin xxxxxx</b>', $message_id);
}
elseif (strpos($curl1, 'no Route matched')){
sendMessage($chatId, '<b>❌ Mf Provide The Bin Then Check%0ATry Again - /bin xxxxxx</b>', $message_id);
}
elseif (strpos($curl1, ''.$binn.'')){
sendMessage($chatId, '<b>━━━━━━━━━━━━━━━━━━━━━━━%0A𝑩𝒊𝒏 𝑰𝒏𝒇𝒐𝒓𝒎𝒂𝒄𝒊𝒐𝒏: <code>'.$binn.' </code>✅%0A━━━━━━━━━━━━━━━━━━━━━━━</b>%0A<b>𝘽𝘼𝙉𝙆 ⇢</b> '.$bank.'%0A<b>𝘾𝙊𝙐𝙉𝙏𝙍𝙔 ⇢</b> '.$country.'%0A<b>𝘽𝙍𝘼𝙉𝘿 ⇢</b> '.$brand.'%0A<b>𝙏𝙔𝙋𝙀 ⇢</b> '.$type.'%0A━━━━━━━━━━━━━━━━━━━━━━━%0A<b>𝙲𝚑𝚎𝚌𝚔𝚎𝚍 𝚋𝚢:</b> @'.$username.'', $message_id);
}
else{
sendMessage($chatId, ''.$curl1.'', $message_id);
}
}

                             //==[Sk Key Check Command]=//
  
elseif ((strpos($message, "!sk") === 0)||(strpos($message, "/sk") === 0)||(strpos($message, ".sk") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Tools/sk.php';
}

/////////////////////////////////////END///////////////////////////////////////////

                               #== SPOTIFY ==#

elseif ((strpos($message, "!spotify") === 0)||(strpos($message, "/spotify") === 0)||(strpos($message, ".spotify") === 0)||(strpos($message, ",spotify") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Tools/spotify.php';
}

/////////////////////////////////////END///////////////////////////////////////////

                              //==[STX CMD]==//
  
elseif ((strpos($message, "!chg") === 0)||(strpos($message, "/chg") === 0)||(strpos($message, ".chg") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Database/pusers.php';
include 'Gates/c.php';
} 

/////////////////////////////////////END///////////////////////////////////////////



                              //==[STY CMD]==//
elseif ((strpos($message, "!str") === 0)||(strpos($message, "/str") === 0)||(strpos($message, ".str") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Database/pusers.php';
include 'Gates/str.php';
} 

/////////////////////////////////////END/////////////////////////////////////////// 
  
                              //==[STR CMD]==//
  


                              //==[STR OFF]==//
  
/*elseif ((strpos($message, "!str") === 0)||(strpos($message, "/str") === 0)||(strpos($message, ".str") === 0)){
sendMessage($chatId, '• <b><i> [ GATE IS UNDER MAINTENANCE ]</i></b>', $message_id);
}*/  

/////////////////////////////////////END///////////////////////////////////////////

  
elseif ((strpos($message, "!au") === 0)||(strpos($message, "/au") === 0)||(strpos($message, ".au") === 0)){
sendChatAction($chatId, "type");

include 'Database/nor.php';
include 'Database/pusers.php';
include 'Database/vusers.php';
include 'Gates/aus.php';
}
  
/////////////////////////////////////END///////////////////////////////////////////

                            //==[Auth v1 Command]==//

//auth

/////////////////////////////////////END///////////////////////////////////////////

                          //==[aut Command]==//

elseif ((strpos($message, "!aut") === 0)||(strpos($message, "/aut") === 0)||(strpos($message, ".aut") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Database/pusers.php';
include 'Database/vusers.php';
include 'Gates/aut.php';
}

                           //==[aut OFF]==//
  
/*elseif ((strpos($message, "!aut") === 0)||(strpos($message, "/aut") === 0)||(strpos($message, ".aut") === 0)){
sendChatAction($chatId, "type");
sendMessage($chatId, '• <b><i> [ GATE IS UNDER MAINTENANCE ]</i></b>', $message_id);
}*/

/////////////////////////////////////END///////////////////////////////////////////

                           //==[Shopify Command]==//
  
elseif ((strpos($message, "!sfe") === 0)||(strpos($message, "/sfe") === 0)||(strpos($message, ".sfe") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Database/pusers.php';
include 'Gates/sfe.php';
}

                           //==[Shopify Command]==//
  
elseif ((strpos($message, "!sfu") === 0)||(strpos($message, "/sfu") === 0)||(strpos($message, ".sfu") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Database/pusers.php';
include 'Gates/sfu.php';
}

/////////////////////////////////////END///////////////////////////////////////////

                           //==[Shopify+UNKNOWN Command]==/ni/
  
elseif ((strpos($message, "!sft") === 0)||(strpos($message, "/sft") === 0)||(strpos($message, ".sft") === 0)||(strpos($message, ",sft") === 0)||(strpos($message, "?sft") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Database/pusers.php';
include 'Gates/sft.php';
}


/////////////////////////////////////END///////////////////////////////////////////
  
                           //==[Shopify+UNKNOWN Command]==//
  
elseif ((strpos($message, "!sfx") === 0)||(strpos($message, "/sfx") === 0)||(strpos($message, ".sfx") === 0)||(strpos($message, ",sfx") === 0)||(strpos($message, "?sfx") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Database/pusers.php';
include 'Database/vusers.php';
include 'Gates/sfx.php';
}


/////////////////////////////////////END///////////////////////////////////////////

                           //==[Shopify+BLACKBAUD Command]==//
  
elseif ((strpos($message, "!sfc") === 0)||(strpos($message, "/sfc") === 0)||(strpos($message, ".sfc") === 0)||(strpos($message, ",sfc") === 0)||(strpos($message, "?sfc") === 0)){
sendChatAction($chatId, "type");
sendMessage($chatId, '• <b>[ GATE IS UNDER MAINTENANCE ]</b>', $message_id);
}
  
/////////////////////////////////////END///////////////////////////////////////////
  /*
                           //==[Shopify+BLACKBAUD Command]==//
  
elseif ((strpos($message, "!sfc") === 0)||(strpos($message, "/sfc") === 0)||(strpos($message, ".sfc") === 0)||(strpos($message, ",sfc") === 0)||(strpos($message, "?sfc") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Database/pusers.php';
include 'Database/vusers.php';
include 'Gates/sfc.php';
}
*/

/////////////////////////////////////END///////////////////////////////////////////
  
                           //==[Shopify+B3 Command]==//
  
elseif ((strpos($message, "!sfb") === 0)||(strpos($message, "/sfb") === 0)||(strpos($message, ".sfb") === 0)||(strpos($message, ",sfb") === 0)||(strpos($message, "?sfb") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
sendmessage($chatId, "GATE OFF❌", $message_id);
include 'Gates/sfb.php';
}

/////////////////////////////////////END///////////////////////////////////////////

                             //==[Shopify+Authorize Command]==//
  
elseif ((strpos($message, "!sfa") === 0)||(strpos($message, "/sfa") === 0)||(strpos($message, ".sfa") === 0)||(strpos($message, ",sfa") === 0)||(strpos($message, "?sfa") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Database/pusers.php';
include 'Database/vusers.php';
include 'Gates/sfa.php';
}

/////////////////////////////////////END///////////////////////////////////////////

                               //==[Shopify+Braintree Command]==//
  
elseif ((strpos($message, "!vbv") === 0)||(strpos($message, "/vbv") === 0)||(strpos($message, ".vbv") === 0)||(strpos($message, ",vbv") === 0)||(strpos($message, "?vbv") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Database/pusers.php';
include 'Database/vusers.php';
include 'Gates/vbv.php';
}

/////////////////////////////////////END///////////////////////////////////////////

                                //==[Shopify+Braintree Command]==//
  
elseif ((strpos($message, "!sfo") === 0)||(strpos($message, "/sfo") === 0)||(strpos($message, ".sfo") === 0)||(strpos($message, ",sfo") === 0)||(strpos($message, "?sfo") === 0)){
sendChatAction($chatId, "type");
sendmessage($chatId, "GATE OFF❌", $message_id);
include 'Database/nor.php';
include 'Gates/sfo.php';
}

/////////////////////////////////////END/////////////////////////////////////////// 

                                 //==[Shopify+Cybersource Command]==//
  
elseif ((strpos($message, "!sfv") === 0)||(strpos($message, "/sfv") === 0)||(strpos($message, ".sfv") === 0)||(strpos($message, ",sfv") === 0)||(strpos($message, "?sfv") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Database/pusers.php';
include 'Database/vusers.php';
include 'Gates/sfv.php';
}

/////////////////////////////////////END///////////////////////////////////////////

                                   //==[Shopify+Cybersource Command]==//
  
elseif ((strpos($message, "!gen") === 0)||(strpos($message, "/gen") === 0)||(strpos($message, ".gen") === 0)||(strpos($message, ",gen") === 0)||(strpos($message, "?gen") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Tools/card_gen.php';
}

/////////////////////////////////////END///////////////////////////////////////////

                                 //==[Shopify+Authorize Command]==//
  
elseif ((strpos($message, "!sfp") === 0)||(strpos($message, "/sfp") === 0)||(strpos($message, ".sfp") === 0)||(strpos($message, ",sfp") === 0)||(strpos($message, "?sfp") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Database/pusers.php';
include 'Database/vusers.php';
include 'Gates/sfp.php';
}

/////////////////////////////////////END///////////////////////////////////////////

                               //==[Shopify+BLACKBAUD Command]==//
  
elseif ((strpos($message, "!sfh") === 0)||(strpos($message, "/sfh") === 0)||(strpos($message, ".sfh") === 0)||(strpos($message, ",sfh") === 0)||(strpos($message, "?sfh") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Database/pusers.php';
include 'Database/vusers.php';
include 'Gates/sfh.php';
}


/////////////////////////////////////END///////////////////////////////////////////

elseif ((strpos($message, "!rand") === 0)||(strpos($message, "/rand") === 0)||(strpos($message, ".rand") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Tools/random.php';
}
  
/////////////////////////////////////END///////////////////////////////////////////

                                //==[THM CMD]==//
  
elseif ((strpos($message, "!thm") === 0)||(strpos($message, "/thm") === 0)||(strpos($message, ".thm") === 0)||(strpos($message, ",thm") === 0)||(strpos($message, "?thm") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Gates/thm.php';
}

/////////////////////////////////////END///////////////////////////////////////////
elseif ((strpos($message, "!sfz") === 0)||(strpos($message, "/sfz") === 0)||(strpos($message, ".sfz") === 0)){
sendChatAction($chatId, "type");

include 'Database/pusers.php';
include 'Database/vusers.php';
include 'Gates/sfz.php';
} 
                                //==[STP CMD]==//
  
elseif ((strpos($message, "!stp") === 0)||(strpos($message, "/stp") === 0)||(strpos($message, ".stp") === 0)||(strpos($message, ",stp") === 0)||(strpos($message, "?stp") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Gates/stp.php';
sendmessage($chatId, "GATE OFF❌", $message_id);
}
                                //==[STP OFF]==//
  
/*elseif ((strpos($message, "!stp") === 0)||(strpos($message, "/stp") === 0)||(strpos($message, ".stp") === 0)){
sendChatAction($chatId, "type");
sendMessage($chatId, '• <b><i> [ GATE IS UNDER MAINTENANCE ]</i></b>', $message_id);
}*/

/////////////////////////////////////END///////////////////////////////////////////

     /*                           //==[STP CMD]==//
  
elseif ((strpos($message, "!mass") === 0)||(strpos($message, "/mass") === 0)||(strpos($message, ".mass") === 0)||(strpos($message, ",mass") === 0)||(strpos($message, "?mass") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'mass.php';
}
*/
                                //==[STA CMD]==//
  /*
elseif ((strpos($message, "!sta") === 0)||(strpos($message, "/sta") === 0)||(strpos($message, ".sta") === 0)||(strpos($message, ",sta") === 0)||(strpos($message, "?sta") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Gates/sta.php';
} */
                                //==[STA OFF]==//
  
/*elseif ((strpos($message, "!sta") === 0)||(strpos($message, "/sta") === 0)||(strpos($message, ".sta") === 0)){
sendChatAction($chatId, "type");
sendMessage($chatId, '• <b><i> [ GATE IS UNDER MAINTENANCE ]</i></b>', $message_id);
}*/

/////////////////////////////////////END///////////////////////////////////////////
  
                                //==[STC CMD]==//
  
elseif ((strpos($message, "!stc") === 0)||(strpos($message, "/stc") === 0)||(strpos($message, ".stc") === 0)||(strpos($message, ",stc") === 0)||(strpos($message, "?stc") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Gates/stc.php';
}
                                //==[STC OFF]==//
  
/*elseif ((strpos($message, "!stc") === 0)||(strpos($message, "/stc") === 0)||(strpos($message, ".stc") === 0)){
sendChatAction($chatId, "type");
sendMessage($chatId, '• <b><i> [ GATE IS UNDER MAINTENANCE ]</i></b>', $message_id);
}*/

/////////////////////////////////////END///////////////////////////////////////////

                                  //==[STU CMD]==//
  
elseif ((strpos($message, "!stu") === 0)||(strpos($message, "/stu") === 0)||(strpos($message, ".stu") === 0)||(strpos($message, ",stu") === 0)||(strpos($message, "?stu") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Gates/stu.php';
}
                                //==[STU OFF]==//
  
/*elseif ((strpos($message, "!stu") === 0)||(strpos($message, "/stu") === 0)||(strpos($message, ".stu") === 0)){
sendChatAction($chatId, "type");
sendMessage($chatId, '• <b><i> [ GATE IS UNDER MAINTENANCE ]</i></b>', $message_id);
}*/

/////////////////////////////////////END///////////////////////////////////////////

                                //==[BR CMD]==//
  
elseif ((strpos($message, "!br") === 0)||(strpos($message, "/br") === 0)||(strpos($message, ".br") === 0)||(strpos($message, ",br") === 0)||(strpos($message, "?br") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Database/pusers.php';
include 'Database/vusers.php';
include 'Gates/br.php';
}
                                 //==[BR OFF]==//
  
/*elseif ((strpos($message, "!chg") === 0)||(strpos($message, "/chg") === 0)||(strpos($message, ".chg") === 0)){
sendChatAction($chatId, "type");
sendMessage($chatId, '• <b><i> [ GATE IS UNDER MAINTENANCE ]</i></b>', $message_id);
}*/

/////////////////////////////////////END///////////////////////////////////////////

                                 //==[BRT CMD]==//
  
elseif ((strpos($message, "!brt") === 0)||(strpos($message, "/brt") === 0)||(strpos($message, ".brt") === 0)){
sendChatAction($chatId, "type");
include 'Database/pusers.php';
include 'Database/vusers.php';
include 'Gates/brtt.php';
}
                                //==[BRT OFF]==//

/*elseif ((strpos($message, "!brt") === 0)||(strpos($message, "/brt") === 0)||(strpos($message, ".brt") === 0)||(strpos($message, ",brt") === 0)||(strpos($message, "?brt") === 0)){
sendChatAction($chatId, "type");include 'Database/nor.php';
sendMessage($chatId, '• <b><i> [ GATE IS UNDER MAINTENANCE ]</i></b>', $message_id);
}*/

/////////////////////////////////////END///////////////////////////////////////////  
                                //==[SS CMD]==//
elseif ((strpos($message, "!ss") === 0)||(strpos($message, "/ss") === 0)||(strpos($message, ".ss") === 0)||(strpos($message, ",ss") === 0)||(strpos($message, "?ss") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Database/vusers.php';
include 'Gates/ss.php';
}
                                //==[SS OFF]==//
/*elseif ((strpos($message, "!ss") === 0)||(strpos($message, "/ss") === 0)||(strpos($message, ".ss") === 0)){
sendChatAction($chatId, "type");
sendMessage($chatId, '• <b> [ GATE IS UNDER MAINTENANCE ]</b>', $message_id);
}*/

///////////////////////////////////////END/////////////////////////////////////////

                                //==[CCN CMD]==//
elseif ((strpos($message, "!ccn") === 0)||(strpos($message, "/ccn") === 0)||(strpos($message, ".ccn") === 0)||(strpos($message, ",ccn") === 0)||(strpos($message, "?ccn") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Gates/ccn.php';
}
                               //==[CCN OFF]==//
/*elseif ((strpos($message, "!ccn") === 0)||(strpos($message, "/ccn") === 0)||(strpos($message, ".ccn") === 0)){
sendChatAction($chatId, "type");
sendMessage($chatId, '• <b><i> [ GATE IS UNDER MAINTENANCE ]</i></b>', $message_id);
}*/
  
/////////////////////////////////////END///////////////////////////////////////////
  
                               //==[CHK Command]==//

elseif ((strpos($message, "!chk") === 0)||(strpos($message, "/chk") === 0)||(strpos($message, ".chk") === 0)||(strpos($message, ",chk") === 0)||(strpos($message, "?chk") === 0)){
sendChatAction($chatId, "type");
include 'Database/nor.php';
include 'Gates/chk.php';
}
                               //==[CHK OFF]==//
/*elseif ((strpos($message, "!chk") === 0)||(strpos($message, "/chk") === 0)||(strpos($message, ".chk") === 0)){
sendChatAction($chatId, "type");
sendMessage($chatId, '• <b><i> [ GATE IS UNDER MAINTENANCE ]</i></b>', $message_id);
}*/

/////////////////////////////////////END///////////////////////////////////////////

                                 #SetFunctions#

function sendChatAction($chatId, $action){
$data = array("type" => "typing", "rcvoice" => "record_voice", "voice" => "upload_voice", "doc" => "upload_document", "location" => "find_location", "rcvideonote" => "record_video_note", "uvideonote" => "upload_video_note");
$actiontype = $data["$action"];
$url = $GLOBALS[website]."/sendChatAction?chat_id=".$chatId."&action=".$actiontype."&parse_mode=HTML";
file_get_contents($url);
};

function sendMessage ($chatId, $message, $message_id){
$url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML";
file_get_contents($url);
};

function editMessage ($chatId, $message,$message_id){
$url = $GLOBALS[website]."/editMessageText?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML";
file_get_contents($url);      
};

/////////////////////////////////////END///////////////////////////////////////////

?>

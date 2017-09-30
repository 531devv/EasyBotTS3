<?php
/**
 * Created by PhpStorm.
 * User: 531
 * Date: 2017-08-27
 * Time: 23:05
 */

function msgAll($senderData, $clients, $ts3) {
    $text = str_replace("!msg_all", "", $senderData['msg']);
    foreach($clients as $client) {
        $ts3->sendMessage(1, $client['clid'], $text);
    }
}
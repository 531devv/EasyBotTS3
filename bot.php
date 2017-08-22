<?php
/**
 * Created by PhpStorm.
 * User: 531
 * Date: 2017-08-21
 * Time: 14:45
 */

include ('src/ts3admin.class.php');
$config = include ('config.php');

$ts3 = new ts3admin($config['ts3']['ip'], $config['ts3']['query_port']);
$connect = $ts3->connect();
if($connect['success']) {
    $ts3->login($config['ts3']['user'], $config['ts3']['password']);
    $ts3->selectServer($config['ts3']['port']);
    $ts3->setName('EasyBot');
    $ts3->logAdd(1, 'Starting EasyBot..');

    while(1) {
        $bot = $ts3->getElement('data', $ts3->whoAmI());
        $msg = $ts3->readChatMessage('textprivate', false);
        $userMessage = $ts3->getElement('data', $msg);

        $args = explode(" ", $userMessage['msg']);

        if($args[0] === "!help") {
            $ts3->sendMessage(1, $userMessage['invokerid'], "\nCommands:\n !help\n !msg_all (text)\n !author\n");
        } else if($args[0] === "!msg_all") {
            $text = str_replace("!msg_all", "", $userMessage['msg']);
            $clients = $ts3->getElement('data', $ts3->clientList());
            foreach($clients as $client) {
                $ts3->sendMessage(1, $client['clid'], $text);
            }
        } else if($args[0] === "!author") {
            $ts3->sendMessage(1, $userMessage['invokerid'], "Created by 531devv, 531devv@gmail.com");
        }

    }

}
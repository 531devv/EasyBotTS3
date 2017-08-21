<?php
/**
 * Created by PhpStorm.
 * User: 531
 * Date: 2017-08-21
 * Time: 14:45
 */

include ('src/ts3admin.class.php');

$ts3_ip = '127.0.0.1';
$ts3_query_port = 10011;
$ts3_user = 'elo';
$ts3_pass = 'fmMr792e';
$ts3_port = 9987;

$ts3 = new ts3admin($ts3_ip, $ts3_query_port);
$connect = $ts3->connect();
if($connect['success']) {
    $ts3->login($ts3_user, $ts3_pass);
    $ts3->selectServer($ts3_port);
    $ts3->setName('EasyBot');
    $ts3->logAdd(1, 'Starting EasyBot..');

    while(1) {
        $bot = $ts3->getElement('data', $ts3->whoAmI());
        $msg = $ts3->readChatMessage('textprivate', false);
        $command = $ts3->getElement('data', $msg);

        if(strpos($command['msg'], '!help')) {
            $ts3->sendMessage(1, $command['invokerid'], "XXX");
        }
        else if(strpos($command['msg'], '!autor')){
            $ts3->sendMessage(1, $command['invokerid'], "Autorem bota jest: 531devv");
        }
        else if(strpos($command['msg'], '!msgall')) {
            $ts3->gm(str_replace('!msgall', '', $command['msg']));
        }

    }
}
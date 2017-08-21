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
$ts3_user = 'serveradmin';
$ts3_pass = 'm54GVt16';
$ts3_port = 9987;

$ts3 = new ts3admin($ts3_ip, $ts3_query_port);
$connect = $ts3->connect();
if($connect['success']) {
    $ts3->login($ts3_user, $ts3_pass);
    $ts3->selectServer($ts3_port);
    $ts3->setName('EasyBot');
    $ts3->sendMessage(3, 1, "Zaczynam prace!");

    while(1) {
        $bot = $ts3->getElement('data', $ts3->whoAmI());
        $permissions = array();
        $permissions['permissionID'] = array('permissionValue', 'permskip');
        $bot->clientAddPerm($bot['client_id'], $permissions);
        $msg = $ts3->readChatMessage('textprivate');
        $bot->sendMessage(1, $msg['invokerid'], $msg['msg']);
    }
}
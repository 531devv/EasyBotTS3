<?php
/**
 * Created by PhpStorm.
 * User: 531
 * Date: 2017-09-11
 * Time: 22:58
 */

function replaceMessage($clid, $message) {
    global $ts3;
    $clientInfo = $ts3->getElement('data', $ts3->clientInfo($clid));

    $replace = array(
        '%NICKNAME%' => $clientInfo['client_nickname'],
        '%LAST_LOGIN%' => $clientInfo['client_lastconnected'],
        '%FIRST_CONNECT%' => $clientInfo['client_created'],
        '%UID%' => $clientInfo['client_unique_identifier'],
        '%IP%' => $clientInfo['connection_client_ip'],
        '%COUNTRY%' => $clientInfo['client_country']
    );

    return str_replace(array_keys($replace), array_values($replace), $message);
}

function welcomeMsg(){
    global $ts3, $oldClients, $clients, $config;

    $newClients = array();
    foreach($clients as $client) {
        array_push($newClients, $client['clid']);
    }

    $difference = array_diff($newClients, $oldClients);
    if($difference != NULL) {
        $messages = array_values($config['instance']['event_bot']['functions']['welcomeMsg']['messages']);
        foreach($difference as $client) {
            foreach($messages as $message) {
                $ts3->sendMessage(1, $client, replaceMessage($client, $message));
            }
        }
    }
    $oldClients = $newClients;
}
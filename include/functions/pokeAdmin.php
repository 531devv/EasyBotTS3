<?php
/**
 * Created by PhpStorm.
 * User: 531
 * Date: 2017-09-12
 * Time: 23:14
 */

function getUsersOnChannel() {
    global $ts3, $config;
    $clients = array();
    $adminGroups = array_values($config['instance']['event_bot']['functions']['pokeAdmin']['admin_groups_id']);
    $channelClients = $ts3->getElement('data', $ts3->channelClientList($config['instance']['event_bot']['functions']['pokeAdmin']['channel_id'], '-groups'));
    foreach($channelClients as $client) {
        $clientGroups = explode(',', $client['client_servergroups']);
        foreach($clientGroups as $clientGroup) {
            if(!array_search($clientGroup, $adminGroups)) echo 'ok';
        }
    }
}

function getAdminOnDuty() {
    global $ts3, $config;
}

function pokeAdmin() {
    getUsersOnChannel();
}
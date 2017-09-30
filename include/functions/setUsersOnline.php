<?php
/**
 * Created by PhpStorm.
 * User: 531
 * Date: 2017-08-28
 * Time: 00:43
 */

function setUsersOnline() {
    global $ts3, $serverData, $config;
    $serverSettings = array();
    $usersOnline = $serverData['virtualserver_clientsonline'] - $serverData['virtualserver_queryclientsonline'];
    $serverSettings['virtualserver_name'] = $config['ts3']['server_name'] . " " . str_replace('%U', $usersOnline, $config['instance']['event_bot']['functions']['setUsersOnline']['channel_name']);
    $ts3->serverEdit($serverSettings);
}
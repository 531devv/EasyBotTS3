<?php
/**
 * Created by PhpStorm.
 * User: 531
 * Date: 2017-08-28
 * Time: 00:22
 */


function setRecordOnline() {
    global $ts3, $serverData, $cache, $config;
    $recordOnline = $cache->retrieve('recordOnline');
    $usersOnline = $serverData['virtualserver_clientsonline'] - $serverData['virtualserver_queryclientsonline'];
    if($usersOnline > $recordOnline){
        $channelSettings = array();
        $channelSettings['channel_name'] = str_replace('%U', $usersOnline, $config['instance']['event_bot']['functions']['setRecordOnline']['channel_name']);
        $ts3->channelEdit($config['instance']['event_bot']['functions']['setRecordOnline']['channel_id'], $channelSettings);
        $cache->store('recordOnline', $usersOnline);
    }
}
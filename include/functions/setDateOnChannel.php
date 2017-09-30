<?php
/**
 * Created by PhpStorm.
 * User: 531
 * Date: 2017-09-13
 * Time: 00:15
 */

function setDateOnChannel() {
    global $ts3, $config;
    $channelSettings = array();
    $channelSettings['channel_name'] = str_replace('%D', date('h:i'), $config['instance']['event_bot']['functions']['setDateOnChannel']['channel_name']);
    $ts3->channelEdit($config['instance']['event_bot']['functions']['setDateOnChannel']['channel_id'], $channelSettings);
}
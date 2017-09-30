<?php
/**
 * Created by PhpStorm.
 * User: 531
 * Date: 2017-08-21
 * Time: 14:45
 */

date_default_timezone_set('Europe/Warsaw');
ini_set('default_charset', 'UTF-8');
setlocale(LC_ALL, 'UTF-8');
ini_set('memory_limit', '-1');

include('include/lib/ts3admin.class.php');
include('include/lib/cache.class.php');
$config = include('include/config.php');

$functions = array_keys($config['instance']['event_bot']['functions']);
foreach($functions as $key => $func){
    if($config['instance']['event_bot']['functions'][$func]['enabled'] == true) {
        include('include/functions/' . $func . '.php');
    }
}

$ts3 = new ts3admin($config['ts3']['ip'], $config['ts3']['query_port']);
$cache = new Cache(array(
    'name' => 'EasyBotData',
    'path' => 'include/cache/',
    'extension' => '.cache'
));

$connect = $ts3->connect();
if($connect['success']) {
    $ts3->login($config['instance']['event_bot']['user'], $config['instance']['event_bot']['password']);
    $ts3->selectServer($config['ts3']['port']);
    $ts3->setName($config['instance']['event_bot']['name']);
    $whoAmI = $ts3->getElement('data', $ts3->whoAmI());
    $ts3->clientMove($whoAmI['client_id'], $config['instance']['command_bot']['channel_id']);
    $oldClients = array();
    $clients = $ts3->getElement('data', $ts3->clientList());
    foreach($clients as $client) {
        array_push($oldClients, $client['clid']);
    }
    

    while(1) {
        sleep(1);
        $clients = $ts3->getElement('data', $ts3->clientList());
        $serverData = $ts3->getElement('data', $ts3->serverInfo());
            foreach($functions as $key => $func) {
                if(array_key_exists('interval', $config['instance']['event_bot']['functions'][$func])){
                    if(($cache->isCached('Interval' . $func)) && $config['instance']['event_bot']['functions'][$func]['enabled'] == true) {
                        $interval = $cache->retrieve('Interval' . $func);
                        $time = $interval - date('U');
                        if($time <= 0){
                            $cache->store('Interval' . $func, date('U') + $config['instance']['event_bot']['functions'][$func]['interval']);
                            $func();
                        }
                    } else {
                        if($config['instance']['event_bot']['functions'][$func]['enabled'] == true) {
                            $cache->store('Interval' . $func, date('U') + $config['instance']['event_bot']['functions'][$func]['interval']);
                            $func();
                        }
                    }
                } else {
                    if($config['instance']['event_bot']['functions'][$func]['enabled'] == true) {
                        $func();
                    }
                }
            }
        }
}

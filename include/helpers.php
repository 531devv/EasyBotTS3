<?php
/**
 * Created by PhpStorm.
 * User: 531
 * Date: 2017-09-10
 * Time: 15:13
 */

function canUseBot($ts3, $data){
    $targetClientInfo = $ts3->getElement('data', $ts3->clientInfo($data['invokerid']));
    $group = explode(",", $targetClientInfo['client_servergroups']);
    if(array_key_exists('2', $group)){
        return true;
    }
    return false;
}
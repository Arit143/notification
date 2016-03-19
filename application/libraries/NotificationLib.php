<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: AritraRocx
 * Date: 3/19/2016
 * Time: 12:54 PM
 */

class NotificationLib {

    public function __construct(){

    }

    public function processNotificationData($allNotifications){
        $notificationMessages = array();
        if(isset($allNotifications)){
            foreach($allNotifications as $key => $value){
                $notificationMessages[] = $value;
            }
        }

        return $notificationMessages;
    }
}

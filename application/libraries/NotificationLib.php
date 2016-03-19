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

    public function createRandomNotificationsForDB(){
        $customNotification = array();
        $randUserName = "User_".rand(1,100);
        $randNumberforNotification = "has posted with Notification_Number_".rand(10,1000);
        $imgPath = "img/default_".rand(1,3).".jpg";
        $customNotification[0] = $randNumberforNotification;
        $customNotification[1] = $randUserName;
        $customNotification[2] = $imgPath;
        return $customNotification;
    }
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NotificationModel extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    function getAllNotification(){
        $notificationQuery = "SELECT notification_message FROM notification";
        $allNotifications = $this->db->query($notificationQuery);
        if($allNotifications->num_rows() > 0){
            return $allNotifications->result_array();
        }
    }

    function getNotificationCount(){
        $notificationCountQuery = "SELECT COUNT(id) as countNotify FROM notification WHERE is_read = 0";
        $notReadNotificationCount = $this->db->query($notificationCountQuery);
        if($notReadNotificationCount->num_rows() > 0){
            return $notReadNotificationCount->row();
        }
        else{
            return false;
        }
    }

    function setStatusRead(){
        $updateIsread = "UPDATE notification SET is_read = 1";
        if($this->db->query($updateIsread)){
            return true;
        }
    }
    
    function pushNotificationToDatabase($randNumberforNotification){
        $insertNotificationToDatabase = "INSERT INTO notification VALUES (NULL, '$randNumberforNotification', 0)";
        if($this->db->query($insertNotificationToDatabase)){
            return true;
        }
    }
}
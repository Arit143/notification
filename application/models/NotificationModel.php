<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NotificationModel extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    function getAllNotification(){
        $notificationQuery = "SELECT notification_message FROM notification WHERE is_read = 0";
        $allNotifications = $this->db->query($notificationQuery);
        if($allNotifications->num_rows() > 0){
            return $allNotifications->result_array();
        }
    }
}
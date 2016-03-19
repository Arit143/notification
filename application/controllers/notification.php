<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Notification extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('NotificationModel');
        $this->load->library('notificationlib');
    }

    public function index(){
        $this->load->view('default');
        $this->load->view('notification/notificationVew');
    }
    /*
     * API for ajax call for getting all notification
     * Return
     * All Notifications (String)
     * Count (Int)
     */
    public function getAllNotification(){
        $getUnprocessedData = $this->NotificationModel->getAllNotification();
        $getProcessedNotificationData = $this->notificationlib->processNotificationData($getUnprocessedData);
        $response['allNotification'] = $getProcessedNotificationData;
        if($getProcessedNotificationData) {
            if ($this->getCount()->countNotify != 0) {
                $response['countNotification'] = $this->getCount();
            } else {
                $response['countNotification'] = null;
            }
        }
        die(json_encode($response));
    }

    /*
     * Function to return count
     * Return
     * Count(Int)
     */

    private function getCount(){
        $getCountofNotification = $this->NotificationModel->getNotificationCount();
        if($getCountofNotification){
            return $getCountofNotification;
        }
    }
    /*
     * API to call on clicking the bell notification
     * Sets the is_read flag to 1 for all notifications
     */

    public function setStatusRead(){
        if($this->NotificationModel->setStatusRead()){
            die(json_encode(true));
        }
    }

    /*
     * Backend to push arbitary notification to database
     * Message -> " Notification_Number_"(Some Random Number)
     * is_read flag is set to 0
     */

    public function pushNotification(){
        $getCustomNotifications = $this->notificationlib->createRandomNotificationsForDB();
        $this->NotificationModel->pushNotificationToDatabase($getCustomNotifications[0],$getCustomNotifications[1],$getCustomNotifications[2]);
        $this->load->view('notification/notificationPush');
    }
}
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
     */
    public function getAllNotification(){
        $getUnprocessedData = $this->NotificationModel->getAllNotification();
        $getProcessedNotificationData = $this->notificationlib->processNotificationData($getUnprocessedData);
        $response['allNotification'] = $getProcessedNotificationData;
        if(isset($getProcessedNotificationData)){
            $response['countNotification'] = $this->getCount();
        }
        else{
            $response['countNotification'] = null;
        }
        die(json_encode($response));
    }
    
    private function getCount(){
        $getCountofNotification = $this->NotificationModel->getNotificationCount();
        if($getCountofNotification != false){
            return $getCountofNotification;
        }
        else{
            return false;
        }
    }

    public function setStatusRead(){
        if($this->NotificationModel->setStatusRead()){
            die(json_encode(true));
        }
    }

    public function pushNotification(){
        $randNumberforNotification = "Notification_Number_".rand(10,1000);
        $this->NotificationModel->pushNotificationToDatabase($randNumberforNotification);
        $this->load->view('notification/notificationPush');
    }
}
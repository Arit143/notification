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
            $response['countNotification'] = count($getProcessedNotificationData);
        }
        die(json_encode($response));
    }
}
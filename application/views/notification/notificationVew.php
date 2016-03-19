

<!-- Notification related CSS -->
<link rel="stylesheet" type="text/css" href="css/notification/notification.css">

<div ng-app = "notification">
    <div  ng-strict-di ng-controller = "notificationController as notifyCtrl">
        <div class="center">
            <span ng-click = "notificationRead()" popover-placement= "bottom" uib-popover-template = "'js/app/views/popover.html'" class = 'fa fa-bell-o'></span>
        </div>
        <span class="badge badge-notify"><b>{{countNotifications}}</b></span>
    </div>
</div>

<script src="js/app/notification.app.js" type="text/javascript"></script>
<script src="js/app/notification.controller.js" type="text/javascript"></script>
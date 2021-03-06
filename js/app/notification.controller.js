/**
 * Created by AritraRocx on 3/19/2016.
 */
(function () {
    angular.module('notification')
        .controller('notificationController',notificationController);

    notificationController.$inject = ['$http','$scope'];
    function notificationController($http,$scope){

        /*
            Initialize $scope variables
         */
        $scope.click = 0;
        $scope.showNotifications = true;
        $scope.showNotificationCount = true;
        $scope.popover = true;
        $scope.popoverBlank = false;

        /*
            Timeout to reload a page as there is no implementation of login
            Every - 5 mins
         */
        setTimeout(function(){
            window.location.reload(1);
        }, 300000);

        function init() {

            $http({
                method: 'GET',
                url: '/notification/getAllNotification'
            }).then(function (response) {
                if(!($.isEmptyObject(response.data.allNotification))){
                    $scope.allNotifications = response.data.allNotification;
                }
                else{
                    $scope.popover = false;
                    $scope.popoverBlank = true;
                }

                if(response.data.countNotification != null){
                    $scope.countNotifications = response.data.countNotification;
                    $scope.height = (response.data.countNotification * 100);
                }
                else{
                    $scope.showNotifications = false;
                }

            })
        }

        init();

        /*
            Click Notification
            Method - Can be both GET and POST as it is just an update to set a flag
         */
        $scope.notificationRead = function () {
            $scope.showNotifications = false;
            $scope.click++;
            if($scope.click > 1){
                $scope.showNotificationCount = false;
            }
            $http({
                method: 'GET',
                url: '/notification/setStatusRead'
            }).then(function (response) {
                /*
                    TODO
                 */
            })
        }
    }
})();

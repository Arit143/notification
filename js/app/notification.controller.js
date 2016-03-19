/**
 * Created by AritraRocx on 3/19/2016.
 */
(function () {
    angular.module('notification')
        .controller('notificationController',notificationController);

    notificationController.$inject = ['$http','$scope'];
    function notificationController($http,$scope) {

        $scope.notificationRead = function () {
            console.log("Angular Controller Called");
            $http({
                method: 'GET',
                url: '/notification/getAllNotification'
            }).then(function (response) {
                console.log(response);
                $scope.allNotifications = response.data.allNotification;
                $scope.countNotifications = response.data.countNotification;
            })
        }
    }
})();

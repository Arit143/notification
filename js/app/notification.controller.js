/**
 * Created by AritraRocx on 3/19/2016.
 */
(function () {
    angular.module('notification')
        .controller('notificationController',notificationController);

    notificationController.$inject = ['$http','$scope'];
    function notificationController($http,$scope) {
        
        /*
            Some JSON
         */

        $scope.allNotifications = [
            { message: "Hi You posted"},
            { message: "Hey he commented"},
            { message: "Hey he uploaded"}
        ];


        $scope.notificationRead = function () {
            console.log("Angular Controller Called");
        }
    }
})();

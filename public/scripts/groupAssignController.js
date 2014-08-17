var groupAssignApp = angular.module("groupAssignApp", []);
groupAssignApp.controller("GroupAssignController", function($scope, $http)
{
    $scope.fields = [
        {id: "1", name: "Field 1"},
        {id: "1", name: "Field 2"},
        {id: "1", name: "Field 3"},
        {id: "1", name: "Field 4"},
        {id: "1", name: "Field 5"},
        {id: "1", name: "Field 6"},
        {id: "1", name: "Field 7"},
        {id: "1", name: "Field 8"},
        {id: "1", name: "Field 9"},
        {id: "1", name: "Field 10"}
    ];
    
    $scope.field = [];
    
    $scope.assignFields = [];
    
    $scope.onAssignField = function() {
        //$scope.assignFields.push.apply($scope.assignFields,$scope.field);
        
        for (i=0;i<$scope.field.length;i++)
        {
            $scope.assignFields.push($scope.field[i]);
            $scope.fields.splice($scope.fields.indexOf($scope.field[i]),1);
        }
        $scope.field = [];
    };
    
    $scope.onUnAssignField = function($index) {
        $scope.fields.push($scope.assignFields[$index]);        
        $scope.assignFields.splice($index,1);
        
    };
});




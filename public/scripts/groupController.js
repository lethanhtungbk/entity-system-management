var groupApp = angular.module("groupdApp", []);
groupApp.controller("GroupController", function($scope, $http)
{
    $scope.groups = [
        {id: "1", name: "Group 1", fields: [
                {id: "1", name: "Field 1"},
                {id: "2", name: "Field 2"},
                {id: "3", name: "Field 3"},
                {id: "4", name: "Field 4"},
                {id: "5", name: "Field 5"},
            ]},
        {id: "2", name: "Group 2", fields: [
                {id: "1", name: "Field 1"},
                {id: "2", name: "Field 2"},
                {id: "3", name: "Field 3"},
                {id: "4", name: "Field 4"},
                {id: "5", name: "Field 5"},
            ]},
        {id: "3", name: "Group 3", fields: [
                {id: "1", name: "Field 1"},
                {id: "2", name: "Field 2"},
                {id: "3", name: "Field 3"},
                {id: "4", name: "Field 4"},
                {id: "5", name: "Field 5"},
            ]},
        {id: "4", name: "Group 4", fields: [
                {id: "1", name: "Field 1"},
                {id: "2", name: "Field 2"},
                {id: "3", name: "Field 3"},
                {id: "4", name: "Field 4"},
                {id: "5", name: "Field 5"},
            ]},
        {id: "5", name: "Group 5", fields: [
                {id: "1", name: "Field 1"},
                {id: "2", name: "Field 2"},
                {id: "3", name: "Field 3"},
                {id: "4", name: "Field 4"},
                {id: "5", name: "Field 5"},
            ]},
    ];
    
    
});




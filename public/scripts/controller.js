var fieldApp = angular.module("fieldApp", []);
fieldApp.controller("FieldController", function($scope, $http)
{
    $scope.fieldName = {value: 'Hello', id: 'name'};
    $scope.valueTypes = [
        {name: 'Single Value', value: '1'},
        {name: 'Multiple Value - Single Select', value: '2'},
        {name: 'Multiple Value - Multiple Select', value: '3'},
    ];

    $scope.valueType = $scope.valueTypes[2];


    $scope.groups = [
        {name: 'Object 1'},
        {name: 'Object 2'},
        {name: 'Object 3'},
        {name: 'Object 4'},
        {name: 'Object 5'},
        {name: 'Object 6'},
        {name: 'Object 7'},
        {name: 'Object 8'},
        {name: 'Object 9'},
        {name: 'Object 10'},
    ];

    $scope.value1 = true;

    $scope.onValueTypeChanged = function()
    {
        $http.post("http://localhost/ems/public//restapi/getFieldDisplay", {
            value_type: $scope.valueType.value,
        }, {
            withCredentials: true
        }).success(function(data)
        {
            $scope.displayTypes = data;
            $scope.displayType = $scope.displayTypes[0];
        }).error(function(error)
        {
            console.log(error);
        });
    };

    $scope.test = function()
    {
        alert(9);
   
    };

    $scope.roles = [
        'guest',
        'user',
        'customer',
        'admin'
    ];
    $scope.user = {
        roles: ['user']
    };
    $scope.checkAll = function() {
        $scope.user.roles = angular.copy($scope.roles);
    };
    $scope.uncheckAll = function() {
        $scope.user.roles = [];
    };
    $scope.checkFirst = function() {
        $scope.user.roles.splice(0, $scope.user.roles.length);
        $scope.user.roles.push('guest');
    };
});




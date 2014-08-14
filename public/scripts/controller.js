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

    $scope.group = null;
    $scope.selectedGroups = [$scope.groups[1], $scope.groups[3]];

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

    $scope.onGroupChange = function() {
        console.log($scope.selectedGroups);
    }
    
    $scope.dependencies = [
        {name: "combo1", data: [
                {name: 'Combo 1 - 1'},
                {name: 'Combo 1 - 2'},
                {name: 'Combo 1 - 3'},
                {name: 'Combo 1 - 4'},
            ],selected: null},
        {name: "combo2", data: [
                {name: 'Combo 2 - 1'},
                {name: 'Combo 2 - 1'},
                {name: 'Combo 2 - 1'},
                {name: 'Combo 2 - 1'},
            ],selected: null},
        {name: "combo3", data: [
                {name: 'Combo 1 - 1'},
                {name: 'Combo 1 - 1'},
                {name: 'Combo 1 - 1'},
                {name: 'Combo 1 - 1'},
            ],selected: null},
        {name: "combo4", data: [
                {name: 'Combo 1 - 1'},
                {name: 'Combo 1 - 1'},
                {name: 'Combo 1 - 1'},
                {name: 'Combo 1 - 1'},
            ],selected: null},
        {name: "combo5", data: [
                {name: 'Combo 1 - 1'},
                {name: 'Combo 1 - 1'},
                {name: 'Combo 1 - 1'},
                {name: 'Combo 1 - 1'},
            ],selected: null},
        {name: "combo6", data: [
                {name: 'Combo 1 - 1'},
                {name: 'Combo 1 - 1'},
                {name: 'Combo 1 - 1'},
                {name: 'Combo 1 - 1'},
            ],selected: null},
    ];
    
    $scope.onTestCombo = function() {
        console.log($scope.dependencies);
    };
});




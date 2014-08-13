function FieldController($scope) {
    $scope.fieldName = {value: 'Hello',id:'name'};
    $scope.valueTypes = [
        {name:'Single Value',value:'1'},
        {name:'Multiple Value - Single Select',value:'2'},
        {name:'Multiple Value - Multiple Select',value:'3'},
    ];
    
    $scope.valueType = $scope.valueTypes[2];
    
    $scope.onValueTypeChanged = function()
    {
        console.log($scope.valueType);
    }
}
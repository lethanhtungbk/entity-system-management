emsApp.controller('FieldDetailController', function($scope, fieldService)
{
    angular.element(document).ready(function() {
       fieldService.getField($('#fieldId').val()).then(function(data) {
           console.log(data);
           $scope.field = data.field;
           $scope.fieldTypes = data.fieldTypes;
           $scope.valueTypes = data.valueTypes;
           $scope.objects = data.objects;
       });
    });
    
    $scope.onCustomValueAdd = function($index) {
        insertAt($scope.definedValues, $index + 1, {id: "-1", name: ""});
    };

    $scope.onCustomValueRemove = function($index) {
        $scope.definedValues.splice($index, 1);
    };

    $scope.onCustomValueUp = function($index) {
        $scope.definedValues.swap($index,$index-1);
    };

    $scope.onCustomValueDown = function($index) {
        $scope.definedValues.swap($index,$index+1);
    };
    
    $scope.onSubmit = function () {                
        
        
        var data = {
            action : "add",
            data : JSON.stringify($scope.field)
        };
        
        fieldService.saveField(data).then(function(data) {
           console.log(data);
           $scope.field = data.field;
           $scope.fieldTypes = data.fieldTypes;
           $scope.valueTypes = data.valueTypes;
           $scope.objects = data.objects;
       });
    };

});
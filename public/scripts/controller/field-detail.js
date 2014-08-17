emsApp.controller('FieldDetailController', function($scope, fieldService)
{
    angular.element(document).ready(function() {
        fieldService.getFieldTypes().then(function(data) {
            $scope.fieldTypes = data;
            if ($scope.fieldTypes.length > 0)
            {
                $scope.fieldType = $scope.fieldTypes[0];
            }
        });

        fieldService.getFieldValueTypes().then(function(data) {
            $scope.valueTypes = data;

            if ($scope.valueTypes.length > 0)
            {
                $scope.valueType = $scope.valueTypes[0];
                console.log($scope.valueType);
            }
        })

        $scope.definedValues = [
            {id: "-1", name: ""},
        ];      
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

});
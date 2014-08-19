emsApp.controller('FieldController', function($scope, fieldService)
{
    angular.element(document).ready(function() {
        fieldService.getFields().then(function(fields) {
            $scope.fields = fields;
            console.log($scope.fields);
        });
    });
});
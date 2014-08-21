emsApp.controller('FieldController', function($scope, fieldService,$location)
{
    angular.element(document).ready(function() {
        fieldService.getFields().then(function(fields) {
            $scope.fields = fields;
            
            
        });
    });
});
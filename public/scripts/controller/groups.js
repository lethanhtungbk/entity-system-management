emsApp.controller("GroupController", function($scope, groupService)
{
    $scope.getGroups = function() {
        groupService.getGroups().then(function(data) {
            $scope.groups = data;
        });
    };
    
    $scope.getGroup = function() {
        var requestData = {id:$('#id').val()};
        groupService.getGroup(requestData).then(function(data) {
            console.log(data);
            $scope.group = data.group;
        });
    };

    $scope.validate = function () {
        return true;
    };
    
    $scope.onSubmit = function() {
        console.log($scope.group);        
        if ($scope.validate())
        {
            var requestData = {
                action: $('#action').val(),
                id: $('#id').val(),
                data: JSON.stringify($scope.group)
            };
            groupService.saveGroup(requestData).then(function(data) {
                console.log(data);
                if (data.success !== undefined)
                {
                    alert(data.success.message);
                    window.location = data.success.url;
                }
            });
        }
    }
});
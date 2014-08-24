emsApp.controller("EntityController", function($scope, entityService)
{
    $scope.filters = [
        {name: "Test Name", groupId: 1, value: "samevalue"},
        {name: "Drop down", groupId: 2, value: [
                {id: "1", name: "select 1"},
                {id: "2", name: "select 2"},
                {id: "3", name: "select 3"},
                {id: "4", name: "select 4"},
            ]},
        {name: "List", groupId: 3, value: [
                {id: "1", name: "select 1"},
                {id: "2", name: "select 2"},
                {id: "3", name: "select 3"},
                {id: "4", name: "select 4"},
            ]},
    ];

    $scope.search = function() {
        console.log($scope.filters);
    }


    $scope.attributes = [
        {id: 1, name: 'Textedit', display: 'textedit'},
        {id: 2, name: 'Textarea', display: 'textarea'},
        {id: 3, name: 'Dropdown', values: [
                {id: 1, value: 'Option 1'},
                {id: 2, value: 'Option 2'},
                {id: 3, value: 'Option 3'},
                {id: 4, value: 'Option 4'}
            ], display: 'dropdown'},
        {id: 4, name: 'Listbox', values: [
                {id: 1, value: 'Option 1'},
                {id: 2, value: 'Option 2'},
                {id: 3, value: 'Option 3'},
                {id: 4, value: 'Option 4'}
            ], display: 'listbox'},
    ];
    
    $scope.getEntity = function () {
        var requestData = {id: $('#id').val(),link:$('#link').val()};
        entityService.getEntity(requestData).then(function(data) {
            console.log(data);
            $scope.fields = data.fields;
            $scope.entity = data.entity;
            
        });
    };
    
    $scope.validate = function() {
        return true;
    };
    
    $scope.getSelectedValue = function (selected) {
        var selectedType =Object.prototype.toString.call(selected).split(/\W/)[2];
        switch (selectedType)
        {
            case "String":
                return selected;

            case "Object":
                return selected.id;

            case "Array":
                var ids = [];
                for (var i=0;i<selected.length;i++)
                {
                    ids.push(selected[i].id);
                }
                return ids;
        }
        return null;
    };
    
    $scope.saveEntity = function() {
        $scope.entity.fieldValues = [];
        for (var i=0;i<$scope.fields.length;i++)
        {
            var field = $scope.fields[i];
            if (field.selected !== undefined)
            {
                $scope.entity.fieldValues.push({id:field.id,value:$scope.getSelectedValue(field.selected)});
            }
        }
        
        if ($scope.validate())
        {
            var requestData = {
                action: $('#action').val(),
                id: $('#id').val(),
                data: JSON.stringify($scope.entity)
            };
            entityService.saveEntity(requestData).then(function(data) {
                console.log(data);
                if (data.success !== undefined)
                {
                    alert(data.success.message);
                    window.location = data.success.url;
                }
            });
        }
    };
});
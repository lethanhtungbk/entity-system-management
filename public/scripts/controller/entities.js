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
    
    
    $scope.getEntities = function () {
         var requestData = {
                link: $('#link').val(),
            };
        entityService.getEntities(requestData).then(function(data) {
            console.log(data);
            $scope.entities = data.entities;  
            $scope.fields = data.fields;
            $scope.hasTextSearch = data.hasTextSearch;
        });
    }
    
    $scope.getEntity = function() {
        var requestData = {id: $('#id').val(), link: $('#link').val()};
        entityService.getEntity(requestData).then(function(data) {
            $scope.fields = data.fields;
            $scope.entity = data.entity;
            for (var i = 0; i < $scope.fields.length; i++)
            {
                var field = $scope.fields[i];


                var fieldValue = searchObject($scope.entity.fieldValues, 'field_id', field.id);

                if (fieldValue !== undefined)
                {

                    switch (field.fieldValueType)
                    {
                        case 1:
                            field.selected = fieldValue.value;
                            break;
                        case 2:
                            field.selected = searchObject(field.defineValues, 'id', parseInt(fieldValue.value));
                            break;
                        case 3:
                            field.selected = [];
                            
                            for (var j = 0; j < fieldValue.value.length; j++)
                            {
                                var id = fieldValue.value[j];
                                var defineValue = searchObject(field.defineValues, 'id', parseInt(id));
                                if (defineValue !== undefined)
                                {
                                    field.selected.push(defineValue);
                                }
                            }
                            break;
                    }
                }
            }
        });
    };

    $scope.validate = function() {
        return true;
    };
    
    
    
    $scope.getSelectedValue = function(selected) {
        var selectedType = Object.prototype.toString.call(selected).split(/\W/)[2];
        switch (selectedType)
        {
            case "String":
                return selected;

            case "Object":
                return selected.id;

            case "Array":
                var ids = [];
                for (var i = 0; i < selected.length; i++)
                {
                    ids.push(selected[i].id);
                }
                return ids;
        }
        return null;
    };

    $scope.saveEntity = function() {
        if ($scope.entity.fieldValues === undefined)
        {
            $scope.entity.fieldValues = [];
        }
        
        for (var i=0;i<$scope.fields.length;i++)
        {
            var field = $scope.fields[i];
            
            if (field.selected !== undefined)
            {
                var fieldValue = searchObject($scope.entity.fieldValues,'field_id',field.id);
                if (fieldValue === undefined)
                {
                    fieldValue = {};
                    fieldValue.field_id = field.id;
                    $scope.entity.fieldValues.push(fieldValue);
                }                
                fieldValue.value = $scope.getSelectedValue(field.selected);
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
                    if (data.success.url !== undefined)
                    {
                        window.location = data.success.url;
                    }
                }
            });
        }        
    };
    
    $scope.search = function()
    {
        alert('Search thoi, ve nha lam nhe');
        console.log($scope.fields);
    };
});
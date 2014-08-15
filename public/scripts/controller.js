
function insertAt(array, index) {
    var arrayToInsert = Array.prototype.splice.apply(arguments, [2]);
    Array.prototype.splice.apply(array, [index, 0].concat(arrayToInsert));
    return array;
}

function insertArrayAt(array, index, arrayToInsert) {
    Array.prototype.splice.apply(array, [index, 0].concat(arrayToInsert));
    return array;
}


Array.prototype.swap = function(x, y) {
    var b = this[x];
    this[x] = this[y];
    this[y] = b;
    return this;
}

var fieldApp = angular.module("fieldApp", []);
fieldApp.controller("FieldController", function($scope, $http)
{
    $scope.tipall = [
        {id: "1", "TIPIS": "Single value", "DESC": "textedit"},
        {id: "2", "TIPIS": "Single value", "DESC": "textarea"},
        {id: "3", "TIPIS": "Single value", "DESC": "date"},
        {id: "4", "TIPIS": "Single value", "DESC": "datetime"},
        {id: "5", "TIPIS": "Single value", "DESC": "audio"},
        {id: "6", "TIPIS": "Single value", "DESC": "video"},
        {id: "7", "TIPIS": "Single value", "DESC": "file"},
        {id: "8", "TIPIS": "Multiple value - Single Select", "DESC": "Dropdown"},
        {id: "9", "TIPIS": "Multiple value - Single Select", "DESC": "Checkbox"},
        {id: "10", "TIPIS": "Multiple value - Multipe Select", "DESC": "Listbox"},
        {id: "11", "TIPIS": "Multiple value - Multipe Select", "DESC": "Radiobox"}
    ];

    $scope.tipost = $scope.tipall[0];









    //Field Types

    $scope.fieldName = {value: 'Hello', id: 'name'};
    $scope.fieldTypes = [
        {id: "1", name: "Textedit", group: "Single - Value", groupId: "1"},
        {id: "2", name: "Textarea", group: "Single - Value", groupId: "1"},
        {id: "3", name: "Date", group: "Single - Value", groupId: "1"},
        {id: "4", name: "Datetime", group: "Single - Value", groupId: "1"},
        {id: "5", name: "Audio", group: "Single - Value", groupId: "1"},
        {id: "6", name: "Video", group: "Single - Value", groupId: "1"},
        {id: "7", name: "File", group: "Single - Value", groupId: "1"},
        {id: "8", name: "Dropdown", group: "Multi Value - Single Select", groupId: "2"},
        {id: "9", name: "Checkbox", group: "Multi Value - Single Select", groupId: "2"},
        {id: "10", name: "Listbox", group: "Multi Value - Multi Select", groupId: "3"},
        {id: "11", name: "Radiobox", group: "Multi Value - Multi Select", groupId: "3"}
    ];
    $scope.fieldType = $scope.fieldTypes[7];
    //Value Type
    $scope.valueTypes = [
        {id: "1", name: "Self-Defined Value"},
        {id: "2", name: "Object Value"},
    ];
    $scope.valueType = $scope.valueTypes[0];

    //Objects & Atribute

    $scope.objects = [
        {id: "1", name: "Object 1", fields: [
                {id: "1", name: "Object 1 - Field 1"},
                {id: "2", name: "Object 1 - Field 2"},
                {id: "3", name: "Object 1 - Field 3"},
                {id: "4", name: "Object 1 - Field 4"},
                {id: "5", name: "Object 1 - Field 5"},
            ]},
        {id: "2", name: "Object 2", fields: [
                {id: "1", name: "Object 2 - Field 1"},
                {id: "2", name: "Object 2 - Field 2"},
                {id: "3", name: "Object 2 - Field 3"},
                {id: "4", name: "Object 2 - Field 4"},
                {id: "5", name: "Object 2 - Field 5"},
            ]},
        {id: "3", name: "Object 3", fields: [
                {id: "1", name: "Object 3 - Field 1"},
                {id: "2", name: "Object 3 - Field 2"},
                {id: "3", name: "Object 3 - Field 3"},
                {id: "4", name: "Object 3 - Field 4"},
                {id: "5", name: "Object 3 - Field 5"},
            ]},
        {id: "4", name: "Object 4", fields: [
                {id: "1", name: "Object 4 - Field 1"},
                {id: "2", name: "Object 4 - Field 2"},
                {id: "3", name: "Object 4 - Field 3"},
                {id: "4", name: "Object 4 - Field 4"},
                {id: "5", name: "Object 4 - Field 5"},
            ]},
    ];
    $scope.object = $scope.objects[0];
    $scope.field = $scope.object.fields[0];

    //Assign it self
    $scope.definedValues = [
        {id: "1", name: "Defined Value 1"},
        {id: "2", name: "Defined Value 2"},
        {id: "3", name: "Defined Value 3"},
        {id: "4", name: "Defined Value 4"},
        {id: "5", name: "Defined Value 5"}
    ];

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
            ], selected: null},
        {name: "combo2", data: [
                {name: 'Combo 2 - 1'},
                {name: 'Combo 2 - 1'},
                {name: 'Combo 2 - 1'},
                {name: 'Combo 2 - 1'},
            ], selected: null},
        {name: "combo3", data: [
                {name: 'Combo 1 - 1'},
                {name: 'Combo 1 - 1'},
                {name: 'Combo 1 - 1'},
                {name: 'Combo 1 - 1'},
            ], selected: null},
        {name: "combo4", data: [
                {name: 'Combo 1 - 1'},
                {name: 'Combo 1 - 1'},
                {name: 'Combo 1 - 1'},
                {name: 'Combo 1 - 1'},
            ], selected: null},
        {name: "combo5", data: [
                {name: 'Combo 1 - 1'},
                {name: 'Combo 1 - 1'},
                {name: 'Combo 1 - 1'},
                {name: 'Combo 1 - 1'},
            ], selected: null},
        {name: "combo6", data: [
                {name: 'Combo 1 - 1'},
                {name: 'Combo 1 - 1'},
                {name: 'Combo 1 - 1'},
                {name: 'Combo 1 - 1'},
            ], selected: null},
    ];


    $scope.valueDependencies = [
        {
            value: "Test",
            columns: [
                {name: "Combo 1"},
                {name: "Combo 2"},
                {name: "Combo 3"},
                {name: "Combo 4"},
                {name: "Combo 5"},
                {name: "Combo 6"},
            ],
        },
        {
            value: "Test",
            columns: [
                {name: "Combo 1"},
                {name: "Combo 2"},
                {name: "Combo 3"},
                {name: "Combo 4"},
                {name: "Combo 5"},
                {name: "Combo 6"},
            ],
        },
        {
            value: "Test",
            columns: [
                {name: "Combo 1"},
                {name: "Combo 2"},
                {name: "Combo 3"},
                {name: "Combo 4"},
                {name: "Combo 5"},
                {name: "Combo 6"},
            ],
        },
        {
            value: "Test",
            columns: [
                {name: "Combo 1"},
                {name: "Combo 2"},
                {name: "Combo 3"},
                {name: "Combo 4"},
                {name: "Combo 5"},
                {name: "Combo 6"},
            ],
        },
    ];

    $scope.onTestCombo = function() {
        console.log($scope.dependencies);
    };

    $scope.predefiendValue = "aaa";

    $scope.onAddValue = function() {
        var newValue = {};
        newValue.value = "aaaaaa";
        newValue.columns = [];

        for (i = 0; i < $scope.dependencies.length; i++)
        {

            var dependency = $scope.dependencies[i];
            if (dependency.selected === null)
            {
                alert(dependency.name + " need selected");
                return;
            }

            newValue.columns.push({name: dependency.name});
        }
        $scope.valueDependencies.push(newValue);
        console.log(JSON.stringify(newValue));

//        if ($scope.predefiendValue == "")
//        {
//            alert("Need add predefiend value");
//            return;
//        }



    };
});




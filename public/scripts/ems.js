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

function searchObject(array,key,value)
{
    if (array == null || array == undefined)
    {
        return undefined;
    }
    
    for (var i=0;i<array.length;i++)
    {
        if (array[i][key] === value)
        {
            return array[i];
        }
    }
    return undefined;
}

var emsApp = angular.module('emsApp', []);

emsApp.constant('restURI', "http://localhost/ems/public/restapi/");
emsApp.value('base', "http://localhost/ems/public/");
emsApp.service('fieldService', function($http, $q, restURI) {

    return ({
        getFields: getFields,
        getField: getField,
        addField: addField,
        removeField: removeField,
        editField: editField,
        getFieldTypes: getFieldTypes,
        getFieldValueTypes: getFieldValueTypes,
        saveField: saveField
    });

    // ---
    // PUBLIC METHODS.  
    // ---
    
    function saveField(data)
    {
        var request = $http({
            method: "post",
            url: restURI + "saveField",
            data: data
        });

        return(request.then(handleSuccess, handleError));
    }
    
    function getField(id)
    {
        var request = $http({
            method: "post",
            url: restURI + "field",
            data: {
                fieldId: id,
            }
        });

        return(request.then(handleSuccess, handleError));
    }

    function getFields()
    {

        var request = $http({
            method: "post",
            url: restURI + "fields",
        });

        return(request.then(handleSuccess, handleError));
    }

    function addField()
    {

    }

    function removeField()
    {

    }

    function editField()
    {

    }

    function getFieldTypes()
    {
        var request = $http({
            method: "get",
            url: restURI + "fieldTypes",
        });

        return(request.then(handleSuccess, handleError));
    }

    function getFieldValueTypes()
    {
        var request = $http({
            method: "get",
            url: restURI + "fieldValueTypes",
        });

        return(request.then(handleSuccess, handleError));
    }

    // ---
    // PRIVATE METHODS.
    // ---


    // I transform the error response, unwrapping the application dta from
    // the API response payload.
    function handleError(response) {

        // The API response from the server should be returned in a
        // nomralized format. However, if the request was not handled by the
        // server (or what not handles properly - ex. server error), then we
        // may have to normalize it on our end, as best we can.
        if (
                !angular.isObject(response.data) ||
                !response.data.message
                ) {

            return($q.reject("An unknown error occurred."));

        }

        // Otherwise, use expected error message.
        return($q.reject(response.data.message));

    }


    // I transform the successful response, unwrapping the application data
    // from the API response payload.
    function handleSuccess(response) {

        return(response.data);

    }
   
});



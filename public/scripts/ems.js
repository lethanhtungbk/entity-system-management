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


function convertText2Link(str) {
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g, "-");
    str = str.replace(/-+-/g, "-"); 
    str = str.replace(/^\-+|\-+$/g, "");
    return str;
}

function searchObject(array, key, value)
{
    if (array == null || array == undefined)
    {
        return undefined;
    }

    for (var i = 0; i < array.length; i++)
    {
        if (array[i][key] === value)
        {
            return array[i];
        }
    }
    return undefined;
}

var emsApp = angular.module('emsApp', []);
emsApp.value('baseURL', baseURL);
emsApp.service('fieldService', function($http, $q) {
    var restURI = baseURL + "/restapi/";
    return ({
        getFields: getFields,
        getField: getField,
        saveField: saveField,
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



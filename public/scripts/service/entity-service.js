emsApp.service('entityService', function(baseService) {

    return ({
        getAttributes : getAttributes,
        getEntity : getEntity,
        saveEntity : saveEntity
    });
    
    function getAttributes(data)
    {
        return baseService.postData(data,"entities/attributes");           
    }
    
    function getEntity(data)
    {
        return baseService.postData(data,"entity");
    }
    
    function saveEntity(data)
    {
        return baseService.postData(data,"entity/save");
    }
    
});
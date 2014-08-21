emsApp.service('groupService', function(baseService) {

    return ({
        getGroups: getGroups,
        saveGroup : saveGroup,
        getGroup : getGroup,
    });
    
    function getGroups()
    {
        return baseService.postData({},"groups"); 
    }
    
    function getGroup(data)
    {
        return baseService.postData(data,"group");
    }
    
    function saveGroup(data)
    {
        return baseService.postData(data,"groups/save");
    }
});
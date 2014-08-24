<div class="portlet box blue" ng-app="emsApp">
    <div class="portlet-title">
        <div class="caption">
            {{$templateData->portletTitle}}                      
        </div>        
    </div>
    <div class="portlet-body" ng-controller="EntityController" ng-init="getEntity()">
        <div class="row">
            <div class="col-md-12">
                <div class="btn-group tabletools-btn-group pull-right">
                    <a href="{{URL::to('entities/'.$templateData->groupLink.'/add')}}" class="btn blue"><i class="fa fa-plus"></i> Add {{$templateData->portletTitle}}</a>
                    <a href="/" class="btn red-flamingo"><i class="fa fa-minus"></i> Remove {{$templateData->portletTitle}}</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 form-group" ng-repeat="filter in filters">
                <label>@{{filter.name}}</label> 
                <input type="text" class="form-control" ng-if="filter.groupId == 1" ng-model="filter.value"/>
                <select class="form-control"  
                        ng-model="filter.selected" 
                        ng-options="item.name for item in filter.value" ng-if="filter.groupId == 2"></select>
                <select class="form-control"  
                        multiple="true"
                        ng-model="filter.selected" 
                        ng-options="item.name for item in filter.value" ng-if="filter.groupId == 3"></select>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>                    
                    <th width="60%">
                        Group
                    </th>
                    <th >
                        Fields
                    </th>
                    <th width='155px !important'>
                        Actions
                    </th>                    
                </tr>
            </thead>
            <tbody>
                <tr>                   
                    <td>
                        <input type="text" class="form-control" placeholder="Search group.." ng-model="searchGroup"/>
                    </td>
                    <td>
                        <select class="form-control" ></select>
                    </td>
                    <td>

                    </td>                    
                </tr>                                   
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-12">
                <div class="btn-group tabletools-btn-group pull-right">
                    <a ng-click="search()" class="btn blue"><i class="fa fa-search"></i> Search</a>
                </div>
            </div>
        </div>
    </div>
</div>
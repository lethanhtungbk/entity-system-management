<div class="portlet box blue" ng-app="emsApp">
    <div class="portlet-title">
        <div class="caption">
            Groups                      
        </div>        
    </div>
    <div class="portlet-body" ng-controller="GroupController">
        <div class="row">
            <div class="col-md-12">
                <div class="btn-group tabletools-btn-group pull-right">
                    <a href="/" class="btn blue"><i class="fa fa-plus"></i> New group</a>
                    <a href="/" class="btn blue"><i class="fa fa-minus"></i> Delete group</a>
                </div>
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
                    <th width='150px !important'>

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
                <tr ng-repeat="group in groups| filter:{name:searchGroup}">                   
                    <td>
                        @{{group.name}}
                    </td>
                    <td>
                        <div ng-repeat="field in group.fields">
                            <a href='/'>@{{field.name}}</a>
                        </div>                        
                    </td>
                    <td>
                        <div class="btn-group pull-left">
                            <a ng-click="onEditGroup($index)" class="btn blue"><i class="fa fa-plus"></i></a>
                            <a ng-click="onAssignGroup($index)" class="btn blue"><i class="fa fa-chain"></i></a>
                            <a ng-click="onAssignGroup($index)" class="btn blue"><i class="fa fa-minus"></i></a>
                        </div>
                    </td>                    
                </tr>                           
            </tbody>
        </table>
    </div>
</div>
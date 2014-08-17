<div class="portlet box blue" ng-app="emsApp">
    <div class="portlet-title">
        <div class="caption">
            Fields                      
        </div>        
    </div>
    <div class="portlet-body" ng-controller="FieldController" ng-init="getFields()">
        <div class="row">
            <div class="col-md-12">                
                <div class="btn-group tabletools-btn-group pull-left">
                    <input type="text" class="form-control" placeholder="Search field.." ng-model="searchField"/>
                </div>
                <div class="btn-group tabletools-btn-group pull-right">
                    <a href="{{URL::to('/fields/add')}}" class="btn blue"><i class="fa fa-plus"></i> Add field</a>
                    <a href="/fields/add" class="btn red-pink"><i class="fa fa-minus"></i> Remove fields</a>
                </div>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>                    
                    <th width="50%">
                        Field
                    </th>
                    <th >
                        Field Type
                    </th>
                    <th width='105px !important'>

                    </th>                    
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="field in fields| filter:{name:searchField}">                   
                    <td>
                        @{{field.name}}
                    </td>
                    <td>
                        Text Edit
                    </td>
                    <td>
                        <div class="btn-group tabletools-btn-group pull-right">
                            <a ng-href="/fields/edit/@{{field.id}}" class="btn blue"><i class="fa fa-edit"></i></a>
                            <a href="/" class="btn red-pink"><i class="fa fa-minus"></i></a>
                        </div>
                    </td>                    
                </tr>                  
            </tbody>
        </table>
    </div>
</div>
<div class="portlet box blue" ng-app="emsApp">
    <div class="portlet-title">
        <div class="caption">
            Add new 
        </div>        
    </div>
    <div class="portlet-body form" ng-controller="EntityController" ng-init="getEntity()">
        <div class="form-horizontal">
            <div class="form-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">Name</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" ng-model="entity.name">                                
                    </div>
                </div>
                 <div class="form-group" ng-repeat="field in fields">
                    <label class="col-md-3 control-label">@{{field.name}}</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" ng-if="field.display == 'textfield'" ng-model="field.selected"/>                                
                        <textarea type="text" class="form-control" ng-if="field.display == 'textarea'" ng-model="field.selected"></textarea>                                
                        <select class="form-control" 
                                ng-if="field.display == 'dropdown' || field.display == 'radio'"
                                ng-model="field.selected" 
                                ng-options="item.value for item in field.defineValues"></select>
                        <select class="form-control" multiple="true"
                                ng-if="field.display == 'list' || field.display == 'checkbox'"
                                ng-model="field.selected" 
                                ng-options="item.value for item in field.defineValues"></select>
                        
                    </div>
                </div>
            </div>            
               


            <div class="form-actions">
                <div class="col-md-offset-3 col-md-9">      
                    <input type="hidden" value="{{$templateData->groupLink}}" id="link"/>
                    <input type="hidden" value="{{$templateData->action}}" id="action"/>
                    <input type="hidden" value="{{$templateData->id}}" id="id"/>
                    <a class="btn blue" ng-click="saveEntity()"><i class="fa fa-save"></i> Save</a>                        
                    <button type="button" class="btn default">Cancel</button>
                </div>
            </div>
        </div>


    </div>
</div>
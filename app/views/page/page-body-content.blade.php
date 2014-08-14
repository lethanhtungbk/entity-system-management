<div class="page-content-wrapper">
    <div class="page-content">        
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">{{$pageBody-> title}}</h3>
                <ul class="page-breadcrumb breadcrumb">
                    @foreach ($pageBody->breadcrumbs as $index => $breadcrumb)
                    <li>
                        <i class="fa {{$breadcrumb-> icon}}"></i>
                        @if ($breadcrumb->link != '')
                        <a href="{{URL::to($breadcrumb->link)}}">{{$breadcrumb->title}}</a>
                        @else
                        <span>{{$breadcrumb-> title}}</span>
                        @endif
                        @if ($index != count($pageBody->breadcrumbs) - 1)
                        <i class="fa fa-angle-right"></i>
                        @endif
                    </li>
                    @endforeach                    
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        @if (false)
        @foreach ($pageBody->contents as $content)
        {{$content->getView()}}        
        @endforeach
        @endif
        <!-- END PAGE CONTENT-->

        <div class="portlet box blue" ng-app="fieldApp">
            <div class="portlet-title">
                <div class="caption">
                    Fields                    
                </div>        
            </div>
            <div class="portlet-body form" ng-controller="FieldController">
                <form action="#" class="horizontal-form">
                    <div class="form-body">                        
                        <h3 class="form-section"> <b>General</b></h3>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Name</label>
                                    <input type="text" class="form-control" value="@{{fieldName.value}}" name="@{{fieldName.name}}">                                    
                                </div>
                            </div>
                            
                        </div>            
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Value type</label>
                                    
                                    <select class="form-control"  ng-model="valueType" ng-options="valueType.name for valueType in valueTypes" ng-change="onValueTypeChanged()" ng-init="onValueTypeChanged()"></select>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Display</label>
                                    <select class="form-control"  ng-model="displayType" ng-options="displayType.name for displayType in displayTypes"></select>
                                </div>
                            </div>
                        </div>
                            
                        <div class="row">
                           <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Depend on group(s)</label>
                                    <select class="form-control"  ng-model="selectedGroups" ng-change="onGroupChange()"
                                            ng-options="group.name for group in groups" multiple ng-multiple="true"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Depend on value(s)</label>
                                    <select class="form-control"  ng-model="group" ng-options="group.name for group in groups" multiple></select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4" ng-repeat="dependency in dependencies">
                                <div class="form-group">
                                    <label class="control-label">@{{dependency.name}}</label>
                                    <select class="form-control"  ng-model="dependency.selected" ng-options="item.name for item in dependency.data" ng-change="onTestCombo()"></select>
                                </div>
                            </div>
                        </div>
                           
                        
                        
                        <h3 class="form-section"> <b>General</b></h3>
                        <div class="row">
                            <label class="col-md-2">Add predefiend value</label>
                            <div class="col-md-8">
                                <div class="col-md-5">
                                    <input type="text" class="form-control" />
                                </div>
                                <div class="btn-group tabletools-btn-group col-md-5">
                                    <a class="btn blue" ng-click="test()"><i class="fa fa-plus"></i></a>                                    
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>

                                        <th>
                                            Object 1
                                        </th>
                                        <th>
                                            Object 2
                                        </th>
                                        <th>
                                            Object 3
                                        </th>
                                        <th>
                                            Object 4
                                        </th>
                                        <th>
                                            Object 5
                                        </th>
                                        <th>
                                            Object 6
                                        </th>
                                        <th>
                                            Object 4
                                        </th>
                                        <th>
                                            Object 5
                                        </th>
                                        <th>
                                            Object 6
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Object 111111111111111
                                        </td>
                                        <td>
                                            Object 111111111111111
                                        </td>
                                        <td>
                                            Object 111111111111111
                                        </td>
                                        <th>
                                            Object 4
                                        </th>
                                        <th>
                                            Object 5
                                        </th>
                                        <th>
                                            Object 6
                                        </th>
                                        <th>
                                            Object 4
                                        </th>
                                        <th>
                                            Object 5
                                        </th>
                                        <th>
                                            Object 6
                                        </th>
                                    </tr>                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-actions right">
                        <button type="button" class="btn default">Cancel</button>
                        <button type="submit" class="btn blue"><i class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
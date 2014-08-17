<div class="page-content-wrapper">
    <div class="page-content">        
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">{{$pageBody->title}}</h3>
                <ul class="page-breadcrumb breadcrumb">
                    @foreach ($pageBody->breadcrumbs as $index => $breadcrumb)
                    <li>
                        <i class="fa {{$breadcrumb->icon}}"></i>
                        @if ($breadcrumb->link != '')
                        <a href="{{URL::to($breadcrumb->link)}}">{{$breadcrumb->title}}</a>
                        @else
                        <span>{{$breadcrumb->title}}</span>
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

        <div class="portlet box blue" ng-app="groupAssignApp">
            <div class="portlet-title">
                <div class="caption">
                    Group Assign                    
                </div>        
            </div>
            <div class="portlet-body form" ng-controller="GroupAssignController">
                <form action="#" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Group</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" value="Object 1" readonly="true">                                
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Fields</label>
                            <div class="col-md-4">
                                <select class="form-control"  
                                        ng-model="field" 
                                        ng-options="field.name for field in fields" multiple></select>
                            </div>
                            <div class="col-md-1">
                                <a ng-click="onAssignField()" class="btn blue"><i class="fa fa-chain"></i>  Assign</a>
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Group fields</label>
                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>                    
                                            <th >Field</th>
                                            <th width='110px !important' />
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="assignField in assignFields">                   
                                            <td>
                                                @{{assignField.name}}
                                            </td>
                                            
                                            <td>
                                                <div class="btn-group pull-right">
                                                    <a class="btn blue"><i class="fa fa-share-alt"></i></a>
                                                    <a ng-click="onUnAssignField($index)"  class="btn red-flamingo"><i class="fa fa-chain-broken"></i></a>
                                                </div>        
                                            </td>                    
                                        </tr>                                                          
                                    </tbody>
                                </table>
                            </div>
                        </div>  
                    </div>
                    <div class="form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn green">Submit</button>
                            <button type="button" class="btn default">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
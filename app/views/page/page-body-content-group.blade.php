<div class="page-content-wrapper" ng-app="groupdApp">
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

        <div class="row">
            <div class="col-md-12">
                <div class="btn-group tabletools-btn-group pull-right">
                    <a href="/" class="btn blue"><i class="fa fa-plus"></i> New group</a>
                    <a href="/" class="btn blue"><i class="fa fa-minus"></i> Delete group</a>
                </div>
            </div>
        </div>
        
        <table class="table table-bordered" ng-controller="GroupController">
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
                        <input type="text" class="form-control" placeholder="Search group" ng-model="searchGroup"/>
                    </td>
                    <td>
                        <select class="form-control" ></select>
                    </td>
                    <td>
                        <div class="btn-group tabletools-btn-group pull-right">
                            <a href="/" class="btn blue"><i class="fa fa-plus"></i> New group</a>
                            <a href="/" class="btn blue"><i class="fa fa-minus"></i> Delete group</a>
                        </div>
                    </td>                    
                </tr>
                <tr ng-repeat="group in groups | filter:{name:searchGroup}">                   
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
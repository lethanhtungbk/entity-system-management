<html ng-app>
    <head>
        <title>Your Shopping Cart</title>
    </head>
</head>
<body ng-controller='CartController'>
    <h1>Your Order</h1>
    <div ng-repeat='item in items'>
        <span>@{{item.title}}</span>
        <input ng-model='item.quantity'>
        <span>@{{item.price| currency}}</span>
        <span>@{{item.price * item.quantity| currency}}</span>
        <button ng-click="remove($index)">Remove</button>
    </div>

    {{HTML::script('scripts/angular.min.js')}}        
    {{HTML::script('scripts/controller.js')}}        
</body>
</html>
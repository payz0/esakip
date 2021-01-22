<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>
    <script type="text/javascript" src="../../assets/js/app.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script data-require="ui-bootstrap@*" data-semver="0.12.1" src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.12.1.min.js"></script>
    <title>Angular js</title>
</head>
<body  ng-init="baseUrl = '<?php echo base_url(); ?>'; tabel = 'tabel_skpd'">
    <div class="jumbotron">
        <h2>Tutorial angular js CRUD di CI</h2>
        <strong>{elapsed_time}</strong> seconds.
        
    </div>
    <pagination  ng-model="currentPage"
      total-items="todos.length"
      max-size="maxSize"  
      boundary-links="true"></pagination>
    <div  ng-controller="controlApp">
        <input type="text" name="inputan" ng-model="inputnama.username" placeholder="isi nama">
        <input type="text" name="inputan" ng-model="inputnama.password" placeholder="isi nama">
        <button ng-click="tambah('users')">tambah</button>
        <button ng-click="update('id','users')">update</button>
        <div >
            <ul >
                <li ng-repeat="data in datas track by $index">{{data.username}} ...... 
                    <span ng-click="hapus('id',data.id,'users')">hapus</span>  ||  
                    <span ng-click="edit($index)">edit</span>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>
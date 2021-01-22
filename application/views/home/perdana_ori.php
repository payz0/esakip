<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
        <title>Configurasi esakip</title>
        <script src="<?php echo base_url(); ?>../assets/js/angularjs.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.9.13/xlsx.full.min.js"></script>
        <script type="text/javascript" src="//unpkg.com/angular-js-xlsx/angular-js-xlsx.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/esakip.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        
        <style>
            .inputan{
                border: solid #00000014 1px;
                line-height: 2;
                width: 100%;
                padding: 6px;
            }
            td{
                padding: 4px !important;
            }
            .tengah{
                text-align: center;
                vertical-align: middle !important;
            }
            .gambar{
                width: 75px;
                float: left;
                margin-top: -13px;
            }
        </style>
	</head>

	<body ng-app="MyApp" ng-init="baseUrl = '<?php echo base_url(); ?>'">
        <div class="jumbotron">
            <img src="<?php echo base_url(); ?>../assets/img/config.png" class="gambar">
        <h1>Configurasi E-Sakip</h1>
        </div>
        
		<div ng-controller="myController" >
            <div class="container-fluid" > 
                <label for="exel" class="btn btn-primary">Upload</label>
                <js-xls onread="read" onerror="error" id="exel" style="display:none"></js-xls>
                <a href="<?php echo base_url(); ?>../assets/doc/skpd.xlsx">
                    <img src="<?php echo base_url(); ?>../assets/img/excel.png" style="width: 45px;float: right;">
                </a>
            </div>
            <div class="container-fluid">
                <div class="container-12">
                    <table class="table table-bordered table-hover" >
                        <thead class="thead-dark">
                            <th>No</th>
                            <th>Nama SKPD</th>
                            <th>Level</th>
                            <th>Kab.</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <tr ng-repeat="data in dataSkpd track by $index" >
                                <td class="tengah">{{$index+1}}</td>
                                <td style="vertical-align: middle">{{data.skpd}}</td>
                                <td>
                                    <select class="form-control inputan" ng-model="data.level" ng-change="rubah('level',data.level,$index)">
                                        <option value="skpd">skpd</option>
                                        <option value="admin">admin</option>
                                    </select>
                                </td>
                                <td class="tengah"> 
                                    <input type="radio" name="level" value="admin_kab"  ng-model="data.level_lap" ng-change="rubah('level_lap',data.level_lap,$index,'admin')" > 
                                </td>
                                <td>
                                    <input type="text" ng-model="data.username" ng-change="rubah('username',data.username,$index)" class="inputan" ng-blur="cekUser(data.username,$index)">
                                    <!-- {{data.username}} -->
                                </td>
                                <td>
                                    <!-- {{data.password}} -->
                                    <input type="text" ng-model="data.password" ng-change="rubah('password',data.password,$index)" class="inputan">
                                </td>
                                <td class="tengah">
                                    <span ng-click="hapus($index)" style="padding: 12px; cursor:pointer">
                                        &times;
                                    </span>
                                </td>
                            </tr>
                            <tr ng-if="dataSkpd == undefined || dataSkpd.length == 0">
                               <td colSpan="7" style="text-align: center;font-size: 16pt;color: #8080806b;">
                                   <i>Data kosong</i>
                               </td> 
                            </tr>
                        </tbody>
                    </table>
                    <div class="float-right">
                            <button class="btn btn-info" ng-click="simpan()">Simpan</button>
                    </div>
                    
                </div>
            </div>

            <div class="notif animate__animated animate__bounceInRight" ng-if="notif">
                <div>
                    {{pesan_notif}}
                    <!-- Data Sukses ! -->
                </div>
            </div>

        </div>
       
        

	</body>

	<script type="text/javascript">
		angular.module('MyApp', ['angular-js-xlsx'])
		.controller('myController', function($scope,$http) {
            
            $scope.notif = false
            let arrSKPD = []
            $scope.cek = false
            $scope.notify = function(pesan){
                $scope.pesan_notif = pesan;
                $scope.notif = true;
                setTimeout(function() {
                    $scope.$apply(function(){
                        $scope.notif = false;
                    })
                    
                }, 2000);
            }

            // $scope.notify()
            $scope.md5 = function(val){
                let hash =  btoa(val+'user')//btoa(val);
                console.log(hash)
                return hash;
            }

            $scope.hapus = function(i){
                $scope.dataSkpd.splice(i,1);
                $scope.notify('Data dihapus!');
            }

            $scope.simpan = function(){
                $scope.cek = false
                arrSKPD.forEach((val,key)=>{
                    
                    if(val.username == "" || val.password == ""){ 
                        // console.log(val.username)
                        $scope.cek = true
                    }
                });
                if(!$scope.cek){
                    arrSKPD.forEach((val,key)=>{
                        val.password = $scope.md5(val.password)
                        $scope.tambah('tabel_skpd',val)
                        // console.log(val)
                    });
                }else{
                    $scope.notify("username dan password tidak boleh kosong");
                    // console.log(arrSKPD)
                }
                // console.log($scope.cek)
            }

            $scope.cekUser = function(data,i){
                
                $scope.dataSkpd[i].username = data.replace(/\s/g, '');
                arrSKPD.forEach((val,key)=>{
                    if(key != i){
                        if(val.username.toLowerCase() == data.toLowerCase()){
                            $scope.notify("username tidak boleh sama")
                            $scope.dataSkpd[i].username = '';
                            // $scope.arrSKPD[i].username = '';
                        }
                    }
                    
                })
            }
            
            $scope.rubah = function(field,data, i,admin = null){
                // console.log(arrSKPD[i][field])
                // $scope.$apply(function(){
                    // $scope.cek = false
                    if(admin != 'admin'){
                   
                        // if($scope.data[field] != "undefined"){
                            arrSKPD[i][field] = data;//$scope.level;
                        // }
                    }else{
                        arrSKPD.forEach((val,key)=>{
                            if(key != i){
                                arrSKPD[key][field] = ''
                            }
                        })
                    }
                // })
            }

            // console.log($scope.baseUrl)

            $scope.tambah = function(tabel,inputan){
                    $http.post($scope.baseUrl+"Api/post/"+tabel,inputan) //untuk badan web
                    // $http({ //untuk luar badan web
                    //     headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    //     url: $scope.baseUrl+"Api/post/"+tabel,
                    //     method: "POST",
                    //     data    : inputan
                    // })
                    .then((data)=>{
                        $scope.notify('Data sukses tersimpan !')
                        // console.log(data);
                        // $scope.tampilData(tabel);
                        setTimeout(() => {
                            $scope.$apply(function(){
                                location.reload();
                            })
                            
                        }, 1000);
                    },(error)=>{
                        // alert("ada kesalahan");
                        console.log(error); 
                    })
                }

			$scope.read = function (workbook) {
                $scope.dataSkpd = []
                arrSKPD = []
				var headerNames = XLSX.utils.sheet_to_json( workbook.Sheets[workbook.SheetNames[0]], { header: 1 })[0];
				var data = XLSX.utils.sheet_to_json( workbook.Sheets[workbook.SheetNames[0]]);
                let user;
				for (var row in data)
				{
                    let r = Math.random().toString(36).substring(7);
                    user = 'user_'+data[row].skpd.split(' ')[0].substr(0,3)+data[row].skpd.split(' ')[1]
                    $scope.$apply(function() {
                        arrSKPD.push(Object.assign(data[row],{'level':'skpd','username':user.toLowerCase(),'password':r.toUpperCase(),'level_lap':''}))
                        $scope.dataSkpd.push(Object.assign(data[row],{'level':'skpd','username':user.toLowerCase(),'password':r.toUpperCase(),'level_lap':''}))
                    });
                   
                   
                }
                $scope.$apply(function(){
                    $scope.notify('Import Sukses !');
                })
                
                console.log($scope.dataSkpd)

			}

			$scope.error = function (e) {
				console.log(e);
			}
		});
	</script>

</html>
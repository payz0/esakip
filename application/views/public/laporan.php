<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SAKIP Dokumen</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>
    <link href="<?php echo base_url(); ?>../assets/img/favicon.png" rel="icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- <link href="<?php echo base_url(); ?>../assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="<?php echo base_url(); ?>../assets/css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="<?php echo base_url(); ?>../assets/js/ui-bootstrap-tpls-0.12.1.min.js"></script>
    <style>
    .tengah{
        vertical-align: middle !important;
        text-align: center;
    }
    #tab3d{
        box-shadow: 0px 0px 15px 4px inset #b7b7b7;
        border: 10px solid #f8f9ff;
        background:white;
      }
    #judulFrame{
      background: #22242a;
      top: 0px;
      color: white;
      font-size: 10pt;
      padding: 4px;
      width: 100%;
      position: absolute;
      left: 0px;
    }
    #showFrame{
      z-index: 4;
      position: absolute;
      left: 0px;
      margin: 0 auto;
      right: 0;
      top: 1%;
      /* height:70%; */
      /* min-height: 80%; */
      padding: 1px 0;
      background: #efefef;
      width: 70%;
      box-shadow: 0px 0px 4px 0px black;
    }
    #z{

      cursor:pointer;
      transition:all 200ms;   
    }
    #z:hover{
      background: #f3f3f36b;
      box-shadow: 1px -4px 13px -5px inset #757474;
    }
    </style>
</head>
<body ng-app="MyAPP" style="    background: #d0d0d0;">
    
    <div style="overflow:auto" ng-controller="controLap" ng-init="posisi = <?php echo $posisi; ?>; baseUrl = '<?php echo base_url();?>'">
                <div class="row">
                    <div class="container" style="background: #d6d5d5;box-shadow: 0px 0px 15px 6px darkgrey;margin-top: 30px;">
                    <h3 style="text-align: center;color: #7d7d7d;">Dokumen E-SAKIP Tahun <?php echo $tahun; ?></h3>
                        <div style="display: flex;flex-flow: nowrap;justify-content: space-between;">
                            <div>
                                <label for="">Dokumen :</label>
                                <select  ng-model="posisi" style="padding: 3px;">
                                    <option value="1">RPJMD</option>
                                    <option value="2">RENSTRA</option>
                                    <option value="3">RKP</option>
                                    <option value="4">PK </option>
                                    <option value="5">LKJIP</option>
                                    <option value="6">RA</option>
                                    <option value="7">IKU</option>
                                </select>
                            </div>
                            <div>
                                
                                <form action="<?php echo base_url()?>pages/laporan/<?php echo $posisi; ?>" method="post">
                                    <label for="">Tahun :</label>
                                    <input type="number" name="tahun" value="<?php echo $tahun;?>" >
                                    <button class="btn btn-secondary btn-xs" type="submit">Tampilkan</button>
                                </form>
                            </div>
                        </div>
                        <?php
                         function cekBerkas($laporan,$id,$tahun,$jenis, $berkas){
                            $laps = array_reverse($laporan);
                            foreach($laps as $key => $lap){
                                // end($laporan);
                                if($lap->id_skpd == $id && $lap->tahun == $tahun && $lap->jenis_lap == $jenis && $lap->$berkas != null){
                                    // $nums++;    
                                    return $lap->$berkas;
                                }
                            }
                          }
                          function cekKab($laporan,$tahun,$jenis, $berkas){
                            foreach($laporan as $num => $lap){
                                if($lap->tahun == $tahun && $lap->jenis_lap == $jenis){
                                    return $lap->$berkas;
                                }
                            }
                          }
                        ?>
                        <table id="tab3d" class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th class="tengah">No</th>
                              <th class="tengah">SKPD</th>
                              <th class="tengah" ng-if="posisi == 1">RPJMD</th>
                              <th class="tengah" ng-if="posisi == 2">RENSTRA</th>
                              <th class="tengah" ng-if="posisi == 3">RKP</th>
                              <th class="tengah" ng-if="posisi == 4">PERJANJIAN KINERJA </th>
                              <th class="tengah" ng-if="posisi == 5">LKJIP</th>
                              <th class="tengah" ng-if="posisi == 6">RENCANA AKSI</th>
                              <th class="tengah" ng-if="posisi == 7">IKU</th>
                            </tr>
                          </thead>
                          <tbody id="skpd">
                          <tr>
                              <td class="tengah">
                              1
                              </td>
                              <td style="text-align:left">
                              Kabupaten
                              </td>
                              
                              
                              <td class="tengah" ng-if="posisi == 1" id="z"  ng-click="berkasOpen('<?php echo cekKab($laporan,$tahun,'kabupaten','doc_renstra') ?>')" >
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                              <td class="tengah" ng-if="posisi == 2" id="z" style="background:grey">
                                  <!-- <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;"> -->
                              </td>
                              <td class="tengah" ng-if="posisi == 3" id="z"  ng-click="berkasOpen('<?php echo cekKab($laporan,$tahun,'kabupaten','doc_rkp') ?>')" >
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                              <td class="tengah" ng-if="posisi == 4" id="z" ng-click="berkasOpen('<?php echo cekKab($laporan,$tahun,'kabupaten','doc_pk') ?>')" >
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                              <td class="tengah" ng-if="posisi == 5" id="z"  ng-click="berkasOpen('<?php echo cekKab($laporan,$tahun,'kabupaten','doc_lkjip') ?>')" >
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                              <td class="tengah" ng-if="posisi == 6" id="z" ng-click="berkasOpen('<?php echo cekKab($laporan,$tahun,'kabupaten','doc_ra') ?>')" >
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                              <td class="tengah" ng-if="posisi == 7" id="z"  ng-click="berkasOpen('<?php echo cekKab($laporan,$tahun,'kabupaten','doc_iku') ?>')" >
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                            </tr>
                          <?php foreach($skpd as $key => $val){ 
                              if($val->level != 'admin'){
                              ?>
                            <tr>
                              <td class="tengah">
                              <?php echo $key+2;?>
                              </td>
                              <td style="text-align:left">
                              <?php echo strtoupper($val->skpd);?>
                              </td>
                              
                              <td ng-if="posisi == 1" id="z" id="z" style="background:grey">
                                  
                              </td>
                              <td class="tengah" ng-if="posisi == 2" id="z" ng-click="berkasOpen('<?php echo cekBerkas($laporan,$val->id_skpd,$tahun,'skpd','doc_renstra') ?>')" >
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                              <td class="tengah" ng-if="posisi == 3" id="z"  ng-click="berkasOpen('<?php echo cekBerkas($laporan,$val->id_skpd,$tahun,'skpd','doc_rkp') ?>')" >
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                              <td class="tengah" ng-if="posisi == 4" id="z" ng-click="berkasOpen('<?php echo cekBerkas($laporan,$val->id_skpd,$tahun,'skpd','doc_pk') ?>')" >
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                              <td class="tengah" ng-if="posisi == 5" id="z"  ng-click="berkasOpen('<?php echo cekBerkas($laporan,$val->id_skpd,$tahun,'skpd','doc_lkjip') ?>')" >
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                              <td class="tengah" ng-if="posisi == 6" id="z" ng-click="berkasOpen('<?php echo cekBerkas($laporan,$val->id_skpd,$tahun,'skpd','doc_ra') ?>')" >
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                              <td class="tengah" ng-if="posisi == 7" id="z"  ng-click="berkasOpen('<?php echo cekBerkas($laporan,$val->id_skpd,$tahun,'skpd','doc_iku') ?>')" >
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                            </tr>
                            <?php }} ?>
                          </tbody>
                        </table>
                        <div style="text-align:center">
                            <a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>">Kembali</a>
                        </div>
                    </div>
                </div>
                
                                <!-- dialogbox -->
                            <div ng-if="iframe" id="showFrame" style="background:#2f323a; height:auto;    top: 15%;"  >
                                <div id="judulFrame">Berkas Tahun <?php echo $tahun; ?>
                                    <a href="#" ng-click="iframeOpen()" style="float:right;margin-right:5px">&times;</a>
                                </div>
                                    <iframe ng-src="{{urlBerkas(lapDoc)}}" frameborder="0"style="width: 99%;margin-top: 20px;min-height: 340px;" ></iframe>
                                    <div style="text-align:center;padding: 10px;">
                                        <span class="btn btn-info btn-xs" ng-click="iframeOpen()">Close</span>  
                                    </div>
                            </div>
                            <!-- batas box -->
                      </div>  

                     
            <script>

                let app = angular.module("MyAPP",['ui.bootstrap'])
                .config(['$qProvider', function($qProvider,$sceProvider){
                    $qProvider.errorOnUnhandledRejections(false);
                    // $sceProvider.enabled(false);
                }])
                app.controller("controLap", function ($scope,$http,$q,$sce){
                    $scope.baseUrl;
       
                    $scope.berkasOpen = function(data=null){
                    // $scope.$applyAsync(()=>{
                        if(data != ''){
                            $scope.lapDoc = data
                            $scope.iframe = !$scope.iframe
                        }else{
                            alert('Belum ada dokumen')
                        }
                        
                    // })
                    }
                    $scope.iframeOpen = function(){
                        $scope.iframe = !$scope.iframe;
                    }
                    $scope.urlBerkas = function(file){
                        if(file != null){
                            return $sce.trustAsResourceUrl($scope.baseUrl+'../assets/berkas/'+file)
                        }
                    }

                    // $scope.change = function($event) {
                    //     setTimeout(() => {
                    //         $scope.$applyAsync(()=>{
                    //             angular.element($event.target.form).triggerHandler('submit');
                    //         });
                    //     }, 100);
                    // };
                })
            </script>
</body>
</html>
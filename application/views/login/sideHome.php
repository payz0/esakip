<section id="main-content" ng-init="allLaporan = <?php echo htmlspecialchars(json_encode($dataAll['laporan'])); ?>">
        <section class="wrapper" id="wrap">
          <?php
          $chart = $dataAll['ra'];
          $triwulan1a = 0;
          $triwulan1b = 0;
          $triwulan2a = 0;
          $triwulan2b = 0;
          $triwulan3a = 0;
          $triwulan3b = 0;
          $triwulan4a = 0;
          $triwulan4b = 0;
          foreach($chart as $data){
            if($data->triwulan == 1){
              if(date('m',strtotime($data->tgl)) < 3 || date('d',strtotime($data->tgl)) < 15 && date('m',strtotime($data->tgl)) == 3){
                $triwulan1a++;
              }else{
                $triwulan1b++;
              }
            }elseif($data->triwulan == 2){
              if(date('m',strtotime($data->tgl)) > 3 && date('m',strtotime($data->tgl)) < 6 || date('d',strtotime($data->tgl)) < 15 && date('m',strtotime($data->tgl)) == 6){
                $triwulan2a++;
              }else{
                $triwulan2b++;
              }
            }elseif($data->triwulan == 3){
              if(date('m',strtotime($data->tgl)) > 6 && date('m',strtotime($data->tgl)) < 9 || date('d',strtotime($data->tgl)) < 15  && date('m',strtotime($data->tgl)) == 9){
                $triwulan3a++;
              }else{
                $triwulan3b++;
              }
            }else{
              if(date('m',strtotime($data->tgl)) < 12 && date('m',strtotime($data->tgl)) > 9 || date('d',strtotime($data->tgl)) < 15 && date('m',strtotime($data->tgl)) == 12 ){
                $triwulan4a++;
              }else{
                $triwulan4b++;
              }
            }
            // echo date('d',strtotime($data->tgl))."<br/>";
           
            
          }
          // echo 'laju 1 '.$triwulan1a."<br/>";
          // echo 'laju 2 '.$triwulan2a."<br/>";
          // echo 'laju 3 '.$triwulan3a."<br/>";
          // echo 'laju 4 '.$triwulan4a."<br/>";
          // echo 'lemot 1 '.$triwulan1b."<br/>";
          // echo 'lemot 2 '.$triwulan2b."<br/>";
          // echo 'lemot 3 '.$triwulan3b."<br/>";
          // echo 'lemot 4 '.$triwulan4b."<br/>";
          if($this->session->userdata('level_lap') != 'admin_kab' ){
            $jum1 = $dataAll['jumPeg'] != 0 ? round(($triwulan1a+$triwulan1b)/($dataAll['jumPeg']/100),2) : 0;
            $jum2 = $dataAll['jumPeg'] != 0 ?  round(($triwulan2a+$triwulan2b)/($dataAll['jumPeg']/100),2) : 0;
            $jum3 = $dataAll['jumPeg'] != 0 ?  round(($triwulan3a+$triwulan3b)/($dataAll['jumPeg']/100),2) : 0;
            $jum4 = $dataAll['jumPeg'] != 0 ?  round(($triwulan4a+$triwulan4b)/($dataAll['jumPeg']/100),2) : 0;
            $triwulan1a = $dataAll['jumPeg'] != 0 ?  round($triwulan1a/($dataAll['jumPeg']/100),2) : 0;
            $triwulan1b = $dataAll['jumPeg'] != 0 ?  round($triwulan1b/($dataAll['jumPeg']/100),2) : 0;
            $triwulan2a = $dataAll['jumPeg'] != 0 ?  round($triwulan2a/($dataAll['jumPeg']/100),2) : 0;
            $triwulan2b = $dataAll['jumPeg'] != 0 ?  round($triwulan2b/($dataAll['jumPeg']/100),2) : 0;
            $triwulan3a = $dataAll['jumPeg'] != 0 ?  round($triwulan3a/($dataAll['jumPeg']/100),2) : 0;
            $triwulan3b = $dataAll['jumPeg'] != 0 ?  round($triwulan3b/($dataAll['jumPeg']/100),2) : 0;
            $triwulan4a = $dataAll['jumPeg'] != 0 ?  round($triwulan4a/($dataAll['jumPeg']/100),2) : 0;
            $triwulan4b = $dataAll['jumPeg'] != 0 ?  round($triwulan4b/($dataAll['jumPeg']/100),2) : 0;
          }
          // echo "<br/>";
          // echo $triwulan2a;
          // echo "<br/>";
          // echo $triwulan2b;

          ?>
          <!-- isi   -->
          <div class="row">
            <div class="col-lg-9 main-chart">
              <div class="border-head">
                <h3>Dashboard </h3>
              </div>
              <!--CUSTOM CHART START -->
              <!-- chart -->
          <?php if($this->session->userdata('level_lap') != 'admin_kab'){ ?>
             <div class="row"> 
             <div class="col-md-3 col-sm-3 mb">
                <div class="grey-panel pn">
                  <div class="grey-header">
                    <h5>TRIWULAN I <?php echo Date("Y"); ?></h5>
                  </div>
                  <canvas id="triwulan1" height="120" width="120"></canvas>
                  <script>
                    var doughnutData = [{
                        value: <?php echo $triwulan1a; ?>,
                        color: "#1c9ca7"
                      },
                      {
                        value: <?php echo $triwulan1b; ?>,
                        color: "#f68275"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("triwulan1").getContext("2d")).Doughnut(doughnutData);
                  </script>
                  <footer>

                    <div >
                      <h5><?php echo $jum1; ?>% Selesai</h5>
                    </div>
                    <div >
                    fast: <?php echo $triwulan1a; ?>% , dan 
                      late :<?php echo $triwulan1b; ?>% 
                    </div>
                  </footer>
                </div>
              </div>

              <div class="col-md-3 col-sm-3 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h5>TRIWULAN II <?php echo Date("Y"); ?></h5>
                  </div>
                  <canvas id="triwulan2" height="120" width="120"></canvas>
                  <script>
                    var doughnutData = [{
                        value: <?php echo $triwulan2a; ?>,
                        color: "#1c9ca7"
                      },
                      {
                        value: <?php echo $triwulan2b; ?>,
                        color: "#f68275"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("triwulan2").getContext("2d")).Doughnut(doughnutData);
                  </script>
                  <footer>
                    <div >
                      <h5><?php echo $jum2; ?>% Selesai</h5>
                    </div>
                    <div >
                    fast: <?php echo $triwulan2a; ?>% , dan 
                      late :<?php echo $triwulan2b; ?>% 
                    </div>
                  </footer>
                </div>
              </div>

              <div class="col-md-3 col-sm-3 mb">
                <div class="grey-panel pn">
                  <div class="grey-header">
                    <h5>TRIWULAN III <?php echo Date("Y"); ?></h5>
                  </div>
                  <canvas id="triwulan3" height="120" width="120"></canvas>
                  <script>
                    var doughnutData = [{
                        value: <?php echo $triwulan3a; ?>,
                        color: "#1c9ca7"
                      },
                      {
                        value: <?php echo $triwulan3b; ?>,
                        color: "#f68275"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("triwulan3").getContext("2d")).Doughnut(doughnutData);
                  </script>
                  <footer>
                    
                    <div >
                      <h5><?php echo $jum3; ?>% Selesai</h5>
                    </div>
                    <div >
                    fast: <?php echo $triwulan3a; ?>% , dan 
                      late :<?php echo $triwulan3b; ?>% 
                    </div>
                  </footer>
                </div>
              </div>

              <div class="col-md-3 col-sm-3 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h5>TRIWULAN IV <?php echo Date("Y"); ?></h5>
                  </div>
                  <canvas id="triwulan4" height="120" width="120"></canvas>
                  <script>
                    var doughnutData = [{
                        value: <?php echo $triwulan4a; ?>,
                        color: "#1c9ca7"
                      },
                      {
                        value: <?php echo $triwulan4b; ?>,
                        color: "#f68275"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("triwulan4").getContext("2d")).Doughnut(doughnutData);
                  </script>
                  <footer>
                    
                    <div >
                      <h5><?php echo $jum4; ?>% Selesai</h5>
                    </div>
                    <div >
                    fast: <?php echo $triwulan4a; ?>% , dan 
                      late :<?php echo $triwulan4b; ?>% 
                    </div>
                  </footer>
                </div>
              </div>
          </div>
      <?php } ?>
         
              
              <div class="row mt">
                <!-- SERVER STATUS PANELS -->
                <div class="col-md-12  mb">
                  <div style="text-align:right;background: whitesmoke;padding-top: 7px;padding-right: 7px;">
                    Tahun : <input type="number" name="tahun" placeholder="tahun" ng-model="tahun" ng-change="cekTriwulan()">
                  </div>
                  <div class="grey-panel pn donut-chart" style="height:auto;background: white;;border: 8px solid whitesmoke;">
                    <div class="grey-header">
                      <h5>DAFTAR E-Sakip Tahun {{tahun}}</h5>
                    </div>
                    
                    <div style="overflow:auto">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th class="tengah">No</th>
                              <th class="tengah">SKPD</th>
                              <th class="tengah">RPJMD</th>
                              <th class="tengah">RENSTRA</th>
                              <th class="tengah">RKP</th>
                              <th class="tengah">PK </th>
                              <th class="tengah">LKJIP</th>
                              <th class="tengah">RA</th>
                              <th class="tengah">IKU</th>
                            </tr>
                          </thead>
                          <tbody id="skpd">
                          <tr>
                              <td>
                              1
                              </td>
                              <td style="text-align:left">
                              Kabupaten
                              </td>
                              
                              
                              <td id="z" class="{{homeTotal('kabupaten','doc_renstra').doc_renstra != null ? 'bg-danger':''}}" ng-click="berkasOpen(homeTotal('kabupaten','doc_renstra').doc_renstra)" >
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                              <td id="z" id="z">
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                              <td id="z" class="{{homeTotal('kabupaten','doc_rkp').doc_rkp != null ? 'bg-danger':''}}" ng-click="berkasOpen(homeTotal('kabupaten','doc_rkp').doc_rkp)" >
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                              <td id="z" class="{{homeTotal('kabupaten','doc_pk').doc_pk != null ? 'bg-danger':''}}" ng-click="berkasOpen(homeTotal('kabupaten','doc_pk').doc_pk)" >
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                              <td id="z" class="{{homeTotal('kabupaten','doc_lkjip').doc_lkjip != null ? 'bg-danger':''}}" ng-click="berkasOpen(homeTotal('kabupaten','doc_lkjip').doc_lkjip)" >
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                              <td id="z" class="{{homeTotal('kabupaten','doc_ra').doc_ra != null ? 'bg-danger':''}}" ng-click="berkasOpen(homeTotal('kabupaten','doc_ra').doc_ra)" >
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                              <td id="z" class="{{homeTotal('kabupaten','doc_iku').doc_iku != null ? 'bg-danger':''}}" ng-click="berkasOpen(homeTotal('kabupaten','doc_iku').doc_iku)" >
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                            </tr>
                          <?php foreach($dataAll['skpd'] as $key => $val){ ?>
                            <tr>
                              <td>
                              <?php echo $key+2;?>
                              </td>
                              <td style="text-align:left">
                              <?php echo strtoupper($val->skpd);?>
                              </td>
                              
                              <td id="z" id="z">
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                              <td id="z" class="{{homeTotal('skpd','doc_renstra',<?php echo $val->id_skpd; ?>).doc_renstra != null ? 'bg-danger':''}}" ng-click="berkasOpen(homeTotal('skpd','doc_renstra',<?php echo $val->id_skpd; ?>).doc_renstra)" >
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                              <td id="z" class="{{homeTotal('skpd','doc_rkp',<?php echo $val->id_skpd; ?>).doc_rkp != null ? 'bg-danger':''}}" ng-click="berkasOpen(homeTotal('skpd','doc_rkp',<?php echo $val->id_skpd; ?>).doc_rkp)" >
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                              <td id="z" class="{{homeTotal('skpd','doc_pk',<?php echo $val->id_skpd; ?>).doc_pk != null ? 'bg-danger':''}}" ng-click="berkasOpen(homeTotal('skpd','doc_pk',<?php echo $val->id_skpd; ?>).doc_pk)" >
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                              <td id="z" class="{{homeTotal('skpd','doc_lkjip',<?php echo $val->id_skpd; ?>).doc_lkjip != null ? 'bg-danger':''}}" ng-click="berkasOpen(homeTotal('skpd','doc_lkjip',<?php echo $val->id_skpd; ?>).doc_lkjip)" >
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                              <td id="z" class="{{homeTotal('skpd','doc_ra',<?php echo $val->id_skpd; ?>).doc_ra != null ? 'bg-danger':''}}" ng-click="berkasOpen(homeTotal('skpd','doc_ra',<?php echo $val->id_skpd; ?>).doc_ra)" >
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                              <td id="z" class="{{homeTotal('skpd','doc_iku',<?php echo $val->id_skpd; ?>).doc_iku != null ? 'bg-danger':''}}" ng-click="berkasOpen(homeTotal('skpd','doc_iku',<?php echo $val->id_skpd; ?>).doc_iku)" >
                                  <img src="<?php echo base_url()?>../assets/img/zoom.svg" style="width: 14px;">
                              </td>
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>  
                  </div>
                </div>   
              </div>
            </div>
            <!-- dialogbox -->
                     <div ng-if="iframe" id="showFrame" style="background:#2f323a; height:auto;    top: 15%;position:fixed"  >
                        <div id="judulFrame">Dokumen E-sakip
                            <a href="#" ng-click="iframeOpen()" style="float:right;margin-right:5px">&times;</a>
                        </div>
                            <iframe ng-src="{{urlBerkas(lapDoc)}}" frameborder="0"style="width: 99%;margin-top: 20px;min-height: 340px;" ></iframe>
                            <div style="text-align:center;margin-top: 17px;">
                                <span class="btn btn-info btn-xs" ng-click="iframeOpen()">Close</span>  
                            </div>
                    </div>
                    <!-- batas box -->
            <div class="col-lg-3">
              <div class="panel terques-chart">
                <div class="panel-body">
                  <div class="chart">
                    <div class="centered">
                      <h4><span>History Aktivitas</span></h4>
                      <ul style="text-align: justify;
    max-height:500px;
    overflow:auto;
    font-size: 8pt;
    background: white;
    padding: 2px 30px;
    border: 1px solid whitesmoke;">
                          <?php foreach($dataAll['history'] as $val){ ?>
                          <li style="padding:4px; border-bottom:1px dotted black"><?php echo '<b style="color:blue">'.$val->oleh.'</b> <i style="font-size: 9pt;color: #8a9cd0;"> ... '.$val->history.'</i> ..['.$this->mcrud->jam($val->tgl).' lalu ]'; ?></li>
                          <?php } ?>
                      </ul>
                      
                    </div>
                    <br>
                  </div>
                </div>
              </div>

            </div>
            <!-- /col-lg-3 -->
          </div>
          <!-- batas isi -->
      </section>
    </section>
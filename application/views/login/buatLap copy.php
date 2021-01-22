<section id="main-content" ng-init = "allData = <?php echo htmlspecialchars(json_encode($dataAll['laporan'])); ?>; 
                                    dataTanggapan = <?php echo htmlspecialchars(json_encode($dataAll['tanggapan'])); ?>;
                                    id_pegawai = '<?php echo $this->session->userdata('id_peg')?>'"> 
    <section class="wrapper" id="wrap">
            <!-- <div class="row" >
            <div class="col-md-12" id="badan">
                <h5 style="top: -10px;" id="judul"></h5> -->
        <div class="container-fluid content-side" >
            <b class="judul">Rencana Aksi</b>
            <div class="row" style="margin-top:20px;padding: 20px 0px">
                <div class="col-md-12">
                    <?php
                    $nama = str_replace(' ','_',explode(',',$this->session->userdata('nama'))[0]);
                     echo form_open_multipart('../login/upload/berkas/berkas/rencana_aksi_'.$nama.'_/buatLap');?>   
                    <div style="text-align:right" class="tools">
                        <label for="">Tahun</label>
                        <input type="number" name="tahun" placeholder="tahun" ng-model="tahun" ng-change="cekTriwulan()">
                        
                    </div>
                    
                    <div ng-show="ajuanIKU" class="animate__animated animate__bounceInDown animate__faster"> 

                        <table >
                            <tr style="border:0px solid ">
                                <td style="border:0px solid ">Aksi</td>
                                <td style="border:0px solid ">
                                    <input class="form-control" type="text" placeholder="Rencana Aksi" name="aksi">
                                </td>
                            </tr>
                            <tr style="border:0px solid ">
                                <td style="border:0px solid ">Indikator</td>
                                <td style="border:0px solid ">
                                    <input class="form-control" type="text" placeholder="Indikator" name="laporan">
                                </td>
                            </tr>
                            <tr style="border:0px solid ">
                                <td style="border:0px solid ">Capaian</td>
                                <td style="border:0px solid ">
                                    <input class="form-control" type="text" placeholder="Pencapaian"  name="capaian">
                                </td>
                            </tr>
                            <tr style="border:0px solid ">
                                <td style="border:0px solid ">Hasil Evaluasi</td>
                                <td style="border:0px solid ">
                                    <input class="form-control" type="text" placeholder="Hasil Evaluasi"  name="evaluasi">
                                </td>
                            </tr>
                            <tr style="border:0px solid ">
                                <td style="border:0px solid ">Hambatan</td>
                                <td style="border:0px solid ">
                                    <input class="form-control" type="text" placeholder="Hambatan"  name="hambatan">
                                </td>
                            </tr>
                            <tr style="border:0px solid ">
                                <td style="border:0px solid ">Strategi Pencapaian</td>
                                <td style="border:0px solid ">
                                    <input class="form-control" type="text" placeholder="Strategi pencapaian"  name="strategi">
                                </td>
                            </tr>
                            <tr style="border:0px solid ">
                                <td style="border:0px solid ">Triwulan</td>
                                <td style="border:0px solid ">
                                    <select style="max-width:150px" class="form-control" style="padding: 2px;" name="triwulan" ng-model="dataTri" ng-init="dataTri = triwulan" ng-change="cekTriwulan(dataTri);cekAjuan()">
                                        <option value="">-- pilih triwulan --</option>
                                        <option value="1">Triwulan I</option>
                                        <option value="2">Triwulan II</option>
                                        <option value="3">Triwulan III</option>
                                        <option value="4">Triwulan IV</option>
                                    </select>
                                </td>
                            </tr>
                            <tr style="border:0px solid ">
                                <td style="border:0px solid ">Dokumen</td>
                                <td style="border:0px solid ">
 
                                <input type="file" name="file" id="iku" onchange="angular.element(this).scope().cekUpIki()">
                                </td>
                            </tr>
                        </table>
                        <div>
                            <span ng-show="uploadIki" class="btn btn-primary btn-sm" ng-click="nextLanjut = true">Ajukan</span>
                            <span ng-if="!uploadIki" class="btn btn-primary btn-sm" ng-click="alert('Dokumen belum di tentukan')">Ajukan</span>
                            <span class="btn btn-danger btn-sm" ng-click="ajuanIKU = !ajuanIKU">Batal</span>
                        </div>
                        <!-- <div ng-if="uploadIki">
                            <button class="btn btn-primary btn-sm" stype="submit">Simpan</button>
                            <span class="btn btn-danger btn-sm" ng-click="ajuanIKU = !ajuanIKU">Batal</span>
                        </div> -->
                        <div ng-show="nextLanjut " class="col-md-4" style="position: fixed;top: 0px;    background: #d0d0d0;color: #585858;padding: 20px;margin: 0 auto;left: 0px;right: 0px;box-shadow: 2px 3px 4px -1px black;text-align: center;">
                            <div style="    position: absolute;background: #ff8d00;left: 0px;top: 0px;width: 100%;padding: 2px;">
                                Peringatan !
                            </div>
                            <div style="margin-top: 15px;">
                                <b>Hanya ingin memastikan</b> <br>
                                Apakah anda akan meinput data untuk tahun <b style="font-size:!2pt; color:black">{{tahun}}</b> dan  <b style="font-size:!2pt; color:black">triwulan ke {{dataTri}}</b>
                               <br><br><br>
                                <div >
                                    <button class="btn btn-primary btn-sm" type="submit">Ya</button>
                                    <span class="btn btn-danger btn-sm" ng-click="nextLanjut = false">Tidak</span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    </form>
                    <div style="overflow:auto">
                        <button ng-show="!ajuanIKU" class="btn btn-info btn-sm" ng-click="ajuanIKU = !ajuanIKU">Ajuan Rencana Aksi</button> <br>
                        
                        <br>
                        <table >
                            <thead class="bg-primary">
                                <tr>
                                    <th class="tengah">No
                                </th>
                                    <th class="tengah">Triwulan</th>
                                    <th class="tengah">Aksi</th>
                                    <th class="tengah">Indikator</th>
                                    <th class="tengah">Capaian</th>
                                    <th class="tengah">Hasil Evaluasi</th>
                                    <th class="tengah">Hambatan</th>
                                    <th class="tengah">Strategi</th>
                                    <!-- <th class="tengah">Berkas</th> -->
                                    <th class="tengah">Tgl</th>
                                    <th class="tengah">Status</th>
                                    <?php if($this->session->userdata('esselon') != "esselon II"){?>
                                    <th class="tengah">Tanggapan</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody style="text-align:center">
                                <tr>
                                    <td>1</td>
                                    <td>I</td>
                                    <td>
                                    {{dataIki(tahun,1)[1].aksi}}
                                    </td>
                                    <td style="text-align:justify">{{dataIki(tahun,1).laporan}}
                                    </td>
                                    <td>{{dataIki(tahun,1).capaian}}
                                    </td>
                                    <td>{{dataIki(tahun,1).evaluasi}}</td>
                                    <td>{{dataIki(tahun,1).hambatan}}</td>
                                    <td>{{dataIki(tahun,1).strategi}}</td>
                                    <!-- <td>
                                        
                                        <div ng-show="iframe" id="showFrame" class="animate__animated animate__bounceIn">
                                            <div id="judulFrame">Berkas Rencana Aksi
                                                <a href="#" ng-click="iframe = false" style="float:right;margin-right:5px">&times;</a>
                                            </div>
                                            <iframe ng-src="{{urlBerkas(dataIki(tahun,1).berkas)}}" frameborder="0" style="width: 99%;margin-top: 20px;min-height: 220px;"></iframe>
                                            <div style="    box-shadow: 0px 3px 8px -4px inset black;padding: 5px;background: white;">
                                                Tanggapan :
                                                <o style="text-align:left;" >
                                                    <li style="margin-left:10px" ng-repeat="res in dataTanggapan "  ng-if="res.id_lap == dataIki(tahun,1).id_lap">[{{res.tgl | date : "dd/MMM/y"}}]: Kata pejabat <b>{{res.jabatan}}, <i>"{{res.tanggapan}}.."</i> </b></li>
                                                </ol>
                                                <br>
                                                <button class="btn btn-info btn-sm" ng-click="iframe = false">Ok</button>
                                            </div>
                                            <br>
                                        </div>
                                        <span ng-show="dataIki(tahun,1).berkas != undefined"  class="btn btn-secondary btn-xs">
                                           <img src="<?php echo base_url() ?>../assets/img/doc.png" style="width: 16px;"> 
                                           
                                        </span>
                                    </td> -->
                                    <td>{{dataIki(tahun,1).tgl | date : "dd/M/y"}}</td>
                                    <td>
                                        <span ng-if="dataIki(tahun,1).status != 'tolak' && dataIki(tahun,1).status != 'terima'">
                                            {{dataIki(tahun,1).status}}
                                        </span>
                                        <img ng-if="dataIki(tahun,1).status == 'tolak'" src="<?php echo base_url() ?>../assets/img/warning.png" alt="" style="width: 20px;">
                                        <img ng-if="dataIki(tahun,1).status == 'terima'" src="<?php echo base_url() ?>../assets/img/ok2.png" alt="" style="width: 20px;">
                                    </td>
                                    <?php if($this->session->userdata('esselon') != "esselon II"){?>
                                    <td>
                                        <span  ng-show="dataIki(tahun,1).berkas != undefined"  class="btn btn-default btn-xs" ng-click="docnya = dataIki(tahun,1).berkas;tri=1;iframe = true">
                                            <img src="<?php echo base_url() ?>../assets/img/respon.png" alt="" style="width: 20px">
                                            <span>{{(dataTanggapan | filter:{id_lap:dataIki(tahun,1).id_lap}).length}}</span>
                                        </span>
                                        <button ng-show="dataIki(tahun,1).berkas != undefined" class="btn btn-default btn-xs" ng-click="hapusLaporan(dataIki(tahun,1).id_lap)">&times;</button>
                                    </td>
                                    <?php } ?>
                                </tr>
                                <tr >
                                    <td>2</td>
                                    <td>II</td>
                                    <td>{{dataIki(tahun,2).aksi}}</td>
                                    <td style="text-align:justify">{{dataIki(tahun,2).laporan}}</td>
                                    <td>{{dataIki(tahun,2).capaian}}</td>
                                    <td>{{dataIki(tahun,2).evaluasi}}</td>
                                    <td>{{dataIki(tahun,2).hambatan}}</td>
                                    <td>{{dataIki(tahun,2).strategi}}</td>
                                    <!-- <td>
                                        <div ng-show="iframe2" id="showFrame" class="animate__animated animate__bounceIn">
                                            <div id="judulFrame">Berkas Rencana Aksi
                                                <a href="#" ng-click="iframe2 = false" style="float:right;margin-right:5px">&times;</a>
                                            </div>
                                            <iframe ng-src="{{urlBerkas(dataIki(tahun,2).berkas)}}" frameborder="0" style="width: 99%;margin-top: 20px;min-height: 220px;"></iframe>
                                            <div style="    box-shadow: 0px 3px 8px -4px inset black;padding: 5px;background: white;">
                                                Tanggapan :
                                                <o style="text-align:left;" >
                                                    <li style="margin-left:10px" ng-repeat="res in dataTanggapan" ng-if="res.id_lap == dataIki(tahun,2).id_lap" >[{{res.tgl | date : "dd/MMM/y"}}]: Kata pejabat <b>{{res.jabatan}}, <i>"{{res.tanggapan}}.."</i> </b></li>
                                                </ol>
                                                <br>
                                                <button class="btn btn-info btn-sm" ng-click="iframe2 = false">Ok</button>
                                            </div>
                                            <br>
                                        </div>
                                        <span ng-show="dataIki(tahun,2).berkas != undefined"  class="btn btn-secondary btn-xs">
                                           <img src="<?php echo base_url() ?>../assets/img/doc.png" style="width: 16px;"> 
                                           
                                        </span>

                                    </td> -->
                                    <td>{{dataIki(tahun,2).tgl | date : "dd/M/y"}}</td>
                                    <td>
                                    <span ng-if="dataIki(tahun,2).status != 'tolak' && dataIki(tahun,2).status != 'terima'">
                                            {{dataIki(tahun,2).status}}
                                        </span>
                                        <img ng-if="dataIki(tahun,2).status == 'tolak'" src="<?php echo base_url() ?>../assets/img/warning.png" alt="" style="width: 20px;">
                                        <img ng-if="dataIki(tahun,2).status == 'terima'" src="<?php echo base_url() ?>../assets/img/ok2.png" alt="" style="width: 20px;">
                                    </td>
                                    <?php if($this->session->userdata('esselon') != "esselon II"){?>
                                    <td>
                                        <span ng-show="dataIki(tahun,2).berkas != undefined" class="btn btn-default btn-xs" ng-click="docnya = dataIki(tahun,2).berkas;tri=2;iframe = true">
                                            <img src="<?php echo base_url() ?>../assets/img/respon.png" alt="" style="width: 20px">
                                            <span>{{(dataTanggapan | filter:{id_lap:dataIki(tahun,2).id_lap}).length}}</span>
                                        </span>
                                        <button ng-show="dataIki(tahun,2).berkas != undefined" class="btn btn-default btn-xs" ng-click="hapusLaporan(dataIki(tahun,2).id_lap)">&times;</button>
                                    </td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>III</td>
                                    <td>{{dataIki(tahun,3).aksi}}</td>
                                    <td style="text-align:justify">{{dataIki(tahun,3).laporan}}</td>
                                    <td>{{dataIki(tahun,3).capaian}}</td>
                                    <td>{{dataIki(tahun,3).evaluasi}}</td>
                                    <td>{{dataIki(tahun,3).hambatan}}</td>
                                    <td>{{dataIki(tahun,3).strategi}}</td>
                                    <!-- <td>
                                       
                                        <div ng-show="iframe3" id="showFrame" class="animate__animated animate__bounceIn">

                                            <div id="judulFrame">Berkas Rencana Aksi
                                                <a href="#" ng-click="iframe3 = false" style="float:right;margin-right:5px">&times;</a>
                                            </div>
                                            <iframe ng-src="{{urlBerkas(dataIki(tahun,3).berkas)}}" frameborder="0" style="width: 99%;margin-top: 20px;min-height: 220px;"></iframe>
                                            <div style="    box-shadow: 0px 3px 8px -4px inset black;padding: 5px;background: white;">
                                                Tanggapan :
                                                <o style="text-align:left;" >
                                                    <li style="margin-left:10px" ng-repeat="res in dataTanggapan "  ng-if="res.id_lap == dataIki(tahun,3).id_lap">[{{res.tgl | date : "dd/MMM/y"}}]: Kata pejabat <b>{{res.jabatan}}, <i>"{{res.tanggapan}}.."</i> </b></li>
                                                </ol>
                                                <br>
                                                <button class="btn btn-info btn-sm" ng-click="iframe3 = false">Ok</button>
                                            </div>
                                            <br>
                                        </div>
                                        <span ng-show="dataIki(tahun,3).berkas != undefined"  class="btn btn-secondary btn-xs">
                                           <img src="<?php echo base_url() ?>../assets/img/doc.png" style="width: 16px;"> 
                                         
                                        </span>

                                    </td> -->
                                    <td>{{dataIki(tahun,3).tgl | date : "dd/M/y"}}</td>
                                    <td>
                                    <span ng-if="dataIki(tahun,3).status != 'tolak' && dataIki(tahun,3).status != 'terima'">
                                            {{dataIki(tahun,3).status}}
                                        </span>
                                        <img ng-if="dataIki(tahun,3).status == 'tolak'" src="<?php echo base_url() ?>../assets/img/warning.png" alt="" style="width: 20px;">
                                        <img ng-if="dataIki(tahun,3).status == 'terima'" src="<?php echo base_url() ?>../assets/img/ok2.png" alt="" style="width: 20px;">
                                    </td>
                                    <?php if($this->session->userdata('esselon') != "esselon II"){?>
                                    <td>
                                        <span ng-show="dataIki(tahun,3).berkas != undefined"  class="btn btn-default btn-xs" ng-click="docnya = dataIki(tahun,3).berkas;tri=3;iframe = true">
                                            <img src="<?php echo base_url() ?>../assets/img/respon.png" alt="" style="width: 20px">
                                            <span>{{(dataTanggapan | filter:{id_lap:dataIki(tahun,3).id_lap}).length}}</span>
                                        </span>
                                        <button ng-show="dataIki(tahun,3).berkas != undefined" class="btn btn-default btn-xs" ng-click="hapusLaporan(dataIki(tahun,3).id_lap)">&times;</button>
                                    </td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>IV</td>
                                    <td>{{dataIki(tahun,4).aksi}}</td>
                                    <td style="text-align:justify">{{dataIki(tahun,4).laporan}}</td>
                                    <td>{{dataIki(tahun,4).capaian}}</td>
                                    <td>{{dataIki(tahun,4).evaluasi}}</td>
                                    <td>{{dataIki(tahun,4).hambatan}}</td>
                                    <td>{{dataIki(tahun,4).strategi}}</td>
                                    <!-- <td>
                                        
                                        <div ng-show="iframe" id="showFrame" class="animate__animated animate__bounceIn">
                                            <div id="judulFrame">Berkas Rencana Aksi
                                                <a href="#" ng-click="iframe = false" style="float:right;margin-right:5px">&times;</a>
                                            </div>
                                            <iframe ng-src="{{urlBerkas(dataIki(tahun,4).berkas)}}" frameborder="0" style="width: 99%;margin-top: 20px;min-height: 220px;"></iframe>
                                            <div style="    box-shadow: 0px 3px 8px -4px inset black;padding: 5px;background: white;">
                                                Tanggapan :
                                                <o style="text-align:left;">
                                                    <li style="margin-left:10px" ng-repeat="res in dataTanggapan"  ng-if="res.id_lap == dataIki(tahun,4).id_lap">[{{res.tgl | date : "dd/MMM/y"}}]: Kata pejabat <b>{{res.jabatan}}, <i>"{{res.tanggapan}}.."</i> </b></li>
                                                </ol>
                                                <br>
                                                <button class="btn btn-info btn-sm" ng-click="iframe = false">Ok</button>
                                            </div>
                                            <br>
                                        </div>
                                        <span ng-show="dataIki(tahun,4).berkas != undefined"  class="btn btn-secondary btn-xs">
                                           <img src="<?php echo base_url() ?>../assets/img/doc.png" style="width: 16px;"> 
                                           
                                        </span>

                                    </td> -->
                                    <td>{{dataIki(tahun,4).tgl | date : "dd/M/y"}}</td>
                                    <td>
                                        <span ng-if="dataIki(tahun,4).status != 'tolak' && dataIki(tahun,4).status != 'terima'">
                                            {{dataIki(tahun,4).status}}
                                        </span>
                                        <img ng-if="dataIki(tahun,4).status == 'tolak'" src="<?php echo base_url() ?>../assets/img/warning.png" alt="" style="width: 20px;">
                                        <img ng-if="dataIki(tahun,4).status == 'terima'" src="<?php echo base_url() ?>../assets/img/ok2.png" alt="" style="width: 20px;">
                                    </td>
                                    <?php if($this->session->userdata('esselon') != "esselon II"){?>
                                    <td>
                                        <span ng-show="dataIki(tahun,4).berkas != undefined" class="btn btn-default btn-xs" ng-click="docnya = dataIki(tahun,4).berkas;tri=4; iframe = true">
                                            <img src="<?php echo base_url() ?>../assets/img/respon.png" alt="" style="width: 20px">
                                            <span>{{(dataTanggapan | filter:{id_lap:dataIki(tahun,4).id_lap}).length}}</span>
                                        </span>
                                        <button ng-show="dataIki(tahun,4).berkas != undefined" class="btn btn-default btn-xs" ng-click="hapusLaporan(dataIki(tahun,4).id_lap)">&times;</button>
                                    </td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>

                      <!-- batas -->
                                        <div ng-show="iframe" id="showFrame" class="animate__animated animate__fadeIn">
                                            <div id="judulFrame">Berkas Rencana Aksi
                                                <a href="#" ng-click="iframe = false" style="float:right;margin-right:5px">&times;</a>
                                            </div>
                                            <iframe ng-src="{{urlBerkas(docnya)}}" frameborder="0" style="width: 99%;margin-top: 20px;min-height: 220px;"></iframe>
                                            <div style="    box-shadow: 0px 3px 8px -4px inset black;padding: 5px;background: white;">
                                                Tanggapan :
                                                <o style="text-align:left;">
                                                    <li style="margin-left:10px" ng-repeat="res in dataTanggapan"  ng-if="res.id_lap == dataIki(tahun,tri).id_lap">[{{res.tgl | date : "dd/MMM/y"}}]: Kata pejabat <b>{{res.jabatan}}, <i>"{{res.tanggapan}}.."</i> </b></li>
                                                </ol>
                                                <br>
                                                <button class="btn btn-info btn-sm" ng-click="iframe = false">Ok</button>
                                            </div>
                                            <br>
                                        </div>
                      <!-- batas -->
                    </div>
                </div>
            </div>
        </div>
       
    </section>
</section>


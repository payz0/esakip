<section id="main-content" ng-init="pagination(<?php echo htmlspecialchars(json_encode($dataAll['skpd'])); ?>);
                                    allPegawai = <?php echo htmlspecialchars(json_encode($dataAll['pegawai'])); ?>;
                                    allLaporan = <?php echo htmlspecialchars(json_encode($dataAll['laporan'])); ?>;"> 
    <section class="wrapper">
        <div class="row" >
            <div class="col-lg-11" id="badan" >
                    <h4 style="top:-20px;font-size: 10pt;" id="judul">Laporan Semua SKPD TAHUN {{tahun}}</h4>
                <div id="tab3d">   
                    <div style="text-align:right">
                    Tahun
                    <input type="number" name="tahun" placeholder="tahun" ng-model="tahun" ng-change="cekTriwulan()">
                        <!-- <select style="padding: 2px;" name="triwulan" ng-model="dataTri" ng-init="dataTri = triwulan" ng-change="cekTriwulan(dataTri)">
                            <option value="">-- pilih triwulan --</option>
                            <option value="1">Triwulan I</option>
                            <option value="2">Triwulan II</option>
                            <option value="3">Triwulan III</option>
                            <option value="4">Triwulan IV</option>
                        </select> -->
                    </div>
                    <table class="table table-hover" style="    background: #d6d6d6;box-shadow: 0px -4px 4px -5px inset black;">
                        <tr ng-repeat="skpd in allData ">
                            <td  ng-style="showList ? {'text-align':'center'}:''">
                                <b ng-style="showList ? {'font-weight':'bold','color':'#377ab7','font-size': '18pt'}:''">{{skpd.skpd | uppercase}}</b> <a ng-click="showList = !showList" href="#"><span ng-if="showList" style="float:right">[ &times; ]</span><span ng-if="!showList">[ Daftar Pegawai ]</span></a>
                                <table class="table table-bordered table-hover" ng-if="showList" style="box-shadow: 0px 0px 11px -4px inset black;">
                                    <tr class="bg-primary">
                                        <!-- <th>No</th> -->
                                        <th class="tengah">Nama</th>
                                        <th class="tengah">Triwulan I</th>
                                        <th class="tengah">Triwulan II</th>
                                        <th class="tengah">Triwulan III</th>
                                        <th class="tengah">Triwulan IV</th>
                                    </tr>
                                    <tr ng-repeat="pegawai in allPegawai | orderBy:'+esselon'" ng-if="pegawai.id_skpd == skpd.id_skpd" >
                                        <!-- <td class="tengah">{{$index}}</td> -->
                                        <td style="text-align:left">{{pegawai.nama}}</td>
                                        <td class="tengah"><button ng-click="berkasOpen(allDataIkis(pegawai.id_peg,tahun,1).berkas)" ng-if="allDataIkis(pegawai.id_peg,tahun,1).status == 'terima' || allDataIkis(pegawai.id_peg,tahun,1).berkas != null && pegawai.esselon == 'esselon II'" class="btn btn-default btn-xs"> <img src="<?php echo base_url() ?>../assets/img/doc.png" style="width: 16px;">Berkas</button> </td>
                                        <td class="tengah"><button ng-click="berkasOpen(allDataIkis(pegawai.id_peg,tahun,2).berkas)" ng-if="allDataIkis(pegawai.id_peg,tahun,2).status == 'terima' || allDataIkis(pegawai.id_peg,tahun,2).berkas != null && pegawai.esselon == 'esselon II'" class="btn btn-default btn-xs"> <img src="<?php echo base_url() ?>../assets/img/doc.png" style="width: 16px;">Berkas</button></td>
                                        <td class="tengah"><button ng-click="berkasOpen(allDataIkis(pegawai.id_peg,tahun,3).berkas)" ng-if="allDataIkis(pegawai.id_peg,tahun,3).status == 'terima' || allDataIkis(pegawai.id_peg,tahun,3).berkas != null && pegawai.esselon == 'esselon II'" class="btn btn-default btn-xs"> <img src="<?php echo base_url() ?>../assets/img/doc.png" style="width: 16px;">Berkas</button></td>
                                        <td class="tengah"><button ng-click="berkasOpen(allDataIkis(pegawai.id_peg,tahun,4).berkas)" ng-if="allDataIkis(pegawai.id_peg,tahun,4).status == 'terima' || allDataIkis(pegawai.id_peg,tahun,4).berkas != null && pegawai.esselon == 'esselon II'" class="btn btn-default btn-xs"> <img src="<?php echo base_url() ?>../assets/img/doc.png" style="width: 16px;">Berkas</button></td>
                                    </tr>
                                </table>
                                <!-- <ol ng-if="showList">
                                    <li ng-repeat="pegawai in allPegawai" ng-if="pegawai.id_skpd == skpd.id_skpd">
                                    {{pegawai.nama}}
                                    </li>
                                </ol> -->
                            </td>
                        </tr>
                    </table>
                </div>
                
            </div>
            <!-- dialogbox -->
                    <div ng-if="iframe" id="showFrame" style="background:#2f323a; height:auto;top: 15%;position:fixed"  >
                        <div id="judulFrame">Ajuan Rencana Aksi by {{individu.nama}} Triwulan {{tri}}
                            <a href="#" ng-click="iframeOpen()" style="float:right;margin-right:5px">&times;</a>
                        </div>
                            <iframe ng-src="{{urlBerkas(lapDoc)}}" frameborder="0"style="width: 99%;margin-top: 20px;min-height: 340px;" ></iframe>
                            <div style="text-align:center;margin-top: 17px;">
                                <span class="btn btn-info btn-xs" ng-click="iframeOpen()">Close</span>  
                            </div>
                    </div>
                    <!-- batas box -->
        </div>
    </section>
</section>
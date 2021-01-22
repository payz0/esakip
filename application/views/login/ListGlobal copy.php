<section id="main-content" ng-init="dataTri = triwulan; itemsPerPage = 6;allPegawai=<?php echo htmlspecialchars(json_encode($dataAll['pegawai'])); ?>">
<section class="wrapper">
    <div class="container-fluid content-side" >
        <b class="judul">Daftar Laporan
                        <span ng-if="docx == 'ra'">Rencana Aksi</span>   
                        <span ng-if="docx == 'pk'">Perjanjian Kinerja</span>   
                        <span ng-if="docx == 'iki'">Indikator Kinerja Individu</span>
                        <span ng-if="docx == null">SKPD</span>
         </b>
        <div class="row" style="margin-top:20px;padding: 20px 0px">
                <!-- start isi -->
                
            <div class="col-md-12">
                <div class="tengah">
                    <h5 ng-if="docx != null" >Staf SKPD {{global.skpd}}</h5>
                    <h5 ng-if="docx != null">Tahun {{tahun}} <span ng-if="docx == 'ra'">Triwualn ke - {{dataTri}}</span></h5>  
                 </div>

                <div ng-show="docx != null" style="text-align:right">
                        <a href="#"  ng-click="tabelLaporan = false; docx = null;"  class="btn btn-danger btn-xs">Kembali</a>
                </div>
                <div class="tools">
                                <span ng-show="docx != null">
                                    <select ng-model="itemsPerPage"  ng-change="customPagination(allPegawai|filter:{id_skpd:global.id_skpd})"style="padding:2px;float:left;">
                                        <option value="6" >6</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="1000">Semua</option>
                                    </select>
                                    <input style="float:left;margin-left: 3px;" type="text" ng-model="user.nama" placeholder="cari pegawai" ng-focus="focusCari()">
                                </span>
                                <label for="">Tahun</label>
                                <input type="number" name="tahun" placeholder="tahun" ng-model="tahun" ng-change="cekTriwulan();grafik(global.id_skpd)">
                                <select ng-show="docx == 'ra'" style="padding: 2px;" name="triwulan" ng-model="dataTri" ng-init="dataTri = triwulan" ng-change="cekTriwulan(dataTri);grafik(global.id_skpd)">
                                    <option value="">-- pilih triwulan --</option>
                                    <option value="1">Triwulan I</option>
                                    <option value="2">Triwulan II</option>
                                    <option value="3">Triwulan III</option>
                                    <option value="4">Triwulan IV</option>
                                </select>
                    </div>
                <div ng-show="!tabelLaporan">
                    <table>
                        <thead >
                            <tr class="bg-primary">
                                <th class="tengah">No</td>
                                <th class="tengah">SKPD</td>
                                <th class="tengah">Rencana Aksi</td>
                                <th class="tengah">Perjanjian Kinerja</td>
                                <th class="tengah">IKI</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($dataAll['skpd'] as $key => $skpd){ ?>
                            <tr>
                                <td class="tengah">
                                    <?php echo $key+1; ?>
                                </td>
                                <td>
                                    <?php echo $skpd->skpd; ?>
                                </td>
                                <td class="tengah">
                                    <button ng-click="tabelLaporan = true; docx = 'ra';customPagination(allPegawai|filter:{id_skpd:<?php echo $skpd->id_skpd ?>});
                                                    global = <?php echo htmlspecialchars(json_encode($skpd));?>;
                                                    allLaporan = <?php echo htmlspecialchars(json_encode($dataAll['laporan'])); ?>" 
                                    class="btn btn-default btn-xs">view</button>
                                </td>
                                <td class="tengah">
                                    <button ng-click="tabelLaporan = true;docx = 'pk';customPagination(allPegawai|filter:{id_skpd:<?php echo $skpd->id_skpd ?>});
                                                    global = <?php echo htmlspecialchars(json_encode($skpd));?>;
                                                    allLaporan = <?php echo htmlspecialchars(json_encode($dataAll['pk'])); ?>" 
                                            class="btn btn-default btn-xs">view</button>
                                </td>
                                <td class="tengah">
                                    <button ng-click="tabelLaporan = true;docx = 'iki';customPagination(allPegawai|filter:{id_skpd:<?php echo $skpd->id_skpd ?>});
                                                    global = <?php echo htmlspecialchars(json_encode($skpd));?>;
                                                    allLaporan = <?php echo htmlspecialchars(json_encode($dataAll['iki'])); ?>" 
                                        class="btn btn-default btn-xs">view</button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- area rencana aksi -->
                    <div style="background:white" ng-if="tabelLaporan" class="animate__animated animate__slideInDown animate__faster" ng-init="grafik(global.id_skpd)">
                                <!-- batas -->
                    <div ng-if="docx == 'ra'" class="container-fluid backProgress">
                        <div class="greenProg" ng-style="{'min-width':laju}">Disiplin :</div>{{laju}}
                    </div>
                    <div ng-if="docx == 'ra'" class="container-fluid backProgressB">
                        <div class="redProg"  ng-style="{'min-width':telat}">Telat :</div>{{telat}} 
                    </div>
                           <!-- batas -->
                <div style="overflow:auto" >
                <table class="table-hover "  >
                    <thead class="bg-primary" >
                            <tr>
                                <th class="tengah"  rowSpan="2">No</th>
                                <th class="tengah" rowSpan="2">Nama</th>
                                <th ng-if="docx == 'ra'" class="tengah" >Aksi</th>
                                <th ng-if="docx == 'ra'" class="tengah" >Indikator</th>
                                <th ng-if="docx == 'ra'" class="tengah" >Hasil Evaluasi</th>
                                <th ng-if="docx == 'ra'" class="tengah" >Hambatan</th>
                                <th ng-if="docx == 'ra'" class="tengah" >Strategi Pencapaian</th>
                                <th ng-if="docx == 'ra'" class="tengah" >Berkas</th>
                                
                                <th ng-if="docx == 'pk'" class="tengah" rowSpan="2">Sasaran</th>
                                <th ng-if="docx == 'pk'" class="tengah" rowSpan="2">Indikator</th>
                                <th ng-if="docx == 'pk'" class="tengah" colspan="4">Target</th>
                                <th ng-if="docx == 'pk'" class="tengah" rowSpan="2">Berkas</th>

                                <th ng-if="docx == 'iki'" class="tengah" rowSpan="2">Kinerja</th>
                                <th ng-if="docx == 'iki'" class="tengah" rowSpan="2">Indikator</th>
                                <th ng-if="docx == 'iki'" class="tengah" rowSpan="2">Formula Perhitungan</th>
                                <th ng-if="docx == 'iki'" class="tengah" rowSpan="2">Sumber data</th>
                                <th ng-if="docx == 'iki'" class="tengah" rowSpan="2">Berkas</th>
                            </tr>
                            
                            <tr ng-if="docx == 'pk'">
                                <th class="tengah">I</th>
                                <th class="tengah">II</th>
                                <th class="tengah">III</th>
                                <th class="tengah">IV</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr ng-repeat="peg in allPegawai | filter:{id_skpd:global.id_skpd} | filter:user | orderBy:'+esselon' | limitTo:itemsPerPage:offsetItems" >
                                    <td class="tengah">{{$index+1}}</td>
                                    <td>{{peg.nama}}<br>
                                        <i style="font-size:7pt">{{peg.jabatan}}</i>
                                    </td>
                                    <td> <span ng-if="docx == 'ra'">{{allDataIkis(peg.id_peg,tahun,dataTri).aksi}}</span>
                                         <span ng-if="docx == 'pk'">{{getMeLap(peg.id_peg).sasaran}}</span>
                                         <span ng-if="docx == 'iki'">{{getMeLap(peg.id_peg).kinerja}}</span>
                                    </td>
                                    <td> <span ng-if="docx == 'ra'">{{allDataIkis(peg.id_peg,tahun,dataTri).laporan}}</span>
                                         <span ng-if="docx == 'pk'">{{getMeLap(peg.id_peg).indikator}}</span>
                                         <span ng-if="docx == 'iki'">{{getMeLap(peg.id_peg).indikator}}</span>
                                    </td>
                                    <td> <span ng-if="docx == 'ra'">{{allDataIkis(peg.id_peg,tahun,dataTri).evaluasi}}</span>
                                         <span ng-if="docx == 'pk'">{{getMeLap(peg.id_peg).target1}}</span>
                                         <span ng-if="docx == 'iki'">{{getMeLap(peg.id_peg).formula}}</span>
                                    </td>
                                    <td> <span ng-if="docx == 'ra'">{{allDataIkis(peg.id_peg,tahun,dataTri).hambatan}}</span>
                                         <span ng-if="docx == 'pk'">{{getMeLap(peg.id_peg).target2}}</span>
                                         <span ng-if="docx == 'iki'">{{getMeLap(peg.id_peg).sumber}}</span>
                                    </td>
                                    <td ng-if="docx != 'iki' "> <span ng-if="docx == 'ra'">{{allDataIkis(peg.id_peg,tahun,dataTri).capaian}}</span>
                                         <span ng-if="docx == 'pk'">{{getMeLap(peg.id_peg).target3}}</span>
                                         <!-- <span ng-if="docx == 'iki'">{{getMeLap(peg.id_peg).capaian}}</span> -->
                                    </td>
                                    <td ng-if="docx == 'pk'">{{getMeLap(peg.id_peg).target4}}
                                    </td>
                                    <td class="tengah">
                                        <button ng-click="iframeOpen(peg)" class="btn btn-default btn-xs" ng-if="allDataIkis(peg.id_peg,tahun,dataTri).berkas != null && docx == 'ra'">
                                            <img src="<?php echo base_url() ?>../assets/img/doc.png" alt="" width="15">
                                        </button>
                                        <button ng-click="iframeOpen(peg)" class="btn btn-default btn-xs" ng-if="getMeLap(peg.id_peg).berkas != null && docx == 'pk'">
                                            <img src="<?php echo base_url() ?>../assets/img/doc.png" alt="" width="15">
                                        </button>
                                        <button ng-click="iframeOpen(peg)" class="btn btn-default btn-xs" ng-if="getMeLap(peg.id_peg).berkas != null && docx == 'iki'">
                                            <img src="<?php echo base_url() ?>../assets/img/doc.png" alt="" width="15">
                                        </button>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                    </div>

                    <?php $this->load->view('dialog/pagination');?>
                    

                    <!-- dialogbox -->
                    <div ng-if="iframe" >
                        <div  id="showFrame" style="background:#2f323a;"  class="animate__animated animate__slideInDown">
                            <div id="judulFrame">Dokumen 
                                <span ng-if="docx == 'ra'">Rencana Aksi</span>   
                                <span ng-if="docx == 'pk'">Perjanjian Kinerja</span>   
                                <span ng-if="docx == 'iki'">Indikator Kinerja Individu</span>
                                by {{individu.nama}} 
                                <span ng-if="docx == 'ra'">Triwulan {{dataTri}}</span>
                                
                                <a href="#" ng-click="iframeOpen()" style="float:right;margin-right:5px">&times;</a>
                            </div>
                                <iframe ng-if="docx == 'ra'" ng-src="{{urlBerkas(allDataIkis(individu.id_peg,tahun,dataTri).berkas)}}" frameborder="0"></iframe>
                                <iframe ng-if="docx != 'ra'" ng-src="{{urlBerkas(getMeLap(individu.id_peg).berkas)}}" frameborder="0"></iframe>
                                <div style="text-align:center;margin-top: 17px;">
                                    <span class="btn btn-info btn-xs" ng-click="iframeOpen();cancel()">Close</span>  
                                </div>
                        </div>
                    </div>
                    <!-- batas box -->
                    <!-- batas -->
            </div>
        </div>
    </div>
</section>
</section>
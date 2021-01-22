<section id="main-content"  ng-init = "docx = 'ra';allData=<?php echo htmlspecialchars(json_encode($dataAll['pegawai'])); ?>;allLaporan = <?php echo htmlspecialchars(json_encode($dataAll['laporan'])); ?> ">
     <section class="wrapper" id="wrap" ng-init="itemsPerPage = 6;customPagination(allData)">
            

        <div class="container-fluid content-side" >
            <b class="judul">
            Monitoring 
                            <span ng-if="docx == 'ra'">Rencana Aksi</span>   
                            <span ng-if="docx == 'pk'">Perjanjian Kinerja</span>   
                            <span ng-if="docx == 'iki'">Indikator Kinerja Individu</span>  
            </b>
            <div class="row" style="margin-top:20px;padding: 20px 0px">
                <div class="col-md-12">
                    <ul id="typeLap">
                        <li>Laporan :</li>
                        <li class="daft" ><a style="color:white" href="#" ng-click="docx = 'ra'; allLaporan = <?php echo htmlspecialchars(json_encode($dataAll['laporan'])); ?> ">Rencana Aksi</a></li>
                        <li class="daft" ><a style="color:white" href="#" ng-click="docx = 'pk'; allLaporan = <?php echo htmlspecialchars(json_encode($dataAll['pk'])); ?> ">Perjanjian Kinerja</a></li>
                        <li class="daft" ><a style="color:white" href="#" ng-click="docx = 'iki'; allLaporan = <?php echo htmlspecialchars(json_encode($dataAll['iki'])); ?> ">Indikator Kinerja Individu</a></li>
                    </ul>
                    <div style="text-align:right;" class="tools">
                        <select ng-model="itemsPerPage"  ng-change="customPagination(allData)"style="padding:2px;float:left;">
                            <option value="6" >6</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="1000">Semua</option>
                        </select>   
                        <input style="float:left;" type="text" ng-model="user.nama" placeholder="cari pegawai" ng-focus="focusCari()">
                        <label for="">Tahun</label>
                        <input type="number" name="tahun" placeholder="tahun" ng-model="tahun" ng-change="cekTriwulan()">
                        
                    </div>
                    <!-- <hr> -->
                    <!-- <br> -->
                    <div style="overflow:auto">
                    <table >
                        <thead class="bg-primary">
                            <tr>
                                <th class="tengah" rowSpan="2" >No</th>
                                <th class="tengah" rowSpan="2">Pegawai</th>
                                
                                <th ng-if="docx == 'ra'" class="tengah" colspan="4">Tahun {{tahun}}</th>
                                
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
                            <tr ng-if="docx == 'ra'">
                                <th class="tengah" >Triwulan I</th>
                                <th class="tengah">Triwulan II</th>
                                <th class="tengah">Triwulan III</th>
                                <th class="tengah">Triwulan IV</th>
                            </tr>
                            <tr ng-if="docx == 'pk'">
                                <th class="tengah" >I</th>
                                <th class="tengah">II</th>
                                <th class="tengah">III</th>
                                <th class="tengah">IV</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="pegawai in allData | filter:user | orderBy : '+esselon' | limitTo:itemsPerPage:offsetItems" ng-class="pegawai.esselon == 'esselon II' ? 'bg-warning':''">
                                <td class="tengah">
                                    {{$index+1}}
                                </td>
                                <td >
                                    {{pegawai.nama}} <span ng-if="pegawai.esselon == 'esselon II'">[Kepala Dinas]</span>
                                </td>
                                <td ng-if="docx == 'ra'" class="tengah">
                                    <img ng-click="iframeOpen(pegawai,1)"  ng-if="pegawai.esselon == 'esselon II' && get3wulanRev(pegawai.id_peg,1).status != undefined" src="<?php echo base_url() ?>../assets/img/ok2.png" alt="" style="width: 15px;">
                                    <img ng-click="iframeOpen(pegawai,1)"  ng-if="get3wulanRev(pegawai.id_peg,1).status == 'terima' && pegawai.esselon != 'esselon II'" src="<?php echo base_url() ?>../assets/img/ok2.png" alt="" style="width: 15px;">
                                    <img ng-click="iframeOpen(pegawai,1)"  ng-if="get3wulanRev(pegawai.id_peg,1).status == 'ajuan' && pegawai.esselon != 'esselon II'" src="<?php echo base_url() ?>../assets/img/warning.png" alt="" style="width: 15px;">
                                    <img ng-click="iframeOpen(pegawai,1)"  ng-if="get3wulanRev(pegawai.id_peg,1).status == 'revisi' && pegawai.esselon != 'esselon II'" src="<?php echo base_url() ?>../assets/img/warning.png" alt="" style="width: 15px;">
                                    <img ng-if="get3wulanRev(pegawai.id_peg,1).status == undefined" src="<?php echo base_url() ?>../assets/img/silang.svg" alt="" style="width: 15px;">
                                    <img ng-click="iframeOpen(pegawai,1)"  ng-if="get3wulanRev(pegawai.id_peg,1).status == 'tolak'" src="<?php echo base_url() ?>../assets/img/warning.png" alt="" style="width: 15px;">
                                </td>
                                <td ng-if="docx == 'ra'" class="tengah">
                                    <img ng-click="iframeOpen(pegawai,2)"  ng-if="pegawai.esselon == 'esselon II' && get3wulanRev(pegawai.id_peg,2).status != undefined" src="<?php echo base_url() ?>../assets/img/ok2.png" alt="" style="width: 15px;">
                                    <img ng-click="iframeOpen(pegawai,2)"  ng-if="get3wulanRev(pegawai.id_peg,2).status == 'terima' && pegawai.esselon != 'esselon II'" src="<?php echo base_url() ?>../assets/img/ok2.png" alt="" style="width: 15px;">
                                    <img ng-click="iframeOpen(pegawai,2)"  ng-if="get3wulanRev(pegawai.id_peg,2).status == 'ajuan' && pegawai.esselon != 'esselon II'" src="<?php echo base_url() ?>../assets/img/warning.png" alt="" style="width: 15px;">
                                    <img ng-click="iframeOpen(pegawai,2)"  ng-if="get3wulanRev(pegawai.id_peg,2).status == 'revisi' && pegawai.esselon != 'esselon II'" src="<?php echo base_url() ?>../assets/img/warning.png" alt="" style="width: 15px;">
                                    <img ng-if="get3wulanRev(pegawai.id_peg,2).status == undefined" src="<?php echo base_url() ?>../assets/img/silang.svg" alt="" style="width: 15px;">
                                    <img ng-click="iframeOpen(pegawai,2)"  ng-if="get3wulanRev(pegawai.id_peg,2).status == 'tolak'" src="<?php echo base_url() ?>../assets/img/warning.png" alt="" style="width: 15px;">
                                </td>
                                <td ng-if="docx == 'ra'" class="tengah">
                                    <img ng-click="iframeOpen(pegawai,3)"  ng-if="pegawai.esselon == 'esselon II' && get3wulanRev(pegawai.id_peg,3).status != undefined" src="<?php echo base_url() ?>../assets/img/ok2.png" alt="" style="width: 15px;">
                                    <img ng-click="iframeOpen(pegawai,3)"  ng-if="get3wulanRev(pegawai.id_peg,3).status == 'terima' && pegawai.esselon != 'esselon II'" src="<?php echo base_url() ?>../assets/img/ok2.png" alt="" style="width: 15px;">
                                    <img ng-click="iframeOpen(pegawai,3)"  ng-if="get3wulanRev(pegawai.id_peg,3).status == 'ajuan' && pegawai.esselon != 'esselon II'" src="<?php echo base_url() ?>../assets/img/warning.png" alt="" style="width: 15px;">
                                    <img ng-click="iframeOpen(pegawai,3)"  ng-if="get3wulanRev(pegawai.id_peg,3).status == 'revisi' && pegawai.esselon != 'esselon II'" src="<?php echo base_url() ?>../assets/img/warning.png" alt="" style="width: 15px;">
                                    <img ng-if="get3wulanRev(pegawai.id_peg,3).status == undefined" src="<?php echo base_url() ?>../assets/img/silang.svg" alt="" style="width: 15px;">
                                    <img ng-click="iframeOpen(pegawai,3)"  ng-if="get3wulanRev(pegawai.id_peg,3).status == 'tolak'" src="<?php echo base_url() ?>../assets/img/warning.png" alt="" style="width: 15px;">
                                </td>
                                <td ng-if="docx == 'ra'" class="tengah">
                                    <img ng-click="iframeOpen(pegawai,4)" ng-if="pegawai.esselon == 'esselon II' && get3wulanRev(pegawai.id_peg,4).status != undefined" src="<?php echo base_url() ?>../assets/img/ok2.png" alt="" style="width: 15px;">
                                    <img ng-click="iframeOpen(pegawai,4)" ng-if="get3wulanRev(pegawai.id_peg,4).status == 'terima' && pegawai.esselon != 'esselon II'" src="<?php echo base_url() ?>../assets/img/ok2.png" alt="" style="width: 15px;">
                                    <img  ng-click="iframeOpen(pegawai,4)" ng-if="get3wulanRev(pegawai.id_peg,4).status == 'ajuan' && pegawai.esselon != 'esselon II'" src="<?php echo base_url() ?>../assets/img/warning.png" alt="" style="width: 15px;">
                                    <img ng-click="iframeOpen(pegawai,4)" ng-if="get3wulanRev(pegawai.id_peg,4).status == 'revisi' && pegawai.esselon != 'esselon II'" src="<?php echo base_url() ?>../assets/img/warning.png" alt="" style="width: 15px;">
                                    <img ng-if="get3wulanRev(pegawai.id_peg,4).status == undefined" src="<?php echo base_url() ?>../assets/img/silang.svg" alt="" style="width: 15px;">
                                    <img ng-click="iframeOpen(pegawai,4)" ng-if="get3wulanRev(pegawai.id_peg,4).status == 'tolak'" src="<?php echo base_url() ?>../assets/img/warning.png" alt="" style="width: 15px;">
                                </td>

                                <td ng-if="docx == 'pk'">{{getMeLap(pegawai.id_peg).sasaran}}</td>
                                <td ng-if="docx == 'pk'">{{getMeLap(pegawai.id_peg).indikator}}</td>
                                <td ng-if="docx == 'pk'">{{getMeLap(pegawai.id_peg).target1}}</td>
                                <td ng-if="docx == 'pk'">{{getMeLap(pegawai.id_peg).target2}}</td>
                                <td ng-if="docx == 'pk'">{{getMeLap(pegawai.id_peg).target3}}</td>
                                <td ng-if="docx == 'pk'">{{getMeLap(pegawai.id_peg).target4}}</td>
                                <td class="tengah" ng-if="docx == 'pk'">
                                    <button ng-click="iframeOpen(pegawai)" class="btn btn-default btn-xs" ng-if="getMeLap(pegawai.id_peg).berkas != null">
                                        <img src="<?php echo base_url()?>../assets/img/doc.png" style="width:15px">
                                    </button>
                                </td>
                                

                                <td ng-if="docx == 'iki'">{{getMeLap(pegawai.id_peg).kinerja}}</td>
                                <td ng-if="docx == 'iki'">{{getMeLap(pegawai.id_peg).indikator}}</td>
                                <td ng-if="docx == 'iki'">{{getMeLap(pegawai.id_peg).formula}}</td>
                                <td ng-if="docx == 'iki'">{{getMeLap(pegawai.id_peg).sumber}}</td>
                                <td class="tengah" ng-if="docx == 'iki'">
                                    <button ng-click="iframeOpen(pegawai)" class="btn btn-default btn-xs" ng-if="getMeLap(pegawai.id_peg).berkas != null">
                                        <img src="<?php echo base_url()?>../assets/img/doc.png" style="width:15px">
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                        <?php $this->load->view('dialog/pagination');?>
                    <div ng-if="docx == 'ra'">
                        <u>Catatan:</u>
                        <ul>
                            <Li><img src="<?php echo base_url() ?>../assets/img/ok2.png" alt="" style="width: 20px;margin-right:10px"> Sudah di acc pejabat</Li>
                            <li><img src="<?php echo base_url() ?>../assets/img/warning.png" alt="" style="width: 20px;margin-right:10px">Sudah pengajuan, belum di acc pejabat</li>
                            <Li><img src="<?php echo base_url() ?>../assets/img/silang.svg" alt="" style="width: 20px;margin-right:10px">Belum ada pengajuan</Li>
                        </ul>
                    </div>
                     <!-- dialogbox -->
                     <div ng-if="iframe" id="showFrame" style="background:#2f323a; height:auto"  >
                        <div id="judulFrame">Dokumen 
                            <span ng-if="docx == 'ra'">Rencana Aksi</span>   
                            <span ng-if="docx == 'pk'">Perjanjian Kinerja</span>   
                            <span ng-if="docx == 'iki'">Indikator Kinerja Individu</span>
                            by {{individu.nama}} 
                            <span ng-if="docx == 'ra'">Triwulan {{tri}}</span>
                            
                            <a href="#" ng-click="iframeOpen()" style="float:right;margin-right:5px">&times;</a>
                        </div>
                            <iframe ng-if="docx == 'ra'" ng-src="{{urlBerkas(allDataIkis(individu.id_peg,tahun,tri).berkas)}}" frameborder="0"style="width: 99%;margin-top: 20px;min-height: 340px;" ></iframe>
                            <iframe ng-if="docx != 'ra'" ng-src="{{urlBerkas(getMeLap(individu.id_peg).berkas)}}" frameborder="0"style="width: 99%;margin-top: 20px;min-height: 340px;" ></iframe>
                            <div style="text-align:center;margin-top: 17px;">
                                <span class="btn btn-info btn-xs" ng-click="iframeOpen();cancel()">Close</span>  
                            </div>
                    </div>
                    <!-- batas box -->
                </div>
            </div>
        </div>
    </section>
</section>

<style>
    .tengah img{
        cursor:pointer;
    }
</style>
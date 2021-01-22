<section id="main-content"  ng-init="jenis_lap = 'kabupaten';allData = <?php echo htmlspecialchars(json_encode($dataAll)); ?>"> 
    <section class="wrapper" id="wrap">
    <div class="container-fluid content-side" >
        <b class="judul">Esakip Kabupaten</b>
        <div class="row" style="margin-top:20px;padding: 20px 0px">
            <div class="col-md-12">
                    <div style="text-align:right" class="tools">
                        <label for="">Tahun</label>
                        <input  type="number" name="tahun" placeholder="tahun" ng-model="tahun" ng-change="cekTriwulan()">
                    </div>
                    <!-- <hr> -->
                    <!-- <br> -->
                    <table  >
                        <thead class="bg-primary">
                            <tr>
                                <th class="tengah" rowSpan="2" >No</th>
                                <th class="tengah" rowSpan="2">Laporan</th>
                                <th class="tengah" colspan="2">Tahun {{tahun}}</th>
                            </tr>
                            <tr>
                                <th class="tengah">Deskripsi</th>
                                <th class="tengah">Berkas</th>
                                <!-- <th class="tengah">Ket</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                                <td class="tengah">
                                    1
                                </td>
                                <td>
                                    RPJMD
                                </td>
                                <td class="tengah">
                                    <img ng-if="getLapSKPD().ringkasan_renstra == undefined" src="<?php echo base_url() ?>../assets/img/silang.svg" alt="" style="width: 20px;">
                                    <span ng-if="getLapSKPD().ringkasan_renstra != undefined">{{getLapSKPD().ringkasan_renstra}}</span>
                                </td>
                                <td class="tengah">
                                    <button ng-if="getLapSKPD().doc_renstra != undefined" class="btn btn-info btn-xs" ng-click="berkasOpen(getLapSKPD().doc_renstra)">View</button>
                                    <button ng-if="getLapSKPD().doc_renstra == undefined" class="btn btn-default btn-xs" ng-click="berkasOpen(getLapSKPD().doc_renstra)">View</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="tengah">
                                    2
                                </td>
                                <td>
                                    RKPD
                                </td>
                                <td class="tengah">
                                    <img ng-if="getLapSKPD().ringkasan_rkp == undefined" src="<?php echo base_url() ?>../assets/img/silang.svg" alt="" style="width: 20px;">
                                    <span ng-if="getLapSKPD().ringkasan_rkp != undefined">{{getLapSKPD().ringkasan_rkp}}</span>
                                </td>
                                <td class="tengah">
                                    <button ng-if="getLapSKPD().doc_rkp != undefined" class="btn btn-info btn-xs" ng-click="berkasOpen(getLapSKPD().doc_rkp)">View</button>
                                    <button ng-if="getLapSKPD().doc_rkp == undefined" class="btn btn-default btn-xs" ng-click="berkasOpen(getLapSKPD().doc_rkp)">View</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="tengah">
                                    3
                                </td>
                                <td>
                                    PK Bupati
                                </td>
                                <td class="tengah">
                                    <img ng-if="getLapSKPD().ringkasan_pk == undefined" src="<?php echo base_url() ?>../assets/img/silang.svg" alt="" style="width: 20px;">
                                    <span ng-if="getLapSKPD().ringkasan_pk != undefined">{{getLapSKPD().ringkasan_pk}}</span>
                                </td>
                                <td class="tengah">
                                    <button ng-if="getLapSKPD().doc_pk != undefined" class="btn btn-info btn-xs" ng-click="berkasOpen(getLapSKPD().doc_pk)">View</button>
                                    <button ng-if="getLapSKPD().doc_pk == undefined" class="btn btn-default btn-xs" ng-click="berkasOpen(getLapSKPD().doc_pk)">View</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="tengah">
                                    4
                                </td>
                                <td>
                                    LKJIP
                                </td>
                                <td class="tengah">
                                    <img ng-if="getLapSKPD().ringkasan_lkjip == undefined" src="<?php echo base_url() ?>../assets/img/silang.svg" alt="" style="width: 20px;">
                                    <span ng-if="getLapSKPD().ringkasan_lkjip != undefined">{{getLapSKPD().ringkasan_lkjip}}</span>
                                </td>
                                <td class="tengah">
                                    <button ng-if="getLapSKPD().doc_lkjip != undefined" class="btn btn-info btn-xs" ng-click="berkasOpen(getLapSKPD().doc_lkjip)">View</button>
                                    <button ng-if="getLapSKPD().doc_lkjip == undefined" class="btn btn-default btn-xs" ng-click="berkasOpen(getLapSKPD().doc_lkjip)">View</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="tengah">
                                    5
                                </td>
                                <td>
                                    Rencana Aksi
                                </td>
                                <td class="tengah">
                                    <img ng-if="getLapSKPD().ringkasan_ra == undefined" src="<?php echo base_url() ?>../assets/img/silang.svg" alt="" style="width: 20px;">
                                    <span ng-if="getLapSKPD().ringkasan_ra != undefined">{{getLapSKPD().ringkasan_ra}}</span>
                                </td>
                                <td class="tengah">
                                    <button ng-if="getLapSKPD().doc_ra != undefined" class="btn btn-info btn-xs" ng-click="berkasOpen(getLapSKPD().doc_ra)">View</button>
                                    <button ng-if="getLapSKPD().doc_ra == undefined" class="btn btn-default btn-xs" ng-click="berkasOpen(getLapSKPD().doc_ra)">View</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="tengah">
                                    6
                                </td>
                                <td>
                                    IKU Kabupaten
                                </td>
                                <td class="tengah">
                                    <img ng-if="getLapSKPD().ringkasan_iku == undefined" src="<?php echo base_url() ?>../assets/img/silang.svg" alt="" style="width: 20px;">
                                    <span ng-if="getLapSKPD().ringkasan_iku != undefined">{{getLapSKPD().ringkasan_iku}}</span>
                                </td>
                                <td class="tengah">
                                    <button ng-if="getLapSKPD().doc_iku != undefined" class="btn btn-info btn-xs" ng-click="berkasOpen(getLapSKPD().doc_iku)">View</button>
                                    <button ng-if="getLapSKPD().doc_iku == undefined" class="btn btn-default btn-xs" ng-click="berkasOpen(getLapSKPD().doc_iku)">View</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- dialogbox -->
                    <div ng-if="iframe" id="showFrame" style="background:#2f323a; height:auto; top:0px;" class="animate__animated animate__slideInDown" >
                        <div id="judulFrame">Dokumen
                            <a href="#" ng-click="iframeOpen()" style="float:right;margin-right:5px">&times;</a>
                        </div>
                            <iframe ng-src="{{urlBerkas(lapDoc)}}" frameborder="0"style="width: 99%;margin-top: 20px;min-height: 340px;" ></iframe>
                            <div style="text-align:center">
                                <span class="btn btn-info btn-xs" ng-click="iframeOpen()">Close</span>  
                            </div>
                    </div>
                    <!-- batas box -->
                </div>    
            </div>
        </div>
       
    </section>
</section>
<section id="main-content" ng-init="jenis_lap = 'skpd';allData = <?php echo htmlspecialchars(json_encode($dataAll)); ?>"> 
    <section class="wrapper" id="wrap">
        <div class="container-fluid content-side" >
            <b class="judul">Monitoring E-Sakip <?php echo $this->session->userdata('skpd');?></b>
            <div class="row" style="margin-top:20px;padding: 20px 0px">
                <div class="col-md-12">
                    <div style="text-align:right" class="tools">
                        <label for="">Tahun</label>
                        <input  type="number" name="tahun" placeholder="tahun" ng-model="tahun" ng-change="cekTriwulan()">
                    </div>
                    <!-- <hr> -->
                    <!-- <br> -->
                    <table >
                        <thead class="bg-primary">
                            <tr>
                                <th class="tengah" rowSpan="2" >No</th>
                                <th class="tengah" rowSpan="2">Laporan</th>
                                <th class="tengah" colspan="3">Tahun {{tahun}}</th>
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
                                    RENSTRA
                                </td>
                                <td class="tengah">
                                    {{getLapSKPD('ringkasan_renstra','doc_renstra').ringkasan_renstra}}
                                </td>
                                <td class="tengah">
                                    <button ng-if="getLapSKPD('ringkasan_renstra','doc_renstra').doc_renstra != undefined" class="btn btn-info btn-xs" ng-click="berkasOpen(getLapSKPD('ringkasan_renstra','doc_renstra').doc_renstra)">View</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="tengah">
                                    2
                                </td>
                                <td>
                                    RKP
                                </td>
                                <td class="tengah">
                                    {{getLapSKPD('ringkasan_rkp','doc_rkp').ringkasan_rkp}}
                                </td>
                                <td class="tengah">
                                    <button ng-if="getLapSKPD('ringkasan_rkp','doc_rkp').doc_rkp  != undefined" class="btn btn-info btn-xs" ng-click="berkasOpen(getLapSKPD('ringkasan_rkp','doc_rkp').doc_rkp)">View</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="tengah">
                                    3
                                </td>
                                <td>
                                    PK SKPD
                                </td>
                                <td class="tengah">
                                    {{getLapSKPD('ringkasan_pk','doc_pk').ringkasan_pk }}
                                </td>
                                <td class="tengah">
                                    <button ng-if="getLapSKPD('ringkasan_pk','doc_pk').doc_pk != undefined" class="btn btn-info btn-xs" ng-click="berkasOpen(getLapSKPD('ringkasan_pk','doc_pk').doc_pk)">View</button>
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
                                    {{getLapSKPD('ringkasan_lkjip','doc_lkjip').ringkasan_lkjip}}
                                </td>
                                <td class="tengah">
                                    <button ng-if="getLapSKPD('ringkasan_lkjip','doc_lkjip').doc_lkjip != undefined" class="btn btn-info btn-xs" ng-click="berkasOpen(getLapSKPD('ringkasan_lkjip','doc_lkjip').doc_lkjip)">View</button>
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
                                    {{getLapSKPD('ringkasan_ra','doc_ra').ringkasan_ra }}
                                </td>
                                <td class="tengah">
                                    <button ng-if="getLapSKPD('ringkasan_ra','doc_ra').doc_ra != undefined" class="btn btn-info btn-xs" ng-click="berkasOpen(getLapSKPD('ringkasan_ra','doc_ra').doc_ra)">View</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="tengah">
                                    6
                                </td>
                                <td>
                                    IKU SKPD
                                </td>
                                <td class="tengah">
                                    {{getLapSKPD('ringkasan_iku','doc_iku').ringkasan_iku}}
                                </td>
                                <td class="tengah">
                                    <button ng-if="getLapSKPD('ringkasan_iku','doc_iku').doc_iku != undefined" class="btn btn-info btn-xs" ng-click="berkasOpen(getLapSKPD('ringkasan_iku','doc_iku').doc_iku)">View</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="tengah">
                                    7
                                </td>
                                <td>
                                    Capaian SKPD
                                </td>
                                <td class="tengah">
                                    {{getLapSKPD('ringkasan_capaian','doc_capaian').ringkasan_capaian}}
                                </td>
                                <td class="tengah">
                                    <button ng-if="getLapSKPD('ringkasan_capaian','doc_capaian').doc_capaian != undefined" class="btn btn-info btn-xs" ng-click="berkasOpen(getLapSKPD('ringkasan_capaian','doc_capaian').doc_capaian)">View</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                      <!-- dialogbox -->
                      <div ng-if="iframe" id="showFrame" style="background:#2f323a; height:auto; top:0px;"  >
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
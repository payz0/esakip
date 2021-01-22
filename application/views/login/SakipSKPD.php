<section id="main-content" ng-init="jenis_lap = 'skpd';laporans = <?php echo htmlspecialchars(json_encode($dataAll)); ?>;dataTahuns2()"> 
    <section class="wrapper" id="wrap" ng-keydown="$event.keyCode === 27 && descEdit('null')">
        <div class="container-fluid content-side" >
            <b class="judul">E-Sakip <?php echo $this->session->userdata('skpd');?> Tahun {{tahun}}</b>
            <div class="row" style="margin-top:20px;padding: 20px 0px">
                <div class="col-md-12">
                    <div style="text-align:right" class="tools">
                        <label for="">Tahun</label>
                        <input type="number" placeholder="tahun" ng-model="tahun" ng-change="cekTriwulan();dataTahuns2()">
                    </div>
                    <div>
                        <table class="table-hover">
                            <thead class="bg-primary">
                                <tr >
                                    <th style="text-align:center">No</th>
                                    <th style="text-align:center" colSpan="3">Laporan</th>
                                    <!-- <th style="text-align:center">Deskripsi</th>
                                    <th style="text-align:center" colSpan="2">Berkas (PDF)</th> -->
                                    <!-- <th style="text-align:center">view</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr rowSpan="4">
                                    <td class="tengah">
                                        1
                                    </td>
                                    <td style="width:180px">
                                        RENSTRA
                                        <button class="btn btn-danger btn-xs" style="float:right" ng-click="addForm();descrip = 'ringkasan_renstra';urlAct = '<?php echo base_url();?>'+'login/upload/doc_renstra/berkas/renstra_skpd_/SakipSKPD/ringkasan_renstra'">+</button>
                                    </td>
                                    
                                    <td style="max-width: 225px;" colspan="2">
                                            <table>
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th class="tengah" style="width: 25px;">No</th>
                                                        <th class="tengah">Deskripsi</th>
                                                        <th class="tengah" style="width: 115px;">File</th>
                                                    </tr>
                                                </thead>
                                                <tr ng-repeat="lap in getLaporans('ringkasan_renstra','doc_renstra')">
                                                    <td class="tengah">#{{$index+1}}</td>
                                                    <td>{{lap.ringkasan_renstra}}</td>
                                                    <td class="tengah">
                                                        <!-- {{lap.doc_renstra}} -->
                                                        <a href="#" ng-click="iframeOpen(lap.doc_renstra)">
                                                            <img style="width:21px" src="<?php echo base_url()?>../assets/img/doc.png" alt="">
                                                            Berkas
                                                        </a>
                                                        <div style="float:right">
                                                        <a href="#" ng-click="hapusLaporans('tabel_laporan_skpd',lap.id_lap_skpd)">&times;</a> 
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr ng-if="getLaporans('ringkasan_renstra','doc_renstra').length == 0">
                                                    <td colSpan="3" class="tengah"><i>Belum ada Laporan</i></td>
                                                </tr>
                                            </table>   
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="tengah">
                                        2
                                    </td>
                                    <td>
                                        RKP
                                        <button class="btn btn-danger btn-xs" style="float:right"  ng-click="addForm();descrip = 'ringkasan_rkp';urlAct = '<?php echo base_url();?>'+'login/upload/doc_rkp/berkas/rkp_skpd_/SakipSKPD/ringkasan_rkp'">+</button>
                                    </td>
                                        <td style="max-width: 225px;" colspan="2">
                                            <table>
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th class="tengah" style="width: 25px;">No</th>
                                                        <th class="tengah">Deskripsi</th>
                                                        <th class="tengah" style="width: 115px;">File</th>
                                                    </tr>
                                                </thead>
                                                <tr ng-repeat="lap in getLaporans('ringkasan_rkp','doc_rkp')">
                                                    <td class="tengah">#{{$index+1}}</td>
                                                    <td>{{lap.ringkasan_rkp}}</td>
                                                    <td class="tengah">
                                                        <!-- {{lap.doc_rkp}} -->
                                                        <a href="#" ng-click="iframeOpen(lap.doc_rkp)">
                                                            <img style="width:21px" src="<?php echo base_url()?>../assets/img/doc.png" alt="">
                                                            Berkas
                                                        </a>
                                                        <div style="float:right">
                                                        <a href="#" ng-click="hapusLaporans('tabel_laporan_skpd',lap.id_lap_skpd)">&times;</a> 
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr ng-if="getLaporans('ringkasan_rkp','doc_rkp').length == 0">
                                                    <td colSpan="3" class="tengah"><i>Belum ada Laporan</i></td>
                                                </tr>
                                            </table>   
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="tengah">
                                        3
                                    </td>
                                    <td>
                                        Perjanjian Kinerja SKPD
                                        <button class="btn btn-danger btn-xs" style="float:right"  ng-click="addForm();descrip = 'ringkasan_pk';urlAct = '<?php echo base_url();?>'+'login/upload/doc_pk/berkas/pk_skpd_/SakipSKPD/ringkasan_pk'">+</button>
                                    </td>
                                        <td style="max-width: 225px;" colspan="2">
                                            <table>
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th class="tengah" style="width: 25px;">No</th>
                                                        <th class="tengah">Deskripsi</th>
                                                        <th class="tengah" style="width: 115px;">File</th>
                                                    </tr>
                                                </thead>
                                                <tr ng-repeat="lap in getLaporans('ringkasan_pk','doc_pk')">
                                                    <td class="tengah">#{{$index+1}}</td>
                                                    <td>{{lap.ringkasan_pk}}</td>
                                                    <td class="tengah">
                                                        <!-- {{lap.doc_pk}} -->
                                                        <a href="#" ng-click="iframeOpen(lap.doc_pk)">
                                                            <img style="width:21px" src="<?php echo base_url()?>../assets/img/doc.png" alt="">
                                                            Berkas
                                                        </a>
                                                        <div style="float:right">
                                                        <a href="#" ng-click="hapusLaporans('tabel_laporan_skpd',lap.id_lap_skpd)">&times;</a> 
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr ng-if="getLaporans('ringkasan_pk','doc_pk').length == 0">
                                                    <td colSpan="3" class="tengah"><i>Belum ada Laporan</i></td>
                                                </tr>
                                            </table>   
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="tengah">
                                        4
                                    </td>
                                    <td>
                                        LKJIP
                                        <button class="btn btn-danger btn-xs" style="float:right"  ng-click="addForm();descrip = 'ringkasan_lkjip';urlAct = '<?php echo base_url();?>'+'login/upload/doc_lkjip/berkas/lkjip_skpd_/SakipSKPD/ringkasan_lkjip'">+</button>
                                    </td>
                                        <td style="max-width: 225px;" colspan="2">
                                            <table>
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th class="tengah" style="width: 25px;">No</th>
                                                        <th class="tengah">Deskripsi</th>
                                                        <th class="tengah" style="width: 115px;">File</th>
                                                    </tr>
                                                </thead>
                                                <tr ng-repeat="lap in getLaporans('ringkasan_lkjip','doc_lkjip')">
                                                    <td class="tengah">#{{$index+1}}</td>
                                                    <td>{{lap.ringkasan_lkjip}}</td>
                                                    <td class="tengah">
                                                        <!-- {{lap.doc_lkjip}} -->
                                                        <a href="#" ng-click="iframeOpen(lap.doc_lkjip)">
                                                            <img style="width:21px" src="<?php echo base_url()?>../assets/img/doc.png" alt="">
                                                            Berkas
                                                        </a>
                                                        <div style="float:right">
                                                        <a href="#" ng-click="hapusLaporans('tabel_laporan_skpd',lap.id_lap_skpd)">&times;</a> 
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr ng-if="getLaporans('ringkasan_lkjip','doc_lkjip').length == 0">
                                                    <td colSpan="3" class="tengah"><i>Belum ada Laporan</i></td>
                                                </tr>
                                            </table>   
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="tengah">
                                        5
                                    </td>
                                    <td>
                                        Rencana Aksi
                                        <button class="btn btn-danger btn-xs" style="float:right"  ng-click="addForm();descrip = 'ringkasan_ra';urlAct = '<?php echo base_url();?>'+'login/upload/doc_ra/berkas/ra_skpd_/SakipSKPD/ringkasan_ra'">+</button>
                                    </td>
                                        <td style="max-width: 225px;" colspan="2">
                                            <table>
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th class="tengah" style="width: 25px;">No</th>
                                                        <th class="tengah">Deskripsi</th>
                                                        <th class="tengah" style="width: 115px;">File</th>
                                                    </tr>
                                                </thead>
                                                <tr ng-repeat="lap in getLaporans('ringkasan_ra','doc_ra')">
                                                    <td class="tengah">#{{$index+1}}</td>
                                                    <td>{{lap.ringkasan_ra}}</td>
                                                    <td class="tengah">
                                                        <!-- {{lap.doc_ra}} -->
                                                        <a href="#" ng-click="iframeOpen(lap.doc_ra)">
                                                            <img style="width:21px" src="<?php echo base_url()?>../assets/img/doc.png" alt="">
                                                            Berkas
                                                        </a>
                                                        <div style="float:right">
                                                        <a href="#" ng-click="hapusLaporans('tabel_laporan_skpd',lap.id_lap_skpd)">&times;</a> 
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr ng-if="getLaporans('ringkasan_ra','doc_ra').length == 0">
                                                    <td colSpan="3" class="tengah"><i>Belum ada Laporan</i></td>
                                                </tr>
                                            </table>   
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="tengah">
                                        6
                                    </td>
                                    <td>
                                        IKU SKPD
                                        <button class="btn btn-danger btn-xs" style="float:right"  ng-click="addForm();descrip = 'ringkasan_iku';urlAct = '<?php echo base_url();?>'+'login/upload/doc_iku/berkas/iku_skpd_/SakipSKPD/ringkasan_iku'">+</button>
                                    </td>
                                        <td style="max-width: 225px;" colspan="2">
                                            <table>
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th class="tengah" style="width: 25px;">No</th>
                                                        <th class="tengah">Deskripsi</th>
                                                        <th class="tengah" style="width: 115px;">File</th>
                                                    </tr>
                                                </thead>
                                                <tr ng-repeat="lap in getLaporans('ringkasan_iku','doc_iku')">
                                                    <td class="tengah">#{{$index+1}}</td>
                                                    <td>{{lap.ringkasan_iku}}</td>
                                                    <td class="tengah">
                                                        <!-- {{lap.doc_iku}} -->
                                                        <a href="#" ng-click="iframeOpen(lap.doc_iku)">
                                                            <img style="width:21px" src="<?php echo base_url()?>../assets/img/doc.png" alt="">
                                                            Berkas
                                                        </a>
                                                        <div style="float:right">
                                                        <a href="#" ng-click="hapusLaporans('tabel_laporan_skpd',lap.id_lap_skpd)">&times;</a> 
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr ng-if="getLaporans('ringkasan_iku','doc_iku').length == 0">
                                                    <td colSpan="3" class="tengah"><i>Belum ada Laporan</i></td>
                                                </tr>
                                            </table>   
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="tengah">
                                        7
                                    </td>
                                    <td>
                                        Capaian SKPD
                                        <button class="btn btn-danger btn-xs" style="float:right"  ng-click="addForm();descrip = 'ringkasan_capaian';urlAct = '<?php echo base_url();?>'+'login/upload/doc_capaian/berkas/capaian_skpd_/SakipSKPD/ringkasan_capaian'">+</button>
                                    </td>
                                        <td style="max-width: 225px;" colspan="2">
                                            <table>
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th class="tengah" style="width: 25px;">No</th>
                                                        <th class="tengah">Deskripsi</th>
                                                        <th class="tengah" style="width: 115px;">File</th>
                                                    </tr>
                                                </thead>
                                                <tr ng-repeat="lap in getLaporans('ringkasan_capaian','doc_capaian')">
                                                    <td class="tengah">#{{$index+1}}</td>
                                                    <td>{{lap.ringkasan_capaian}}</td>
                                                    <td class="tengah">
                                                        <!-- {{lap.doc_capaian}} -->
                                                        <a href="#" ng-click="iframeOpen(lap.doc_capaian)">
                                                            <img style="width:21px" src="<?php echo base_url()?>../assets/img/doc.png" alt="">
                                                            Berkas
                                                        </a>
                                                        <div style="float:right">
                                                        <a href="#" ng-click="hapusLaporans('tabel_laporan_skpd',lap.id_lap_skpd)">&times;</a> 
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr ng-if="getLaporans('ringkasan_capaian','doc_capaian').length == 0">
                                                    <td colSpan="3" class="tengah"><i>Belum ada Laporan</i></td>
                                                </tr>
                                            </table>   
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <br>
                        <br>
                    </div>
                </div>
               
                <!-- dialogbox -->
               <div ng-show="adding" style="    position: fixed;
                                background: white;padding: 20px;z-index:9;margin: 0 auto;left: 0;right: 0;top:100px;
                                box-shadow: 0px 1px 3px 0px black;" class="col-md-6 animate__animated animate__bounceIn" >
                                <?php $this->load->view('dialog/headerBox');?>
                                <div style="margin-top: 38px;">
                                    <form action="{{urlAct}}" enctype="multipart/form-data" method="post">
                                        <label for="">Deskripsi</label>
                                        <input type="text" class="form-control" name="{{descrip}}">
                                        <label for="">Upload Berkas PDF</label>
                                        <input name="file" type="file" multiple  />
                                        <div class="uploadLoad" ng-if="loadUp"></div>
                                        <div style="text-align:right" ng-if="!loacUp">
                                            <button type="submit" class="btn btn-primary btn-sm"  ng-click="loadUp = true">Simpan</button>
                                            <span class="btn btn-default btn-sm" ng-click="addForm()" >Batal</span>
                                        </div>
                                    </form>    
                                </div>
                                
                    </div>
                <!-- batas dialog -->
                <!-- dialogbox -->
                     <div ng-if="iframe" id="showFrame" style="background:#2f323a; height:auto"  >
                        <div id="judulFrame">Dokumen 
                            <!-- <span ng-if="docx == 'ra'">Rencana Aksi</span>   
                            <span ng-if="docx == 'pk'">Perjanjian Kinerja</span>   
                            <span ng-if="docx == 'iki'">Indikator Kinerja Individu</span> -->
                            <a href="#" ng-click="iframeOpen()" style="float:right;margin-right:5px">&times;</a>
                        </div>
                            <iframe ng-src="{{urlBerkas(individu)}}" frameborder="0"style="width: 99%;margin-top: 20px;min-height: 340px;" ></iframe>
                            <div style="text-align:center;margin-top: 17px;">
                                <span class="btn btn-info btn-xs" ng-click="iframeOpen();cancel()">Close</span>  
                            </div>
                    </div>
                    <!-- batas box -->


            </div>
        </div>
    </section>
</section>

<script>
   
    // Dropzone.options.zone1 = {
    //     init: function(){
    //     var th = this;
    //         this.on('queuecomplete', function(){
    //             //   ImageUpload.loadImage();  // CALL IMAGE LOADING HERE
    //             setTimeout(function(){
    //                 location.reload();
    //             },1000);
    //         })
    //     }
    // }
    Dropzone.options.zone2 = {
        init: function(){
        var th = this;
            this.on('queuecomplete', function(){
                //   ImageUpload.loadImage();  // CALL IMAGE LOADING HERE
                setTimeout(function(){
                    location.reload();
                },1000);
            })
        }
    }
    Dropzone.options.zone3 = {
        init: function(){
        var th = this;
            this.on('queuecomplete', function(){
                //   ImageUpload.loadImage();  // CALL IMAGE LOADING HERE
                setTimeout(function(){
                    location.reload();
                },1000);
            })
        }
    }

    Dropzone.options.zone4 = {
        init: function(){
        var th = this;
            this.on('queuecomplete', function(){
                //   ImageUpload.loadImage();  // CALL IMAGE LOADING HERE
                setTimeout(function(){
                    location.reload();
                },1000);
            })
        }
    }
    Dropzone.options.zone5 = {
        init: function(){
        var th = this;
            this.on('queuecomplete', function(){
                //   ImageUpload.loadImage();  // CALL IMAGE LOADING HERE
                setTimeout(function(){
                    location.reload();
                },1000);
            })
        }
    }
    Dropzone.options.zone6 = {
        init: function(){
        var th = this;
            this.on('queuecomplete', function(){
                //   ImageUpload.loadImage();  // CALL IMAGE LOADING HERE
                setTimeout(function(){
                    location.reload();
                },1000);
            })
        }
    }
    Dropzone.options.zone7 = {
        init: function(){
        var th = this;
            this.on('queuecomplete', function(){
                //   ImageUpload.loadImage();  // CALL IMAGE LOADING HERE
                setTimeout(function(){
                    location.reload();
                },1000);
            })
        }
    }
</script>

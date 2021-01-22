<section id="main-content" ng-init="jenis_lap = 'skpd';inputan = <?php echo htmlspecialchars(json_encode($dataAll)); ?>;dataTahun()"> 
    <section class="wrapper" id="wrap" ng-keydown="$event.keyCode === 27 && descEdit('null')">
        <div class="container-fluid content-side" >
            <b class="judul">E-Sakip <?php echo $this->session->userdata('skpd');?> Tahun {{tahun}}</b>
            <div class="row" style="margin-top:20px;padding: 20px 0px">
                <div class="col-md-12">
                    <div style="text-align:right" class="tools">
                        <label for="">Tahun</label>
                        <input type="number" placeholder="tahun" ng-model="tahun" ng-change="cekTriwulan();dataTahun()">
                    </div>
                    <div>
                        <table>
                            <thead class="bg-primary">
                                <tr >
                                    <th style="text-align:center">No</th>
                                    <th style="text-align:center">Laporan</th>
                                    <th style="text-align:center">Deskripsi</th>
                                    <th style="text-align:center" colSpan="2">Berkas (PDF)</th>
                                    <!-- <th style="text-align:center">view</th> -->
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
                                    <td style="max-width: 225px;" ng-dblclick="descEdit('rpjmd')" >
                                            <p style="text-align:justify" ng-if="desc != 'rpjmd' && jumlahLaporan != 0">{{inputan.ringkasan_renstra}}</p>
                                            <div style="text-align:center">
                                                <i ng-if="desc != 'rpjmd' && jumlahLaporan == 0 || desc != 'rpjmd' && inputan.ringkasan_renstra == null" style="text-align:center;text-align: center;color: red;font-size: 9pt;background: #d4e403a8;padding: 3px;">Double click untuk buat deskripsi</i>
                                                <textarea ng-show="desc == 'rpjmd' " name="ringkasan_renstra"  ng-model="inputan.ringkasan_renstra"  ng-keydown="$event.keyCode === 13 && descEdit('rakpd',inputan) " style="margin: 0px;width: 100%;height: 100px;"  >Deskripsi RPJMD</textarea> <br>
                                                <i ng-if="desc == 'rpjmd'" style="font-size: 7pt;" style="font-size: 7pt;">Tekan 'enter' untuk simpan </i>
                                            </div>
                                    </td>
                                    <td style="text-align:center">
                                        <iframe ng-show="berkas == null && inputan.doc_renstra != null || berkas != 'RENTRA' && inputan.doc_renstra != null"  ng-src="{{urlBerkas(inputan.doc_renstra)}}" frameborder="0" width="100%"></iframe>
                                        <form ng-show="berkas == 'RENTRA' || inputan.doc_renstra == null" action="<?php echo base_url();?>login/upload/doc_renstra/berkas/renstra_skpd_/SakipSKPD" class="dropzone" id="zone1">
                                            <div class="fallback">
                                                <input name="file" type="file" multiple  />
                                            </div>
                                        </form>
                                    </td>
                                    <td style="text-align:center">
                                        <div ng-show="inputan.doc_renstra != null">
                                            <button ng-show="berkas != 'RENTRA'" class="btn btn-warning btn-xs" ng-click="editKab('RENTRA')">Edit</button>
                                            <button ng-show="berkas == 'RENTRA'" class="btn btn-danger btn-xs" ng-click="editKab('sdRKPD')">Batal</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="tengah">
                                        2
                                    </td>
                                    <td>
                                        RKP
                                    </td>
                                    <td style="max-width: 225px;" ng-dblclick="descEdit('rkpd')" >
                                            <p style="text-align:justify" ng-if="desc != 'rkpd' && jumlahLaporan != 0">{{inputan.ringkasan_rkp}}</p>
                                            <div style="text-align:center">
                                                <i ng-if="desc != 'rkpd' && jumlahLaporan == 0 || desc != 'rkpd' && inputan.ringkasan_rkp == null" style="text-align:center;text-align: center;color: red;font-size: 9pt;background: #d4e403a8;padding: 3px;">Double click untuk buat deskripsi</i>
                                                <textarea ng-show="desc == 'rkpd' " name="ringkasan_renstra"  ng-model="inputan.ringkasan_rkp"  ng-keydown="$event.keyCode === 13 && descEdit('rakpd',inputan) " style="margin: 0px;width: 100%;height: 100px;"  >Deskripsi RPJMD</textarea> <br>
                                                <i ng-if="desc == 'rkpd'" style="font-size: 7pt;" style="font-size: 7pt;">Tekan 'enter' untuk simpan </i>
                                            </div>
                                    </td>
                                    <td style="text-align:center">
                                        <iframe ng-show="berkas == null && inputan.doc_rkp != null || berkas != 'RKPD' && inputan.doc_rkp != null" ng-src="{{urlBerkas(inputan.doc_rkp)}}" frameborder="0" width="100%"></iframe>
                                        <form ng-show="berkas == 'RKPD' || inputan.doc_rkp == null" action="<?php echo base_url();?>login/upload/doc_rkp/berkas/rkp_skpd_/SakipSKPD" class="dropzone" id="zone2">
                                            <div class="fallback">
                                                <input name="file" type="file" multiple  />
                                            </div>
                                        </form>
                                    </td>
                                    <td style="text-align:center">
                                        <!-- <button class="btn btn-warning btn-xs">Lihat</button> -->
                                        <div ng-show="inputan.doc_rkp != null">
                                            <button ng-show="berkas != 'RKPD'" class="btn btn-warning btn-xs" ng-click="editKab('RKPD')">Edit</button>
                                            <button ng-show="berkas == 'RKPD'" class="btn btn-danger btn-xs" ng-click="editKab('sdRKPD')">Batal</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="tengah">
                                        3
                                    </td>
                                    <td>
                                        Perjanjian Kinerja SKPD
                                    </td>
                                    <td style="max-width: 225px;" ng-dblclick="descEdit('pk')">
                                            <p style="text-align:justify" ng-if="desc != 'pk' && jumlahLaporan != 0">{{inputan.ringkasan_pk}}</p>
                                            <div style="text-align:center">
                                                <i ng-if="desc != 'pk' && jumlahLaporan == 0 || desc != 'pk' && inputan.ringkasan_pk == null " style="text-align:center;text-align: center;color: red;font-size: 9pt;background: #d4e403a8;padding: 3px;">Double click untuk buat deskripsi</i>
                                                <textarea ng-show="desc == 'pk' " name="ringkasan_renstra"  ng-model="inputan.ringkasan_pk"  ng-keydown="$event.keyCode === 13 && descEdit('rakpd',inputan) " style="margin: 0px;width: 100%;height: 100px;"  >Deskripsi RPJMD</textarea> <br>
                                                <i ng-if="desc == 'pk'" style="font-size: 7pt;">Tekan 'enter' untuk simpan </i>
                                            </div>
                                    </td>
                                    <td style="text-align:center">
                                    <iframe ng-show="berkas == null && inputan.doc_pk != null || berkas != 'PK' && inputan.doc_pk != null" ng-src="{{urlBerkas(inputan.doc_pk)}}" frameborder="0" width="100%"></iframe>
                                        <form ng-show="berkas == 'PK' || inputan.doc_pk == null" action="<?php echo base_url();?>login/upload/doc_pk/berkas/pk_skpd_/SakipSKPD" class="dropzone" id="zone3">
                                            <div class="fallback">
                                                <input name="file" type="file" multiple  />
                                            </div>
                                        </form>
                                    </td>
                                    <td style="text-align:center">
                                        <div ng-show="inputan.doc_pk != null">
                                            <button ng-show="berkas != 'PK'" class="btn btn-warning btn-xs" ng-click="editKab('PK')">Edit</button>
                                            <button ng-show="berkas == 'PK'" class="btn btn-danger btn-xs" ng-click="editKab('sdRKPD')">Batal</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="tengah">
                                        4
                                    </td>
                                    <td>
                                        LKJIP
                                    </td>
                                    <td style="max-width: 225px;" ng-dblclick="descEdit('lkjip')">
                                            <p style="text-align:justify" ng-if="desc != 'lkjip' && jumlahLaporan != 0">{{inputan.ringkasan_lkjip}}</p>
                                            <div style="text-align:center">
                                                <i ng-if="desc != 'lkjip' && jumlahLaporan == 0 || desc != 'lkjip' && inputan.ringkasan_lkjip == null " style="text-align:center;text-align: center;color: red;font-size: 9pt;background: #d4e403a8;padding: 3px;">Double click untuk buat deskripsi</i>
                                                <textarea ng-show="desc == 'lkjip' " name="ringkasan_lkjip"  ng-model="inputan.ringkasan_lkjip"  ng-keydown="$event.keyCode === 13 && descEdit('rakpd',inputan) " style="margin: 0px;width: 100%;height: 100px;"  >Deskripsi RPJMD</textarea> <br>
                                                <i ng-if="desc == 'lkjip'" style="font-size: 7pt;">Tekan 'enter' untuk simpan </i>
                                            </div>
                                    </td>
                                    <td style="text-align:center">
                                        <iframe ng-show="berkas == null && inputan.doc_lkjip != null || berkas != 'LKJIP' && inputan.doc_lkjip != null" ng-src="{{urlBerkas(inputan.doc_lkjip)}}" frameborder="0" width="100%"></iframe>
                                        <form ng-show="berkas == 'LKJIP' || inputan.doc_lkjip == null" action="<?php echo base_url();?>login/upload/doc_lkjip/berkas/lkjip_skpd_/SakipSKPD" class="dropzone" id="zone4">
                                            <div class="fallback">
                                                <input name="file" type="file" multiple  />
                                            </div>
                                        </form>
                                    </td>
                                    <td style="text-align:center">
                                        <div ng-show="inputan.doc_lkjip != null">
                                            <button ng-show="berkas != 'LKJIP'" class="btn btn-warning btn-xs" ng-click="editKab('LKJIP')">Edit</button>
                                            <button ng-show="berkas == 'LKJIP'" class="btn btn-danger btn-xs" ng-click="editKab('sdRKPD')">Batal</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="tengah">
                                        5
                                    </td>
                                    <td>
                                        Rencana Aksi
                                    </td>
                                    <td style="max-width: 225px;" ng-dblclick="descEdit('ra')">
                                            <p style="text-align:justify" ng-if="desc != 'ra' && jumlahLaporan != 0">{{inputan.ringkasan_ra}}</p>
                                            <div style="text-align:center">
                                                <i ng-if="desc != 'ra' && jumlahLaporan == 0 || desc != 'ra' && inputan.ringkasan_ra == null  " style="text-align:center;text-align: center;color: red;font-size: 9pt;background: #d4e403a8;padding: 3px;">Double click untuk buat deskripsi</i>
                                                <textarea ng-show="desc == 'ra' " name="ringkasan_renstra"  ng-model="inputan.ringkasan_ra"  ng-keydown="$event.keyCode === 13 && descEdit('rakpd',inputan) " style="margin: 0px;width: 100%;height: 100px;"  >Deskripsi RPJMD</textarea> <br>
                                                <i ng-if="desc == 'ra'" style="font-size: 7pt;">Tekan 'enter' untuk simpan </i>
                                            </div>
                                    </td>
                                    <td style="text-align:center">
                                    <iframe ng-show="berkas == null && inputan.doc_ra != null || berkas != 'RA' && inputan.doc_ra != null" ng-src="{{urlBerkas(inputan.doc_ra)}}" frameborder="0" width="100%"></iframe>
                                        <form ng-show="berkas == 'RA' || inputan.doc_ra == null" action="<?php echo base_url();?>login/upload/doc_ra/berkas/ra_skpd_/SakipSKPD" class="dropzone" id="zone5">
                                            <div class="fallback">
                                                <input name="file" type="file" multiple  />
                                            </div>
                                        </form>
                                    </td>
                                    <td style="text-align:center">
                                        <div ng-show="inputan.doc_ra != null">
                                            <button ng-show="berkas != 'RA'" class="btn btn-warning btn-xs" ng-click="editKab('RA')">Edit</button>
                                            <button ng-show="berkas == 'RA'" class="btn btn-danger btn-xs" ng-click="editKab('sdRKPD')">Batal</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="tengah">
                                        6
                                    </td>
                                    <td>
                                        IKU SKPD
                                    </td>
                                    <td style="max-width: 225px;" ng-dblclick="descEdit('iku')">
                                            <p style="text-align:justify" ng-if="desc != 'iku' && jumlahLaporan != 0">{{inputan.ringkasan_iku}}</p>
                                            <div style="text-align:center">
                                                <i ng-if="desc != 'iku' && jumlahLaporan == 0 || desc != 'iku' && inputan.ringkasan_iku == null " style="text-align:center;text-align: center;color: red;font-size: 9pt;background: #d4e403a8;padding: 3px;">Double click untuk buat deskripsi</i>
                                                <textarea ng-show="desc == 'iku' " name="ringkasan_renstra"  ng-model="inputan.ringkasan_iku"  ng-keydown="$event.keyCode === 13 && descEdit('rakpd',inputan) " style="margin: 0px;width: 100%;height: 100px;"  >Deskripsi RPJMD</textarea> <br>
                                                <i ng-if="desc == 'iku'" style="font-size: 7pt;">Tekan 'enter' untuk simpan </i>
                                            </div>
                                    </td>
                                    <td style="text-align:center">
                                    <iframe ng-show="berkas == null && inputan.doc_iku != null || berkas != 'IKU' && inputan.doc_iku != null" ng-src="{{urlBerkas(inputan.doc_iku)}}" frameborder="0" width="100%"></iframe>
                                        <form ng-show=" berkas == 'IKU' || inputan.doc_iku == null" action="<?php echo base_url();?>login/upload/doc_iku/berkas/iku_skpd_/SakipSKPD" class="dropzone" id="zone6">
                                            <div class="fallback">
                                                <input name="file" type="file" multiple  />
                                            </div>
                                        </form>
                                    </td>
                                    <td style="text-align:center">
                                        <div ng-show="inputan.doc_iku != null">
                                            <button ng-show="berkas != 'IKU'" class="btn btn-warning btn-xs" ng-click="editKab('IKU')">Edit</button>
                                            <button ng-show="berkas == 'IKU'" class="btn btn-danger btn-xs" ng-click="editKab('sdRKPD')">Batal</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="tengah">
                                        7
                                    </td>
                                    <td>
                                        Capaian SKPD
                                    </td>
                                    <td style="max-width: 225px;" ng-dblclick="descEdit('capaian')">
                                            <p style="text-align:justify" ng-if="desc != 'capaian' && jumlahLaporan != 0">{{inputan.ringkasan_capaian}}</p>
                                            <div style="text-align:center">
                                                <i ng-if="desc != 'capaian' && jumlahLaporan == 0 || desc != 'capaian' && inputan.ringkasan_capaian == null " style="text-align:center;text-align: center;color: red;font-size: 9pt;background: #d4e403a8;padding: 3px;">Double click untuk buat deskripsi</i>
                                                <textarea ng-show="desc == 'capaian' " name="ringkasan_renstra"  ng-model="inputan.ringkasan_capaian"  ng-keydown="$event.keyCode === 13 && descEdit('rakpd',inputan) " style="margin: 0px;width: 100%;height: 100px;"  >Deskripsi RPJMD</textarea> <br>
                                                <i ng-if="desc == 'capaian'" style="font-size: 7pt;">Tekan 'enter' untuk simpan </i>
                                            </div>
                                    </td>
                                    <td style="text-align:center">
                                    <iframe ng-show="berkas == null && inputan.doc_capaian != null || berkas != 'capaian' && inputan.doc_capaian != null" ng-src="{{urlBerkas(inputan.doc_capaian)}}" frameborder="0" width="100%"></iframe>
                                        <form ng-show=" berkas == 'capaian' || inputan.doc_capaian == null" action="<?php echo base_url();?>login/upload/doc_capaian/berkas/capaian_skpd_/SakipSKPD" class="dropzone" id="zone7">
                                            <div class="fallback">
                                                <input name="file" type="file" multiple  />
                                            </div>
                                        </form>
                                    </td>
                                    <td style="text-align:center">
                                        <div ng-show="inputan.doc_capaian != null">
                                            <button ng-show="berkas != 'capaian'" class="btn btn-warning btn-xs" ng-click="editKab('capaian')">Edit</button>
                                            <button ng-show="berkas == 'capaian'" class="btn btn-danger btn-xs" ng-click="editKab('sdRKPD')">Batal</button>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <br>
                        <br>
                    </div>
                </div>
               
            </div>
        </div>
    </section>
</section>

<script>
    Dropzone.options.zone1 = {
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

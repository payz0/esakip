<section id="main-content" ng-init = "allData = <?php echo htmlspecialchars(json_encode($dataAll)); ?>;
                                    id_pegawai = '<?php echo $this->session->userdata('id_peg')?>'"> 
    <section class="wrapper" id="wrap">
        <div class="container-fluid content-side" >
            <b class="judul">Indikator Kinerja Individu</b>
            <div class="row" style="margin-top:20px;padding: 20px 0px">
                <div class="col-md-12">
                    <?php 
                    $nama = str_replace(' ','_',explode(',',$this->session->userdata('nama'))[0]);
                    echo form_open_multipart('../login/newUpload/iki/lap_iki_'.$nama.'_/buatLapIKI');?>   
                    
                    <div ng-show="ajuanIKU" class="animate__animated animate__bounceInDown animate__faster"> 
                        <table >
                            <tr style="border:0px solid ">
                                <td style="border:0px solid ">Kinerja</td>
                                <td style="border:0px solid ">
                                    <input class="form-control" type="text" placeholder="Kinerja" name="kinerja">
                                </td>
                            </tr>
                            <tr style="border:0px solid ">
                                <td style="border:0px solid ">Indikator</td>
                                <td style="border:0px solid ">
                                    <input class="form-control" type="text" placeholder="Indikator" name="indikator">
                                </td>
                            </tr>
                            <tr style="border:0px solid ">
                                <td style="border:0px solid ">Formula Perhitungan</td>
                                <td style="border:0px solid ">
                                    <input class="form-control" type="text" placeholder="Formula perhitungan"  name="formula">
                                </td>
                            </tr>
                            <tr style="border:0px solid ">
                                <td style="border:0px solid ">Sumber Data</td>
                                <td style="border:0px solid ">
                                    <input class="form-control" type="text" placeholder="Sumber data"  name="sumber">
                                </td>
                            </tr>
                            <tr style="border:0px solid ">
                                <td style="border:0px solid ">Dokumen</td>
                                <td style="border:0px solid ">
                                <input type="file" name="file" id="iku" onchange="angular.element(this).scope().cekFileIKI()">
                                </td>
                            </tr>
                            <tr style="border:0px solid ">
                                <td style="border:0px solid ">Tahun</td>
                                <td style="border:0px solid ">
                                    <input class="form-control" style="max-width:100px" type="number" name="tahun" placeholder="tahun" ng-model="tahun" ng-change="cekTriwulan()">
                                </td>
                            </tr>
                        </table>
                        <div>
                            <span ng-show="uploadIki" class="btn btn-primary btn-sm" ng-click="nextLanjut = true">Ajukan</span>
                            <span ng-if="!uploadIki" class="btn btn-primary btn-sm" ng-click="alert('Dokumen belum di tentukan')">Ajukan</span>
                            <span class="btn btn-danger btn-sm" ng-click="ajuanIKU = !ajuanIKU">Batal</span>
                        </div>
                        <div ng-show="nextLanjut " class="col-md-4" style="position: fixed;top: 0px;    background: #d0d0d0;color: #585858;padding: 20px;margin: 0 auto;left: 0px;right: 0px;box-shadow: 2px 3px 4px -1px black;text-align: center;">
                            <div style="    position: absolute;background: #ff8d00;left: 0px;top: 0px;width: 100%;padding: 2px;">
                                Peringatan !
                            </div>
                            <div style="margin-top: 15px;">
                                <b>Hanya ingin memastikan</b> <br>
                                Apakah anda akan meinput data untuk tahun <b style="font-size:!2pt; color:black">{{tahun}}</b>
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
                        <button ng-show="!ajuanIKU" class="btn btn-info btn-sm" ng-click="ajuanIKU = !ajuanIKU">Ajuan IKI</button> <br>
                        
                        <br>
                        <table >
                            <thead class="bg-primary">
                                <tr>
                                    <th class="tengah">No</th>
                                    <th class="tengah">Kinerja</th>
                                    <th class="tengah">Indikator</th>
                                    <th class="tengah">Formula</th>
                                    <th class="tengah">Sumber</th>
                                    <th class="tengah">Tahun</th>
                                    <th class="tengah">Berkas</th>
                                    
                                </tr>
                            </thead>
                            <tbody style="text-align:center">
                                <?php forEach($dataAll as $key => $val){ ?>
                                <tr>
                                    <td><?php echo $key+1; ?></td>
                                    <td style="text-align:justify"><?php echo $val->kinerja; ?></td>
                                    <td style="text-align:justify"><?php echo $val->indikator; ?></td>
                                    <td><?php echo $val->formula; ?></td>
                                    <td><?php echo $val->sumber; ?></td>
                                    <td><?php echo $val->tahun; ?></td>
                                    <td>
                                    
                                        <div ng-show="iframe<?php echo $key; ?>" id="showFrame" class="animate__animated animate__bounceIn">
                                            <div id="judulFrame">Berkas Indikator Kinerja Individu
                                                <a href="#" ng-click="iframe<?php echo $key; ?> = false" style="float:right;margin-right:5px">&times;</a>
                                            </div>
                                            <iframe src="<?php echo base_url() ?>../assets/berkas/<?php echo $val->berkas; ?>" frameborder="0" style="width: 99%;margin-top: 20px;min-height: 220px;"></iframe>
                                            <!-- <div style="    box-shadow: 0px 3px 8px -4px inset black;padding: 5px;background: white;">
                                                <br> -->
                                                <button class="btn btn-info btn-sm" ng-click="iframe<?php echo $key; ?> = false">Ok</button>
                                            <!-- </div> -->
                                            <br>
                                        </div>
                                       
                                           
                                            <button class="btn btn-default btn-xs" ng-click="iframe<?php echo $key; ?> = true">
                                                <img src="<?php echo base_url() ?>../assets/img/doc.png" style="width: 16px;"> 
                                            </button>
                                            <!-- <button class="btn btn-default btn-xs" ng-click="hapusLaporan('tabel_laporan_iki',<?php echo $val->id_iki; ?>)">&times;</button> -->
                                    </td>
                                </tr>
                                <?php } ?> 
                            </tbody>
                        </table>

                      
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

